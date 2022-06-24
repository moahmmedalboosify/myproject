<meta charset="utf-8">
  {{-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> --}}

  {{-- <title>EstateAgency Bootstrap Template - Index</title> --}}
  <meta content="" name="description">
  <meta content="" name="keywords">
  <title> @yield("title") </title>
  <link rel="icon" href="{{URL::asset('officepanal/assets/img/brand/favicon.png')}}" type="image/x-icon"/>
  <!-- Icons css -->
  <link href="{{URL::asset('officepanal/assets/css/icons.css')}}" rel="stylesheet">
 
  <!-- Favicons -->
  {{-- <link href="client/assets/img/favicon.png" rel="icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('client/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{asset('client/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="  {{asset('client/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href=" {{asset('client/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{asset('client/assets/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"
  href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
  {{-- <link href="client/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

<!-- Map APi css !-->
<link href='https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css' rel='stylesheet' />

 <style>

    #map {
       height: 180px;
       }

    .dropdown-menu{
      text-align: right; 

    }

    .modal-dialog {
      display: flex;
      align-items: center;
      min-height: calc(100% - 0rem);
    }

</style> 