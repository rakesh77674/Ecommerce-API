<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function show($id){ 

        // $product = Order::where('users_id','=',auth()->id())->get();
        if($id=-1){
            $product = Order::get();
            return response()->json([
                'message' => 'Order show successfully',
                'product' => $product
            ], 200);
        }
        $product=Order::findOrFail($id);
        
        return response()->json([
            'message' => 'Order show successfully',
            'product' => $product
        ], 200);
   
    }
   public function update( Request $request, $id){
    if($id=-1){
        $product = Order::get();
        return response()->json([
            'message' => 'Order show successfully',
            'product' => $product
        ], 200);
    }
    $product = Order::where('users_id','=',auth()->id())->where('status','0')->get();
    $product=Order::find($id);
    $product->per_amount = $request->per_amount;
    $product->order_date = $request->order_date;
    $product->quantity = $request->quantity;
    $product->save();
    
    
    return response()->json([
        'message' => 'Order update successfully',
        'product' => $product
    ], 201);
   }

}
