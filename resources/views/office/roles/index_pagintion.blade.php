<?php  $i=0; ?>
<div class="table-responsive">
    <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
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
                    @can('عرض صلاحية')
                        <button type="button" value="{{ $role->id }}"
                            class="showdetails btn btn-success btn-sm ">عرض</button>
                    @endcan
                    @can('تعديل صلاحية')
                        <button type="button" value="{{ $role->id }}"
                            class="btn btn-primary btn-sm editbtn">تعديل</button>
                    @endcan
                    @can('حذف صلاحية')
                        <button class="btn btn-danger btn-sm deletebtn" value="{{ $role->id }}">حذف</button>
                    @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $roles->links() !!}
</div>
