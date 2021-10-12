@extends('layouts.app_frontend', ['title' => 'Login'])

@section('plugins_css')
  <link rel="stylesheet" href="{{asset('')}}dist/modules/bootstrap-social/bootstrap-social.css">
@stop

@section('content')
<style>
#logo{
display: none;
}
</style>
    <section class="section">
      <div class="container mt-5" style="margin-top:0 !important">
        <div class="row">

          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4" style="margin: auto">
                <div style="text-align:center"><a href="{{url('')}}" ><img src="{{url('')}}/media/wttsy-logo.png" style="max-width:100px" /></a></div>
            <div class="card card-primary">
              <div class="card-header"><h4>{{ __('installer_messages.login') }}</h4></div>
              <div class="card-body">
                <form method="POST" action="{{route('login')}}">
                  @csrf
                  <div class="form-group">
                    <label for="email" style="float: right">{{ __('installer_messages.email') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" tabindex="1" required autofocus>
                    @if ($errors->has('email'))

                        <span class="invalid-feedback" role="alert">

                          {{ $errors->first('email') }}

                        </span>

                    @endif

                  </div>



                  <div class="form-group">

                    <div class="d-block">

                      <label for="password" class="control-label" style="float: right">{{ __('installer_messages.password') }}</label>

                      <div class="float-left">

                        <a href="{{ route('password.request') }}" class="text-small">

                          {{ __('installer_messages.forgot password ?') }}

                        </a>

                      </div>

                    </div>

                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" tabindex="2" required>

                    @if ($errors->has('password'))

                        <span class="invalid-feedback" role="alert">

                          {{ $errors->first('password') }}

                        </span>

                    @endif

                  </div>



                  <div class="form-group">

                    <div class="custom-control custom-checkbox">

                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>

                      <label class="custom-control-label" for="remember-me" style="float: right">{{ __('installer_messages.remember me') }}</label>

                    </div>

                  </div>



                  <div class="form-group">

                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">

                      {{ __('installer_messages.login') }}

                    </button>

                  </div>

                </form>

                @if(setting('features.login_with_facebook') || setting('features.login_with_google'))

                <div class="text-center mt-4 mb-3">

                  <div class="text-job text-muted">{{ __('installer_messages.login with social') }}</div>

                </div>

                @endif

                <div class="row sm-gutters">

                  @if(setting('features.login_with_facebook'))

                  <div class="col-6">

                    <a class="btn btn-block btn-social btn-facebook" href="{{ route('loginwith', 'facebook') }}">

                      <span class="fab fa-facebook"></span> {{ __('installer_messages.facebook') }}

                    </a>

                  </div>

                  @endif

                  @if(setting('features.login_with_google'))

                  <div class="col-6">

                    <a class="btn btn-block btn-social btn-google" href="{{ route('loginwith', 'google') }}">

                      <span class="fab fa-google"></span> {{ __('installer_messages.google') }}

                    </a>                                

                  </div>

                  @endif

                </div>



              </div>

            </div>

            @if(setting('features.open_register'))

            <div class="mt-5 text-muted text-center">

              {{ __('installer_messages.dont have an account ?') }} <a href="{{route('register')}}">{{ __('installer_messages.create one') }}</a>

            </div>

            @endif

          </div>

        </div>

      </div>

    </section>

@stop
