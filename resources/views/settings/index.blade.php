@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Settings</div>

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

                        <form action="{{route('setting.update')}}" method="post" >
                            @csrf

                            <div class="form-group">
                                <label for="blog_name" class="form-label">Blog Name</label>
                                <input type="text" class="form-control" name="blog_name" value="{{ $setting->blog_name }}">
                            </div>

                            <div class="form-group">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ $setting->phone_number }}">
                            </div>

                            <div class="form-group">
                                <label for="blog_email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="blog_email" value="{{ $setting->blog_email }}">
                            </div>

                            <div class="form-group">
                                <label for="adress" class="form-label">Adress</label>
                                <input type="text" class="form-control" name="adress" value="{{ $setting->adress }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
