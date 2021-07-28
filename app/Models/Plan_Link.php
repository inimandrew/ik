<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan_Link extends Model
{
    use HasFactory;

    protected $table = 'plans_links';

    protected $fillable = [
        'plan_id',
        'link',
        'linkTitle',
        'image_url',
    ];
}
