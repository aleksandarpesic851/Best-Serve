@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" id="welcome_div">
  <div class="row justify-content-center" style="margin-top: 10%; text-align: center">
      <div class="col-12">
        <span class="welcome-text-small welcome-text">{{ __('messages.welcome') }}</span>
        <span class="welcome-text">{{ __('messages.title') }}</span>
      </div>
  </div>
</div>

<div class="container" style="height: auto; display: none" id="contact_us_div">
  <div class="row align-items-center">
    <div class="ml-auto mr-auto">
      <form class="form" method="POST">
        @csrf

        <div class="card card-login card-hidden mb-3" style="background: rgba(250, 250, 250, 0.8);">
          <div class="card-header text-center">
            <h4 class="card-title"><strong>{{ __('messages.contact_us') }}</strong></h4>
          </div>
          <div class="card-body">
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>{{ __('messages.email')}}:
                  </span>
                </div>
                <span class="form-control"><h4>admin@checkmyclient.net</h4></span>
              </div>
            </div>
          </div>
          <div class="card-footer justify-content-center">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container" style="height: auto; display: none" id="login_div">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card card-login card-hidden mb-3" style="background: rgba(250, 250, 250, 0.8);">
          <div class="card-header text-center">
            <h4 class="card-title"><strong>{{ __('messages.login') }}</strong></h4>
          </div>
          <div class="card-body">
            <p class="card-description text-center">{{ __('messages.login_detail')}}</p>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="text" name="email" class="form-control" placeholder="{{ __('messages.id') }}" value="{{ old('email', '') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('messages.password') }}" value="{{ !$errors->has('password') ? "" : "" }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.remember_me') }}
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('messages.login') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
  function showLogin() {
    $('#contact_us_div').hide();
    $('#welcome_div').hide();
    $('#login_div').show();
    $('#menu_contact_us').removeClass('active');
    if ($('#menu_login').length > 0) {
      $('#menu_login').removeClass('active');
      $('#menu_login').addClass('active');
    }
  }

  function showContactUs() {
    $('#contact_us_div').show();
    $('#welcome_div').hide();
    $('#login_div').hide();
    $('#menu_contact_us').removeClass('active');
    $('#menu_contact_us').addClass('active');
    if ($('#menu_login').length > 0) {
      $('#menu_login').removeClass('active');
    }
  }

  function showWelcome() {
    $('#contact_us_div').hide();
    $('#welcome_div').show();
    $('#login_div').hide();
    $('#menu_contact_us').removeClass('active');
    if ($('#menu_login').length > 0) {
      $('#menu_login').removeClass('active');
    }
  }

  function gotoHome() {
    if ($('#menu_login').length > 0) {
      showLogin();
    } else {
      document.location.href = "/home";
    }
  }
</script>
@endpush

