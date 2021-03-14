@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit post</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('postupdate',['id'=> $posts->id])}}" method="post">
                                @csrf

                            <div class="form-group">
                                <label for="title">Category</label>
                                <select class="form-control" name="categoryName">
                                @foreach($categories as $category)
                                @if ($category->id == $posts->category_id)
                                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                                </select>
                            </div>

                                <div class="form-check">
                                    @foreach($tags as $tag)
                                        <label class="">
                                        <input class="" type="checkbox"  name="tags[]" value="{{ $tag->id }} "
                                    @foreach ($posts_tags as $item)
                                    @if($item->id == $tag->id )
                                        checked
                                    @endif
                                    @endforeach  
                                         > {{ $tag->tag }}  </label>  
                                         &nbsp;&nbsp;           
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $posts->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="contentt" class="form-label">Description</label>
                                    <textarea type="text" class="form-control" name="contentt"  rows="8" cols="8">
                                        {{ $posts->content }}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="featured" class="form-label">Photo</label><br>
                                    <input type="file" name="file" >
                                </div>

                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
