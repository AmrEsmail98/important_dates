@extends('admin.layouts.master')

@section('main')

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">About Us</h2>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

            </div>

        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif

                                <form action="{{ route('about.store') }}" method="POST">
                                    @csrf
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Title</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="Enter title"
                                                name="title" type="text">
                                                @error('title') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Content</label>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-floating">
                                                <textarea class="form-control"name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2" ></label>
                                              </div>
                                                @error('content') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Links</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control"
                                                name="link" type="text">
                                                <br>
                                                <input class="form-control"
                                                name="phone" type="text">
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div class="btn-group" role="group">
                                                <button type="submit"
                                                    class="btn ripple btn-primary me-2">Save</button>
                                                <a class="btn ripple btn-secondary text-light"
                                                   >Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-center my-3">

                        {{$countrys->links()}}

                    </div> --}}
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- end main content -->

@endsection
