@extends('admin.layouts.master')

@section('main')

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Edit Category</h2>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                                <div class="row d-flex justify-content-center">
                                    <img src='{{asset("storage/$category->image")}}' class="img-fluid img-thumbnail rounded-circle" style="max-width: 10rem" alt="{{$category->name}}">
                                </div>
                                <div class="mb-3">
                                    <h6 class="card-title mb-1">Edit Category</h6>
                                </div>
                                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input value="{{$category->name}}" class="form-control"  placeholder="Enter Category Name" 
                                                name="name" type="text">
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Color</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="color_id" class="form-select"}}">
                                                <option selected>Select Color</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{$color->id}}" style="color:{{$color->code}}"
                                                        @if ($category->color_id == $color->id)
                                                            selected
                                                        @endif
                                                        >
                                                        {{$color->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('color_id') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Change Image</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" name="image" type="file">
                                            @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>


                                    <div class="row d-flex justify-content-start">

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
