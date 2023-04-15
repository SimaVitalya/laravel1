<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'tags'));
    }

}
