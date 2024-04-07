<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'Productid',
        'productname',
        'Price',
        'Qty',
        'Tax',
        'Total',
        'Desc',
        'Net',
        'userid',
        'username'
    ];
}
