<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string|required',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''

        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::find(8);
        $post->delete();
        dd('deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');

    }

    public function firstOrCreate()
    {
        $post = Post::find(1);

        $postsArr = [
            'title' => 'title of post fro, phpstorm',
            'content' => 'some intersting content',
            'image' => 'image.jgp',
            'likes' => 50,
            'is_published' => '1',

        ];
        $post = Post::firstOrCreate([
            'title' => 'some 12title',

        ], [

            'title' => 'some 12title',
            'content' => 'some sdcontent',
            'image' => 'imagesdasd.jgp',
            'likes' => 5033,
            'is_published' => '1',

        ]);
        dd('firs or create');
    }

    public function updateOrCreate()
    {
        $postsArr = [
            'title' => 'updateorcreate some post',
            'content' => 'updateorcreate some content',
            'image' => 'image.jgp',
            'likes' => 504,
            'is_published' => '0',

        ];
        $post = Post::updateOrCreate(['title' => 'updateorcreate some post',], [
            'title' => 'vvvavsdsdv some post',
            'content' => 'updateorcreate some content',
            'image' => 'image.jgp',
            'likes' => 504,
            'is_published' => '0',
        ]);
        dd('uparceated');
    }
}
