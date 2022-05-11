<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function show(Request $request, $id){    
            if($id==-1){
            $product = Order::get();
            return response()->json([
            'message' => 'Order show successfully',
            'product' => $product
            ], 200);}
          else
        // $product = Order::where('users_id','=',auth()->id())->get();

    $product = Order::select('id','quantity', 'per_amount', 'order_date','order_number','order_status')->where('status','1')->get();
     return response()->json([
            'message' => 'Order show successfully',
            'product' => $product
        ], 200);
   
    }
   public function update( Request $request, $id){
       if($id==-1){
        $product = Order::get();
        return response()->json([
            'message' => 'Order show successfully',
            'product' => $product
        ], 200);}else
            $product = Order::find($id);
         //$product = Order::find($id)->select('id','quantity', 'per_amount', 'order_date','order_number','order_status')->where('status','1')->get();
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
