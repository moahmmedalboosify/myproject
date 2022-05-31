<div class="table-responsive">
    <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
        <thead>
            <tr>
                <th class="wd-10p border-bottom-0">#</th>
                <th class="wd-15p border-bottom-0">أسم الزبون</th>
                <th class="wd-20p border-bottom-0"> رقم الهاتف</th>
                <th class="wd-15p border-bottom-0"> المستخدم</th>
                <th class="wd-10p border-bottom-0">
                   
                </th>
            </tr>
        </thead>
        <tbody>
            @php
              $i=0;  
            @endphp
         
            @foreach ($data as $key => $row)
                <tr>
                    <td>{{ $modal_name }}</td>
                    <td >{{ $row->clients->name }}</td>
                    @if($modal_name != 'commercial')
                    <td>{{ $row->clients->phone }}</td>
                    @endif
                    <td> <label class="badge badge-success">{{ $row->users->email }}</label> </td>
                    <td>
                     <button id="edit_client_btn" data-name="{{$row->clients->name}}"  data-phone="{{ $row->clients->phone}}"  data-value="{{$row->clients->id}}" class="btn btn-sm btn-info"
                                title="تعديل"><i class="las la-pen"></i></button>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</div> 