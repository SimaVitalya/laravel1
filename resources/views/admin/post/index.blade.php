@extends('layouts.admin')

@section('content')

    <div><a href="{{route('post.create')}}">Add post</a></div>
    <div>
        @foreach($posts as $post)
            <div><a href="{{route('post.show',$post->id)}}">{{$post->id}}.{{$post->title}}</a></div>
        @endforeach
    </div>
    <div>{{$posts->links()}}</div>
@endsection
