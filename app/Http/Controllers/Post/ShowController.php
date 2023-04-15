<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends BaseController
{
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

}
