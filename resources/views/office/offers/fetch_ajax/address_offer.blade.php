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
                <td> <button id="edit_details_offer_modal" class="btn btn-sm btn-info" title="تعديل"><i
                            class="las la-pen"></i></button></td>

            </tr>
        </tbody>
    </table>

</div>

<div class="modal" id="address_offer_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-md">
         
   
            <div class=" card-header tx-medium bd-0 tx-white bg-primary">
                موقع العقار علي الخريطة  :  
            </div>
            <div class="card-body">
                <div style="width:300px; heigth:300px" id="map">
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn ripple btn-secondary close_details_offer_modal" type="button">رجوع</button>
            </div>
        </div>
    </div>
</div>