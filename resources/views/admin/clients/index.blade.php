@extends('admin.layouts.master')


@section('main')

<!-- start main content -->
<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Clients</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Clients</li>
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
                        <div class="col-lg-4">
                            <form method="GET" action="#">
                            <div class="btn-group mb-3">
                                    <input type="text" class="form-control" name="search" value="{{request('search')}}" placeholder="Search for...">
                                    <button class="btn ripple d-inline btn-primary" type="submit" id="button-addon1">
                                        <i class="las la-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        @if ($clients->count())
                            
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>join-date</th>
                                        <th>First-name</th>
                                        <th>last-name</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>birthday</th>
                                        <th>Country</th>
                                        {{-- <th>members</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($clients as $client)
                                <tbody id="countries-table">
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$client->created_at}}</td>
                                        <td>{{$client->first_name}}</td>
                                        <td>{{$client->last_name}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->phone}}</td>
                                        <td>{{$client->birthday}}</td>
                                        <td>{{$client->country->name}}</td>
                                        {{-- <td>{{$client->member->first_name}}</td> --}}
                                        <td>
                                            <a href="{{ route('client.show', ['client' => $client->id]) }}"><i
                                                    class="fas fa-info"
                                                    style="color: black padding-right: 12px;"></i></a>
                                            <div class="btn-group">


                                                <form method="POST" action="{{ route('client.destroy', $client->id) }}">
                                                    @csrf
                                                    @method('Delete')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        @else
                            <p class="text-center">No clients yet. Please check back later.</p>
                        @endif
                    </div>
                    {{-- <div class="d-flex justify-content-center my-3">

                        {{$clients->links()}}

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