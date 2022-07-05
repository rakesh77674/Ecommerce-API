<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
       'blog_categories_id', 'title','slug','post','feat_image','excerpt','meta','is_video_feat','post_view','is_published','created_by','updated_by'
     ];
}
