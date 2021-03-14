@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($users->count()>0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Profile Photo</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody class="table table-striped">
                                @foreach($users as $user)
                                <tr>
                                    <th scope="row"> <img src="https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt="" width="100px" height="100px"></th>
                                    <td scope="row">{{$user->name}}</td>
                                    <td>
                                        @if($user->admin)
                                          <a class="" href="{{ route('usernotAdmin',['id'=>$user->id]) }}">
                                            <i class="glyphicon glyphicon-edit">Delete Admin</i>
                                          </a>
                                        @else
                                            <a class="" href="{{ route('useradmin',['id'=>$user->id]) }}">
                                                <i class="glyphicon glyphicon-edit">Make Admin</i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="" href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                        @else
                                    <div class="alert alert-info" role="alert">
                                        <p class="text-center"> No users</p>
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
