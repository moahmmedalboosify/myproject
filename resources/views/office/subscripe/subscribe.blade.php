@extends('layouts.master3')
@section('css')

<style>

.disabledbutton {
    pointer-events: none;
    opacity: 0.4;
}
.modal {
    text-align: center;
  }
  .modal-dialog {
    display: flex;
    align-items: center;
    min-height: calc(100% - 0rem);
   }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />


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
   تجديد الإشتراك 
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الأشتراك</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    عرض  حالة الأشتراك</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')

<div class="row">
    <div class="col-xs-6 col-sm-6 col-lg-6 col-xl-6">
        <div class="panel price panel-color">
            <div class="panel-heading bg-primary p-0 text-center">
                <h3>الباقة الأفتراضية</h3>
                <input type="hidden" id="id_office" value={{$id}}>
            </div>
            <div class="panel-body text-center">  
                <p class="lead"><strong>$200 /</strong>  شهري</p>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item"> إدارة العقارات</li>
                <li class="list-group-item">إضافة عدد 10 عروض</li>
                <li class="list-group-item"> إدارة الطلبات</li>
                <li class="list-group-item"> تقارير </li>

                <li class="list-group-item"> إدارة المستخدمين</li>
                <li class="list-group-item border-bottom-0"><strong> 24/7</strong> دعم فني</li>
            </ul>
            <div class="panel-footer text-center">
                <button class="btn btn-primary" id="subscribe_btn" value="defult">تفعيل!</button>
            </div>
        </div>
    </div><!-- COL-END -->
    <div class="col-xs-6 col-sm-6 col-lg-6 col-xl-6">
        <div class="disabledbutton panel price panel-color">
            <div class="panel-heading bg-warning  p-0 text-center">
                <h3>الباقة الذهبية</h3>
            </div>
            <div class="panel-body text-center">
                <p class="lead"><strong>$350 /</strong> شهري</p>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item">إدارة العقارات</li>
                <li class="list-group-item">إضافة عدد  غير محدود </li>
                <li class="list-group-item"> إدارة الطلبات</li>
                <li class="list-group-item"> تقارير كاملة </li>
                <li class="list-group-item">إدارة المستخدمين</li>
                <li class="list-group-item">   إضافة عدد غير محدد من الصور </li>
                <li class="list-group-item">   إضافة عدد غير محدد من المستخدمين </li>
                <li class="list-group-item border-bottom-0"><strong> 24/7</strong> دعم الفني</li>
            </ul>
            <div class="panel-footer text-center">
                <button class="btn btn-warning"   id="subscribe_btn"  value="">تفعيل</button>
            </div>
        </div>
    </div><!-- COL-END -->
   
</div>


<div class="modal" id="subscribe_modal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content tx-size-md">
        
         
            <div class="modal-body">
               

                
              <input type="number" id="number_code"  size="10" required placeholder="أدخل كود التفعيل " title="أدخل كود التفعيل الذي وصل إلي بريدك الألكتروني" style="width: 100%" class="form-control" name="verifyCode" required>
              <span id="error_code" class="text-right text-danger"> </span><br>
            
              <input type="submit" class="btn btn-primary btn-md mg-t-5 " id="send_code" value="أدخل الكود"> 


              
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


    <!--Internal Counters -->
<script src="{{URL::asset('officepanal/assets/plugins/counters/waypoints.min.js')}}"></script>
<script src="{{URL::asset('officepanal/assets/plugins/counters/counterup.min.js')}}"></script>
<!--Internal Time Counter -->
<script src="{{URL::asset('officepanal/assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
<script src="{{URL::asset('officepanal/assets/plugins/counters/counter.js')}}"></script>

   



<script>


$(document).on('click', '#subscribe_btn', function(e) {

    $('#error_code').text('')

    
    type =$(this).val() ;

     $('#subscribe_modal').modal('show');

   




}); 

$(document).on('click', '#send_code', function(e) {
    

   // var id ={{$id}} ;

    var data ={
                'code' : $('#number_code').val(),
                'id' : $('#id_office').val()
            }
    var url = '{{route('office.check_code_subscripe')}}'
         console.log(data)

         console.log(url)

        $.ajax({
                type: "GET",
                url: url, 
                data: data, 
                success: function(res) {
                     if(res.state == 400){
                         $('#error_code').text(res.message)
                     }else{
                        var url = '{{ route('office.show.login') }}';
                        location.href = url; 
                     }
                }
            });

});

</script>




@endsection
