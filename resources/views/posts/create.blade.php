@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create post</div>

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

                            @if($categories->count()==0)

                                <div class="alert alert-danger">
                                    <ul>
                                        <li> The Category Tabel is empty !!<br></li>
                                        <li> please, Add New Category to can create post </li>
                                    </ul>
                                </div>
                            @endif
                                <form action="{{route('poststore',['id'=> Auth::user()->id ])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <label for="title">Category</label>
                                        <select class="form-control" name="categoryName">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach 
                                        </select>
                                    </div> 

                                    <div class="form-check">
                                        @foreach($tags as $tag)
                                        <input class="" type="checkbox"  name="tags[]" value="{{ $tag->id }}" >
                                        <label class=""> {{ $tag->tag }} </label>
                                            &nbsp;&nbsp;
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="contentt" class="form-label">Description</label>
                                        <textarea type="text" class="form-control" name="contentt" rows="8" cols="8"></textarea>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="featured" class="form-label">Photo</label><br>
                                        <input type="file" name="image" >
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
