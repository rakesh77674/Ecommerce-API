<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show($id){
        $product = Order:: where('users_id','=',auth()->id())->get();
        $product=Order::findOrFail($id);
        return response()->json($product);
    }
}
