@extends('admin.layouts.master')

@section('main')

<!-- start main content -->
<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Admins</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admins</li>
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
                        <div class="row">
                            @include('admin.layouts.inc.success_message')
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">

                                <div class=" row justify-content">
                                    <div class="col-md-2">

                                        <a type="button" href="{{route('admin.create')}}"
                                            class="btn btn-small btn-primary text-light">Add Admin</a>
                                    </div>
                                </div>

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Image</th>
                                        <th>Join Date</th>
                                        <th>email</th>
                                        <th>Phone-Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$admin->first_name}}</td>
                                        <td>{{$admin->last_name}}</td>
                                        <td>
                                            <img src='{{asset("storage/$admin->image")}}' class="img-fluid img-thumbnail rounded-circle" style="max-width: 5rem" alt="{{$admin->name}}">
                                        </td>
                                        <td>{{$admin->created_at}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->phone}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('admin.edit', $admin->id)}}"
                                                    class="btn btn-sm edit-btn" data-id="{{$admin->id}}"
                                                    data-name="{{$admin->first_name}}"><i class="fas fa-edit"></i></a>
                                                <form method="POST" action="{{ route('admin.destroy', $admin->id) }}">
                                                    @csrf
                                                    @method('Delete')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
