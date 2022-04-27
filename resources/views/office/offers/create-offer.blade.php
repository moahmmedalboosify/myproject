@extends('layouts.master')
@section('css')


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            width: 100%;
            height: 100vh;
        }

        .coordinate {
            position: absolute;
            bottom: 10px;
            right: 50%;
        }

        .leaflet-popup-content-wrapper {
            background-color: #000000;
            color: #fff;
            border: 1px solid red;
            border-radius: 0px;
        }

        .col-centered{
       
        float: none;
        margin: 0 ;

        }

    </style>





    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('officepanal/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('officepanal/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet"
        type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('officepanal/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('officepanal/assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('officepanal/assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">

    <!-- style css !-->
    <link rel="stylesheet" href="{{ URL::asset('officepanal/assets/css-rtl/substyle.css') }}">

    @livewireStyles



@endsection
@section('title')
    أضافة عقار
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">العقارات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    أضافة عقار</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')

    @livewire('office.offers.create-offer')
    <!-- row -->

    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection



@section('js')

    @livewireScripts


    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('officepanal/assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('officepanal/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('officepanal/assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('officepanal/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('officepanal/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('officepanal/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('officepanal/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('officepanal/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('officepanal/assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('officepanal/assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('officepanal/assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('officepanal/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('officepanal/assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('officepanal/assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('officepanal/assets/js/form-elements.js') }}"></script>


    <!-- leaflet js  -->
    {{-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="./data/point.js"></script>
    <script src="./data/line.js"></script>
    <script src="./data/polygon.js"></script> --}}


    {{-- <script>
        // Map initialization 

        var lat = 32.877280526855394;

        var lng = 13.1781005859375;

        var map = L.map('map').setView([32.877280526855394, 13.1781005859375], 14);



        /*==============================================
                    TILE LAYER and WMS
        ================================================*/
        //osm layer
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        osm.addTo(map);
        // map.addLayer(osm)



        // google street 
        googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        // googleStreets.addTo(map);

        //google satellite
        googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        // googleSat.addTo(map)

        var wms = L.tileLayer.wms("http://localhost:8080/geoserver/wms", {
            layers: 'geoapp:admin',
            format: 'image/png',
            transparent: true,
            attribution: "wms test"
        });



        /*==============================================
                            MARKER
        ================================================*/
        //32.877280526855394   13.1781005859375   


        // function marker(lat, lng) {
        //     var myIcon = L.icon({
        //         iconUrl: "{{ URL::asset('/officepanal/image/maps/t.png') }}",
        //         iconSize: [50, 50],
        //     });
        //     var singleMarker = L.marker([
        //         lat, lng
        //     ], {
        //         icon: myIcon,
        //         draggable: true
        //     });
        //     var popup = singleMarker.bindPopup('This is the Nepal. ' + singleMarker.getLatLng()).openPopup()
        //     popup.addTo(map);



        //     console.log(singleMarker.getLatLng() + now());
        // }

        // marker(lat, lng);

       	// initialize the map on the "map" div with a given center and zoom
		
		// var marker = new Drift_Marker([lat, lng], {
	 	//         draggable: true,
	 	//         title: "Resource location",
	 	//         alt: "Resource Location",
	 	//         riseOnHover: true
	 	//     }).addTo(map)
	 	//         .bindPopup("test").openPopup();

                 var myIcon = L.icon({
                iconUrl: "{{ URL::asset('/officepanal/image/maps/t.png') }}",
                iconSize: [50, 50],
            });
            var singleMarker = L.Drift_Marker([
                lat, lng
            ], {
                icon: myIcon,
                draggable: true
            });
            var popup = singleMarker.bindPopup('This is the Nepal. ' + singleMarker.getLatLng()).openPopup()
            popup.addTo(map);
		
	 	// Script for adding marker on map click
	 	function onMapClick(e) {
            singleMarker.slideTo(	e.latlng, {
                duration: 2000
              });
	 	}
	 	map.on('click', onMapClick);
         singleMarker.slideTo(	[20, 20], {
      duration: 2000
    }); --}}



{{-- 
    </script> --}}


@endsection
