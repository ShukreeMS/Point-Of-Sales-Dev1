<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchase';
    protected $primaryKey = 'purchase_id';
    protected $fillable = [
        'total_item', 'total_price','discount', 'pay',
    ];

}
