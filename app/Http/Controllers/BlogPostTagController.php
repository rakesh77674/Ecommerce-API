<?php

namespace App\Http\Controllers;

use App\Models\BlogPostTag;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BlogPostTagController extends Controller
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
            'blogs_id' => 'required|string',
            'Blog_tags_id' => 'required',
    
        
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json();
        }

        //Request is valid, create new product
        $blogtags = BlogPostTag::create([
            'blogs_id' => $request->blogs_id,
            'blog_tags_id' => $request->blog_tags_id,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            
            
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'BlogpostTag created successfully',
            'data' => $blogtags
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPostTag  $blogPostTag
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPostTag $blogPostTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPostTag  $blogPostTag
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPostTag $blogPostTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPostTag  $blogPostTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPostTag $blogPostTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPostTag  $blogPostTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPostTag $blogPostTag)
    {
        //
    }
}
