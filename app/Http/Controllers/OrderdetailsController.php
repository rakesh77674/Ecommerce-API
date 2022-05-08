<?php

namespace App\Http\Controllers;

use App\Models\Orderdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class OrderdetailsController extends Controller
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
            'orders_id' => 'required',
            'products_id' => 'required',
            'quantity'=>'required',
            'per_amount'=>'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $order = Orderdetails::create([
            'orders_id' =>$request->orders_id,
            'products_id' => $request->products_id,
            'quantity' => $request->quantity,
            'per_amount'=>$request->per_amount,
            
            ]);

        return response()->json([
            'message' => 'order Added successfully',
            'product' => $order
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orderdetails  $orderdetails
     * @return \Illuminate\Http\Response
     */
    public function show(Orderdetails $orderdetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orderdetails  $orderdetails
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderdetails $orderdetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orderdetails  $orderdetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orderdetails $orderdetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderdetails  $orderdetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderdetails $orderdetails)
    {
        //
    }
}
