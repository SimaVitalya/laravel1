@extends('layouts.main')

@section('content')
    <form method="post" action="{{route('post.store')}}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title" placeholder="title">
            @error('title')
            <p class="text-danger">{{$message}}</p>@enderror
        </div>
        <div class="form-floating">

            <textarea name="content" class="form-control" placeholder="content" id="content">{{old('content')}}</textarea>
            <label for="content">content

        </div>
        @error('content') <p class="text-danger">{{$message}}</p>@enderror

        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input value="{{old('image')}}" type="text" name="image" class="form-control" id="image" placeholder="image">
            @error('image')
            <p class="text-danger">
                {{$message}}
            </p>
            @enderror


        </div>
        <label for="category">Category</label>
        <select name="category_id" class=" form-select">
            @foreach($categories as $category )

                <option
                    {{ old('category_id')== $category->id ? 'selected' : '' }}
                    value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="tag">tags</label>
            <select multiple class="form-control " id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>

        </div>
        <button type="submit" class="mb-1 btn btn-primary">Submit</button>
    </form>

@endsection
