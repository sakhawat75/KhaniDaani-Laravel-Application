@extends('layouts.master')

@section('content')
  <body class="login-page">
    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumb">
              <ul>
                <li>
                  <a href="index.html">Home</a>
                </li>
                <li class="active">
                  <a href="#">Login</a>
                </li>
              </ul>
            </div>
            <h1 class="page-title">Login</h1>
          </div>
          <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
      </div>
      <!-- end /.container -->
    </section>
    <!--================================
        END BREADCRUMB AREA
    =================================-->

    <!--================================
            START LOGIN AREA
    =================================-->
    <section class="login_area section--padding2">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="cardify login">
                <div class="login--header">
                  <h3>Welcome Back</h3>
                  <p>You can sign in with your email adress</p>
                </div>
                <!-- end .login_header -->

                <div class="login--form">
                  <div class="form-group">
                    <label for="user_name">Email Adress</label>
                    <input id="email" type="email" class="text_field{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email...">

                    @if ($errors->has('email'))
                      <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="pass">Password</label>
                    <input id="password" type="password"
                           class="text_field{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           required placeholder="Enter your password...">

                    @if ($errors->has('password'))
                      <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <div class="custom_checkbox">
                      <input type="checkbox" id="ch2"
                             name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('') }}
                      <label for="ch2">
                        <span class="shadow_checkbox"></span>
                        <span class="label_text">Remember me</span>
                      </label>
                    </div>
                  </div>

                  <button class="btn btn--md btn--round" type="submit">{{ __('Login') }}</button>

                  <div class="login_assist">
                    <p class="recover">Lost your
                      <a href="{{ route('recover-pass') }}">username</a>
                      or
                      <a href="pass-recovery.html">password</a>
                      ?
                    </p>
                    <p class="signup">Don't have an
                      <a href="{{ route('register') }}">account</a>
                      ?
                    </p>
                  </div>
                </div>
                <!-- end .login--form -->
              </div>
              <!-- end .cardify -->
            </form>
          </div>
          <!-- end .col-md-6 -->
        </div>
        <!-- end .row -->
      </div>
      <!-- end .container -->
    </section>
    <!--================================
            END LOGIN AREA
    =================================-->
@endsection
