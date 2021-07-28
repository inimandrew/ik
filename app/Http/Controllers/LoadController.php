<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Models\Record;
use App\Models\Subscriptions;
use App\Models\User;
use App\Models\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class LoadController extends Controller
{
    public function ipn(Request $request)
    {
        $data = $request->all();


        $record = [
            'productName' => $data['WP_ITEM_NAME'],
            'productId' => $data['WP_ITEM_NUMBER'],
            'transactionType' => $data['WP_ACTION'],
            'affliateId' => $data['WP_AFFID'],
            'amount' => $data['WP_SALE_AMOUNT'],
            'paymentMethod' => $data['WP_PAYMETHOD'],
            'txnId' => $data['WP_TXNID'],
            'saleId' => $data['WP_SALEID']
        ];

        $recordExist = Record::firstOrCreate(['saleId' => $record['saleId']], $record);
        $password = Str::random(12);
        $user = [
            'name' => $data['WP_BUYER_NAME'],
            'email' => $data['WP_BUYER_EMAIL'],
            'password' => bcrypt($password),
        ];

        $userExist = User::where('email', $user['email'])->first();
        $plan = Plans::where('productId', $record['productId'])->first();

        if (!$userExist) {
            $newUser = User::create($user);

            if ($newUser) {
                Mail::to($user['email'])->send(new Welcome($user['email'], $password));
            }
            $subArray = [
                'plan_id' => $plan->id,
                'user_id' => $newUser->id,
                'record_id' => $recordExist->id,
            ];
        } else {
            $subArray = [
                'plan_id' => $plan->id,
                'user_id' => $userExist->id,
                'record_id' => $recordExist->id,
            ];
        }

        $subscription = Subscriptions::firstOrCreate($subArray, $subArray);

        return response()->json(['message' => 'Success'], 200);
    }

    public function authentication(Request $request)
    {
        $data = $request->except('_token');
        $rules = [
            'email' => 'required|exists:users,email|email',
            'password' => 'required|string'
        ];

        $validation =  Validator::make($data, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        } else {
            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']], 1)) {
                return redirect()->route('user.home')->withErrors(['message' => "Welcome " . Auth::user()->name])->withInput();
            } else {
                Session::put('red', 1);
                return redirect()->back()->withErrors(['password' => "Your password is Invalid"])->withInput();
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::put('green', 1);
        return redirect()->route('home')->withErrors(['message' => 'You have been logged out successfully.']);
    }
}
