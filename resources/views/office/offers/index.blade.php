@extends('layouts.master')
@section('css')



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






    <form id="form">


        <div class="list-group">

            <div class="list-group-item py-3 ttemps" data-acc-step>
                <h5 class="mb-t-50" data-acc-title>معلومات الزبون <i
                        style="font-size:1.5em; color:rgb(253, 253, 253); float:left" class="far fa-address-card"></i></h5>

                <div data-acc-content>

                    <div class="custom-control custom-radio mg-t-20">
                        <label class="custom-control-label" for="defaultGroupExample1">زبون جديد</label>
                        <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="state_client"
                            value="new">
                    </div>

                    <!-- Group of default radios - option 2 -->
                    <div class="custom-control custom-radio g-t-20">
                        <label class="custom-control-label" for="defaultGroupExample2">زبون قديم </label>
                        <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="state_client"
                            value="old">
                    </div>

                    <span id="error_state_client" class="text-danger">يجب تحديد حالة الزبون وملأ النموذج أولا</span>


                    <div id="show_new">
                        <div class="my-3">
                            <div class="row">
                                <div class="col">
                                    <label for="inputName" class="control-label">
                                        <h6> أسم الزبون </h6>
                                    </label>
                                    <input type="text" class="form-control " id="name_client" name="name_owner" value=""
                                        title="يرجي ادخال أسم الزبون" min="10" max="10">
                                    <span id="name_client_error" class="text-danger"></span>
                                </div>
                                <div class="col">
                                    <label for="inputName" class="control-label">
                                        <h6> رقم الزبون </h6>
                                    </label> <br>
                                    <input class="form-control new_client_phone " id="phone" name="phone_client"
                                        type="tel"><br>
                                    <span id="phone_error" class="text-danger"></span>

                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn bg-transparent clear" style="margin-left: -40px; z-index: 100;"><i
                                class="fa fa-times"></i>

                    </div>

                    <div id="show_old">
                        <div class="my-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="inputName" class="control-label">
                                        <h6> رقم الزبون </h6>
                                    </label> <br>
                                    <input class="form-control old_client_phone" id="phone" name="phone" type="tel">
                                    <span id="phone_old_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <button class="btn bg-transparent clear" style="margin-left: -40px; z-index: 100;"><i
                                class="fa fa-times"></i>

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
                                <select name="type_offer" id="section" class="form-control SlectBox">
                                    <!--placeholder-->
                                    <option>حدد نوع العقار</option>
                                    <option value="apartment"> شقق</option>
                                    <option value="houses"> منازل </option>
                                    <option value="villas_palaces"> فلل-قصور </option>
                                    <option value="lands"> أراضي </option>
                                    <option value="commercial"> تجاري </option>
                                </select>
                                <span id="section_error" class="text-danger"></span>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="list-group-item py-3" data-acc-step>
                <h5 class="mb-0" data-acc-title>تفاصيل العقار<span id="text_title_detials"></span>
                    <i style="font-size:1.5em; color:rgb(253, 253, 253); float:left" class="typcn typcn-edit"></i>
                </h5>
                <div data-acc-content>
                    <div class="my-3">

                        <div id="apartment">
                            <div class="row">



                                <div class="col" id="type_offer_div">
                                    <label for="inputName" class="control-label mt-2">حالة</label>
                                    <select name="Section" id="type_offer" class="form-control SlectBox">
                                        <!--placeholder-->
                                        <option value="0" selected disabled>حدد الغرض</option>
                                        <option value="1"> إيجار</option>
                                        <option value="2"> بيع</option>
                                    </select>
                                    <span id="type_offer_error" class="text-danger"></span>
                                </div>




                                <div class="col" id="document_div">
                                    <label for="inputName" class="control-label mt-2">نوع الوثائق</label>
                                    <select name="Section" id="document" class="form-control SlectBox">
                                        <!--placeholder-->
                                        <option value="0" selected disabled>حدد الوثيقة</option>
                                        <option value="1"> شهادة عقارية</option>
                                        <option value="2"> تخصيص</option>
                                        <option value="3"> غير مسجلة</option>
                                    </select>
                                    <span id="document_error" class="text-danger"></span>
                                </div>


                                <div class="col" id="age_div">
                                    <label for="inputName" class="control-label mt-2">عمر البناء</label>
                                    <select id="age" name="product" class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد عمر البناء </option>
                                        <option value="1">جديد</option>
                                        <option value="2">1-5 سنة</option>
                                        <option value="3">6-10 سنة</option>
                                        <option value="+4">+10 سنة</option>
                                    </select>
                                    <span id="age_error" class="text-danger"></span>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col" id="area_div">
                                    <label for="inputName" class="control-label mt-2">المساحة</label>

                                    <div class="input-group ">

                                        <input type="number" id="area" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" id="basic-addon2">متر مربع</span>
                                        </div>
                                    </div>
                                    <span id="area_error" class="text-danger"></span>

                                </div>


                                <div class="col" id="room_div">
                                    <label for="inputName" class="control-label mt-2">الغرف</label>
                                    <select id="room" name="product" class="form-control SlectBox">
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
                                    <select id="bathroom" name="product" class="form-control SlectBox">
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
                                    <select id="floor" name="product" class="form-control SlectBox">
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
                                    <select id="furnished" name="product" class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد نوع الفرش </option>
                                        <option value="1">مفروش</option>
                                        <option value="0">غير مفروش</option>

                                    </select>
                                    <span id="furnished_error" class="text-danger"></span>

                                </div>




                                <div class="col">
                                    <div class="col">
                                        <label for="inputName" class="control-label mt-2">مميزات أضافية </label>
                                        <select id="extra_features" name="extra_features" multiple
                                            class="form-control SlectBox">
                                            <option value="0" selected disabled>حدد </option>
                                            <option value="1">مكيف</option>
                                            <option value="2">قراج خاص</option>
                                            <option value="3"> بلكونة</option>
                                            <option value="4"> حديقة</option>
                                            <option value="5"> مدخل خاص</option>
                                            <option value="6"> قرب الخدمات</option>
                                            <option value="7"> بئر ماء</option>
                                            <option value="8"> قرب الخدمات</option>
                                            <option value="9"> حارس</option>
                                            <option value="10"> بركة سباحة</option>
                                        </select>
                                        <span id="extra_features_error" class="text-danger"></span>
                                    </div>
                                </div>



                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="inputName" class="control-label mt-2">السعر</label>

                                    <div class="input-group ">

                                        <input type="number" id="price" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" id="basic-addon2">$</span>
                                        </div>
                                    </div>
                                    <span id="price_error" class="text-danger"></span>
                                </div>

                                <div class="col">
                                    <label for="inputName" class="control-label mt-2"> طريقة الدفع </label>
                                    <select id="pyment_method" name="pyment_method" multiple class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد طريقة الدفع </option>
                                        <option value="1">نقدا</option>
                                        <option value="2"> شيك</option>
                                        <option value="3"> أقساط</option>
                                    </select>
                                    <span id="pyment_method_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-8">
                                    <label for="inputName" class="control-label mt-2">عنوان العرض </label>
                                    <div class="input-group ">
                                        <input type="text" id="title" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2"
                                            placeholder=" أدخل عنوان العرض مثل : شقة تشطيب فاخر">
                                    </div>
                                    <span id="title_error" class="text-danger"></span>
                                </div>
                                <div class="col-12">
                                    <label for="exampleTextarea">وصف العرض</label>
                                    <textarea id="description" class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                                </div>
                                <span id="description_error" class="text-danger"></span>
                            </div>


                        </div>


                        <div id="houses">
                            <div class="row">



                                <div class="col" id="type_offer_div">
                                    <label for="inputName" class="control-label mt-2">حالة</label>
                                    <select name="Section" id="type_offer" class="form-control SlectBox">
                                        <!--placeholder-->
                                        <option value="0" selected disabled>حدد الغرض</option>
                                        <option value="1"> إيجار</option>
                                        <option value="2"> بيع</option>
                                    </select>
                                    <span id="type_offer_error" class="text-danger"></span>
                                </div>




                                <div class="col" id="document_div">
                                    <label for="inputName" class="control-label mt-2">نوع الوثائق</label>
                                    <select name="Section" id="document" class="form-control SlectBox">
                                        <!--placeholder-->
                                        <option value="0" selected disabled>حدد الوثيقة</option>
                                        <option value="1"> شهادة عقارية</option>
                                        <option value="2"> تخصيص</option>
                                        <option value="3"> غير مسجلة</option>
                                    </select>
                                    <span id="document_error" class="text-danger"></span>
                                </div>


                                <div class="col" id="age_div">
                                    <label for="inputName" class="control-label mt-2">عمر البناء</label>
                                    <select id="age" name="product" class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد عمر البناء </option>
                                        <option value="1">جديد</option>
                                        <option value="2">1-5 سنة</option>
                                        <option value="3">6-10 سنة</option>
                                        <option value="+4">+10 سنة</option>
                                    </select>
                                    <span id="age_error" class="text-danger"></span>

                                </div>


                            </div>

                            <div class="row">

                                <div class="col" id="area_div">
                                    <label for="inputName" class="control-label mt-2">المساحة</label>

                                    <div class="input-group ">

                                        <input type="number" id="area" class="form-control"
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

                                        <input type="number" id="area_land" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" id="basic-addon2">متر مربع</span>
                                        </div>
                                    </div>
                                    <span id="area_land_error" class="text-danger"></span>

                                </div>


                                <div class="col" id="room_div">
                                    <label for="inputName" class="control-label mt-2">الغرف</label>
                                    <select id="room" name="product" class="form-control SlectBox">
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
                                    <select id="bathroom" name="product" class="form-control SlectBox">
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
                                    <select id="floor" name="product" class="form-control SlectBox">
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
                                    <select id="furnished" name="product" class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد نوع الفرش </option>
                                        <option value="1">مفروش</option>
                                        <option value="0">غير مفروش</option>

                                    </select>
                                    <span id="furnished_error" class="text-danger"></span>

                                </div>




                                <div class="col">
                                    <div class="col">
                                        <label for="inputName" class="control-label mt-2">مميزات أضافية </label>
                                        <select id="extra_features" name="extra_features" multiple
                                            class="form-control SlectBox">
                                            <option value="0" selected disabled>حدد </option>
                                            <option value="1">مكيف</option>
                                            <option value="2">قراج خاص</option>
                                            <option value="3"> بلكونة</option>
                                            <option value="4"> حديقة</option>
                                            <option value="5"> مدخل خاص</option>
                                            <option value="6"> قرب الخدمات</option>
                                            <option value="7"> بئر ماء</option>
                                            <option value="8"> قرب الخدمات</option>
                                            <option value="9"> حارس</option>
                                            <option value="10"> بركة سباحة</option>
                                        </select>
                                        <span id="extra_features_error" class="text-danger"></span>
                                    </div>
                                </div>



                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="inputName" class="control-label mt-2">السعر</label>

                                    <div class="input-group ">

                                        <input type="number" id="price" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" id="basic-addon2">$</span>
                                        </div>
                                    </div>
                                    <span id="price_error" class="text-danger"></span>
                                </div>

                                <div class="col">
                                    <label for="inputName" class="control-label mt-2"> طريقة الدفع </label>
                                    <select id="pyment_method" name="pyment_method" multiple class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد طريقة الدفع </option>
                                        <option value="1">نقدا</option>
                                        <option value="2"> شيك</option>
                                        <option value="3"> أقساط</option>
                                    </select>
                                    <span id="pyment_method_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-8">
                                    <label for="inputName" class="control-label mt-2">عنوان العرض </label>
                                    <div class="input-group ">
                                        <input type="text" id="title" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2"
                                            placeholder=" أدخل عنوان العرض مثل : شقة تشطيب فاخر">
                                    </div>
                                    <span id="title_error" class="text-danger"></span>
                                </div>
                                <div class="col-12">
                                    <label for="exampleTextarea">وصف العرض</label>
                                    <textarea id="description" class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                                </div>
                                <span id="description_error" class="text-danger"></span>
                            </div>
                        </div>

                        <div id="villas_palaces">
                            <div class="row">



                                <div class="col" id="type_offer_div">
                                    <label for="inputName" class="control-label mt-2">حالة</label>
                                    <select name="Section" id="type_offer" class="form-control SlectBox">
                                        <!--placeholder-->
                                        <option value="0" selected disabled>حدد الغرض</option>
                                        <option value="1"> إيجار</option>
                                        <option value="2"> بيع</option>
                                    </select>
                                    <span id="type_offer_error" class="text-danger"></span>
                                </div>




                                <div class="col" id="document_div">
                                    <label for="inputName" class="control-label mt-2">نوع الوثائق</label>
                                    <select name="Section" id="document" class="form-control SlectBox">
                                        <!--placeholder-->
                                        <option value="0" selected disabled>حدد الوثيقة</option>
                                        <option value="1"> شهادة عقارية</option>
                                        <option value="2"> تخصيص</option>
                                        <option value="3"> غير مسجلة</option>
                                    </select>
                                    <span id="document_error" class="text-danger"></span>
                                </div>


                                <div class="col" id="age_div">
                                    <label for="inputName" class="control-label mt-2">عمر البناء</label>
                                    <select id="age" name="product" class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد عمر البناء </option>
                                        <option value="1">جديد</option>
                                        <option value="2">1-5 سنة</option>
                                        <option value="3">6-10 سنة</option>
                                        <option value="+4">+10 سنة</option>
                                    </select>
                                    <span id="age_error" class="text-danger"></span>

                                </div>


                                <div class="col" id="wings_div">
                                    <label for="inputName" class="control-label mt-2"> عدد الأجنحة </label>
                                    <select id="wings" name="product" class="form-control SlectBox">
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

                                        <input type="number" id="area" class="form-control"
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

                                        <input type="number" id="area_land" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" id="basic-addon2">متر مربع</span>
                                        </div>
                                    </div>
                                    <span id="area_land_error" class="text-danger"></span>

                                </div>


                                <div class="col" id="room_div">
                                    <label for="inputName" class="control-label mt-2">الغرف</label>
                                    <select id="room" name="product" class="form-control SlectBox">
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
                                    <select id="bathroom" name="product" class="form-control SlectBox">
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
                                    <select id="floor" name="product" class="form-control SlectBox">
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
                                    <select id="furnished" name="product" class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد نوع الفرش </option>
                                        <option value="1">مفروش</option>
                                        <option value="0">غير مفروش</option>

                                    </select>
                                    <span id="furnished_error" class="text-danger"></span>

                                </div>




                                <div class="col">
                                    <div class="col">
                                        <label for="inputName" class="control-label mt-2">مميزات أضافية </label>
                                        <select id="extra_features" name="extra_features" multiple
                                            class="form-control SlectBox">
                                            <option value="0" selected disabled>حدد </option>
                                            <option value="1">مكيف</option>
                                            <option value="2">قراج خاص</option>
                                            <option value="3"> بلكونة</option>
                                            <option value="4"> حديقة</option>
                                            <option value="5"> مدخل خاص</option>
                                            <option value="6"> قرب الخدمات</option>
                                            <option value="7"> بئر ماء</option>
                                            <option value="8"> قرب الخدمات</option>
                                            <option value="9"> حارس</option>
                                            <option value="10"> بركة سباحة</option>
                                        </select>
                                        <span id="extra_features_error" class="text-danger"></span>
                                    </div>
                                </div>



                            </div>


                            <div class="row">
                                <div class="col">
                                    <label for="inputName" class="control-label mt-2">السعر</label>

                                    <div class="input-group ">

                                        <input type="number" id="price" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" id="basic-addon2">$</span>
                                        </div>
                                    </div>
                                    <span id="price_error" class="text-danger"></span>
                                </div>

                                <div class="col">
                                    <label for="inputName" class="control-label mt-2"> طريقة الدفع </label>
                                    <select id="pyment_method" name="pyment_method" multiple class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد طريقة الدفع </option>
                                        <option value="1">نقدا</option>
                                        <option value="2"> شيك</option>
                                        <option value="3"> أقساط</option>
                                    </select>
                                    <span id="pyment_method_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-8">
                                    <label for="inputName" class="control-label mt-2">عنوان العرض </label>
                                    <div class="input-group ">
                                        <input type="text" id="title" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2"
                                            placeholder=" أدخل عنوان العرض مثل : شقة تشطيب فاخر">
                                    </div>
                                    <span id="title_error" class="text-danger"></span>
                                </div>
                                <div class="col-12">
                                    <label for="exampleTextarea">وصف العرض</label>
                                    <textarea id="description" class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                                </div>
                                <span id="description_error" class="text-danger"></span>
                            </div>
                        </div>


                        <div id="lands">

                            <div class="row">



                                <div class="col" id="type_offer_div">
                                    <label for="inputName" class="control-label mt-2">حالة</label>
                                    <select name="Section" id="type_offer" class="form-control SlectBox">
                                        <!--placeholder-->
                                        <option value="0" selected disabled>حدد الغرض</option>
                                        <option value="1"> إيجار</option>
                                        <option value="2"> بيع</option>
                                    </select>
                                    <span id="type_offer_error" class="text-danger"></span>
                                </div>




                                <div class="col" id="document_div">
                                    <label for="inputName" class="control-label mt-2">نوع الوثائق</label>
                                    <select name="Section" id="document" class="form-control SlectBox">
                                        <!--placeholder-->
                                        <option value="0" selected disabled>حدد الوثيقة</option>
                                        <option value="1"> شهادة عقارية</option>
                                        <option value="2"> تخصيص</option>
                                        <option value="3"> غير مسجلة</option>
                                    </select>
                                    <span id="document_error" class="text-danger"></span>
                                </div>






                            </div>

                            <div class="row">

                                <div class="col" id="area_land_div">
                                    <label for="inputName" class="control-label mt-2">المساحة الأرض</label>

                                    <div class="input-group ">

                                        <input type="number" id="area_land" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" id="basic-addon2">متر مربع</span>
                                        </div>
                                    </div>
                                    <span id="area_land_error" class="text-danger"></span>

                                </div>


                                <div class="col">
                                    <label for="inputName" class="control-label mt-2">مميزات أضافية </label>
                                    <select id="extra_features" name="extra_features" multiple
                                        class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد </option>
                                        <option value="1">مكيف</option>
                                        <option value="2">قراج خاص</option>
                                        <option value="3"> بلكونة</option>
                                        <option value="4"> حديقة</option>
                                        <option value="5"> مدخل خاص</option>
                                        <option value="6"> قرب الخدمات</option>
                                        <option value="7"> بئر ماء</option>
                                        <option value="8"> قرب الخدمات</option>
                                        <option value="9"> حارس</option>
                                        <option value="10"> بركة سباحة</option>
                                    </select>
                                    <span id="extra_features_error" class="text-danger"></span>
                                </div>


                            </div>



                            <div class="row">
                                <div class="col">
                                    <label for="inputName" class="control-label mt-2">السعر</label>

                                    <div class="input-group ">

                                        <input type="number" id="price" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" id="basic-addon2">$</span>
                                        </div>
                                    </div>
                                    <span id="price_error" class="text-danger"></span>
                                </div>

                                <div class="col">
                                    <label for="inputName" class="control-label mt-2"> طريقة الدفع </label>
                                    <select id="pyment_method" name="pyment_method" multiple class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد طريقة الدفع </option>
                                        <option value="1">نقدا</option>
                                        <option value="2"> شيك</option>
                                        <option value="3"> أقساط</option>
                                    </select>
                                    <span id="pyment_method_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-8">
                                    <label for="inputName" class="control-label mt-2">عنوان العرض </label>
                                    <div class="input-group ">
                                        <input type="text" id="title" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2"
                                            placeholder=" أدخل عنوان العرض مثل : شقة تشطيب فاخر">
                                    </div>
                                    <span id="title_error" class="text-danger"></span>
                                </div>
                                <div class="col-12">
                                    <label for="exampleTextarea">وصف العرض</label>
                                    <textarea id="description" class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                                </div>
                                <span id="description_error" class="text-danger"></span>
                            </div>

                        </div>

                        <div id="commercial">
                            <div class="row">

                                <div class="col" id="type_offer_div">
                                    <label for="inputName" class="control-label mt-2">حالة العقار</label>
                                    <select name="Section" id="type_offer" class="form-control SlectBox">
                                        <!--placeholder-->
                                        <option value="0" selected disabled>حدد الغرض</option>
                                        <option value="1"> إيجار</option>
                                        <option value="2"> بيع</option>
                                    </select>
                                    <span id="type_offer_error" class="text-danger"></span>
                                </div>

                                <div class="col" id="area_div">
                                    <label for="inputName" class="control-label mt-2">المساحة</label>

                                    <div class="input-group ">

                                        <input type="number" id="area" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" id="basic-addon2">متر مربع</span>
                                        </div>
                                    </div>
                                    <span id="area_error" class="text-danger"></span>

                                </div>


                                <div class="col">
                                    <label for="inputName" class="control-label mt-2">مميزات أضافية </label>
                                    <select id="extra_features" name="extra_features" multiple
                                        class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد </option>
                                        <option value="1">مكيف</option>
                                        <option value="2">قراج خاص</option>
                                        <option value="3"> بلكونة</option>
                                        <option value="4"> حديقة</option>
                                        <option value="5"> مدخل خاص</option>
                                        <option value="6"> قرب الخدمات</option>
                                        <option value="7"> بئر ماء</option>
                                        <option value="8"> قرب الخدمات</option>
                                        <option value="9"> حارس</option>
                                        <option value="10"> بركة سباحة</option>
                                    </select>
                                    <span id="extra_features_error" class="text-danger"></span>
                                </div>




                            </div>




                            <div class="row">
                                <div class="col">
                                    <label for="inputName" class="control-label mt-2">السعر</label>

                                    <div class="input-group ">

                                        <input type="number" id="price" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" id="basic-addon2">$</span>
                                        </div>
                                    </div>
                                    <span id="price_error" class="text-danger"></span>
                                </div>

                                <div class="col">
                                    <label for="inputName" class="control-label mt-2"> طريقة الدفع </label>
                                    <select id="pyment_method" name="pyment_method" multiple class="form-control SlectBox">
                                        <option value="0" selected disabled>حدد طريقة الدفع </option>
                                        <option value="1">نقدا</option>
                                        <option value="2"> شيك</option>
                                        <option value="3"> أقساط</option>
                                    </select>
                                    <span id="pyment_method_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-8">
                                    <label for="inputName" class="control-label mt-2">عنوان العرض </label>
                                    <div class="input-group ">
                                        <input type="text" id="title" class="form-control"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2"
                                            placeholder=" أدخل عنوان العرض مثل : شقة تشطيب فاخر">
                                    </div>
                                    <span id="title_error" class="text-danger"></span>
                                </div>
                                <div class="col-12">
                                    <label for="exampleTextarea">وصف العرض</label>
                                    <textarea id="description" class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                                </div>
                                <span id="description_error" class="text-danger"></span>
                            </div>
                        </div>


                    </div>
                </div>
            </div> --}}


            <div class="list-group-item py-3 mr-b-30" data-acc-step>
                <h5 class="mb-0" data-acc-title>عنوان العقار<i
                        style="font-size:1.5em; color:rgb(253, 253, 253); float:left" class="si si-location-pin"></i></h5>
                <div data-acc-content>
                    <div class="my-3">

                   
                        <div id='map' style='width:100%; min-height:300px;'></div>

                        <span id="map_error" class="text-danger" style="display: none"> يجب تحديد موقع العقار علي الخريطة. </span>
                        <span id="lat" style="display: none"> 0 </span>
                        <span id="lng" style="display: none"> 0 </span>


                        <div class="row mg-t-340">
                            <div class="col mg-t-30">
                                <label for="inputName" class="control-label">
                                    <h6> المدينة<span style="color:red">*</span> </h6>
                                </label>
                                <select name="city" id="city" class="form-control SlectBox">
                                    <!--placeholder-->
                                    <option value="0" selected disabled>حدد المدينة </option>
                                    @foreach ($city as $row)
                                    <option value="{{$row->id}}" > {{$row->name}} </option>
                                        
                                    @endforeach
                                </select>
                               <span id="city_error" class="text-danger"  style="display: none">يجب تحديد المدينة.</span>

                            </div>
                            <div class="col mg-t-30">
                                <label for="inputName" class="control-label">
                                    <h6> المنطقة <span style="color:red">*</span> </h6>
                                </label>
                                <select name="type_offer" id="test"  class="form-control SlectBox">
                                    <!--placeholder-->
                                    <option value="0" selected disabled>حدد المنطقة</option>
                                </select>
                               <span id="region_error" class="text-danger"  style="display: none">يجب تحديد المنطقة.</span>

                            </div>
                            <div class="col mg-t-30">
                                <label for="inputName" class="control-label">
                                    <h6> أقرب نقطة دالة <span style="color:red">*</span> </h6>
                                </label>
                                <input type="text" id="point" class="form-control " id="inputName" name="name_owner" value="" title="">
                                 <span id="point_error" class="text-danger"  style="display: none">يجب تحديد أقرب نقطة دالة.</span>

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
                        <div>
                            <input id="demo" type="file" name="files"
                                accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
                        </div>
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


    <!-- search plugin Map APi css !-->
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

    <!--  Map APi css !-->
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-language/v1.0.0/mapbox-gl-language.js'></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js'></script>

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


    <script src="{{ URL::asset('officepanal/assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ URL::asset('officepanal/assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>



    <!-- client info  js   first step  -->

    <script>
        $(document).ready(function() {
            var test = 0;
            $('#error_state_client').hide();
            $("#show_new").hide();
            $("#show_old").hide();

            $('input[type="radio"]').click(function() {
                $('#error_state_client').hide();
                var value = $(this).val();

                $("div.custom-radio").hide();
                if (value == 'new') {
                    $("#show_" + value).show();
                } else {
                    $("#show_" + value).show();
                }

            });

            $('.clear').click(function() {
                clear_error();
                $('input[name="state_client"]').prop('checked', false);
                $("#show_new").hide();
                $("#show_old").hide();
                $("div.custom-radio").show();

            });



            // when client he have one offer  or more 
            // $('.test').click(function(){
            //   $('.list-group-item').first().hide();
            // });

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
            $('#lat').text(l);
            $('#lng').text(g);

            marker.setLngLat([g, l]).addTo(map);
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
           
            var options = {
                mode: 'wizard',
                autoButtonsNextClass: 'btn btn-primary mg-l-10  mg-t-380 float-left test-btn',
                autoButtonsPrevClass: 'btn btn-light float-left',
                stepNumberClass: 'badge badge-pill badge-primary mr-1',
                beforeNextStep: function(t) {

                    switch (t) {
                        case 1:

                            // step_one();
                            // if ($('#result_ajax').val() == 1) {
                            //     clear_error();
                            //     return true;
                            // }
                            return true;
                            break;

                        case 2:
                            return true;
                            // if(  step_two() == 1){
                            //   return true;
                            // }else{
                            // return false;
                            // }

                            break;

                        case 3:

                            //    if(step_three()){ return true}else{return false}
                            // return true;

                            step_four();
                           return false;

                            break;

                        case 4:

                           step_four();
                           return false;


                        break;


                    }



                },
                onSubmit: function() {
                    alert('Form submitted!');
                    return true;
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

        function step_one() {

            var state_client = $('input[name="state_client"]:checked').val();
            if (!state_client) {
                $('#error_state_client').show();

            } else {
                if (state_client == 'new') {
                    data = {
                        'state_client': state_client,
                        'name_client': $('#name_client').val(),
                        'phone': $('.new_client_phone').val(),
                    }
                } else {
                    data = {
                        'state_client': state_client,
                        'phone': $('.old_client_phone').val(),
                    }
                }
            }
            var url = '{{ route('office.step_one.offer') }}';

            $.ajax({
                type: "GET",
                url: url,
                data: data,
                cache: false,
                async: false,
                success: function(res) {
                    if (res.state == 400) {
                        clear_error();
                        $('#result_ajax').val('0');
                        if (state_client == 'old') {
                            $('#phone_old_error').empty("");
                            $('#phone_old_error').text(res.errors.phone);
                        } else {
                            $.each(res.errors, function(key, err_value) {
                                $('#' + key + '_error').empty("");
                                $('#' + key + '_error').text(err_value);
                            });
                        }
                    } else {
                        clear_error();
                        $('#result_ajax').val('1');
                    }
                }
            });

        }



        // ###              step two                ###


        function step_two() {

            clear_error();


            if ($('#section option:selected').val() != 'حدد نوع العقار') {

                var type_offer = $('#section').val();
                step_two_edit_form(type_offer);
                //  step_three_process('clear');
                return 1;

            } else {
                $('#section_error').text('يجب تحديد نوع العقار');
                return 0;
            }

        }


        function step_two_edit_form(type) {

            step_two_hidden_forms();


            switch (type) {

                case 'apartment':

                    $('#text_title_detials').text(' - شقق');
                    $('#apartment').show();
                    break;

                case 'houses':
                    $('#text_title_detials').text(' - منازل');
                    $('#houses').show();
                    break;

                case 'villas_palaces':
                    $('#text_title_detials').text(' - فلل-قصور');

                    $('#villas_palaces').show();

                    break;

                case 'lands':
                    $('#text_title_detials').text(' - أراضي');
                    $('#lands').show();

                    break;

                case 'commercial':
                    $('#text_title_detials').text(' - مشاريع تجارية');

                    $('#commercial').show();

                    break;



            }



        }

        function step_two_hidden_forms() {

            $('#apartment').hide();
            $('#houses').hide();
            $('#villas_palaces').hide();
            $('#lands').hide();
            $('#commercial').hide();


        }


        function step_three() {

            step_three_process('clear');
            if (step_three_process('check')) {
                return true
            } else {
                return false
            }


        }

        function step_three_process(type) {



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
                '#type_offer', '#document', '#area_land', '#bathroom', '#price', '#title', '#description',
                '#extra_features', '#pyment_method'
            ];
            var commercial = [
                '#type_offer', '#area', '#price', '#title', '#description', '#extra_features', '#pyment_method'
            ];



            switch ($('#section option:selected').val()) {
                case 'apartment':
                    parametr = apartment
                    break;
                case 'houses':
                    parametr = houses
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




            if (type == 'clear') {
                for (let i = 0; i < parametr.length; i++) {
                    $(parametr[i] + '_error').text('');
                }
            } else if (type == 'check') {
                type = true;
                for (let i = 0; i < parametr.length; i++) {
                    if (!$(parametr[i]).val() || $(parametr[i]).val() == 0) {
                        console.log(parametr[i] + '__ ' + $(parametr[i]).val());

                        $(parametr[i] + '_error').text(' يجب عدم ترك الحقل فارغاّ .')
                        type = false;
                    } else {
                        $(parametr[i] + '_error').text('');
                    }
                }
            }

            return type;
        }


        function step_four(){

            step_four_validation();

        }


        function  step_four_validation(){

            if($('#lat').text() == 0){
                $('#map_error').show();
                return false ;
            }
            if($('select[name="city"]').val()  == null ){
                $('#city_error').show();
                return false ;
            }
            
            if($('#region').val() ==  null ){
                $('#region_error').show();
                return false ;
            }
            if($('#point').val() ==''){
                $('#point_error').show();
                return false ;
            }

            return true;
        }

      

        function clear_error() {
            $('#name_client_error').empty('');
            $('#phone_old_error').empty('');
            $('#phone_error').empty();
            $('#section_error').empty('');
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

                var id_city =  $(this).children("option:selected").val();

                e.preventDefault();
                
                var url = '{{ route('office.step_four_city.offer') }}';
                $.ajax({
                    type: "GET",
                    url: url,
                    data :{'id_city' : id_city},
                    success: function(response){
                      
                    }
                });

            });


        });


</script>


@endsection
