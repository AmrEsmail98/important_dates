@extends('admin.layouts.master')

@section('main')

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Update Color</h2>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Countries</li>
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
                                    <h6 class="card-title mb-1">Update Color</h6>
                                </div>
                                <form action="{{route('color.update', $color->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Color Title</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" value="{{$color->name}}"  placeholder="Enter color Name"
                                                name="name" type="text">
                                                @error('name') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Color Code</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" value="{{$color->code}}"  placeholder="Enter color Code"
                                                name="code" type="color">

                                        </div>
                                    </div>

                                    <div class="row justify-content-end">

                                        <div class="col-md-8">
                                            <div class="btn-group" role="group">
                                                <button type="submit"
                                                    class="btn ripple btn-primary me-2">Submit</button>
                                                <a class="btn ripple btn-secondary text-light"
                                                    href="{{route('color.index')}}">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-center my-3">

                        {{$colors->links()}}

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
