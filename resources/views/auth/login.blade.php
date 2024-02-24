@extends('auth.layout.app')
@section('title')
  Register
@endsection
@section('content')
<div class="container mb-5" style="padding-top: 120px;">
		
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="page-login">
            
                <div class="account-border">
                    <div class="row">
                    <div class="col-md-3 new-customer">
                        </div>
                            <div class="col-md-6">
                                <form  method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="well">
                                <p>
                                        <a href="{{ url('/redirect') }}" class="btn btn-success btn-block"> <i class="fa fa-google"></i> &nbsp; Continue with
                                            Google</a>
                                    </p>
                                    <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                                      <hr>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center">
                                     OR
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                                        <hr>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label " for="input-email">E-Mail Address</label>
                                        <input type="text" name="email" value="{{ old('email') }}" id="email" class="form-control @error('email') is-invalid @enderror" required />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert" style="color:red;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label " for="input-password">Password</label>
                                        @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="float-right">{{ __('Forgot Password?') }}</a>
                                    @endif
                                        <input type="password" name="password" value="" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert" style="color:red;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" checked="" name="remember" value="" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                        <span class="control-label"> Remember </span>
                                    </div>
                                </div>
                                <div class="bottom-form">
                                    <hr>
                                    <input type="submit" value="Login" class="btn btn-primary btn-block" />
                                </div>
                            </form>
                            <div class="mt-3">
                                Don't have account? <a href="{{ route('register') }}">Sign Up</a>
                            </div>
                            </div>
                            <div class="col-md-3 new-customer">
                            
                            </div>
                    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection