<div class="table-responsive">
    <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
        <thead>
            <tr>
                <th class="wd-10p border-bottom-0">#</th>
                <th class="wd-15p border-bottom-0"> رقم العقار</th>
                <th class="wd-15p border-bottom-0"> نوع العقار</th>
                <th class="wd-15p border-bottom-0"> غرض العقار</th>
                <th class="wd-15p border-bottom-0"> حالة العرض</th>
                <th class="wd-15p border-bottom-0"> عدد المشاهدات</th>
                <th class="wd-15p border-bottom-0"> المستخدم</th>
                <th class="wd-10p border-bottom-0">العمليات</th>
            </tr>
        </thead>
        <tbody>
            @php
              $i=0;  
            @endphp
           
                <tr>
                    <td>{{ ++$i }}</td>
                    <td >{{ $data->number_offer }}</td>
                    <td>
                       @switch($data->model_name)
                           @case('commercial')
                                 تجاري
                               @break
                           @case('lands')
                                 أراضي
                               @break
                            @case('apartment')  
                                شقق
                               @break
                            @case('houses')
                               منازل
                               @break   
                            @case('villas_palaces')
                              فلل-قصور
                               @break   
                       @endswitch

                    </td>
                    <td>{{ $data->state }}</td>
                    @if($data->state_offer == 1)
                        <td> <label  class="badge badge-success">مفعل</label>  </td>   
                    @else
                    <td> <label class="badge badge-danger">غير مفعل</label> </td>   
                    @endif
                    <td>{{ $data->views }}</td>
                    
                    <td> <label class="badge badge-success">{{$data->user->email}}</label> </td>
                                <td>
                     <button id="edit_offer_info_btn" data-value="{{$data->id}}" data-number_offer="{{ $data->number_offer }}" data-type_offer="{{$data->model_name}}"
                        data-state="{{ $data->state }}" data-state_offer="{{ $data->state_offer }}"  data-views="{{ $data->views }}"  data-user="{{ $data->user->email }}" class="btn btn-sm btn-info"
                                title="تعديل"><i class="las la-pen"></i></button>
                    </td> 
                    
                </tr>
        </tbody>
    </table>
</div> 



<div class="modal" id="edit_offer_info">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تحديث معلومات العقار</h6><button aria-label="Close"
                    class="close" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               

                <div class="row   mg-b-20">
                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <label>رقم العقار: <span class="tx-danger">*</span></label>
                        <input disabled class="form-control form-control-sm "
                            data-parsley-class-handler="#lnWrapper" id="number_offer" required=""
                            type="text">
                        <span id="user_name_error">
                        </span>
                    </div>

                     <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label>نوع العقار: <span class="tx-danger">*</span></label>
                        
                            <select name="type_offer" id="type_offer" class="form-control  nice-select  custom-select">
                                <option value="">
    
                                </option>
                                <option value="apartment"> شقق</option>
                                <option value="houses"> منازل </option>
                                <option value="villas_palaces"> فلل-قصور </option>
                                <option value="lands"> أراضي </option>
                                <option value="commercial"> تجاري </option>

                            </select>
                        <span id="email_error">
                        </span>
                     </div>
                </div>
              
                <div class="row mg-b-20">
                    <div class="col-lg-6">
                        <label class="form-label">غرض العقار : <span class="tx-danger">*</span> </label>
                        <select name="state" id="state" class="form-control  nice-select  custom-select">
                            <option value="">

                            </option>
                            <option class="text-success" value="البيع">
                                البيع
                            </option>
                            <option class="text-danger" value="الإيجار">
                                الإيجار
                            </option>
                        </select>
                        <span id="state_offer_error">
                        </span>
                    </div>
                      <div class="col-lg-6">
                        <label class="form-label">حالة العقار :<span class="tx-danger">*</span></label>
                        <select name="state_offer" id="state_offer" class="form-control  nice-select  custom-select">
                            <option value="">

                            </option>
                            <option class="text-success" value="1">
                                مفعل
                            </option>
                            <option class="text-danger" value="0">
                                غير مفعل
                            </option>
                        </select>
                        <span id="state_error">
                        </span>

                    </div>
                </div>

               
                <div class="row   mg-b-20">
                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <label> عدد المشاهدات:</label>
                        <input disabled class="form-control form-control-sm "
                            data-parsley-class-handler="#lnWrapper" id="views" required=""
                            type="text">
                        <span id="user_name_error">
                        </span>
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label>المستخدم:</label>
                        <input disabled class="form-control form-control-sm"
                            data-parsley-class-handler="#lnWrapper" name="type_offer" id="user" 
                            type="text">
                        <span id="email_error">
                        </span>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary edit_offer_info_save" type="button">تحديث</button>
                <button class="btn ripple btn-secondary close_edit_offer_info">رجوع</button>
            </div> 
        </div>
    </div>
</div>