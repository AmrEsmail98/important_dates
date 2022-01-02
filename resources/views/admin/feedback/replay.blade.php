@extends('admin.layouts.master')

@section('main')

<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Feedback replay</h2>
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

                                <form action="{{ route('replay') }}" method="POST">
                                    @csrf
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="Enter Relative Name"
                                            value="{{$feedback->client->email}}"
                                                name="email" type="text">
                                                @error('email') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>subject</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" placeholder="Enter subject"

                                                name="subject" type="text">
                                                @error('subject') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-4">
                                            <label>Your replay</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-floating">
                                                <textarea class="form-control"name="message" placeholder="Enter your replay" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2"  >Enter your replay</label>
                                              </div>
                                                @error('message') <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">

                                        <div class="col-md-8">
                                            <div class="btn-group" role="group">
                                                <button type="submit"
                                                    class="btn ripple btn-primary me-2">Submit</button>
                                                <a class="btn ripple btn-secondary text-light"
                                                    href="{{route('feedback.index')}}">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
