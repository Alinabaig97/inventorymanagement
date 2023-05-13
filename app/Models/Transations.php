<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransationCategory;
class Transations extends Model
{
    use HasFactory;
    public function category ()
    {
        return $this->belongsTo(TransationCategory::class,'category_id','id');
    }
}
