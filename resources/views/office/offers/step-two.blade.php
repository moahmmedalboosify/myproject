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
    <link rel="stylesheet"
        href="{{ URL::asset('officepanal/assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <!-- Internal image uplode css -->
    <link rel="stylesheet" href="{{ URL::asset('officepanal/css/test.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

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
                    اضافة عقار</span>
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
                    <div class="col-12">
                        <h2 class="content-title mb-0 my-auto"> معلومات العقار /</h2> <br>
                    </div>

                    <form  action="{{ route('check.step.two') }} " method="post" 
                        enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label mt-2">رقم العقار</label>
                                <input type="text" class="form-control" id="inputName" name="invoice_number"
                                    title="يرجي ادخال رقم العقار" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label mt-2">الغرض</label>
                                <select name="Section" class="form-control SlectBox">
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد الغرض</option>
                                    <option value="1"> ايجار</option>
                                    <option value="2"> بيع</option>
                                </select>
                            </div>



                            <div class="col">
                                <label for="inputName" class="control-label mt-2">نوع الوثائق</label>
                                <select name="Section" class="form-control SlectBox">
                                    <!--placeholder-->
                                    <option value="0" selected disabled>حدد الوثيقة</option>
                                    <option value="1"> شهادة عقارية</option>
                                    <option value="2"> تخصيص</option>
                                    <option value="3"> غير مسجلة</option>
                                </select>
                            </div>

                        </div>

                        {{-- 2 --}}
                        <div class="row">

                            <div class="col ">
                                <label for="inputName" class="control-label mt-2">المساحة</label>

                                <div class="input-group ">

                                    <input type="text" class="form-control" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append ">
                                        <span class="input-group-text" id="basic-addon2">متر مربع</span>
                                    </div>
                                </div>
                            </div>
                            @if (session()->get('offer_data.type_offer') == 'villas_palaces' || session()->get('offer_data.type_offer') == 'houses')
                                <div class="col ">
                                    <label for="inputName" class="control-label mt-2">المساحة الأرض</label>

                                    <div class="input-group ">

                                        <input type="number" class="form-control" aria-label="Recipient's username"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text" id="basic-addon2">متر مربع</span>
                                        </div>
                                    </div>
                                </div>
                            @endif








                            <div class="col">
                                <label for="inputName" class="control-label mt-2">الغرف</label>
                                <select id="product" name="product" class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد عدد الغرف</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="+4">+4</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label mt-2">دورات المياه</label>
                                <select id="product" name="product" class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد عدد دورات المياه</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="+4">+4</option>
                                </select>
                            </div>
                        </div>


                        {{-- 3 --}}

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label mt-2">الطابق</label>
                                <select id="product" name="product" class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد الطابق</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="+4">+4</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label mt-2">عمر البناء</label>
                                <select id="product" name="product" class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد عمر البناء </option>
                                    <option value="1">جديد</option>
                                    <option value="2">1-5 سنة</option>
                                    <option value="3">6-10 سنة</option>
                                    <option value="+4">+10 سنة</option>
                                </select>
                            </div>

                            {{-- $input['cat'] = json_encode($input['cat']); --}}
                            <div class="col">
                                <label for="inputName" class="control-label mt-2">مميزات أضافية </label>
                                <select id="product" name="product" multiple data-live-search="true" name="cat[]"
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
                            </div>

                        </div>

                        {{-- 4 --}}

                        <div class="row">
                            <div class="col ">
                                <label for="inputName" class="control-label mt-2">السعر</label>

                                <div class="input-group ">

                                    <input type="text" class="form-control" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append ">
                                        <span class="input-group-text" id="basic-addon2">$</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label mt-2"> طريقة الدفع </label>
                                <select id="product" name="product" multiple data-live-search="true" name="cat[]"
                                    class="form-control SlectBox">
                                    <option value="0" selected disabled>حدد طريقة الدفع </option>
                                    <option value="1">نقدا</option>
                                    <option value="2"> شيك</option>
                                    <option value="3"> أقساط</option>


                                </select>
                            </div>



                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col-8">
                                <label for="inputName" class="control-label mt-2">عنوان العرض </label>
                                <div class="input-group ">
                                    <input type="text" class="form-control" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2"
                                        placeholder=" أدخل عنوان العرض مثل : شقة تشطيب فاخر">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col">
                                <label for="exampleTextarea" class="mt-2"> الوصف </label>
                                <textarea id="editor" class="form-control" id="exampleTextarea" name="note" rows="5"></textarea>

                            </div>
                        </div><br>

                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                        <h5 class="card-title">المرفقات</h5>

                        <div class="col-12"  >
                            {{-- <input type="file" name="pic[]"  class="dropzone" id="dropzone"  multiple
                                accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" /> --}}

                                <div class="user-image mb-3 text-center">
                                    <div class="imgPreview" style="padding=8px max-width=100px"> </div>
                                </div>            
                                <div class="">
                                    <input type="file" name="imageFile[]"  class="dropify" id="images" >
                                </div>
                               
                                
            
                        </div><br>



                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
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


    <script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });    
    </script>


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
    <!--Internal  Form-elefments js-->
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
    <!-- Internal image uplode js -->
  



@endsection
