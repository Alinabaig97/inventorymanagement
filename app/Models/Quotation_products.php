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

    public function quotation()
    {
        return $this->belongsTo(Quotation::class, 'quotation_id', 'id');
    }
  
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');

    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');

    }
    
        
}
