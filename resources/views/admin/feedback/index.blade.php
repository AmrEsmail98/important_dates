@extends('admin.layouts.master')


@section('main')

<!-- start main content -->
<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Feedbacks</h2>
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
                    <div class="row">
                        @if(Session::has('message'))
                        <div class="alert alert-danger" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>send date</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>massage content</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @foreach ($feedbacks as $feedback)
                                <tbody id="countries-table">
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$feedback->created_at}}</td>
                                        <td>{{$feedback->client->first_name}}</td>
                                        <td>{{$feedback->client->email}}</td>
                                        <td>{{$feedback->massege}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('show_replay_form', $feedback->id)}}"
                                                   ><i class="fas fa-comment"></i></a>
                                                <form method="POST" action="{{ route('feedback.destroy', $feedback->id) }}">
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
