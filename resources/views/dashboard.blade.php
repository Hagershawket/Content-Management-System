@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- row -->
                    <div class="container">
                        <div class="row">
                          <div class="col-sm">
                            <!-- card -->
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Posts</div>
                                <div class="card-body">
                                  <h5 class="card-title">{{$posts_count}}</h5>
                                </div>
                            </div>
                            <!-- /card -->
                          </div>
                          <div class="col-sm">
                            <!-- card -->
                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Users</div>
                                <div class="card-body">
                                  <h5 class="card-title">{{$users_count}}</h5>
                                </div>
                            </div>
                            <!-- /card -->
                          </div>
                          <div class="col-sm">
                            <!-- card -->
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">Categories</div>
                                <div class="card-body">
                                  <h5 class="card-title">{{$categories_count}}</h5>
                                </div>
                            </div>
                            <!-- /card -->
                          </div>
                        </div>
                      </div>
                   <!-- /row -->
                   <!-- row  -->
                      <div class="container">
                        <div class="row">
                          <div class="col-sm">
                            <!-- card -->
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-header">Tags</div>
                                <div class="card-body">
                                  <h5 class="card-title">{{$tags_count}}</h5>
                                </div>
                            </div>
                            <!-- /card -->
                          </div>
                          <div class="col-sm">
                            <!-- card -->
                            <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                                <div class="card-header">Trashed Posts</div>
                                <div class="card-body">
                                  <h5 class="card-title">{{$trashed_Posts_count}}</h5>
                                </div>
                            </div>
                            <!-- /card -->
                          </div>
                          <div class="col-sm">
                            <!-- card -->
                        {{-- <div class="card text-dark bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                  <h5 class="card-title">Info card title</h5>
                                </div>
                            </div>  --}}
                            <!-- /card -->
                          </div>
                        </div>
                      </div>
                    <!-- /row -->
                    
                      
                      
                      
                      
                      
                      
                    {{--  <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                          <h5 class="card-title">Dark card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div> --}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
