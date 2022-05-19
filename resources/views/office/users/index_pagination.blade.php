<div class="table-responsive">
    <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
        <thead>
            <tr>
                <th class="wd-10p border-bottom-0">#</th>
                <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                <th class="wd-20p border-bottom-0">البريد الالكتروني</th>
                <th class="wd-15p border-bottom-0">حالة المستخدم</th>
                <th class="wd-15p border-bottom-0">نوع المستخدم</th>
                <th class="wd-10p border-bottom-0">العمليات</th>
            </tr>
        </thead>
        <tbody>
            @php
              $i=0;  
            @endphp
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
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
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif

                    </td>

                    <td>
                      @can('تعديل مستخدم')
                            <button id="edit_user_btn"  value="{{$user->id}}" class="btn btn-sm btn-info"
                                title="تعديل"><i class="las la-pen"></i></button>
                       @endcan

                       @can('حذف مستخدم')
                        <button   id="delete_user_btn"  value="{{$user->id}}" class="btn btn-sm btn-danger" title="حذف"><i
                                    class="las la-trash"></i></button>
                        @endcan
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->links() !!}
</div>