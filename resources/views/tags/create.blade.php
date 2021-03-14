@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Tag</div>

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

                        <form action="{{route('tagstore')}}" method="post" >
                            @csrf
                            
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="tagname" placeholder="Enter Tag">
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
