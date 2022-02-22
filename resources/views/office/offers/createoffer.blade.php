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
 @endsection
 @section('title')
     اضافة فاتورة
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

     @if (session()->has('Add'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>{{ session()->get('Add') }}</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
     @endif

     <!-- row -->
     <div class="row">

         <div class="col-lg-12 col-md-12">
             <div class="card">
                 <div class="card-body">
                     <form action=" " method="post" enctype="multipart/form-data" autocomplete="off">
                         {{ csrf_field() }}
                         {{-- 1 --}}


                         <div class="col-12">
                             <h2 class="content-title mb-0 my-auto"> معلومات الزبون /</h2> <br>
                             <hr> <br>
                         </div>




                         <div class="row">

                             <div class="col"> <label for="inputName" class="control-label"> أسم الزبون</label>
                                 <input type="text" class="form-control" id="inputName" name="name_owner"
                                     title="يرجي ادخال أسم الزبون" required>
                             </div>


                             <div class="col"> <label for="inputName" class="control-label"> رقم الزبون</label>
                                 <input type="text" class="form-control" id="inputName" name="phone_owner"
                                     title="يرجي ادخال رقم الزبون" required> <br>
                             </div>


                         </div>

                         <br>   <br>   <br>   
                         <div class="mg-t-15 d-flex justify-content-center text-right">

                             <button type="submit"
                                 class="col-sm-6 col-md-3 mg-t-5  btn btn-outline-primary btn-rounded btn-block next">التالي</button>
                             <button
                             type="submit"
                                 class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0 btn btn-outline-secondary btn-rounded btn-block next">الرجوع</button>
                         </div>



                 </div>


                 </form>
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

     <script>
         var date = $('.fc-datepicker').datepicker({
             dateFormat: 'yy-mm-dd'
         }).val();
     </script>

     <script>
         $(document).ready(function() {
             $('select[name="Section"]').on('change', function() {
                 var SectionId = $(this).val();
                 if (SectionId) {
                     $.ajax({
                         url: "{{ URL::to('section') }}/" + SectionId,
                         type: "GET",
                         dataType: "json",
                         success: function(data) {
                             $('select[name="product"]').empty();
                             $.each(data, function(key, value) {
                                 $('select[name="product"]').append('<option value="' +
                                     value + '">' + value + '</option>');
                             });
                         },
                     });
                 } else {
                     console.log('AJAX load did not work');
                 }
             });
         });
     </script>


     <script>
         function myFunction() {
             var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
             var Discount = parseFloat(document.getElementById("Discount").value);
             var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
             var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);
             var Amount_Commission2 = Amount_Commission - Discount;
             if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {
                 alert('يرجي ادخال مبلغ العمولة ');
             } else {
                 var intResults = Amount_Commission2 * Rate_VAT / 100;
                 var intResults2 = parseFloat(intResults + Amount_Commission2);
                 sumq = parseFloat(intResults).toFixed(2);
                 sumt = parseFloat(intResults2).toFixed(2);
                 document.getElementById("Value_VAT").value = sumq;
                 document.getElementById("Total").value = sumt;
             }
         }
     </script>


 @endsection
