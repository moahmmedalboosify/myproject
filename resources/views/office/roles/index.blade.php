@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('officepanal/assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet"
        type="text/css" />



    <link href="{{ URL::asset('officepanal/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


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


@if (session()->has('Add'))
    <script>
        window.onload = function() {
            notif({
                msg: " تم اضافة الصلاحية بنجاح",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            notif({
                msg: " تم تحديث بيانات الصلاحية بنجاح",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: " تم حذف الصلاحية بنجاح",
                type: "error"
            });
        }
    </script>
@endif

<!-- row -->

<div class="row row-md">
    <div class="col-xl-12">
        <div id="success_message">
        </div>
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">

                            <a class="btn btn-success  btn-md col-sm-6 col-md-2 mg-t-10" data-target="#AddRoleModal"
                                data-toggle="modal">اضافة</a>

                        </div>
                    </div>
                    <br>
                </div>

            </div>
       


            <div class="card-body">

                <div id="table_data">

                  @include('office.roles.index_pagintion')
               

                </div>
            </div>

            <div class="modal fade" id="AddRoleModal" tabindex="-1" aria-labelledby="AddStudentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddStudentModalLabel">أضافة صلاحية جديده</h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <ul id="save_msgList"></ul>

                            <div class="form-group">
                                <form method="POST">


                                    <label for="inputName" class="control-label mt-2"> أسم الصلاحية :</label>
                                    <input type="text" class="form-control name_role" id="addRoleName" name="name_role"
                                        title="يرجي أدخال أسم الصلاحية " required>


                                    <label for="inputName" class="control-label mt-5"> الأذونات :</label>
                                    <br>
                                    <select name="select_permission"
                                        class="form-control select_permission js-example-basic-multiple"
                                        style="width:466px;" multiple title="يرجي  تحديد الأذونات " required="true">
                                        <option value="">
                                        <option>
                                            @foreach ($permission as $value)
                                        <option value="{{ $value->id }}"> {{ $value->name }}
                                        <option>
                                            @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-secondary closeModel" type="button">رجوع</button>
                            <button class="btn ripple btn-success add_student" type="button">حفظ</button>

                            {{-- <button type="button" class="btn btn-success add_student">حفظ</button> --}}
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal" id="showRole">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">الصلاحيات - الأذونات</h6><button aria-label="Close"
                                class="close" data-dismiss="modal" type="button"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

                            <!-- Select2 -->
                            <div class="col-lg-4">
                                <ul id="treeview1">
                                    <li><a id="viewNameRole"></a>
                                        <ul id="viewRolePermissions">


                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- Select2 -->
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">رجوع</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="editRole">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">الصلاحيات - تعديل الصلاحيات</h6><button aria-label="Close"
                                class="close" data-dismiss="modal" type="button"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <ul id="save_msgList"></ul>

                            <div class="form-group">
                                <form method="POST">
                                 

                                    <input type="hidden" id='idRoleEdie' value="">

                                    <label for="inputName" class="control-label mt-2"> أسم الصلاحية :</label>
                                    <input type="text" class="form-control name_role" id="roleName" name="name_role"
                                        title="يرجي أدخال أسم الصلاحية " required>


                                    <label for="inputName" class="control-label mt-5"> الأذونات :</label>
                                    <br>
                                    <select name="select_permission" id="editPermissions"
                                        class="form-control select_permission js-example-basic-multiple"
                                        style="width:466px;" multiple title="يرجي  تحديد الأذونات " required="true">
                                        <option value="">
                                        <option>
                                           
                                    </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-secondary closeModel" type="button">رجوع</button>
                            <button class="btn ripple btn-success add_student" type="button">حفظ</button>

                            {{-- <button type="button" class="btn btn-success add_student">حفظ</button> --}}
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>

<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('officepanal/assets/plugins/treeview/treeview.js') }}"></script>

<script src="{{ URL::asset('officepanal/assets/plugins/select2/js/select2.min.js') }}"></script>

<!--Internal  Notify js -->
<script src="{{ URL::asset('officepanal/assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('officepanal/assets/plugins/notify/js/notifit-custom.js') }}"></script>




{{-- #############     Model refresh     ########### --}}












{{-- #############     Model create     ########### --}}

<script>
    $(document).ready(function() {





       

        $(document).on('click', '.closeModel', function(e) {

            e.preventDefault();

            $('#save_msgList').html("");
            $("#save_msgList").removeClass("alert alert-success")
            $('#AddRoleModal').modal('hide');
            $('.btn-close').find('input').val('');

        });

        $(document).on('click', '.add_student', function(e) {
            e.preventDefault();

            $(this).text('Sending..');

            var data = {
                'name_role': $('.name_role').val(),
                'select_permission': $('.select_permission').val(),

            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('office.store.roles') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_student').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddStudentModal').find('input').val('');
                        $('.add_student').text('Save');
                        $('#AddRoleModal').modal('hide');
                        fetch_data();
                        setTimeout(function() { $("#success_message").fadeOut(1500); }, 5000)
                    }
                }

            });

        });


        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            $.ajax({
                url: "/show/test?page=" + page,
                success: function(roles) {
                    console.log(roles);
                    $('#table_data').html(roles);
                }
            });
        }
    });
</script>





<script>

// #############      edit       ############ 

    $(document).on('click', '.editbtn', function (e) {

            e.preventDefault();
            var id = $(this).val();
            var url = '{{ route('office.edit.roles', ':id') }}';
            url = url.replace(':id',id);
            $('#editRole').modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    console.log(response.message.permission);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editRole').modal('hide');
                    } else {
                        // console.log(response.student.name);
                        $('#roleName').val(response.message.role.name);
                        $('#idRoleEdie').val(response.message.role.id);
                        $("#editPermissions").empty();
                        
                        $.each(response.message.permission, function(key, value) {
                            $("#editPermissions").append('<option value='+ key.id +' >' + value.name + '</option>');
                        });
                    }
                }
            });
            $('.btn-close').find('input').val('');

 });



// #############       update        ############ 

 $(document).on('click', '.editbtn', function (e) {

        e.preventDefault();
        var data = [
            ''
        ]
        var url = '{{ route('office.edit.roles', ':id') }}';
        url = url.replace(':id',id);
        $('#editRole').modal('show');
        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                console.log(response.message.permission);
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editRole').modal('hide');
                } else {
                    // console.log(response.student.name);
                    $('#roleName').val(response.message.role.name);
                    $('#idRoleEdie').val(response.message.role.id);
                    $("#editPermissions").empty();
                    
                    $.each(response.message.permission, function(key, value) {
                        $("#editPermissions").append('<option value='+ key.id +' >' + value.name + '</option>');
                    });
                }
            }
  });
$('.btn-close').find('input').val('');

});


 // #############       show        ############ 

 
 $(document).on('click', '.showdetails', function(e) {

    e.preventDefault();
    var id = $(this).val();

    var url = '{{ route('office.show_single.roles', ':id') }}';
    url = url.replace(':id', id);
    $('#showRole').modal('show');

    $.ajax({
        type: "GET",
        url: url,
        success: function(response) {
            if (response.status == 404) {

            } else {
                console.log(response.message.rolePermissions)
                $.each(response.message.role, function(key, value) {
                    $("#viewNameRole").text(value);
                });
                


                $("#viewRolePermissions").empty();

                $.each(response.message.rolePermissions, function(key, value) {
                    $("#viewRolePermissions").append('<li>' + value + '</li>');
                });

            }
        }
    });
    // $('.btn-close').find('input').val('');

 });


  
</script>





<script>
    $(".js-example-basic-multiple").select2({});
</script>

@endsection
