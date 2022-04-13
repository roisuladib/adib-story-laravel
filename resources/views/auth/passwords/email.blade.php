@extends('layouts.auth')

@section('title')
    Forgot password
@endsection

@section('page-content')
<section class="store-auth">
    <div class="container">
       <div class="row">
          <div class="col-sm-12 col-lg-6 text-center d-none d-lg-block">
             <img src="{{ url('/project/images/ilus-login.jpg')}}" class="sign-ilus" height="460px" />
          </div>
          <div class="col-sm-12 col-lg-4 align-middle">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
             <div class="content-auth">                  
                <img src="{{ url('/project/images/logo.svg') }}" class="sign-logo" height="60px" />             
                <h1 class="title-signin">Forgot Password</h1>   
                <p class="title-forgot-password">Make sure your account is registered manually not via Google Account</p>                
                <form action="{{ route('password.email') }}" method="POST" class="my-form-auth b-20">
                    @csrf
                   <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus autocomplete="email" required/>                       
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                   </div>                                       
                   <div class="buttom-sign">
                      <button type="submit" class="btn my-bt-pro bt-auth">Send Password Reset Link</button>                        
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
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
