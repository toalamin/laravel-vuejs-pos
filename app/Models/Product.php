<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}