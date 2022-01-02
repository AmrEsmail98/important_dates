@extends('admin.layouts.master')


@section('main')

<!-- start main content -->
<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Welcome To Countries</h2>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
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
                    <div class="row">
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">

                                <div class=" row justify-content">
                                    <div class="col-md-2">

                                        <a type="button" href="{{route('country.create')}}"
                                            class="btn btn-small btn-primary text-light">Add Country</a>
                                    </div>
                                </div>

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @foreach ($countries as $country)
                                <tbody id="countries-table">
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$country->name}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('country.edit', $country->id)}}"
                                                    class="btn btn-sm edit-btn" data-id="{{$country->id}}"
                                                    data-name="{{$country->name}}"><i class="fas fa-edit"></i></a>
                                                <form method="POST" action="{{ route('country.destroy', $country->id) }}">
                                                    @csrf
                                                    @method('Delete')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
