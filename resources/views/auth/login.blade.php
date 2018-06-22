@extends('layouts.login')

<!-- 

                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>
                                <br><br>
                                <div class="email-input">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div><br>

                            <div id="password-block" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>
                                <a id="forgot-password" class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                <br><br>

                                <div class="password-input">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn sign-in">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form> -->


@section('content')

<section style='height: 100%;background-image: url("/football_background.jpg");background-size: cover;' class="login-block background-image">
    <div class="container" style="background-color: #f0ecea73    ;">
    <div class="row">
        <div class="col-md-4 login-sec">
            <h1 class="text-center" style="font-family: Segeo UI;color: #1e41a787" > Enasiz </h1>
            <h2 class="text-center">Login Admin/Clerk</h2>
            <form class="login-form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>
                                <br><br>
                                <div class="email-input">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div><br>
  <div id="password-block" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>
                                <a id="forgot-password" class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                <br><br>

                                <div class="password-input">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
  
  
    <div class="form-check">
   
    <button type="submit" class="btn btn-login float-right">LOG IN</button>
<br> <br>
        <a href="/register"><button type="button" class="btn btn-register float-right">Register</button></a>
  </div>
  
</form>

        </div>
        <div class="col-md-8 banner-sec">
            
            
        </div>
    </div>
</div>
</section>
@endsection