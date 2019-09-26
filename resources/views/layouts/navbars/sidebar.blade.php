<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="/" class="simple-text logo-normal">
      <div style="text-align: center; width: 100%">
        <img src="{{ asset('material') }}/img/logo.png" width="100px" height="100px">
      </div>
      <div style="text-align: center; width: 100%">
        {{ __('messages.title') }}
      </div>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav logo" style="padding: 0">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <div style="text-align: center">
            <img class="avatar-account" src="/uploads/avatars/{{ old('avatar', auth()->user()->avatar) }}">
            <strong style="color: rgb(122, 140, 180); font-size: 20px">&nbsp&nbsp{{ old('company', auth()->user()->company) }}</strong>
          </div>
        </a>
    </ul>
    
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('messages.dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="material-icons">person</i>
            <p>{{ __('messages.your_profile') }}</p>
        </a>
      </li>
      @if(auth()->user()->isAdmin())
      <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">people</i>
            <p>{{ __('messages.user_management') }}</p>
        </a>
      </li>
      @endif
      <li class="nav-item{{ $activePage == 'blacklist' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('blacklist.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('messages.black_lists') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'blacklist-create' ? ' active' : '' }}">
        <a class="nav-link" href="/blacklist/create">
          <i class="material-icons">edit</i>
            <p>{{ __('messages.add_report') }}</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#email-dialog">
          <i class="material-icons">contacts</i>
            <p>{{ __('messages.support') }}</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="material-icons">fingerprint</i>
            <p>{{ __('messages.logout') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>

<div class="modal fade" id="email-dialog" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="add-modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>{{ __('messages.contact_us') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="material-icons">email</i>{{ __('messages.email')}}:
            </span>
          </div>
          <span class="form-control" style="background: none"><h4>admin@checkmyclient.net</h4></span>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>