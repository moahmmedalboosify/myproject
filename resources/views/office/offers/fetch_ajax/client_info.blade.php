
    <div class="table-responsive">
        <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
            <thead>
                <tr>
                    <th class="wd-10p border-bottom-0">#</th>
                    <th class="wd-15p border-bottom-0">أسم الزبون</th>
                    <th class="wd-20p border-bottom-0"> رقم الهاتف</th>
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
                        <td >{{ $data->clients->name }}</td>
                        <td>{{ $data->clients->phone }}</td>
                        
                        <td> <label class="badge badge-success">{{$data->user->email }}</label> </td>
                   
                        <td>
                         <button id="edit_client_btn" data-name="{{$data->clients->name}}"  data-phone="{{ $data->clients->phone}}"  data-value="{{$data->clients->id}}" class="btn btn-sm btn-info"
                                    title="تعديل"><i class="las la-pen"></i></button>
                        </td> 
                    </tr>
              
            </tbody>
        </table>
    </div> 

    <div class="modal" id="edit_client_info">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content tx-size-sm"">
                <div class="modal-header">
                    <h6 class="modal-title"> تحديث  معلومات الزبون</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="">
    
                        <div class="row">
                            <div class=" col-12">
                                <label>إسم الزبون: <span class="tx-danger">*</span></label>
                                <input class="form-control  mg-t-5"
                                    data-parsley-class-handler="#lnWrapper" id="name_client" required=""
                                    type="text">
                                <span id="name_client_error">
                                </span>
                            </div>
                          
                            <div class="col-12 mg-t-20  mg-t-20" >
                                <label> رقم الهاتف: <span class="tx-danger">*</span></label>
                                <input class="form-control mg-t-5"
                                    data-parsley-class-handler="#lnWrapper" id="phone_client" required=""
                                    type="email">
                                <span id="phone_client_error">
                                </span>
                            </div>
                            
                        </div>
    
                    </div>
    
                    
    
                   
                </div>
    
                <div class="modal-footer">
                    <button class="btn ripple btn-primary edit_client_save" type="button">تحديث</button>
                    <button class="btn ripple btn-secondary close_edit_client_info" type="button">رجوع</button>
                </div>
            </div>
        </div>
    </div> 
