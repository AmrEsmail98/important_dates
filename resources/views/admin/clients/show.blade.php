@extends('admin.layouts.master')

@section('main')

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">View Client</h2>
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

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">

                                <div class="card-body " style="width: 50vh">
                                    <h5 class="card-title">User-Photo: {{ $client->image}}</h5><br>

                                    <h5 class="card-title">Frist-name: {{ $client->first_name}}</h5><br>

                                    <h5 class="card-title">Second-name: {{ $client->last_name}}</h5><br>
                                    <h5 class="card-title">country: {{$client->country}}</h5><br>
                                    <h5 class="card-title">Gender: {{ $client->Gender}}</h5><br>
                                    <h5 class="card-title">Email: {{ $client->email}}</h5><br>
                                    <h5 class="card-title">Phone: {{ $client->phone}}</h5><br>
                                    <h5 class="card-title">Birthday: {{ $client->birthday}}</h5><br>
                                  {{-- <h5 class="card-title">Name : {{ $blog->title}}</h5>
                                  <h5 class="card-title">description : {{ $blog->description}}</h5> --}}

                                </div>
                                <h3>Reminders :-</h3>
                                        
                                {{-- {{ $client->reminder->title}} --}}
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-dark mt-5 ml-5" href="{{ route('client.index') }}"> Back</a>
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

