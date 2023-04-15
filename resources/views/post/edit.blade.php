@extends('layouts.main')

@section('content')
    <form method="post" action="{{route('post.update',$post->id)}}">
        @method('PATCH');
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="title"
                   value="{{$post->title}}">
        </div>
        <div class="form-floating">
            <textarea name="content" class="form-control" placeholder="content"
                      id="content">{{$post->content}}</textarea>
            <label for="content"></label>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Title</label>
            <input value="{{$post->image }}" type="text" name="image" class="form-control" id="image"
                   placeholder="title">
        </div>
        <label for="category">Category</label>
        <select name="category_id" class=" form-select">
            @foreach($categories as $category )
                <option {{$category->id === $post->category->id ? 'selected' : ''}}
                        value="{{$category->id}}">{{$category->title}}</option>

            @endforeach
        </select>
        <div class="form-group">
            <label for="tag">tags</label>

            <select multiple class="form-control "id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                    @foreach($post->tags as $postTag)
                        {{$tag->id === $postTag->id ? 'selected' : ''}}

                    @endforeach

                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>

        </div>
        <button type="submit" class="btn btn-primary">UPDATE</button>
    </form>
@endsection
