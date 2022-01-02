@extends('admin.layouts.master')

@section('main')

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Add Admin</h2>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admins
                        </li>
                    </ol>
                </nav>
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
                                <div class="mb-3">
                                    <h6 class="card-title mb-1">Add Admin</h6>
                                </div>
                                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>first_Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="Enter first_name"
                                                name="first_name" type="text">
                                                @error('first_name') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>last_Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="Enter last_name"
                                                name="last_name" type="text">
                                                @error('last_name') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="Enter email"
                                                name="email" type="text">
                                                @error('email') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Image</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" name="image" type="file">
                                            @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Phone Number</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="phone"
                                                name="phone" type="text">
                                                @error('phone') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="password"
                                                name="password" type="password">
                                                @error('password') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>confirm_password</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="confirm_password"
                                                name="password_confirmation" type="password">
                                                @error('password_confirmation') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div class="btn-group" role="group">
                                                <button type="submit"
                                                    class="btn ripple btn-primary me-2">Submit</button>
                                                <a class="btn ripple btn-secondary text-light"
                                                    href="{{route('admin.index')}}">Cancel</a>
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
