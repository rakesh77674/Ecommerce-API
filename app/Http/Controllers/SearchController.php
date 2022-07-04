<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($product_name){
     return Product::where('product_name','LIKE','%'.$product_name.'%')->get();
    }
}
