@extends('admin.layouts.master')

@section('main')

<!-- start main content -->
<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Welcome To Reminders</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reminders</li>
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
                                    <input type="text" class="form-control" name="search" value="{{request('search')}}"
                                        placeholder="Search for...">
                                    <button class="btn ripple d-inline btn-primary" type="submit" id="button-addon1">
                                        <i class="las la-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        @if ($reminders->count())
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Owner</th>
                                        <th>Creation Date</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Color</th>
                                        <th>Reminder Date</th>
                                        <th>Rpetition</th>
                                        <th>Joined Member</th>
                                        <th>Notifications</th>
                                        <th>Notes</th>
                                        <th>Attachments</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                @foreach ($reminders as $reminder)
                                <tbody id="countries-table">
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$reminder->client->first_name}}</td>
                                        <td>{{$reminder->created_at}}</td>
                                        <td>{{$reminder->title}}</td>
                                        <td>{{$reminder->category->name}}</td>
                                        <td>{{$reminder->category->color->code}}</td>
                                        <td>{{$reminder->start_date}}</td>
                                        <td>{{$reminder->repeating_number}}</td>
                                        <td>{{$reminder->members->pluck('first_name')}}</td>
                                        <td>{{$reminder->notificationTypes->pluck('number_of_dayes_before')}}</td>
                                        <td>{{$reminder->notes}}</td>
                                        <td>{{$reminder->attachments}}</td>
                                        <td>{{$reminder->active}}</td>
                                        <td>
                                            <div class="badge"
                                                style="background-color:{{$reminder->color}}; width:44px;height:21px">
                                            </div>

                                        </td>
                                        <td>{{$reminder->notes}}</td>

                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        @else
                        <p class="text-center">No reminders yet. Please check back later.</p>
                        @endif
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