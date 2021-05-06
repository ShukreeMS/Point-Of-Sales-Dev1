<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selling extends Model
{
    protected $table = 'selling';
    protected $primaryKey = 'selling_id';
    protected $fillable = [
        'member_code', 'total_item','total_price', 'discount', 'pay', 'received',
    ];
}
