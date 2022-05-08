<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_sub_categories_id','product_name', 'slug','description','discount','price','quantity','product_excerpt','banner','created_by','updated_by'
     ];
}
