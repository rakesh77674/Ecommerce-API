<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->user->products()->get();
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
            'product_name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'discount' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'product_excerpt' => 'required',
            'banner' => 'required',
            
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $product = Product::create([
            'product_sub_categories_id' => $request->product_sub_categories_id,
                'product_name' => $request->product_name,
                'slug' => $request->product_name,
                'description' => $request->description,
                'discount' => $request->discount,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'product_excerpt' => $request->product_excerpt,
                $banner = $request->banner,
                $imageName = time().'.'.$banner->getClientOriginalExtension(),
                $request->banner->move('productimage', $imageName),
                $banner = "/productimage/".$imageName,
                'banner' => $request->banner,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Product  Created successfully',
            'product' => $product
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'subcategory_id'=>'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $product->update([
                'product_name' => $request->product_name,
                'subcategory_id'=>$request->subcategory_id,
                'description'=>$request->description,
                'discount'=>$request->discount,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'product_excerpt'=>$request->product_excerpt,
                'banner'=>$request->banner,
                'category_id'=>$request->category_id,
                'updated_by' => Auth::user()->id,
            ]);

        return response()->json([
            'message' => 'Product Updated successfully',
            'product' => $product
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        
    }
}
