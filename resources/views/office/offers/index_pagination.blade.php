
<div class="table-responsive">
    <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
        <thead>
            <tr>
                <th class="wd-10p border-bottom-0">#</th>
                <th class="wd-15p border-bottom-0">رقم العقار</th>
                <th class="wd-20p border-bottom-0"> نوع العقار</th>
                <th class="wd-15p border-bottom-0"> غرض العقار</th>
                <th class="wd-15p border-bottom-0"> المستخدم</th>
                <th class="wd-10p border-bottom-0">العمليات</th>
            </tr>
        </thead>
        <tbody>
            @php
              $i=0;  
            @endphp
            @foreach ($data as $key => $row)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $row->number_offer }}</td>
                    <td>{{ $row->model_name }}</td>
                    <td>{{ $row->state }}</td>
                  
                    <td> <label class="badge badge-success">{{ $user->email }}</label> </td>
                
                    {{-- <td>
                        @if ($user->state_account == '1')
                            <span class="label align-center text-success d-flex">
                                <div class="dot-label bg-success ml-1"></div>مفعل 
                            </span>
                        @else
                            <span class="label text-danger d-flex">
                                <div class="dot-label bg-danger ml-1"></div>غير مفعل
                            </span>
                        @endif
                    </td>

                    <td>
                      

                    </td> --}}

                    <td>

                    <div class="dropdown">
                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                        data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                        <div  class="dropdown-menu tx-13">
                           
                            <a id="edit_user_btn"  href="{{route('office.view_offer.offer',['id' =>$row->id])}}" class="btn btn-sm btn-info"
                                title="عرض التفاصيل"><i class="fa fa-eye" aria-hidden="true"></i></a>

                            <a   id="delete_user_btn"  value="" class="btn btn-sm btn-success" title=" تغيير الحالة تم البيع"> 
                                <i class="fas fa-dollar-sign"></i></a>
                                
                            <a   id="delete_user_btn"  value="" class="btn btn-sm btn-danger" title="حذف العقار"><i
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