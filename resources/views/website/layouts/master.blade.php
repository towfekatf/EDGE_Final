<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset("storage/uploads/" . $settings["SETTING_SITE_FAVICON"]) }}"/>

    <title>Web : : @yield("title")</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap.css')}}" />





    <link rel="stylesheet" href="{{asset('asset/css/custom.css')}}">
    <!-- font awesome style -->
    <link rel="stylesheet"
          href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css')}}"/>
    @stack("styles")


</head>

<body>

<!-- Main Content -->
<div id="content">
    <!-- Navbar -->
    @include('website.layouts.nav')
    <!-- End of Navbar -->

    <!-- Begin Page Content -->
    @yield("content")
    <!-- /.container-fluid -->

</div>

@include("website.layouts.footer")

<!-- jQery -->
<script src="{{url('js/jquery-3.4.1.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('asset/js/bootstrap.js')}}"></script>
<!-- custom js -->
<script src="{{asset('asset/js/custom.js')}}"></script>

<script src="{{url('https://code.jquery.com/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js')}}"></script>
<script src="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}"></script>
<script>
    function initMap() {
        var mapProp = {
            center: new google.maps.LatLng(51.508742, -0.120850),
            zoom: 5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
</script>
<script src="{{url('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=initMap')}}"></script>


@stack("scripts")





</body>

</html>
