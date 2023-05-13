<?php

namespace App\Models;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'unit',
        'price',
        'quantity',
        'status	',
        'supplier_id',
        'caterogy_id',
        'customers'
    ];

    public function product()
    {
        return $this->belongsTo(Customer::class,'customers','id');

    }
    public function categeory()
    {
        return $this->belongsTo(Category::class,'category_id','id');

    }
    public function suppliers()
    {
        return $this->belongsTo(User::class,'supplier_id','id');

    }
}
