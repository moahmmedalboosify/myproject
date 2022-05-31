@extends('layouts.master')
@section('css')


    <link href="{{ URL::asset('officepanal/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="{{ URL::asset('officepanal/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet"
        type="text/css" />
    <!---Internal Fancy uploader css-->
    <link rel="stylesheet" href="{{ URL::asset('officepanal/assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">

    <link href="{{ URL::asset('officepanal/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <!--- jQuery Accordion Wizard Form css-->

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
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

    <!-- search plugin Map APi css !-->


    <style>
        .list-group-item:nth-child(4):(.open) {
            height: 600px;
        }

        .btn:nth-child(1) {
            bottom: 310px;
        }

   
      

        div[data-acc-content] {
            text-align: right;
            direction: rtl;
            display: none;
        }

        div[data-acc-step]:not(.open) {
            text-align: right;
            direction: rtl;
            background: #3d75cb;
        }

        div[data-acc-step]:not(.open) h5 {
            text-align: right;
            direction: rtl;
            color: rgb(253, 253, 253);
        }

        div[data-acc-step]:not(.open) .badge-primary {
            text-align: right;
            direction: rtl;
            background: #c1c0bd99;
        }

        div[data-acc-step]:(.open) .badge-primary {
            text-align: right;
            direction: rtl;
            background: #0fb14062;
        }

    </style>
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

    <!-- Map APi css !-->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css' rel='stylesheet' />


@endsection

@section('title')
    إضافة عقار
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">العقارات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    إضافة عقار</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')






    <form id="form" enctype="multipart/form-data">


        <div class="list-group">


            <div class="list-group-item py-3 ttemps" data-acc-step>
                <h5 class="mb-t-50" data-acc-title>معلومات الزبون <i
                        style="font-size:1.5em; color:rgb(253, 253, 253); float:left" class="far fa-address-card"></i></h5>

                <div data-acc-content>


                    <input type="hidden" id="result_ajax" value="0">

                    <div id="show_new">
                        <div class="my-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="inputName" class="control-label">
                                        <h6> إسم الزبون : </h6>
                                    </label>
                                    <input type="text" class="form-control " id="name_client" name="name_owner" value=""
                                        title="يرجي ادخال أسم الزبون" min="10" max="10">
                                    <span id="name_client_error" class="text-danger"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label for="inputName" class="control-label">
                                        <h6> رقم الزبون : </h6>
                                    </label> <br>
                                    <input class="form-control" id="phone_client" name="phone_client" type="text">
                                    <span id="phone_client_error" class="text-danger"></span>

                                </div>

                            </div>
                        </div>
                        <button onclick="not6()" id="more_offers" data-class="success" data-value="0"
                            data-text="سيتم حفظ بيانات الزبون  وتخطي هذه المرحلة" class="btn btn-default"
                            title="لدي الزبون أكثر من عقار"
                            style="width: 70px; height:39px;    color: rgb(1, 98, 232);  font-size: 50px "><i
                                class="fa-solid fa-square-plus"></i>
                        </button>


                    </div>



                </div>



            </div>


            <div class="list-group-item py-3 mr-b-30" data-acc-step>
                <h5 class="mb-0" data-acc-title>معلومات العقار<i
                        style="font-size:1.5em; color:rgb(253, 253, 253); float:left" class="far fa-file-alt"></i></h5>
                <div data-acc-content>
                    <div class="my-3">

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">
                                    <h5> القسم </h5>
                                </label>
                                <select name="section" id="section" class="form-control SlectBox">
                                    <!--placeholder-->
                                    <option>حدد القسم</option>
                                    <option value="\apartment"> شقق</option>
                                    <option value="\houses"> منازل </option>
                                    <option value="\villas_palaces"> فلل-قصور </option>
                                    <option value="\lands"> أراضي </option>
                                    <option value="\commercial"> تجاري </option>
                                </select>
                                <span id="section_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="list-group-item py-3" data-acc-step>
                <h5 class="mb-0" data-acc-title>تفاصيل العقار<span id="text_title_detials"></span>
                    <i style="font-size:1.5em; color:rgb(253, 253, 253); float:left" class="typcn typcn-edit"></i>
                </h5>
                <div data-acc-content>
                    <div class="my-3">


                        <div class="row">



                            <div class="col" id="type_offer_div">
                                <label for="inputName" class="control-label mt-2">الغرض</label>
                                <select name="type_offer" id="type_offer" class="form-control SlectBox">
                                    <!--placeholder-->
                                    <option value="0" selected disabled>حدد الغرض</option>
                                    <option value="البيع"> البيع</option>
                                    <option value="إيجار"> إيجار</option>
                                </select>
                                <span id="type_offer_error" class="text-danger"></span>
                            </div>




                            <div class="col" id="document_div">
                                <label for="inputName" class="control-label mt-2">نوع الوثائق</label>
                                <select name="document_type" id="document" class="form-control SlectBox">
                                    <!--placeholder-->
                                    <option value="0" selected disabled>حدد الوثيقة</option>
                                    <option value="شهادة عقارية"> شهادة عقارية</option>
                                    <option value="تخصيص"> تخصيص</option>
                                </select>
                                <span id="document_error" class="text-danger"></span>
                            </div>


                            <div class="col" id="age_div">
                                <label for="inputName" class="control-label mt-2">عمر البناء</label>
                                <select id="age" name="age" class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد عمر البناء </option>
                                    <option value="جديد">جديد</option>
                                    <option value="1-5">1-5 سنة</option>
                                    <option value="6-10">6-10 سنة</option>
                                    <option value="+10">+10 سنة</option>
                                </select>
                                <span id="age_error" class="text-danger"></span>

                            </div>


                            <div class="col" id="wings_div">
                                <label for="inputName" class="control-label mt-2"> عدد الأجنحة </label>
                                <select id="wings" name="wings" class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد عددالأجنحة </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="+4">+4</option>

                                </select>
                                <span id="wings_error" class="text-danger"></span>

                            </div>


                        </div>
                        <div class="row">

                            <div class="col" id="area_div">
                                <label for="inputName" class="control-label mt-2">المساحة</label>

                                <div class="input-group ">

                                    <input type="number" id="area" name="area" class="form-control"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append ">
                                        <span class="input-group-text" id="basic-addon2">متر مربع</span>
                                    </div>
                                </div>
                                <span id="area_error" class="text-danger"></span>

                            </div>

                            <div class="col" id="area_land_div">
                                <label for="inputName" class="control-label mt-2">المساحة الأرض</label>

                                <div class="input-group ">

                                    <input type="number" id="area_land" name="area_land" class="form-control"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append ">
                                        <span class="input-group-text" id="basic-addon2">متر مربع</span>
                                    </div>
                                </div>
                                <span id="area_land_error" class="text-danger"></span>

                            </div>



                            <div class="col" id="room_div">
                                <label for="inputName" class="control-label mt-2">الغرف</label>
                                <select id="room" name="rooms" class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد عدد الغرف</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="+4">+4</option>
                                </select>
                                <span id="room_error" class="text-danger"></span>
                            </div>

                            <div class="col" id="bathroom_div">
                                <label for="inputName" class="control-label mt-2">دورات المياه</label>
                                <select id="bathroom" name="bathrooms" class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد عدد دورات المياه</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="+4">+4</option>
                                </select>
                                <span id="bathroom_error" class="text-danger"></span>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col" id="floor_div">
                                <label for="inputName" class="control-label mt-2">الطابق</label>
                                <select id="floor" name="floor" class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد الطابق</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="+4">+4</option>
                                </select>
                                <span id="floor_error" class="text-danger"></span>

                            </div>

                            <div class="col" id="furnished_div">
                                <label for="inputName" class="control-label mt-2">نوع الفرش </label>
                                <select id="furnished" name="furnished" class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد نوع الفرش </option>
                                    <option value="مفروش">مفروش</option>
                                    <option value="غير مفروش">غير مفروش</option>

                                </select>
                                <span id="furnished_error" class="text-danger"></span>

                            </div>



                            <div class="col" id="extra_features_div">
                                <label for="inputName" class="control-label mt-2">مميزات أضافية </label>
                                <select id="extra_features" name="extra_features[]" multiple class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد </option>
                                    <option value="مكيف">مكيف</option>
                                    <option value="قراج خاص">قراج خاص</option>
                                    <option value="بلكونة"> بلكونة</option>
                                    <option value="حديقة"> حديقة</option>
                                    <option value="مدخل خاص"> مدخل خاص</option>
                                    <option value="قرب الخدمات"> قرب الخدمات</option>
                                    <option value="بئر ماء"> بئر ماء</option>
                                    <option value="حارس"> حارس</option>
                                    <option value="بركة سباحة"> بركة سباحة</option>
                                </select>
                                <span id="extra_features_error" class="text-danger"></span>
                            </div>




                        </div>


                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label mt-2">السعر</label>

                                <div class="input-group ">

                                    <input type="number" id="price" name="price" class="form-control"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append ">
                                        <span class="input-group-text" id="basic-addon2">$</span>
                                    </div>
                                </div>
                                <span id="price_error" class="text-danger"></span>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label mt-2"> طريقة الدفع </label>
                                <select id="pyment_method" name="pyment_method[]" multiple class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد طريقة الدفع </option>
                                    <option value="نقدا">نقدا</option>
                                    <option value="شيك"> شيك</option>
                                    <option value="أقساط"> أقساط</option>
                                </select>
                                <span id="pyment_method_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-8">
                                <label for="inputName" class="control-label mt-2">عنوان العرض </label>
                                <div class="input-group ">
                                    <input type="text" id="title" name="title" class="form-control"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2"
                                        placeholder=" أدخل عنوان العرض مثل : شقة تشطيب فاخر">
                                </div>

                                <span id="title_error" class="text-danger"></span>
                            </div>
                            <div class="col-12">
                                <label for="exampleTextarea">وصف العرض</label>
                                <textarea id="description" name="description" class="form-control" id="exampleTextarea" name="note"
                                    rows="3"></textarea>
                            </div>
                            <span id="description_error" class="text-danger"></span>
                        </div>


                    </div>
                </div>
            </div>


            <div class="list-group-item py-3 mr-b-30" data-acc-step>
                <h5 class="mb-0" data-acc-title>عنوان العقار<i
                        style="font-size:1.5em; color:rgb(253, 253, 253); float:left" class="si si-location-pin"></i></h5>
                <div data-acc-content>
                    <div class="my-3">


                        <div id='map' style='width:100%; min-height:300px;'></div>

                        <span id="map_error" class="text-danger" style="display: none"> يجب تحديد موقع العقار علي
                            الخريطة. </span>
                        <input type="hidden" name="lat" id="lat" value="0">
                        <input type="hidden" name="lng"  id="lng" value="0">

                        <div class="row mg-t-340">
                            <div class="col mg-t-30">
                                <label for="inputName" class="control-label">
                                    <h6> المدينة<span style="color:red">*</span> </h6>
                                </label>
                                <select name="city" id="city" class="form-control">
                                    <!--placeholder-->
                                    <option value="0" selected disabled>حدد المدينة </option>
                                    @foreach ($city as $row)
                                        <option value="{{ $row->id }}"> {{ $row->name }} </option>
                                    @endforeach
                                </select>
                                <span id="city_error" class="text-danger" style="display: none">يجب تحديد
                                    المدينة.</span>

                            </div>
                            <div class="col mg-t-30">
                                <label for="inputName" class="control-label">
                                    <h6> المنطقة <span style="color:red">*</span> </h6>
                                </label>
                                <select name="region" id="region" class="form-control">
                                    <!--placeholder-->
                                    <option value="0" selected disabled>حدد المنطقة</option>
                                </select>
                                <span id="region_error" class="text-danger" style="display: none">يجب تحديد
                                    المنطقة.</span>

                            </div>
                            <div class="col mg-t-30">
                                <label for="inputName" class="control-label">
                                    <h6> أقرب نقطة دالة <span style="color:red">*</span> </h6>
                                </label>
                                <input type="text" id="point" name="point" class="form-control " id="inputName"
                                    name="name_owner" value="" title="">
                                <span id="point_error" class="text-danger" style="display: none">يجب تحديد أقرب نقطة
                                    دالة.</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-group-item py-3" data-acc-step>
                <h5 class="mb-0" data-acc-title>مرفقات العقار<i
                        style="font-size:1.5em; color:rgb(253, 253, 253); float:left" class="la la-camera"></i></h5>
                <div data-acc-content>
                    <div class="my-3">


                        <input id="image" type="file" name="image_uplode[]" accept="image/*" multiple>
                        <span id="uplode_image_error" class="text-danger"></span>

                    </div>
                </div>
            </div>



        </div>

    </form>

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

    <!--   sweetalert2       !-->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!--   fontawesome       !-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js"
        integrity="sha512-5qbIAL4qJ/FSsWfIq5Pd0qbqoZpk5NcUVeAAREV2Li4EKzyJDEGlADHhHOSSCw0tHP7z3Q4hNHJXa81P92borQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- search plugin Map APi css !-->
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

    <!--  Map APi css !-->
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-language/v1.0.0/mapbox-gl-language.js'></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js'></script>

    <!-- Internal notifIt js-->

    <script src="{{ URL::asset('officepanal/assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('officepanal/assets/plugins/notify/js/notifit-custom.js') }}"></script>

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
    <!-- Internal jquery.accordion-wizard js -->
    <script src="{{ URL::asset('officepanal/js/jquery.accordion-wizard.min.js') }}"></script>





    <!-- client info  js   first step  -->
    <script>
        $(document).ready(function() {

            // button plus offers
            $('#more_offers').on('click', function(e) {
                $('#more_offers').each(function(index) {
                    $(this).data('value') == '0 ' ? $(this).css('color', 'rgb(0, 128, 0)').data(
                            "value", '1').data("text", 'سيتم حفظ بيانات الزبون  وتخطي هذه المرحلة')
                        .data("class", 'success') : $(this).css('color', 'rgb(1, 98, 232)').data(
                            "value", '0').data("text",
                            'سيتم حذف بيانات الزبون  وعدم تخطي هذه المرحلة').data("class",
                            'primary')
                    // $(this).data("value",'0');
                    // console.log( $(this).data("text"))
                })
            });
        });
    </script>





    <!-- Map Api js -->
    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoibW9oYW1tZWRhbGJvb3NpZnkiLCJhIjoiY2wzMHBpcmgyMXJyZDNibXA2aXM4cWN6MiJ9.zh5hoOMhrgtoAudRTSXAPg';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v11', // style URL
            center: [13.176383972167969, 32.89169608080795], // starting position [lng, lat]
            zoom: 9 // starting zoom
        });
        // make new marker in static location 
        var marker = new mapboxgl.Marker({
                color: "red",
                draggable: true
            }).setLngLat([13.176383972167969, 32.89169608080795])
            .addTo(map);

        // move marker to new location and save location in var
        map.on('click', function(e) {
            var l = e.lngLat.wrap().lat;
            var g = e.lngLat.wrap().lng;
            $('#lat').val(l);
            $('#lng').val(g);
            marker.setLngLat([g, l]).addTo(map);
        });

     
        $('#region').on('change', function(e) {
            console.log( $('#region option:selected').text() );
          $('.mapboxgl-ctrl-geocoder--input').val( $('#region option:selected').text() )
        
        });


        // add search plugin
        map.addControl(
            new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl,
                marker: false
            })
        );



      

       


        // add search plugin

        mapboxgl.setRTLTextPlugin(
            'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js');

        map.addControl(new MapboxLanguage({
            defaultLanguage: 'ar'
        }));
    </script>





    <!-- multi step forms js -->

    <script>

        $(document).ready(function() {



            $('#form').on('submit', function(e) {
                e.preventDefault();

                var form = new FormData(this);

                var url = '{{ route('office.step_final.offer') }}';
                
                

                console.log(form)
                $.ajax({
                    url: url,
                    type: "POST",
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',


                    success: function(data) {
                        
                        if(data.state == 200){
                            $('#more_offers').data('value','1') ;
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'تم إضافة العرض بنجاح.',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            setInterval(function(){
                                if($('#more_offers').data('value') == '0'){
                                    location.reload () 
                                }else{
                                    $(".list-group-item").children().attr("disabled","disabled");
                                }
                                                           }, 2000);
                        }
                      
                            

                           
                    }

                });
            });



            var options = {
                mode: 'wizard',
                autoButtonsNextClass: 'btn btn-primary mg-l-10  mg-t-380 float-left test-btn',
                autoButtonsPrevClass: 'btn btn-light float-left',
                stepNumberClass: 'badge badge-pill badge-primary mr-1',
                beforeNextStep: function(t) {

                    switch (t) {
                        case 1:
                        

                            return step_one(1) == 1 ? true : false

                            break;

                        case 2:
                      
                        return true
                            return step_two() == 1 ? true : false

                            break;

                        case 3:
                 
                        return true
                     
                            return step_three() == 1 ? true : false

                            break;

                        case 4:
      
                        return true
                        
                            return step_four() == 1 ? true : false

                            break;



                    }



                },
                onSubmit: function() {


                    return false;


                }
            }

            $(function() {

                $("#form").accWizard(options);

            });

        });

        // ################################################
        // ###                  Steps                   ###
        // ###                                          ###
        // ###                                          ###
        // ###                                          ###
        // ################################################


        // ###             step _ one                ###

        function step_one(flag) {

            $('#result_ajax').val('0');

            $('#name_client_error').text('');
            $('#phone_client_error').text('');



            if ($('#name_client').val() == '') {
                $('#name_client_error').text('يجب إدخال أسم الزبون .')
                flag = 0;
            }

            if ($('#phone_client').val() == '') {
                $('#phone_client_error').text('يجب إدخال رقم الزبون .')
                flag = 0;
            }

            // if($('#name_client').length != 10 ){

            // }

            if ($('#name_client') > 30) {
                $('#name_client_error').text('يجب أن  لا يتعدي الأسم 30 حرف . ')
                flag = 0;
            }

            if ($('#phone_client').length == 0) {
                $('#phone_client_error').text('يجب إدخال رقم الزبون .')


                flag = 0;
            }

            return flag;


        }



        // ###              step two                ###


        function step_two() {

            $('#section_error').text('');




            if ($('#section option:selected').val() != 'حدد القسم') {

                var type_offer = $('#section').val();
                step_two_edit_form(type_offer);
                step_three_rest_form_error();
                return 1;

            } else {
                $('#section_error').text('يجب تحديد نوع العقار');
                return 0;
            }

        }


        function step_two_edit_form(type) {
            step_two_rest_forms();


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


        function step_two_rest_forms() {

            $('#area_div').show();
            $('#wings_div').show();
            $('#area_land_div').show();
            $('#age_div').show();
            $('#bathroom_div').show();
            $('#room_div').show();
            $('#floor_div').show();
            $('#furnished_div').show();

        }



        function step_three() {

            step_three_rest_form_error()
            if (step_three_process()) {
                return 1
            } else {
                return 0
            }


        }

        function step_three_process() {



            var parametr = [];

            var apartment = [
                '#type_offer', '#document', '#age', '#area', '#bathroom', '#room', '#floor', '#furnished', '#price',
                '#title', '#description', '#extra_features', '#pyment_method'
            ];
            var houses = [
                '#type_offer', '#document', '#age', '#area_land', '#area', '#bathroom', '#room', '#floor', '#furnished',
                '#price', '#title', '#description', '#extra_features', '#pyment_method'
            ];
            var villas_palaces = [
                '#type_offer', '#document', '#age', '#wings', '#area_land', '#area', '#bathroom', '#room', '#floor',
                '#furnished', '#price', '#title', '#description', '#extra_features', '#pyment_method'
            ];
            var lands = [
                '#type_offer', '#document', '#area_land', '#price', '#title', '#description',
                '#extra_features', '#pyment_method'
            ];
            var commercial = [
                '#type_offer', '#document', '#area', '#price', '#title', '#description', '#extra_features',
                '#pyment_method'
            ];


            switch ($('#section option:selected').val()) {

                case 'apartment':
                    parametr = apartment
                    break;
                case 'houses':
                    parametr = houses
                    break;
                case 'lands':
                    parametr = lands
                    break;
                case 'villas_palaces':
                    parametr = villas_palaces
                    break;
                case 'commercial':
                    parametr = commercial
                    break;

            }

            var error = [
                '#type_offer_error', '#document_error', '#age_error', '#wings_error', '#area_land_error', '#area_error',
                '#bathroom_error', '#room_error', '#floor_error', '#furnished_error', '#price_error', '#title_error',
                '#description_error', '#extra_features_error', '#pyment_method_error'

            ];

            var message = [
                'نوع العقار',
                'الوثيقة',
                'عمر البناء',
                'عدد الأجنحة',
                'المساحةالأرض',
                'مساحة ',
                'عدد دورات المياه',
                'عدد الغرف',
                'الدور',
                'حالة الفرش',
                'السعر',
                'عنوان العرض',
                'وصف العرض',
                ' المميزات الأضافية',
                'طرق الدفع',
            ];


            type = true;
            for (let i = 0; i < parametr.length; i++) {
                if (!$(parametr[i]).val() || $(parametr[i]).val() == 0 || $(parametr[i]).val() == null) {

                    console.log($(parametr[i]).val() + '__' + parametr[i]);
                    $(parametr[i] + '_error').text(' يجب عدم ترك الحقل فارغاّ .')
                    type = false;
                } else {
                    $(parametr[i] + '_error').text('');
                }
            }

          return type;

        }


        function step_three_rest_form_error() {
            var parametr = [
                '#type_offer', '#document', '#age', '#wings', '#area_land', '#area', '#bathroom', '#room', '#floor',
                '#furnished', '#price', '#title', '#description', '#extra_features', '#pyment_method'
            ];

            for (let i = 0; i < parametr.length; i++) {
                $(parametr[i] + '_error').text('');
            }
        }

    

        function step_four() {

            return step_four_validation(1);

        }


        function step_four_validation(flag) {

            $('#map_error').hide();
            $('#city_error').hide();
            $('#region_error').hide();
            $('#point_error').hide();

            if ($('#lat').val() == 0) {
                $('#map_error').show();
                flag= 0;
            }
            if ($('select[name="city"]').val() == null) {
                $('#city_error').show();
                flag= 0;       
            }

            if ($('#region').val() == null) {
                $('#region_error').show();
                flag= 0;
            }
            if ($('#point').val() == '') {
                $('#point_error').show();
                flag= 0;
            }

           return flag ;
        }


        function step_five() {

            $('#uplode_image_error').text('');

            if ($('#uplode_image').val() == undefined)
                $('#uplode_image_error').text('يجب تحميل المرفقات .');


        }


        function step_final() {

            var section, type_offer, document
            age,
            wings,
            area,
            area_land,
            room,
            bathroom,
            floor,
            furnished,
            extra_features,
            price,
            pyment_method,
            title,
            description,
            lat,
            lng,
            city,
            region,
            point,
            demo;


            var url = '{{ route('office.step_four_city.offer') }}';



            // data = {
            //     ''
            // }
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    'id_city': id_city
                },
                success: function(res) {
                    $('#region').html(res.region);
                }
            });


        }



        function clear_error() {
            $('#name_client_error').empty('');
            $('#phone_old_error').empty('');
            $('#phone_error').empty();
        }
    </script>




    <!--   Ajax section   -->

    <script>
        //  ##############################################
        //  ####
        //  ####             Ajax section
        //  ####
        //  ##############################################

        $(document).ready(function() {


            $('#city').on('change', function(e) {

                var id_city = $(this).children("option:selected").val();

                e.preventDefault();

                var url = '{{ route('office.step_four_city.offer') }}';
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        'id_city': id_city
                    },
                    success: function(res) {
                        $('#region').html(res.region);
                    }
                });

            });


        });
    </script>


@endsection
