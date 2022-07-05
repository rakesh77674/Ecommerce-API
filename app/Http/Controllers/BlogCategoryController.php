<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BlogCategoryController extends Controller
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
        return $this->user->BlogCategory()->get();
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
            'slug' => 'required',
            'icon' => 'required',
            'is_primary' => 'required',

        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json();
        }

        //Request is valid, create new product
        $blogcategory = BlogCategory::create([
            'category_name' => $request->category_name,
            'slug' => $request->category_name,
            'is_primary'=>$request->is_primary,
            $icon = $request->icon,
            $imageName = time().'.'.$icon->getClientOriginalExtension(),
            $request->icon->move('categoryIcon', $imageName),
            $icon = "/categoryIcon/".$imageName,
            'icon' => $request->icon,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            
            
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Blog Category created successfully',
            'data' => $blogcategory
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogCategory)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
       
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string',
            'slug' => 'required',
            'icon' => 'required',
            'is_primary' => 'required',

        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json();
        }

        //Request is valid, create new product
        $blogcategory = BlogCategory::create([
            'category_name' => $request->category_name,
            'slug' => $request->category_name,
            'is_primary'=>$request->is_primary,
            $icon = $request->icon,
            $imageName = time().'.'.$icon->getClientOriginalExtension(),
            $request->icon->move('categoryIcon', $imageName),
            $icon = "/categoryIcon/".$imageName,
            'icon' => $request->icon,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            
            
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Blog Category created successfully',
            'data' => $blogcategory
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Blog=BlogCategory::findOrFail($id);
        $Blog->delete();
    }
}
