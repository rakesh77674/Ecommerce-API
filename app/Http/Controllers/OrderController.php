<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\Helper;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'users_id' => 'required',
            'quantity'=>'required',
            'order_date'=>'required',
            'per_amount'=>'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $order_number = $request->order_number;
        $order_number = Helper::IDGenerator(new Order, 'order_number', 5, ''); /** Generate id */
        $order = new Order;
        $order->order_number = $order_number;
        $order->users_id = $request->users_id;
        $order->quantity = $request->quantity;
        $order->per_amount= $request->per_amount;
        $order->order_date= $request->order_date;
        $order->save();

        // $order = Order::create([
            
        //     $order->user_id = Auth()->id();
        //     $latestOrder = App\Order::orderBy('created_at','DESC')->first();
        //     $order->order_nr = '#'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
        //     'quantity' => $request->quantity,
        //     'per_amount'=>$request->per_amount,
        //     'order_date'=>$request->order_date,
        //     ]);

        return response()->json([
            'message' => 'order Added successfully',
            'product' => $order
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
