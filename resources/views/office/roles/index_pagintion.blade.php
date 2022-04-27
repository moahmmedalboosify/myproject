{{$i=0}}
<div class="table-responsive">
    <table class="table mg-b-0 text-center text-md-nowrap table-hover ">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>

                        {{-- <button id="viewRole" class="btn btn-success btn-sm" data-target="#showRole"
                            data-toggle="modal" data-role_name="{{ $role->name }}">عرض</button>
                        <button class="btn btn-primary btn-sm" data-target="#editRole"
                            data-toggle="modal">تعديل</button> --}}
                        <button type="button" value="{{ $role->id }}"
                            class="showdetails btn btn-success btn-sm deletebtn">عرض</button>
                        <button type="button" value="{{ $role->id }}"
                            class="btn btn-primary btn-sm editbtn">تعديل</button>


                        {{-- <a class="btn btn-primary btn-sm"
                                href="{{ route('office.edit.roles', $role->id) }}">تعديل</a> --}}


                        {!! Form::open(['method' => 'DELETE', 'route' => ['office.delete.roles', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}



                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $roles->links() !!}
</div>
