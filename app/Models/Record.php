<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = 'records';

    protected $fillable = [
        'productName',
        'productId',
        'transactionType',
        'affliateId',
        'amount',
        'paymentMethod',
        'txnId',
        'saleId',
    ];
}
