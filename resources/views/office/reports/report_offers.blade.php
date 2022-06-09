@extends('layouts.master')
@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="{{URL::asset('officepanal/assets/plugins/morris.js/morris.css')}}" rel="stylesheet">


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
                <h4 class="content-title mb-0 my-auto">التقارير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تقارير العروض</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')

<div class="row row-sm">
    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
        <div class="card bg-primary-gradient text-white ">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="icon1 mt-2 text-center">
                            <i class="fe fe-users tx-40"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mt-0 text-center">
                            <span class="text-white">العملاء</span>
                            <h2 class="text-white mb-0">23</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
        <div class="card bg-danger-gradient text-white">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="icon1 mt-2 text-center">
                            <i class="fe fe-shopping-cart tx-40"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mt-0 text-center">
                            <span class="text-white"> المبيعات </span>
                            <h2 class="text-white mb-0">15</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
        <div class="card bg-success-gradient text-white">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="icon1 mt-2 text-center">
                            <i class="fe fe-bar-chart-2 tx-40"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mt-0 text-center">
                            <span class="text-white"> الزيارات</span>
                            <h2 class="text-white mb-0">980</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-3 col-md-6 col-12">
        <div class="card bg-warning-gradient text-white">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="icon1 mt-2 text-center">
                            <i class="fe fe-pie-chart tx-40"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mt-0 text-center">
                            <span class="text-white">العروض</span>
                            <h2 class="text-white mb-0">35</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="row row-cards row-deck">
    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header pb-0">
                <div class="card-title pb-0  mb-2">العروض</div>
                <p class="tx-12 tx-gray-500 mb-3">تفاصيل العروض المضافة حديثا مراحل زمنية مختلفة</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <label class="tx-12">اليوم</label>
                        <p class="font-weight-bold tx-20">15</p>
                    </div><!-- col -->
                    <div class="col border-right text-center">
                        <label class="tx-12">الأسبوع</label>
                        <p class="font-weight-bold tx-20">25</p>
                    </div><!-- col -->
                    <div class="col border-right text-center">
                        <label class="tx-12">الشهر</label>
                        <p class="font-weight-bold tx-20">145</p>
                    </div><!-- col -->
                </div><!-- row -->
                <div class="progress ht-20 mt-4">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary ht-20 w-50">50%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header pb-0">
                <div class="card-title pb-0 mb-2">المشاهدات</div>
                <p class="tx-12 tx-gray-500 mb-3">تفاصيل مشاهدات العروض في مراحل زمنية مختلفة تساعد علي فهم  الوصول الي العملاء</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <label class="tx-12">اليوم</label>
                        <p class="font-weight-bold tx-20">100</p>
                    </div><!-- col -->
                    <div class="col border-right text-center ">
                        <label class="tx-12">الأسبوع</label>
                        <p class="font-weight-bold tx-20">320</p>
                    </div><!-- col -->
                    <div class="col border-right text-center">
                        <label class="tx-12">الشهر</label>
                        <p class="font-weight-bold tx-20">3,250</p>
                    </div><!-- col -->
                </div><!-- row -->
                <div class="progress mt-4 ht-20">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning wd-60p ht-20">36%</div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="card mg-b-md-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    طلبات
                </div>
                <p class="mg-b-20">تفاصيل أساسية حول طلبات العملاء</p>
                <div class="morris-donut-wrapper-demo" id="morrisDonut1"></div>
            </div>
        </div>
    </div><!-- col-6 -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    طلبات الخاصة
                </div>
                <p class="mg-b-20">تفاصيل أساسية حول طلبات الخاصة بالعملاء</p>
               
                <div class="morris-donut-wrapper-demo" id="morrisDonut2"></div>
            </div>
        </div>
    </div><!-- col-6 -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                   طلبات المعاينة
                </div>
                <p class="mg-b-20">تفاصيل أساسية حول طلبات معاينة العقار</p>
               
                <div class="morris-donut-wrapper-demo" id="morrisDonut3"></div>
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
<script src="{{URL::asset('officepanal/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{URL::asset('officepanal/assets/plugins/morris.js/morris.min.js')}}"></script>
<!--Internal Chart Morris js -->
<script src="{{URL::asset('officepanal/assets/js/chart.morris.js')}}"></script>
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

    new Morris.Donut({
            element: 'morrisDonut1',
            data: [{
                label: 'الطلبات الخاصة',
                value: 12
            }, {
                label: 'الطلبات المعاينة',
                value: 30
            }],
            colors: ['#f7557a', '#285cf7', '#f7557a'],
            resize: true,
            labelColor:"#8c9fc3"
        });
    
        new Morris.Donut({
            element: 'morrisDonut2',
            data: [{
                label: 'قيد التنفيذ',
                value: 60
            }, {
                label: 'تم التواصل مع العميل',
                value: 20
            }],
            colors: ['#6d6ef3', '#285cf7', '#f7557a'],
            resize: true,
            labelColor:"#8c9fc3"
        });
    
    
        new Morris.Donut({
            element: 'morrisDonut3',
            data: [{
                label: 'تم التواصل مع العميل',
                value: 43
            }, {
                label:  'قيد التنفيذ',
                value: 15
            }],
            colors: ['#f7557a', '#285cf7', '#f7557a'],
            resize: true,
            labelColor:"#8c9fc3"
        });
    
    </script>


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



@endsection
