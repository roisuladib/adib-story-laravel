@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('page-content')
<section class="store-auth">
    <div class="container">
       <div class="row">
          <div class="col-sm-12 col-lg-6 text-center d-none d-lg-block">            
            <img src="{{ url('/project/images/ilus-login.jpg') }}" class="sign-ilus" height="460px" />            
          </div>
          <div class="col-sm-12 col-lg-4 align-middle">
             <div class="content-auth">     
             <div class="text-center">
                <img src="{{ url('/project/images/logo.svg') }}" class="sign-logo" height="70px" />             
                <h1 class="title-signin">Sign In</h1>  
             </div>
                <form method="POST" action="{{ route('login') }}" class="my-form-auth b-20">
                    @csrf                                
                    <div class="form-group">
                        <label for="email">Email address</label>                        
                        <input type="email" name="email" id="email"  class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>                        
                        <input type="password" name="password" id="password"  class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <p class="text-right">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-link">
                                Forgot password
                            </a>                                   
                        @endif
                    </p>                     
                    <div class="buttom-sign">
                        <button type="submit" class="btn my-bt-pro bt-auth">Login</button>
                        <a href="{{ route('register') }}" type="button" class="btn my-bt-alt bt-auth">Register</a>
                        <hr style="margin: 30px 0 30px 0;">
                        <a href="#" type="button" class="btn my-bt-alt bt-auth" style="background: #34495e; color: #fff;">
                            <img src="{{ url('project/images/icon_google.svg') }}" width="26px" height="26px" style="margin-right: 10px" />
                            Login / Register
                        </a>
                    </div>
                </form>           
             </div>
          </div>
       </div>
    </div>
 </section>


<div class="container d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
