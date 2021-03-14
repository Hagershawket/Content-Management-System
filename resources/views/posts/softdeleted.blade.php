@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts Deleted</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if($posts->count()>0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Restore</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table table-striped">
                                    @foreach($posts as $post)
                                        <tr>
                                            <td scope="row"><img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" class="img-thumbnail"></td>
                                            <td scope="row">{{$post->title}}</td>
                                            <td scope="row">{{$post->content}}</td>
                                            <td>
                                                <a class="" href="{{ route('postrestore',['id'=>$post->id]) }}">
                                                    <i class="glyphicon glyphicon-edit">Restore</i>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="" href="{{ route('postharddelete',['id'=>$post->id]) }}">
                                                    <i class="far fa-trash-alt">Delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                @endforeach
                        @else
                            <div class="alert alert-info" role="alert">
                                <p class="text-center"> No Trashed posts</p>
                            </div>
                        @endif
                                   </tbody>
                                </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
