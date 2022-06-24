
<div class="table-responsive">
    <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
        <thead>
            <tr>
                <th class="wd-5p border-bottom-0">#</th>
                
                <th class="wd-10p border-bottom-0">الرسالة</th>
                <th class="wd-10p border-bottom-0">حالة الطلب</th>
                <th class="wd-10p border-bottom-0"> إسم الزبون</th>
                <th class="wd-10p border-bottom-0"> رقم الزبون</th>
                <th class="wd-10p border-bottom-0"> رقم العقار</th>
                 {{-- ->offer->number_offer --}}
                <th class="wd-10p border-bottom-0">تاريخ الإنشاء</th>
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
                    <td>{{ $row->message }}</td>
                    <td> <label class="badge badge-success">{{ $row->state }}</label> </td>
                    <td>{{  $row->phone['name'] }}</td>
                    <td>{{  $row->phone['phone'] }}</td>
                 
                    <td>
                        <a title="عرض العقار" href="{{route('office.view_offer.offer',['id' =>$row->offer->id])}}">
                            {{  $row->offer->number_offer }}
                        </a>
                    </td>
                  
                   
                    <td>{{date('d-m-Y', strtotime( $row->created_at))}} </td>
                 

                    <td>

                      @if($row->state == 'قيد التنفيذ')
                          @can('إرسال بريدالألكتروني إلي العميل')
                            <a  id="send_email_btn" data-id="{{$row->id }}" data-email="{{$row->phone['email'] }}" data-name="{{$row->phone['name']}}" class="btn btn-sm btn-success" title="إرسال بريدالألكتروني إلي العميل"> 
                            <i class="fa fa-paper-plane"></i></a> <br>
                          @endcan
                     @endif

                         @can('حذف الطلب')
                            <a  id="delete_preview_btn"  data-id="{{$row->id }}"  class="btn btn-sm btn-danger" title="حذف  الطلب"><i
                                        class="las la-trash"></i></a>
                          @endcan
                        
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


    


