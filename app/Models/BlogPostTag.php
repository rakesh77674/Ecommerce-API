<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostTag extends Model
{
    use HasFactory;
    protected $fillable = [
     'blogs_id','Blog_tags_id'
    ];
}
