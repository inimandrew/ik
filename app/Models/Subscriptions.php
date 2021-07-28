<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    use HasFactory;

    protected $table = 'users_plans';

    protected $fillable = [
        'plan_id',
        'user_id',
        'record_id',
    ];

    public function plan()
    {
        return $this->belongsTo(Plans::class, 'plan_id');
    }
}
