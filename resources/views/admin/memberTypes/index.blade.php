@extends('admin.layouts.master')

@section('main')

<!-- start main content -->
<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Welcome To MemberTypes</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Colors</li>
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
                                        @include('admin.layouts.inc.messages')
                                        <a type="button" href="{{route('memberType.create')}}"
                                            class="btn btn-small btn-primary text-light">Add MemberType</a>
                                    </div>
                                </div>

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @foreach ($memberTypes as $member)
                                <tbody id="countries-table">
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$member->name}}</td>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('memberType.edit', $member->id)}}"
                                                    class="btn btn-sm edit-btn" data-id="{{$member->id}}"
                                                    data-name="{{$member->name}}"><i class="fas fa-edit"></i></a>
                                                <form method="POST" action="{{ route('memberType.destroy', $member->id) }}">
                                                    @csrf
                                                    @method('Delete')
                                                    <button type="submit" class="btn
                                                                btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
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
