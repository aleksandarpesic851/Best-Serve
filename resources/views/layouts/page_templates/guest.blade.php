<div class="fullscreen-bg">
  <video autoplay muted loop class="fullscreen-bg__video">
    <source src="{{ asset('material') }}/video/background.mp4" type="video/mp4">
  </video>
</div>
<!-- <video autoplay muted loop id="videoBG">
  <source src="{{ asset('material') }}/video/background.mp4" type="video/mp4">
</video> -->
@include('layouts.navbars.navs.guest')
<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter" filter-color="black" style="background-size: cover; background-position: top center;align-items: center;" data-color="purple">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @yield('content')
  </div>
</div>
@include('layouts.footers.guest')

@push('js')
<script type="text/javascript">
    var min_w = 300;
    var vid_w_orig;
    var vid_h_orig;

    $(function() {

        vid_w_orig = parseInt($('video').attr('width'));
        vid_h_orig = parseInt($('video').attr('height'));

        $(window).resize(function () { fitVideo(); });
        $(window).trigger('resize');

    });

    function fitVideo() {

        $('#video-viewport').width($('.fullsize-video-bg').width());
        $('#video-viewport').height($('.fullsize-video-bg').height());

        var scale_h = $('.fullsize-video-bg').width() / vid_w_orig;
        var scale_v = $('.fullsize-video-bg').height() / vid_h_orig;
        var scale = scale_h > scale_v ? scale_h : scale_v;

        if (scale * vid_w_orig < min_w) {scale = min_w / vid_w_orig;};

        $('video').width(scale * vid_w_orig);
        $('video').height(scale * vid_h_orig);

        $('#video-viewport').scrollLeft(($('video').width() - $('.fullsize-video-bg').width()) / 2);
        $('#video-viewport').scrollTop(($('video').height() - $('.fullsize-video-bg').height()) / 2);

    };
</script>
@endpush