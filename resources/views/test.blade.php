@extends('layouts.master')
@section('css')


    <!--Internal   Notify -->
    <link href="{{ URL::asset('officepanal/assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet"
        type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <link href="{{ URL::asset('officepanal/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('officepanal/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">


@section('title')
    صلاحيات المستخدمين
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                صلاحيات المستخدمين</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

<form>
    <label> test</label>
    <select class="js-example-basic-multiple"  style="width:400px;" multiple >
        <option value=""><option>
        <option value="1">Mustard</option>
        <option value="2">Ketchup</option>
        <option value="3">Relish</option>
      </select>
</form>

<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')



<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('officepanal/assets/plugins/treeview/treeview.js') }}"></script>

<!--Internal  Notify js -->
<script src="{{ URL::asset('officepanal/assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('officepanal/assets/plugins/notify/js/notifit-custom.js') }}"></script>

<script>
$(".js-example-basic-multiple").select2({
 
});
</script>

{{-- <script>
 $(document).on('click', '.add_student', function (e) {
            e.preventDefault();
         
            // $(this).text('Sending..');

            var data = {
                'rolename': $('.rolename').val(),
                'permission': $('.test').val(),
                
            }
            console.log(data);
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            // $.ajax({
            //     type: "POST",
            //     url: "/students",
            //     data: data,
            //     dataType: "json",
            //     success: function (response) {
            //         // console.log(response);
            //         if (response.status == 400) {
            //             $('#save_msgList').html("");
            //             $('#save_msgList').addClass('alert alert-danger');
            //             $.each(response.errors, function (key, err_value) {
            //                 $('#save_msgList').append('<li>' + err_value + '</li>');
            //             });
            //             $('.add_student').text('Save');
            //         } else {
            //             $('#save_msgList').html("");
            //             $('#success_message').addClass('alert alert-success');
            //             $('#success_message').text(response.message);
            //             $('#AddStudentModal').find('input').val('');
            //             $('.add_student').text('Save');
            //             $('#AddStudentModal').modal('hide');
            //             fetchstudent();
            //         }
            //     }
            // });

        });



</script> --}}


@endsection
