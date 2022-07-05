<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTags extends Model
{
    use HasFactory;
    protected $fillable = [
     'tag_name','slug','is_trending','created_by','updated_by'
    ];
}
