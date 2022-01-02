@include('admin.layouts.inc.header')
@include('admin.layouts.inc.side-settings')

    <!-- start main content -->
    <div class="d-flex flex-column align-items-center justify-content-center min-vh-100">
        <div class="authForm mx-auto">
              <div class="text-center mb-2">
                <img src="{{ asset("admin/images/logo.png")}}" class="header-brand-img" alt="logo">
                <img src="{{ asset("admin/images/logo-light.png")}}" class="header-brand-img theme-logos" alt="logo">
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center fs-20">Forgot Password</h4>
                    <form method="POST" action="{{route('password.email')}}">
                        @csrf

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn ripple btn-primary w-100">Request reset link</button>
                    </form>
                </div>
                <div class="card-footer border-top-0 text-center">
                    <p>Did you remembered your password?</p>
                    <p class="mb-0"><a href="{{ route('login') }}">Try to Signin</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- end main content -->

@include('admin.layouts.inc.footer')

