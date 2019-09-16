@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Material Dashboard')])

@section('content')
<div class="container">
  <div class="row justify-content-center" style="margin-top: 10%; text-align: center">
      <div class="col-12">
        <span class="welcome-text-small welcome-text">{{ __('WELCOME TO ') }}</span>
        <span class="welcome-text">{{ __('CHECK MY CLIENT') }}</span>
      </div>
  </div>
</div>
@endsection
