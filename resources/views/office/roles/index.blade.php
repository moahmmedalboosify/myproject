@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

    {{-- <link href="{{URL::asset('officepanal/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('officepanal/assets/plugins/sumoselect/sumoselect-rtl.css')}}"> --}}

	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link href="{{ URL::asset('officepanal/css/multiselect.css') }}" rel="stylesheet"
        type="text/css" />
        {{-- <link href="{{URL::asset('officepanal/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet"> --}}
<!---Internal Fileupload css-->
<link href="{{URL::asset('officepanal/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('officepanal/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
{{-- <link rel="stylesheet" href="{{URL::asset('officepanal/assets/plugins/sumoselect/sumoselect-rtl.css')}}"> --}}
    <link href="{{ URL::asset('officepanal/assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet"
        type="text/css" />
    

    <link href="{{ URL::asset('officepanal/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />



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

<div class="row row-md">
    <div class="col-xl-12">
        <div id="success_message">
        </div>
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right" style="dir='RTL'">
                           
                        @can('اضافة صلاحية')
                            <button class="btn btn-success  clear_input_create btn-md col-sm-2 col-md-2 mg-t-10"
                               id="add_role_btn" >إضافة</button>
                         @endcan      
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
                            <h5 class="modal-title" id="AddStudentModalLabel"> إضافة صلاحية جديده </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <ul id="save_msgList"></ul>

                            <div class="col-lg-12">
                               
                                    <label for="inputName" class="control-label mt-2"> أسم الصلاحية :</label>
                                    <input type="text" class="form-control createname_role" id="addRoleName"
                                        name="name_role" title="يرجي أدخال أسم الصلاحية " required>

                                    <label for="inputName" class="control-label mt-2"> الأذونات  :</label><br>

                                    <select class="form-control select_permission" name="subcategory" id="subselectoption" multiple="multiple">
                                    </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-secondary btn-close closeModel" type="button">رجوع</button>
                            <button class="btn ripple btn-success add_student" type="button">حفظ</button>

                            {{-- <button type="button" class="btn btn-success add_student">حفظ</button> --}}
                        </div>
                       
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
                        <div class="modal-body"style="height:250px; overflow-x:scroll;">

                            <!-- Select2 -->
                            <div class="col-lg-4"  >
                                <ul id="treeview1" >
                                    <li><a id="viewNameRole" style="font-size:20px; font-weight: bold;"></a>
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
                            <ul id="save_msgList_edit"></ul>

                            <div class="form-group">
                                    <input type="hidden" class='editRoleid' id="idRoleEdie" value="">
                                    <label for="inputName" class="control-label mt-2"> أسم الصلاحية :</label>
                                        <input type="text" class="form-control   editRoleName" id="roleName"
                                            name="name_role" title="يرجي أدخال أسم الصلاحية " required>
                                    
                                    <label for="inputName" class="control-label mt-5"> الأذونات :</label>
                                    <br>
                                        <select class="form-control editpermission" name="subcategory" id="editPermissions" multiple="multiple">
                                        </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-secondary  btn-close closeModel" type="button">رجوع</button>
                            <button class="btn ripple btn-success editModel" type="button">تحديث</button>

                            {{-- <button type="button" class="btn btn-success add_student">حفظ</button> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="deleteModel">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content tx-size-sm">
                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                            
                            <input type="hidden" name="idRoleDelete" id="idRoleDelete" value="">
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                            <h4 class="tx-danger mg-b-20">هل أنت متأكد من حذف الصلاحية!</h4>
                            <button aria-label="Close" class="btn ripple btn-danger deleteRole pd-x-25" type="button">حذف</button>                        </div>
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




<script src="{{ URL::asset('officepanal/assets/plugins/treeview/treeview.js') }}"></script>
<script src="{{ URL::asset('officepanal/js/bootstrap-multiselect.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--Internal  Notify js -->
<script src="{{ URL::asset('officepanal/assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('officepanal/assets/plugins/notify/js/notifit-custom.js') }}"></script>



{{-- #############     Model create     ########### --}}

<script>
    $(document).ready(function() {
        $(function() {
           $("#subselectoption").multiselect({
            buttonWidth: '450',
            maxHeight:'200',
           });
         });
         $(function() {
           $("#editPermissions").multiselect({
            buttonWidth: '450',
            maxHeight:'200',
           });
         });
      
        $(document).on('click', '.closeModel', function(e) {

            e.preventDefault();

            $('#save_msgList').html("");
            $("#save_msgList").removeClass("alert alert-success")
            $('#AddRoleModal').modal('hide');
            $('#editRole').modal('hide');
            $('.btn-close').find('input').val('');

        });



        $(document).on('click', '.add_student', function(e) {
            e.preventDefault();
            $('.btn-close').find('input').val('');

            $(this).text('حفظ...');

            var data = {
                'name_role': $('.createname_role').val(),
                'select_permission': $('.select_permission').val(),
            }

            console.log(data);

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
                        $('.add_student').text('حفظ');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddStudentModal').find('input').val('');
                        $('.add_student').text('حفظ');
                        $('#AddRoleModal').modal('hide');
                        clear_input('create');
                        fetch_data();
                        setTimeout(function() {
                            $("#success_message").fadeOut(1500);
                        }, 5000);

                    }
                }

            });

        });


        $(document).on('click', '.deletebtn', function(e) {

            e.preventDefault();
           var id = $(this).val();
           $('#idRoleDelete').val(id);
           $('#deleteModel').modal('show');
        });

        $(document).on('click', '.deleteRole', function(e) {

            e.preventDefault();
            $(this).text('حذف...');
            var id = $('#idRoleDelete').val()
            var url = '{{ route('office.delete.roles', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                type: "POST",
                url: url,
                success: function(response) {
                    console.log(response.message);
                    $('#success_message').html('');
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('.deleteRole').text('تحديث');
                    fetch_data();
                    $('#deleteModel').modal('hide');
                    setTimeout(function() {
                        $("#success_message").fadeOut(1500);
                    }, 5000);
                
                }
            });          
        });

        // #############       update        ############ 

        $(document).on('click', '.editModel', function(e) {

            e.preventDefault();
            $(this).text('تحديث...');

            var id = $('.editRoleid').val()
            var data = {
                'editRoleName': $('.editRoleName').val(),
                'editpermission': $('.editpermission').val(),
            }




            var url = '{{ route('office.update.roles', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(response) {
                    console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList_edit').html("");
                        $('#save_msgList_edit').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_value) {
                            $('#save_msgList_edit').append('<li>' + err_value +'</li>');
                        });
                        $('.editModel').text('تحديث');
                    } else {

                        $('#save_msgList_edit').html("");
                        $('#save_msgList_edit').removeClass('alert alert-danger');
                        $('#AddStudentModal').find('input').val('');
                        $('.editModel').text('تحديث');
                        fetch_data();
                        $('#editRole').modal('hide');
                        Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'تم تحديث الصلاحية بنجاح .',
                        showConfirmButton: false,
                        timer: 1500
                        });
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });


        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function clear_input(modelName) {

            switch (modelName) {
                case 'create':
                    $('.createname_role').val('');
                    $("#createselect").empty();

                    break;

                case 'edit':
                    $('.editRoleName').val('');
                    $('.editpermission:selected').remove();

                    break;
            }
        }

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

    $(document).on('click', '.editbtn', function(e) {

        e.preventDefault();
        $('#editPermissions').multiselect('refresh');
        var id = $(this).val();
        var i = 0;
        var url = '{{ route('office.edit.roles', ':id') }}';
        url = url.replace(':id', id);
        $('#editRole').modal('show');
        $.ajax({
            type: "GET",
            url: url,
            success: function(response) {

                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editRole').modal('hide');
                } else {
                    console.log(response.message.permission)
                    
                    $('#roleName').val(response.message.role.name);
                    $('#idRoleEdie').val(response.message.role.id);
                    $('#editPermissions').empty();
                    $('#editPermissions').html(response.message.permission);
                    $('#editPermissions').multiselect('rebuild');
                    $('.multiselect-container').append('<li><button data-toggle="dropdown" style="width: 100%;">Done</button></li>')
                    $('#editPermissions').multiselect('refresh');

                
                }
            }
        });
        $('.btn-close').find('input').val('');

    });

    // #############       show        ############ 
    
    $(document).on('click', '#add_role_btn', function(e) {

            e.preventDefault();
            $('#subselectoption').multiselect('rebuild');


            var url = '{{ route('office.show.roles') }}';

            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    if (response.status == 404) {

                    } else {

                        console.log(response);
                        $('#AddRoleModal').modal('show');
                        $('#subselectoption').html(response.data);
                        $('#subselectoption').multiselect('rebuild');
                        $('.multiselect-container').append('<li><button data-toggle="dropdown" style="width: 100%;">Done</button></li>')
                        $('#subselectoption').multiselect('refresh');


                    }
                }
            });
            // $('.btn-close').find('input').val('');

    });

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


@endsection
