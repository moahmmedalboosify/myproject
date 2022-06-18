@extends('layouts.master')

@section('css')

<link href="{{URL::asset('officepanal/assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<link href="{{URL::asset('officepanal/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">

<link href="{{URL::asset('officepanal/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('officepanal/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
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
@endsection
@section('title')
    عرض عقار
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">العقارات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    عرض عقار</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')


<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            {{-- <div class="card-header pb-0">
                <div class="col-sm-4 col-md-5">
                 
                        <a href="" class="btn btn-success btn-md ">إضافة عرض</a>
                    
                </div>
            </div> --}}


            <div class="card-body">
                <div class="example">
                    <div class="panel panel-primary tabs-style-2">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab1" class="nav-link active" data-toggle="tab">معلومات الزبون</a></li>
                                    <li><a href="#tab2" class="nav-link " data-toggle="tab">معلومات العقار</a></li>
                                    <li><a href="#tab3" class="nav-link " data-toggle="tab">تفاصيل العقار</a></li>
                                    <li><a href="#tab4" class="nav-link " data-toggle="tab">عنوان العقار</a></li>
                                    <li><a href="#tab5" class="nav-link " data-toggle="tab">مرفقات العقار</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content">
                
                                @include('office.offers.tabs')
                              

                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>


      
            
          
        </div>
    </div>

</div>


    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="{{URL::asset('officepanal/assets/plugins/multislider/multislider.js')}}"></script>
<script src="{{URL::asset('officepanal/assets/js/carousel.js')}}"></script>

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
   
    <script src="{{ URL::asset('officepanal/assets/js/step.one.offer.js') }}"></script>

   
     {{--   Modal  client info        --}}
   <script>
        $(document).ready(function() {

            $(document).on('click', '#edit_client_btn', function(e) {

             e.preventDefault();

                $('#name_client').val($('#edit_client_btn').data('name'))
                $('#phone_client').val($('#edit_client_btn').data('phone'))
                $('#edit_client_info').modal('show');

            
            });

            $(document).on('click', '.edit_client_save', function(e) {

                e.preventDefault();

                $('.edit_client_save').text('تحديث');
            

                data = {
                    'id_client' :  $('#edit_client_btn').data('id_client'),
                    'name' :  $('#name_client').val(),
                    'phone':  $('#phone_client').val()
                } 


                var url = '{{ route('office.edit_client_ajax.offer') }}';
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(res) {
                        if(res.state == 400){
                                console.log(res.message) ;

                        
                        }else{

                            fetch_data_client_info();


                            $('#edit_client_info').modal('hide');

                        }
                    }
                });
            });


            function fetch_data_client_info(page) {
                data = {
                    'id' :  $('#edit_client_btn').data('id'),
                } 

                    $.ajax({
                        url: "/client/ajax?page=" + 1,
                        data: data,
                        success: function(data) {
                            $('#table_client_info').html(data);
                        }
                    });
                }

                $(document).on('click', '.close_edit_client_info', function(e) {
                // e.preventDefault();

                $('#name_client').val('')
                $('#phone_client').val('')
                $('#edit_client_info').modal('hide');

            });

        });

   </script>




      {{--  Modal offer info        --}}

  
   <script>

    $(document).ready(function() {




        $(document).on('change', '#type_offer', function(e) {

            e.preventDefault();
            selected = $('#edit_offer_info_btn').data('type_offer')
            console.log(selected)

            $('#edit_offer_info').modal('hide');

            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        cancelButton: 'btn btn-danger mg-l-5',
                        confirmButton: 'btn btn-success',
                    },
                    buttonsStyling: false
                    })
                    swalWithBootstrapButtons.fire({
                            title: 'هل أنت متأكد من تغيير نوع العقار ؟ ',
                            text: "في حالة الموافقة سيتم  الإنتقال الي إنشاء عرض جديد !",
                            icon: 'error',
                            showCancelButton: true,
                            confirmButtonText: 'نعم',
                            cancelButtonText: 'لا',
                            reverseButtons: false
                        }).then((result) => {
                        if (result.isConfirmed) {
                            var id = $('#edit_offer_info_btn').data('value')
                            var url = '{{ route('office.edit_full_offer_ajax.offer', ':id') }}';
                            url = url.replace(':id', id);
                            location.href = url; 
                        } else{
                            set_data_modal_offer_info()
                        }

                });
        });
        

      

        function set_data_modal_offer_info(){
            $('#state option[value='+$('#edit_offer_info_btn').data('state')+']').attr("selected", "selected");
            $('#type_offer option[value='+$('#edit_offer_info_btn').data('type_offer')+']').attr("selected", "selected");



          $('#number_offer').val( $('#edit_offer_info_btn').data('number_offer') )
          $('#state_offer').val( $('#edit_offer_info_btn').data('state_offer') )
          $('#views').val( $('#edit_offer_info_btn').data('views') )
          $('#user').val( $('#edit_offer_info_btn').data('user') )
       
            
          $('#edit_offer_info').modal('show');
        }


        $(document).on('click', '#edit_offer_info_btn', function(e) {

            e.preventDefault();

            set_data_modal_offer_info()


        }); 

        

    //   for change value  then worring ask ? true then  send to page create new offer  else  continue for edit more fields

       
    
        $(document).on('click', '.close_edit_offer_info', function(e) {
        
              
          $('#number_offer').val('')
          $('#type_offer').val('')
          $('#state_offer').val('')
          $('#views').val('')
          $('#user').val('')
       
            
          $('#edit_offer_info').modal('hide');


        });

        $(document).on('click', '.edit_offer_info_save', function(e) {

            e.preventDefault();

            $('.edit_client_save').text('...تحديث');

       
       
            data = {
                'id' :  $('#edit_offer_info_btn').data('value'),
                'state' : $( "#state option:selected" ).val(),
                'state_offer': $( "#state_offer option:selected" ).val()
            } 

            console.log(data)

            var url = '{{ route('office.edit_offer_info_ajax.offer') }}';
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(res) {
                    if(res.state == 400){
                console.log(res.message) ;

                    
                    }else{
                    location.reload();
                    }
                }
            });
        });
        
        $(document).on('click', '#details_offer_btn', function(e) {

            e.preventDefault();

            $('#details_offer_modal').modal('show');


        });


        $(document).on('click', '#address_offer_btn', function(e) {

          e.preventDefault();

          $('#address_offer_modal').modal('show');


        });

        $(document).on('click', '.close_details_offer_modal', function(e) {

            e.preventDefault();

            $('#details_offer_modal').modal('hide');


        }); 
    
    });
  
   </script>

 
<script>
    $(document).ready(function() {

        $(document).on('click', '.close_edit_details_offer_modal', function(e) {

            e.preventDefault();

            $('#edit_details_offer_model').modal('hide');


        }); 


        $(document).on('click', '#edit_details_offer_btn', function(e) {


               data = {
                    'id' :$('#sub_model_id').val(),
                    'model' :$('#type_offer_test').val(),
                } 

                $('#model_test').val($('#type_offer_test').val())
                $('#model_id_test').val($('#sub_model_id').val())

                console.log(  $('#model').val())
                edit_model_show_and_hide($('#type_offer_test').val());
                $('#edit_details_offer_model').modal('show');

                var url = '{{ route('office.edit_offer_details_ajax.offer') }}';
                $.ajax({
                    type: "GET",
                    url: url, 
                    data: data, 
                    success: function(res) {
                        $.each(res.state, function(key,value) {
                            if($('#type_offer_test').val() =='apartment' || $('#type_offer_test').val() =='commercial' ){
                                        if(key =='title' || key =='description' || key =='price'  || key =='area' )       
                                        {
                                            $('#'+key).val(value)

                                        }else{
                                                $('#'+key+'option[value="' +value+ '"]').attr('selected', 'selected');
                                        }
                            }else{

                                if(key =='title' || key =='description' || key =='price'  || key =='area' || key =='area_land')       
                                        {
                                            $('#'+key).val(value)

                                        }else{
                                                $('#'+key+'option[value="' +value+ '"]').attr('selected', 'selected');
                                        }
                            }

                            
                           
                        });
                       
                    }
                });
              
          


        }); 


        $('#details_offer_form').on('submit', function(e) {
            e.preventDefault();
            var form = new FormData(this);

        

            var url = '{{ route('office.save_edit_offer_details_ajax.offer') }}';
               
            $.ajax({
                url: url,
                method: 'POST', 
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                
                success: function(res) {
                    $('#edit_details_offer_model').modal('hide');
                   
                     clearAllinput() ;
                    fetch_data_details_offer();
                }
            });
    

        });


        function fetch_data_details_offer(page) {
                data = {
                    'id' :  $('#id_offer').val(),
                } 

                    $.ajax({
                        url: "/offer/details?page=" + 1,
                        data: data,
                        success: function(data) {
                            console.log(data)
                            $('#table_offer_details').html(data);

                        }
                    });
        }

              
        function clearAllinput(){

            $('#document_type').val('')
        }




        function edit_model_show_and_hide(type) {
            rest_edit_model_show_and_hide();


            switch (type) {

                case 'apartment':

                    $('#text_title_detials').text(' - شقق');
                    $('#wings_div').hide();
                    $('#area_land_div').hide();

                    break;

                case 'houses':

                    $('#text_title_detials').text(' - منازل');
                    $('#wings_div').hide();

                    break;

                case 'villas_palaces':

                    $('#text_title_detials').text(' - فلل-قصور');

                    break;

                case 'lands':
                    $('#text_title_detials').text(' - أراضي');
                    $('#wings_div').hide();
                    $('#area_div').hide();
                    $('#age_div').hide();
                    $('#room_div').hide();
                    $('#bathroom_div').hide();
                    $('#furnished_div').hide();
                    $('#floor_div').hide();


                    break;

                case 'commercial':
                    $('#text_title_detials').text(' - مشاريع تجارية');

                    $('#wings_div').hide();
                    $('#room_div').hide();
                    $('#area_land_div').hide();
                    $('#age_div').hide();
                    $('#bathroom_div').hide();
                    $('#floor_div').hide();
                    $('#furnished_div').hide();

                    break;



            }



        }


        function rest_edit_model_show_and_hide() {

            $('#area_div').show();
            $('#wings_div').show();
            $('#area_land_div').show();
            $('#age_div').show();
            $('#bathroom_div').show();
            $('#room_div').show();
            $('#floor_div').show();
            $('#furnished_div').show();

        }

    });

               
</script>


     {{--   Modal  image info        --}}
 
<script>
    $(document).ready(function() {

        $(document).on('click', '#show_image_btn', function(e) {

            e.preventDefault();
            var el =$(this) ;

            var path = el.data("path")
            var id_offer = el.data("id_offer")
   
            var id = el.data("image_id")
            var url = '{{ asset('/storage/image/office/:path') }}';
            url = url.replace(':path', path);
       
             $('#image_add_src').attr("src",url);
             $('#image_modal_id').val(id);
             $('#offer_modal_id').val(id_offer);
            $('#show_image_modal').modal('show');

        
        });

        $(document).on('click', '.close_image_modal', function(e) {

            e.preventDefault();
            $('#image_add_src').attr("src",'');
            $('#show_image_modal').modal('hide');


        });

        
        $(document).on('click', '.delete_image_modal', function(e) {

            e.preventDefault();
            var offer_id =  $('#offer_modal_id').val();

            $('.delete_image_modal').text('حذف...');

            data = {
                'id' :  $('#image_modal_id').val(),
            } 


            var url = '{{ route('office.delete_offer_image_ajax.offer') }}';
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(res) {

                    if(res.state == 400){
                            console.log(res.message) ;
                    }else{
                        fetch_data_image_offer(offer_id) ;
                        $('#show_image_modal').modal('hide');

                    }
                }
            });


            });

     

   
   
        });

        function fetch_data_image_offer(offer_id) {

                    $.ajax({
                        url: "/refresh/images",
                        data: {'offer_id':offer_id},
                        success: function(data) {
                            $('#table_image_offer').html(data);
                        }
                    });
        }

               
</script>



<script>
    mapboxgl.accessToken =
        'pk.eyJ1IjoibW9oYW1tZWRhbGJvb3NpZnkiLCJhIjoiY2wzMHBpcmgyMXJyZDNibXA2aXM4cWN6MiJ9.zh5hoOMhrgtoAudRTSXAPg';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [$('#address_offer_btn').data('lng'),$('#address_offer_btn').data('lat')], // starting position [lng, lat]
        zoom: 9 // starting zoom
    });
    // make new marker in static location 
    var marker = new mapboxgl.Marker({
            color: "red",
            draggable: true
        }).setLngLat($('#address_offer_btn').data('lng'),$('#address_offer_btn').data('lat'))
        .addTo(map);

    // move marker to new location and save location in var
    // map.on('click', function(e) {
    //     var l = e.lngLat.wrap().lat;
    //     var g = e.lngLat.wrap().lng;
    //     $('#lat').val(l);
    //     $('#lng').val(g);
    //     marker.setLngLat([g, l]).addTo(map);
    // });

 
    // $('#region').on('change', function(e) {
    //     console.log( $('#region option:selected').text() );
    //   $('.mapboxgl-ctrl-geocoder--input').val( $('#region option:selected').text() )
    
    // });


    // add search plugin
    // map.addControl(
    //     new MapboxGeocoder({
    //         accessToken: mapboxgl.accessToken,
    //         mapboxgl: mapboxgl,
    //         marker: false
    //     })
    // );


    // add search plugin

    mapboxgl.setRTLTextPlugin(
        'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js');

    map.addControl(new MapboxLanguage({
        defaultLanguage: 'ar'
    }));
</script>



@endsection
