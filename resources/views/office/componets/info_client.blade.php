

<div class="row">

    <div class="col-12">
        <h2 class="content-title mb-0 my-auto"> نوع العقار /</h2> <br>
    </div>
    <br>

    <div class="col">
                <label for="inputName" class="control-label">
                    <h5> القسم </h5>
                </label>
                <select name="type_offer" class="form-control SlectBox">
                    <!--placeholder-->
                    <option value="0" selected disabled>حدد نوع العقار</option>
                    <option value="apartment"> شقق</option>
                    <option value="houses"> منازل </option>
                    <option value="villas_palaces"> فلل-قصور </option>
                    <option value="lands"> أراضي </option>
                    <option value="commercial"> تجاري </option>

                </select>
                @error('type_offer')
                    <div class="alert alert-danger">
                        <strong> {{ $message }} </strong>
                    </div>
                @enderror
        </div>
   


<br>
<br>
<hr>
<br>
<br>



    <div class="col-12">
        <h2 class="content-title mb-0 my-auto"> معلومات الزبون /</h2> <br> <br>
    </div>

    <div class="col">
        <label for="inputName" class="control-label">
            <h5> أسم الزبون </h5>
        </label>
        <input type="text" class="form-control" id="inputName" name="name_owner"
            value="{{ old('name_owner') }}" title="يرجي ادخال أسم الزبون">

        @error('name_owner')
            <div class="alert alert-danger">
                <strong> {{ $message }} </strong>
            </div>
        @enderror



    </div>

    <div class="col">
        <label for="inputName" class="control-label">
            <h5> رقم الزبون </h5>
        </label>
        <input type="text" class="form-control" id="inputName" name="phone"
            value="{{ old('phone') }}" title="يرجي ادخال رقم الزبون">
        @error('phone')
            <div class="alert alert-danger">
                <strong> {{ $message }} </strong>
            </div>
        @enderror
    </div>

</div>
