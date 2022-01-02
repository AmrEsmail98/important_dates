@extends('admin.layouts.master')

@section('main')

<!-- start main content -->
<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">categories</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @include('admin.layouts.inc.success_message')
                    </div>
                    <div class="row">
                        <div class="card-body">
                            <table class="table table-hover">

                                <div class=" row justify-content">
                                    <div class="col-md-2">
                                        <a type="button" href="{{route('categories.create')}}"
                                            class="btn btn-small btn-primary text-light mb-3">Add category</a>
                                    </div>
                                </div>

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Color</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="countries-table">
                                @foreach ($categories as $category)
                                    <tr class="align-content-center">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <img src='{{asset("storage/$category->image")}}' class="img-fluid img-thumbnail rounded-circle" style="max-width: 5rem" alt="{{$category->name}}">
                                        </td>
                                        <td>
                                            <div class="badge" style="background-color:{{$category->color->code}}; width:44px;height:21px" > </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('categories.edit', $category->id)}}"
                                                    class="btn btn-sm edit-btn" data-id="{{$category->id}}"
                                                    data-name="{{$category->name}}"><i class="fas fa-edit"></i></a>
                                                <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                                    @csrf
                                                    @method('Delete')
                                                    <button type="submit" class="btn
                                                                btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-center my-3">

                        {{$categorys->links()}}

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
