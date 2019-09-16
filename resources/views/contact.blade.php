@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'contact', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST">
        @csrf

        <div class="card card-login card-hidden mb-3" style="background: rgba(250, 250, 250, 0.8);">
          <div class="card-header text-center">
            <h4 class="card-title"><strong>{{ __('CONTACT US') }}</strong></h4>
          </div>
          <div class="card-body">
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>email:
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
@endsection
