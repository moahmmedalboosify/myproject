
<div class="table-responsive">
    <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
        <thead>
            <tr>
                <th class="wd-5p border-bottom-0">#</th>
                <th class="wd-10p border-bottom-0">نوع العقار</th>
                <th class="wd-10p border-bottom-0">المساحة</th>
                <th class="wd-15p border-bottom-0">مزيا إضافية</th>
                <th class="wd-15p border-bottom-0">الوصف</th>
                <th class="wd-15p border-bottom-0">العنوان</th>
                <th class="wd-10p border-bottom-0">حالة الطلب</th>
                <th class="wd-15p border-bottom-0">رقم الهاتف</th>
                <th class="wd-5p border-bottom-0">تاريخ الإنشاء</th>
                <th class="wd-20p border-bottom-0">العمليات</th>
            </tr>
        </thead>
        <tbody>
      
            @php
                $i=0;  
            @endphp
            @foreach ($data as $key => $row)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $row->type_request }}</td>
                    <td>{{ $row->area }}</td>
                    <td>{{ $row->extra_features }}</td>
                    <td>{{ $row->message }}</td>
                    <td>{{ $row->address }}</td>
                    <td> <label class="badge badge-success">{{ $row->state }}</label> </td>
                    <td>{{ $client_phone->phone }}</td>
                        <td>{{date('d-m-Y', strtotime( $row->created_at))}} </td>

                    <td>

                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                            data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                            <div  class="dropdown-menu tx-13">
                                @if($row->state == 'تم التواصل مع الزبون')
                                <a id="show_email_btn" data-id="{{$row->id }}" class="btn btn-sm btn-info"
                                    title="عرض البريد الألكتروني"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <br>
                                    @endif
                                    <a  id="send_email_btn" data-id="{{$row->id }}" data-email="{{$client_phone->email }}" data-name="{{$client_phone->name }}" class="btn btn-sm btn-success" title="إرسال بريدالألكتروني إلي العميل"> 
                                    <i class="fa-light fa-envelope"></i></a> <br>
                                    
                                <a  id="delete_private_btn"  data-id="{{$row->id }}"  class="btn btn-sm btn-danger" title="حذف العقار"><i
                                                class="las la-trash"></i></a>
                            
                            </div>
                        </div>
                        
                        
                    </td>
                
                
                    
                        
                
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->links() !!}
</div>




<div class="modal" id="send_email_modal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header">
                <h6 class="modal-title">إعادة توجية الطلب</h6><button aria-label="Close"
                    class="close" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <label for="exampleTextarea">الرسالة :</label>
                    <textarea id="message_to_email" name="description" class="form-control" id="exampleTextarea" name="note"
                        rows="3"></textarea>
                </div>
                <span id="description_error" class="text-danger"></span>

            </div>

            <div class="modal-footer">
                <button class="btn ripple btn-success send_email_client" type="button">إرسال</button>
                <button class="btn ripple btn-secondary close_send_email_client" type="button">رجوع</button>
            </div>
        </div>
    </div>
</div> 


<div class="modal" id="show_email_modal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header">
                <h6 class="modal-title"> إعادة توجيه طلب خاص</h6><button aria-label="Close"
                    class="close" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <p id="show_content_email" class="mg-b-5">

                    </p>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-secondary close_show_email_client" type="button">رجوع</button>
            </div>
        </div>
    </div>
</div> 


    


