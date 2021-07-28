<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'productId',
    ];

    public function link()
    {
        return $this->hasMany(Plan_Link::class, 'plan_id');
    }
}
