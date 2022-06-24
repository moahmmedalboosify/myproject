
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
                    <td>
                        @switch($row->model_name)
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
                    <td>{{ $row->state }}</td>
                  
                    <td> <label class="badge badge-success">{{ $row->user->email }}</label> </td>
                
                    <td>

                    <div class="dropdown">
                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                        data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                        <div  class="dropdown-menu tx-13">
                            @can('عرض عقار')
                            <a id="edit_user_btn"  href="{{route('office.view_offer.offer',['id' =>$row->id])}}" class="btn btn-sm btn-info"
                                title="عرض التفاصيل"><i class="fa fa-eye" aria-hidden="true"></i></a>
                           @endcan
                                @can('تغيير حالة العقار تم البيع')
                            <a   id="solid_offer_btn" data-id="{{$row->id}}" class="btn btn-sm btn-success" title=" تغيير الحالة تم البيع"> 
                                <i class="fas fa-dollar-sign"></i></a>
                                @endcan
                                @can('حذف عقار')
                            <a   id="delete_offer_btn"  data-id="{{$row->id}}"class="btn btn-sm btn-danger" title="حذف العقار"><i
                                            class="las la-trash"></i></a>
                                  @endcan
                        </div>
                    </div>
                       
                     
                       
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->links() !!}
</div>