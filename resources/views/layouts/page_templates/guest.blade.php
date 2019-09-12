<video autoplay muted loop style="position: fixed;  right: 0;  bottom: 0;  min-width: 100%;  min-height: 100%;">
  <source src="{{ asset('material') }}/video/background.mp4" type="video/mp4">
</video>
@include('layouts.navbars.navs.guest')
<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter" filter-color="black" style="background-size: cover; background-position: top center;align-items: center;" data-color="purple">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @yield('content')
  </div>
</div>
