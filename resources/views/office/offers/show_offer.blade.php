@extends('layouts.master')
@section('css')
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
                                    <li><a href="#tab4" class="nav-link " data-toggle="tab">مرفقات العقار</a></li>
                                    
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

   
     {{--   client info        --}}
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
                    'id' :  $('#edit_client_btn').data('value'),
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
                    'id' :  $('#edit_client_btn').data('value'),
                
                } 

                    $.ajax({
                        url: "/client/ajax?page=" + page,
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

      {{--   offer info        --}}

  
   <script>

    $(document).ready(function() {
        $(document).on('click', '#edit_offer_info_btn', function(e) {

            e.preventDefault();

            $('#state option[value='+$('#edit_offer_info_btn').data('state')+']').attr("selected", "selected");


          $('#number_offer').val( $('#edit_offer_info_btn').data('number_offer') )
          $('#type_offer').val( $('#edit_offer_info_btn').data('type_offer') )
          $('#state_offer').val( $('#edit_offer_info_btn').data('state_offer') )
          $('#views').val( $('#edit_offer_info_btn').data('views') )
          $('#user').val( $('#edit_offer_info_btn').data('user') )
       
            
          $('#edit_offer_info').modal('show');


        }); 
     
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

    
    });
  
   </script>



@endsection
