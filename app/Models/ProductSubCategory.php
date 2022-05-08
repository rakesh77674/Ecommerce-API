<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_categories_id','subcategory_name', 'slug','created_by','updated_by'
     ];
}
