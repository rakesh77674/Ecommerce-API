<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
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
        return $this->user->Blog()->get();
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
            'blog_categories_id' => 'required|string',
            'title' => 'required',
            'slug' => 'required',
            'post' => 'required',
            'feat_image' => 'required',
            'excerpt' => 'required',
            'is_video_feat' => 'required',
            'post_view' => 'required',
            'is_published' => 'required',

        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json();
        }

        //Request is valid, create new product
        $blog = Blog::create([
            'blog_categories_id' => $request->blog_categories_id,
            'slug' => $request->title,
            'title'=>$request->title,
            $feat_image = $request->feat_image,
            $imageName = time().'.'.$feat_image->getClientOriginalExtension(),
            $request->feat_image->move('BlogImage', $imageName),
            $feat_image = "/BlogImage/".$imageName,
            'feat_image' => $request->feat_image,
            'post'=>$request->post,
            'excerpt'=>$request->excerpt,
            'meta'=>$request->meta,
            'is_video_feat'=>$request->is_video_feat,
            'post_view'=>$request->post_view,
            'is_published'=>$request->is_published,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            
            
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Blog Category created successfully',
            'data' => $blog
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'blog_categories_id' => 'required|string',
            'title' => 'required',
            'slug' => 'required',
            'post' => 'required',
            'feat_image' => 'required',
            'excerpt' => 'required',
            'is_video_feat' => 'required',
            'post_view' => 'required',
            'is_published' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $blog->update([
            'blog_categories_id' => $request->blog_categories_id,
            'slug' => $request->title,
            'title'=>$request->title,
            $feat_image = $request->feat_image,
            $imageName = time().'.'.$feat_image->getClientOriginalExtension(),
            $request->feat_image->move('BlogImage', $imageName),
            $feat_image = "/BlogImage/".$imageName,
            'feat_image' => $request->feat_image,
            'post'=>$request->post,
            'excerpt'=>$request->excerpt,
            'meta'=>$request->meta,
            'is_video_feat'=>$request->is_video_feat,
            'post_view'=>$request->post_view,
            'is_published'=>$request->is_published,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            ]);

        return response()->json([
            'message' => 'Product Updated successfully',
            'product' => $blog
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Blog=Blog::findOrFail($id);
        $Blog->delete();

    }
}
