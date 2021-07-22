<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Microgravity Gaming League | Register for free</title>
 <meta property="og:title" content="Microgravity Gaming Leauge | Register for free"> 
    
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Register today at Microgravity gaming league and stand a chance to win prizes worth Rs.1,50,000!">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon.ico">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#355699">
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ url('/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/font-awesome.css') }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="{{ url('assets/js/custom.js') }}?v=3"></script>



    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '886665942181397');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=886665942181397&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->


    <!-- Global site tag (gtag.js) - Google Ads: 399051010 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-399051010"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-399051010');
    </script>

    @yield('scriptk')


</head>
<body>


@include('layout.nav')


@yield('content')


@include('layout.footer')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ url('/js/slick.js') }}" type="text/javascript"></script>
<script src="{{ url('/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/js/main.js') }}"></script>
<script type="text/javascript">
    $(".rock").slick({
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


</script>
<script>
    $(document).ready(function() {
        $("#carouselExampleIndicators").swiperight(function() {
            $(this).carousel('prev');
        });
        $("#carouselExampleIndicators").swipeleft(function() {
            $(this).carousel('next');
        });
    });
</script>
<script type="text/javascript">
    $(".speak").slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


</script>

@yield('script')


</body>
</html>
