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
                <h4 class="text-center fs-20">{{ __('Login') }}</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" placeholder="Enter your email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">

                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control"  placeholder=" Enter your password"
                            @error('password') is-invalid @enderror" name="password"
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                    old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                    </div>
                    <button type="submit" class="btn ripple btn-primary w-100">{{ __('Login') }}</button>
     
                </form>
                <div class="mt-3 text-center">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main content -->

@include('admin.layouts.inc.footer')