<?php

namespace App\Http\Controllers;

use App\Models\BlogTags;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BlogTagsController extends Controller
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
            'tag_name' => 'required|string',
            'slug' => 'required',
            'is_trending' => 'required',
            

        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json();
        }

        //Request is valid, create new product
        $blogtags = BlogTags::create([
            'tag_name' => $request->tag_name,
            'slug' => $request->tag_name,
            'is_trending'=>$request->is_trending,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            
            
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'BlogTag created successfully',
            'data' => $blogtags
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogTags  $blogTags
     * @return \Illuminate\Http\Response
     */
    public function show(BlogTags $blogTags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogTags  $blogTags
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogTags $blogTags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogTags  $blogTags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogTags $blogTags)
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
        $blogTags->update([
            'tag_name' => $request->tag_name,
            'slug' => $request->tag_name,
            'is_trending'=>$request->is_trending,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            ]);

        //Product created, return success response
        return response()->json([
            'message' => 'Product Updated successfully',
            'product' => $blogTags
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogTags  $blogTags
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $BlogTags=BlogTags::findOrFail($id);
        $BlogTags->delete();
    }
}
