@extends('admin.layouts.master')

@section('main')

<!-- start main content -->
<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Welcome To Roles</h2>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
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
                        @if(Session::has('message'))
                        <div class="alert alert-danger" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <div class="card-body">
                            <table class="table table-hover">

                                <div class=" row justify-content">
                                    <div class="col-md-2">

                                        <a type="button" href="{{ route('role.create') }}"
                                            class="btn btn-small btn-primary text-light">Add Role</a>
                                    </div>
                                </div>

                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="roles-table">
                                    @foreach ($roles as $role)

                                    <tr class='text-center'>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>

                                        <td>
                                            @foreach ($role->permissions as $permission )
                                            <ul>
                                                <li> {{ $permission->name}}</li>
                                                <ul>
                                                    @endforeach
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <div class="row w-25">
                                                <div class="col-4">
                                                    <a href="{{ route('role.edit', $role->id) }}"
                                                        class="btn btn-sm d-inline  edit-btn" data-id="{{ $role->id }}"
                                                        data-name="{{ $role->name }}"><i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col-3">
                                                    <form method="POST" action="{{ route('role.destroy', $role->id) }}">
                                                        @csrf
                                                        @method('Delete')
                                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- end main content -->

@endsection