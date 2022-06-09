@extends('layouts.master')
@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />



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
    عرض الطلبات الخاصة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الطلبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    عرض الطلبات الخاصة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')


<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-4 col-md-5">
                 
                    
                </div>
            </div>
            <div class="card-body">
                <div id="table_data">
                    @include('office.requests.private_request_pagination')
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

   

   
 {{-- refresh page without relod --}}

    <script>
  
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });


        function fetch_data(page) {
            $.ajax({
                url: "/offers/display?page=" + page,
                success: function(data) {
                    console.log(data);
                    $('#table_data').html(data);
                }
            });
        }
    </script>


     show_email_modal show_email_btn id
 {{-- request evants  --}}

    <script>
    
       $(document).on('click', '#send_email_btn', function(e) {

            e.preventDefault();

            $('#send_email_modal').modal('show');
           

       });

       $(document).on('click', '.send_email_client', function(e) {

            e.preventDefault();

            $('.send_email_client').text('إرسال...');
            var data ={
                'id' : $('#send_email_btn').data('id'),
                'email' : $('#send_email_btn').data('email'),
                'name' : $('#send_email_btn').data('name'),
                'message' : $('#message_to_email').val()
            }
            console.log(data);
            $.ajax({
                url: "{{route('office.chang_state_request.requests')}}",
                data:data,
                success: function(res) {
                    $('#send_email_modal').modal('hide');

                     if(res.state == 200){
                     $('.send_email_client').text('إرسال');

                        fetch_data();
                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: res.message,
                                showConfirmButton: false,
                                timer: 2500
                            });
                            
                     }else{
                        Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: res.message,
                                showConfirmButton: false,
                                timer: 2500
                            });
                     }


                }
            });


        });




       $(document).on('click', '.close_send_email_client', function(e) {

            e.preventDefault();

            $('#send_email_modal').modal('hide');


        });


       $(document).on('click', '#solid_offer_btn', function(e) {
             const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        cancelButton: 'btn btn-danger mg-l-5',
                        confirmButton: 'btn btn-success',
                    },
                    buttonsStyling: false
                    })
                    swalWithBootstrapButtons.fire({
                            title: 'هل أنت متأكد من تغيير حالة العقار ؟ ',
                            text: "في حالة الموافقة سيتم تغييرالحالة من قيد النشر الي تم البيع ...",
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonText: 'تغيير',
                            cancelButtonText: 'رجوع',
                            reverseButtons: false
                        }).then((result) => {
                        if (result.isConfirmed) {
                            var id = $('#solid_offer_btn').data('id')
                            var url = '{{ route('office.solid_offer_ajax.offer',':id') }}';
                            url = url.replace(':id', id);
                              $.ajax({
                                type: "GET",
                                url: url,
                              
                                success: function(res) {
                                    if(res.state == 200){
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: 'تم تغيير الحالة بنجاح.',
                                            showConfirmButton: false,
                                            timer: 3000
                                        });
                                    }
                                }
                              });
                        }

                });


       });

        function fetch_data(page) {
            $.ajax({
                url: "/fetch/private?page=" + page,
                success: function(data) {
                    console.log(data);
                    $('#table_data').html(data);
                }
            });
        }

          

        $(document).on('click', '#show_email_btn', function(e) {

            e.preventDefault();


            var id = $('#show_email_btn').data('id')
            var url = '{{ route('office.show_email.requests',':id') }}';
            url = url.replace(':id', id);
                $.ajax({
                    type: "GET",
                    url: url,
                    
                    success: function(res) {
                        if(res.state == 200){
                            $('#show_content_email').text(res.message) 
                            $('#show_email_modal').modal('show');

                        }else{
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: res.message,
                                showConfirmButton: false,
                                timer: 2500
                            });
                        }
                    }
                });


        });

        $(document).on('click', '.close_show_email_client', function(e) {

            e.preventDefault();

            $('#show_email_modal').modal('hide');
            $('#show_content_email').text('') 



        });


     


         $(document).on('click', '#delete_private_btn', function(e) {

            e.preventDefault();

            console.log( $('#delete_private_btn').data('id'))


            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        cancelButton: 'btn btn-danger mg-l-5',
                        confirmButton: 'btn btn-success',
                    },
                    buttonsStyling: false
                    })
                    swalWithBootstrapButtons.fire({
                            title: 'هل أنت متأكد من حذف الطلب ؟ ',
                            text: "في حالة الموافقة سيتم  حذف نهائيا !",
                            icon: 'error',
                            showCancelButton: true,
                            confirmButtonText: 'إحذف',
                            cancelButtonText: 'رجوع',
                            reverseButtons: false
                        }).then((result) => {
                        if (result.isConfirmed) {
                            var id = $('#delete_private_btn').data('id')
                            var url = '{{ route('office.delete_email.requests',':id') }}';
                            url = url.replace(':id', id);
                            $.ajax({
                                type: "GET",
                                url: url,
                            
                                success: function(res) {
                                    if(res.state == 400){
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'error',
                                            title: res.message,
                                            showConfirmButton: false,
                                            timer: 2500
                                        });
                                    }else{
                                        fetch_data();
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: res.message,
                                            showConfirmButton: false,
                                            timer: 2500
                                        });
                                    }
                                }
                            });
                        }

                });
        });

       

    
    
    </script>






@endsection
