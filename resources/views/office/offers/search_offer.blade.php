<div class="row">


  
  <div class="col-3">
    <label for="inputName" class="control-label mt-2">رقم العقار</label>

    <div class="input-group ">

        <input type="number" id="area" name="area" class="form-control"
            aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append ">
            <span class="input-group-text" id="basic-addon2">متر مربع</span>
        </div>
    </div>
  </div>  


  <div class="col-3">
      <label for="inputName" class="control-label">
          <h5> نوع العقار </h5>
      </label>
      <select name="section" id="section" class="form-control SlectBox">
          <!--placeholder-->
          <option>حدد النوع</option>
          <option value="apartment"> شقق</option>
          <option value="houses"> منازل </option>
          <option value="villas_palaces"> فلل-قصور </option>
          <option value="lands"> أراضي </option>
          <option value="commercial"> تجاري </option>
      </select>
  </div> 
  
  <div class="col-3">
    <select name="type_offer" id="type_offer" class="form-control SlectBox">
      <!--placeholder-->
      <option value="0" selected disabled>حدد الغرض</option>
      <option value="البيع"> البيع</option>
      <option value="الإيجار"> الإيجار</option>
    </select>
  </div>  



  <div class="col-3">
    <label for="inputName" class="control-label mt-2">المساحة</label>

    <div class="input-group ">

        <input type="number" id="area" name="area" class="form-control"
            aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append ">
            <span class="input-group-text" id="basic-addon2">متر مربع</span>
        </div>
    </div>
  </div>  

 
</div>