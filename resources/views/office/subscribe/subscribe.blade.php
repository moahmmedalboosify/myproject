@extends('layouts.master')
@section('css')

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
    عرض الطلبات الخاصة
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
    <div class="col-sm-12 col-md-12">
        <div class="card custom-card">
            <div class="card-body text-center">
                <div>
                    <h6 class="card-title">الوقت المتبقي لصلاحية الأشتراك</h6>
                </div>
                <div class="p-2">
                    <span id="timer-countercallback" class="h3 mb-0 text-primary">أيام</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-sm">


                    <!--Grid column-->
          
                    <!--Grid column-->
            <div class="col-lg-4 mb-4 ">
    
                <!-- Card -->
                <div class="card border border-primary text-center">
    
                <div class="card-header bg-white py-3">
                    <p class="text-uppercase small mb-2"><strong>الأفتراضية</strong></p>
                    <h5 class="mb-0">200دل/شهري</h5>
                </div>
    
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">إدارة العروض</li>
                    <li class="list-group-item">إضافة 5 عروض في اليوم</li>
                    <li class="list-group-item">أدارة المستخدمين</li>
                    <li class="list-group-item">Feature</li>
                    </ul>
                </div>
    
                <div class="card-footer bg-white py-3">
                    <button type="button" class="btn btn-primary btn-sm">Buy now</button>
                </div>
    
                </div>
                <!-- Card -->
    
            </div>
            <!--Grid column-->
    
            <!--Grid column-->
            <div class="col-lg-4 mb-4">
    
                <!-- Card -->
                <div class="card text-center">
    
                <div class="card-header bg-white py-3">
                    <p class="text-uppercase small mb-2"><strong>Advanced</strong></p>
                    <h5 class="mb-0">$49/month</h5>
                </div>
    
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Feature</li>
                    <li class="list-group-item">Feature</li>
                    <li class="list-group-item">Feature</li>
                    <li class="list-group-item">Feature</li>
                    <li class="list-group-item">Feature</li>
                    </ul>
                </div>
    
                <div class="card-footer bg-white py-3">
                    <button type="button" class="btn btn-info btn-sm">Buy now</button>
                </div>
    
            </div>
                      <!-- Card -->
          
                   
                    <!--Grid column-->

      

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

$( '#timer-countercallback' ).countdown( {
		from: 60*60*24,
		to: 0,
		timerEnd: function() {
			this.animate( { 'opacity':.5 }, 500 ).css( { 'text-decoration':'line-through' } );
		} 
	} );

</script>




@endsection
