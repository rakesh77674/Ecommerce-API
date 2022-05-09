<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
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
        return $this->user->productCategory()->get();
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
            'category_name' => 'required|string',
            'slug' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json();
        }

        //Request is valid, create new product
        $productcategory = ProductCategory::create([
            'category_name' => $request->category_name,
            'slug' => $request->category_name,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Product Category created successfully',
            'data' => $productcategory
        ], Response::HTTP_OK);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productcategory = $this->user->products()->find($id);
    
        if (!$productcategory) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product not found.'
            ], 400);
        }
    
        return $productcategory;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'subcategory_id'=>'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

         $productcategory=  ProductCategory::findOrFail($id)->update();

        return response()->json([
            'message' => 'Product Updated successfully',
            'product' => $productcategory
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productcategory=ProductCategory::findOrFail($id);
        $productcategory->delete();
    }
}
