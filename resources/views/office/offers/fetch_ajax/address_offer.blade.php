<div class="table-responsive">
   

    <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
        <thead>
            <tr>
                <th class="wd-10p border-bottom-0">#</th>
                <th class="wd-15p border-bottom-0"> المدينة</th>
                <th class="wd-15p border-bottom-0"> المنطقة </th>
                <th class="wd-15p border-bottom-0"> نقطة دالة</th>
                <th class="wd-15p border-bottom-0">الخريطة</th>
                <th class="wd-15p border-bottom-0">العمليات</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{$city->name}}</td>
                <td>{{$data->regions->name}}</td>
                <td>{{$sub_model->point}}</td>
                <td> <button data-lat={{$sub_model->lat}} data-lng={{$sub_model->lng}}  type="button" id="address_offer_btn" class="btn btn-sm btn-success" title="عرض الوصف"><i
                            class="fa fa-info-circle" aria-hidden="true"></i>
                    </button></td>
                <td> <button id="edit_address_offer_btn" data-id_offer="{{$data->id}}"  data-model="{{$data->model_name}}" data-id="{{$data->model_id}}" data-city="{{$city->name}}" data-region="{{$data->regions->name}}"  data-point="{{$sub_model->point}}"  class="btn btn-sm btn-info" title="تعديل"><i
                            class="las la-pen"></i></button></td>
                       
            </tr>
        </tbody>
    </table>

</div>

<div class="modal" id="address_offer_modal">
    <div class="modal-dialog modal-lg" role="document">
      
     
         
            <div style="width: 100%; height:400px ;" id="map_show">
            </div>

         
     
    </div>
</div>


<div class="modal" id="edit_address_offer_model">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content tx-size-sm"">
            <div class="modal-header">
                <h6 class="modal-title"> تحديث  عنوان العقار</h6><button aria-label="Close"
                    class="close" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row mg-t-340">
                    <div class="col mg-t-30">
                        <label for="inputName" class="control-label">
                            <h6> المدينة<span style="color:red">*</span> </h6>
                        </label>
                        <select name="city" id="city_edit" class="form-control">
                            <!--placeholder-->
                            <option value=" " >حدد المدينة </option>
                            <option value="1"> طرابلس</option>
                            <option value="3">مصراته </option>
                            <option value="2"> بنغازي</option>
                            <option value="صبراته"> صبراته </option>
                            <option value="الزاوية">الزاوية </option>
                           
                        </select>
                        <span id="city_error" class="text-danger" style="display: none">يجب تحديد
                            المدينة.</span>

                    </div>
                    <div class="col mg-t-30">
                        <label for="inputName" class="control-label">
                            <h6> المنطقة <span style="color:red">*</span> </h6>
                        </label>
                        <select name="region" id="region_edit" class="form-control">
                            <!--placeholder-->
                            <option value=" " selected disabled>حدد المنطقة</option>
                        </select>
                        <span id="region_error" class="text-danger" style="display: none">يجب تحديد
                            المنطقة.</span>
                        
                    </div>
                    <div class="col mg-t-30">
                        <label for="inputName" class="control-label">
                            <h6> أقرب نقطة دالة <span style="color:red">*</span> </h6>
                        </label>
                        <input type="text" id="point_edit" name="point" class="form-control " id="inputName"
                            name="name_owner" value="" title="">
                        <span id="point_error" class="text-danger" style="display: none">يجب تحديد أقرب نقطة
                            دالة.</span>

                    </div>
                </div>

                

               
            </div>

            <div class="modal-footer">
                <button class="btn ripple btn-primary edit_address_offer_save" type="button">تحديث</button>
                <button class="btn ripple btn-secondary close_edit_address" type="button">رجوع</button>
            </div>
        </div>
    </div>
</div> 