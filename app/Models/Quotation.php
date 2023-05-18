<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $fillable =[
        'date',
        'customer_id',
        'order_tax',
        'discount',
        'shipping',
        'status',
        'note',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    

}
