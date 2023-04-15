<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function index(Post $post)
    {
//        $this->authorize('view',auth()->user());
//        $data = request()->validated();
        $posts = Post::paginate(10);

        //       $filter =app()->make(PostFilter::class,['queryParams'=>array_filter($data)]);
        //                $posts = Post::filter($filter)->paginate(10);
        return view('post.index', compact('posts'));
    }

}
