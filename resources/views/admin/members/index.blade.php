@extends('admin.layouts.master')


@section('main')

<!-- start main content -->
<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Members</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Members</li>
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

                        @if ($members->count())
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First-name</th>
                                        <th>Last-name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Birthday</th>
                                        <th>Gender</th>
                                        <th>MemberType</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($members as $member)
                                <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$member->first_name}}</td>
                                        <td>{{$member->last_name}}</td>
                                        <td>{{$member->email}}</td>
                                        <td>{{$member->phone}}</td>
                                        <td>{{$member->birthday}}</td>
                                        <td>{{$member->gender}}</td>
                                        <td>{{$member->member_type_id}}</td>
                                        <td>{{$member->country_id}}</td>
                                        <td>
                                            <a href="{{ route('member.show', ['member' => $member->id]) }}" ><i class="fas fa-info" style="color: black padding-right: 12px;"></i></a>
                                            <div class="btn-group">


                                                <form method="POST" action="{{ route('member.destroy', $member->id) }}">
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
                        @else
                        <p class="text-center">No members yet. Please check back later.</p>
                        @endif
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
