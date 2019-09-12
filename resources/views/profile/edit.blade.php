@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form enctype="multipart/form-data" method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 col-md-4">
                    <div class="row " style=" min-height: 100%; align-items: center;">
                      <img class="avatar-image" id="avatar_image" src="/uploads/avatars/{{ old('avatar', auth()->user()->avatar) }}">
                    </div>
                    <input id="avatar" type="file" name="avatar" style="display: none" onchange="updateAvatarImage(this)">
                  </div>

                  <div class="col-12 col-md-8">
                    <div class="row">
                      <label class="col-4 col-md-2 col-form-label">{{ __('Name') }}</label>
                      <div class="col-8 col-md-7">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                          @if ($errors->has('name'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-4 col-md-2 col-form-label">{{ __('ID') }}</label>
                      <div class="col-8 col-md-7">
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __('ID') }}" value="{{ old('email', auth()->user()->email) }}" required />
                          @if ($errors->has('email'))
                            <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-4 col-md-2 col-form-label">{{ __('Company') }}</label>
                      <div class="col-8 col-md-7">
                        <div class="form-group{{ $errors->has('company') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" id="input-company" type="text" placeholder="{{ __('Company') }}" value="{{ old('company', auth()->user()->company) }}" required />
                          @if ($errors->has('company'))
                            <span id="company-error" class="error text-danger" for="input-company">{{ $errors->first('company') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-4 col-md-2 col-form-label">{{ __('Contact') }}</label>
                      <div class="col-8 col-md-7">
                        <div class="form-group{{ $errors->has('contact') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" id="input-contact" type="contact" placeholder="{{ __('Contact') }}" value="{{ old('contact', auth()->user()->contact) }}" />
                          @if ($errors->has('contact'))
                            <span id="contact-error" class="error text-danger" for="input-contact">{{ $errors->first('contact') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      @if(auth()->user()->isAdmin())
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Change password') }}</h4>
              </div>
              <div class="card-body ">
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-4 col-md-2 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
                  <div class="col-8 col-md-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-4 col-md-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-8 col-md-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-4 col-md-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-8 col-md-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      @endif
    </div>
  </div>
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function() {
      $('#avatar_image').click(function() {
        $('#avatar').click();
      });
    });

    function createObjectURL(object) {
      return (window.URL) ? window.URL.createObjectURL(object) : window.webkitURL.createObjectURL(object);
    }

    function updateAvatarImage(input) {
      const avatarImage = document.getElementById('avatar_image');
      const file = input.files[0];
      avatarImage.src = createObjectURL(file);
      avatarImage.onload = function() {
            window.URL.revokeObjectURL(this.src);
        }

    }
</script>
@endpush