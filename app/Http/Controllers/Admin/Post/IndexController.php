<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends Controller
{
    public function index(Post $post)
    {
        //        $data = request()->validated();
        $posts = Post::paginate(10);

        //       $filter =app()->make(PostFilter::class,['queryParams'=>array_filter($data)]);
        //                $posts = Post::filter($filter)->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

}
