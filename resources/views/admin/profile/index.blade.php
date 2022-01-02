@extends('admin.layouts.master')

@section('main')

<!-- start main content -->
<div class="main-content">
    <div class="container">
        <div class="page-header">
            <div>
                <h2 class="main-content-title">Profile</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <div class="main-img-user">
                        <img alt="avatar" src="{{asset("storage/$user->image")}}">
                    </div>
                    <div class="pro-user my-2">
                        <h5 class="mb-0">{{$user->first_name}} {{$user->last_name}}</h5>
                    </div>

                    <div class="contact-info mb-3">
                        <a href="#" class="contact-icon text-primary">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="contact-icon text-primary">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="contact-icon text-primary">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="contact-icon text-primary">
                            <i class="fab fa-dribbble"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header custom-card-header">
                    <h6 class="card-title mb-0">Contact Information</h6>
                </div>
                <div class="card-body">
                    <div class="main-profile-work-list">

                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 media-logo">
                                <i class="las la-mobile"></i>
                            </div>
                            <div class="flex-grow-1 ms-3 media-body">
                                <span>Mobile</span>
                                <div>{{$user->phone}}</div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 media-logo">
                                <i class="las la-envelope"></i>
                            </div>
                            <div class="flex-grow-1 ms-3 media-body">
                                <span>Email</span>
                                <div> {{$user->email}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-8 col-md-12">

            <div class="card main-content-body-profile">
                <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-overview-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview"
                            aria-selected="true">Overview</button>
                    </li>
                </ul>

                <div class="tab-content card-body" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                        aria-labelledby="pills-overview-tab">

                        <div class="main-content-label mb-4"> Personal Information </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div><strong>Full Name :</strong>{{$user->first_name}} {{$user->last_name}}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div><strong>Website :</strong> importantDates.com</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div><strong>Email :</strong> {{$user->email}}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div><strong>Phone :</strong> {{$user->phone}}</div>
                            </div>
                        </div>

                        <div class="main-content-label mb-4 mt-2"> About </div>

                        <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy when an unknown printer took a galley of type and
                            scrambled Lorem Ipsum has been the industry's standard dummy when an unknown printer
                            took a galley of type and scrambled it to make a type specimen book. It has survived
                            .</p>

                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                            ea commodo consequat. Duis aute irure dolor in reprehenderit Lorem Ipsum has been
                            the industry's standard dummy when an unknown printer took a galley of type and
                            scrambled in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

                        <div class="main-content-label mb-4 mt-4"> Work & Education </div>

                        <div class="main-profile-work-list">

                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 media-logo bg-success">
                                    <i class="fab fa-whatsapp text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3 media-body">
                                    <h6 class="mb-1 fs-14">UI/UX Designer at <a href="">Whatsapp</a></h6>
                                    <div class="fw-normal mb-2">2016 - present</div>
                                    <span>Past Work: spruko, Inc.</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 media-logo bg-primary">
                                    <i class="fas fa-layer-group text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3 media-body">
                                    <h6 class="mb-1 fs-14">Studied at <a href="">Buffer University</a></h6>
                                    <div class="fw-normal mb-2">2002 - 2006</div>
                                    <span>Degree: Bachelor of Science in Computer Science</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
<!-- end main content -->

@endsection
