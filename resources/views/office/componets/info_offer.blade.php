
<div class="row">

    <div class="col-12">
        <h2 class="content-title mt-3 my-auto"> معلومات العقار /</h2> <br>
    </div>

    <div class="col">
        <label for="inputName" class="control-label mt-2">رقم العقار</label>
        <input type="text" class="form-control" id="inputName" name="invoice_number" title="يرجي ادخال رقم العقار"
            required>
    </div>

    <div class="col">
        <label for="inputName" class="control-label mt-2">الغرض</label>
        <select name="f" class="form-control SlectBox">
            <!--placeholder-->
            <option value="0" selected disabled>حدد الغرض</option>
            <option value="1"> ايجار</option>
            <option value="2"> بيع</option>
        </select>
    </div>



    <div class="col">
        <label for="inputName" class="control-label mt-2">نوع الوثائق</label>
        <select name="ff" class="form-control SlectBox">
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

    <div class="col">
        <label for="inputName" class="control-label mt-2">المساحة</label>

        <div class="input-group">

            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append ">
                <span class="input-group-text" id="basic-addon2">متر مربع</span>
            </div>
        </div>
    </div>
    @if (session()->get('offer_data.type_offer') == 'villas_palaces' || session()->get('offer_data.type_offer') == 'houses')
        <div class="col">
            <label for="inputName" class="control-label mt-2">المساحة الأرض</label>

            <div class="input-group">

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
        <select id="product" name="product"   name="cat[]" class="form-control SlectBox">
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
    <div class="col">
        <label for="inputName" class="control-label mt-2">السعر</label>

        <div class="input-group">

            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append ">
                <span class="input-group-text" id="basic-addon2">$</span>
            </div>
        </div>
    </div>

    <div class="col">
        <label for="inputName" class="control-label mt-2"> طريقة الدفع </label>
        <select id="product" name="product"  data-live-search="true" name="cat[]" class="form-control SlectBox">
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
        <div class="input-group">
            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2"
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
