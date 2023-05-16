<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation_products extends Model
{
    use HasFactory;
    protected $fillable =[
        'quotation_id',
        'product_id',
        'product_qty',
        'product_price',
        'customer_id',
   

    ];
}
