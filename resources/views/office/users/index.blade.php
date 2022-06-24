@extends('layouts.master')
@section('css')

@section('title')
    المستخدمون - التجمع العقاري
@stop

<!-- Internal Data table css -->
<link href="{{ URL::asset('officepanal/css/multiselect.css') }}" rel="stylesheet" type="text/css" />
{{-- <link href="{{ URL::asset('officepanal/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" /> --}}
<link href="{{ URL::asset('officepanal/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}"
    rel="stylesheet" />
<link href="{{ URL::asset('officepanal/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('officepanal/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}"
    rel="stylesheet" />
<link href="{{ URL::asset('officepanal/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('officepanal/assets/plugins/datatable/css/responsive.dataTables.min.css') }}"
    rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('officepanal/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمون</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                المستخدمون</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-4 col-md-5">
                    @can('إضافة مستخدم')
                        <button id="add_user_btn" class="btn btn-success btn-md col-sm-2 col-md-4 mg-t-10 mg-b-10"
                            id="add_role_btn">إضافة مستخدم</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div id="table_data">
                    @include('office.users.index_pagination')
                </div>
            </div>
            <div class="modal" id="add_user_model">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">إضافة مستخدم</h6><button aria-label="Close"
                                class="close" data-dismiss="modal" type="button"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="">

                                <div class="row   mg-b-20">
                                    <div class="parsley-input col-md-6" id="fnWrapper">
                                        <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                        <input class="form-control form-control-sm "
                                            data-parsley-class-handler="#lnWrapper" id="user_name" required=""
                                            type="text">
                                        <span id="user_name_error">
                                        </span>
                                    </div>

                                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                        <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                        <input class="form-control form-control-sm"
                                            data-parsley-class-handler="#lnWrapper" name="email" id="email" required=""
                                            type="email">
                                        <span id="email_error">
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm" id="password"
                                        data-parsley-class-handler="#lnWrapper" name="password" required=""
                                        type="password">
                                    <span id="password_error">
                                    </span>
                                </div>


                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm " id="confirm_password"
                                        data-parsley-class-handler="#lnWrapper" name="confirm-password" required=""
                                        type="password">
                                </div>
                            </div>

                            <div class="row mg-b-20">
                                <div class="col-lg-6">
                                    <label class="form-label">حالة المستخدم</label>
                                    <select name="Status" id="state" class="form-control  nice-select  custom-select">
                                        <option value="">

                                        </option>
                                        <option class="text-success" value="1">
                                            مفعل
                                        </option>
                                        <option class="text-danger" value="0">
                                            غير مفعل
                                        </option>
                                    </select>
                                    <span id="state_error">
                                    </span>

                                    <label for="inputName" class="control-label mt-5"> الصلاحيات :</label>
                                    <br>
                                    <select id="role_user" class="form-control select_permission" name="subcategory"
                                        id="subselectoption" multiple="multiple">

                                    </select>
                                    <span id="role_user_error">
                                    </span>
                                </div>
                            </div>

                            <div class="row mg-b-20">
                                <div class="col-lg-12">

                                </div>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary add_save_btn" type="button">حفظ</button>
                            <button class="btn ripple btn-secondary add_close_clear_input">رجوع</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="edit_user_model">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">تحديث المستخدم</h6><button aria-label="Close"
                                class="close" data-dismiss="modal" type="button"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            
                                <input id="edit_id_user" type="hidden" value="">
                                <div class="row   mg-b-20">
                                    <div class="parsley-input col-md-6" id="fnWrapper">
                                        <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                        <input class="form-control form-control-sm "
                                            data-parsley-class-handler="#lnWrapper" id="edit_user_name" required=""
                                            type="text">
                                        <span id="edit_user_name_error">
                                        </span>
                                    </div>

                                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                        <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                        <input class="form-control form-control-sm"
                                            data-parsley-class-handler="#lnWrapper" name="email" id="edit_email"
                                            required="" type="email">
                                        <span id="edit_email_error">
                                        </span>
                                    </div>
                                </div>

                            <div class="row mg-b-20">

                              <div class="col-md-6 mg-b-10">
                                    <label class="form-label">حالة المستخدم :<span class="tx-danger">*</span></label>
                                    <select name="Status" id="edit_state" class="form-control SlectBox">
                                        <option>

                                        </option>
                                        <option class="text-success" value="1">
                                            مفعل
                                        </option>
                                        <option class="text-danger" value="0">
                                            غير مفعل
                                        </option>
                                    </select>
                                    <span id="edit_state_error">
                                    </span>
                                </div>
                                    <br>
                                    <div class="col-12 mg-b-15">
                                    <label for="inputName" class="control-label mt-5"> الصلاحيات :<span class="tx-danger">*</span></label>
                                    <br>
                                    <select name="somename" id="edit_select" class="form-control SlectBox"
                                        style="width:760px;">
                                        <!--placeholder-->

                                    </select>
                                    <span id="edit_role_user_error">
                                    </span>

                                    </div>
                             
                            </div>

                           
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary edit_save_btn" type="button">تحديث</button>
                            <button class="btn ripple btn-secondary close_clear_input">رجوع</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>



</div>
</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ URL::asset('officepanal/js/bootstrap-multiselect.js') }}"></script>
<!-- Internal Data tables -->
<script src="{{ URL::asset('officepanal/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('officepanal/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('officepanal/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('officepanal/assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('officepanal/assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('officepanal/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('officepanal/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('officepanal/assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('officepanal/assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('officepanal/assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('officepanal/assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
{{-- <script src="{{ URL::asset('officepanal/assets/js/modal.js') }}"></script> --}}


<script>
    $(document).ready(function() {

        function close_clear_input(type_model, type_process) {
            switch (type_model) {
                case 'add':
                    $('#user_name').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#password').val('');
                    $('#confirm_password').val('');
                    $("#state").empty();
                    $("#role_user").empty();
                    if (type_process == 'close') {
                        $('#add_user_model').modal('hide');
                    }
                    break;
                case 'edit':
                    $('#edit_user_name').empty('');
                    $('#edit_email').empty('');
                    //$("#edit_state").empty();
                    $("#edit_role_user").empty();
                    if (type_process == 'close') {
                        $('#edit_user_model').modal('hide');
                    }
                    break;
            }

        }

        $(function() {
            $("#role_user").multiselect({
                buttonWidth: '775',
                maxHeight: '170',
            });
        });

        $(function() {
            $("#edit_role_user").multiselect({
                buttonWidth: '775',
                maxHeight: '170',
            });
        });

        function clear_input() {

            $('#user_name').val("");
            $('#email').val("");
            $('#password').val("");
            $('#confirm_password').val("");
            $('#state').val("");
            $('#role_user').val("");
        }


        function clear_error() {

            $('#user_name_error').empty("");
            $('#user_name_error').remove('tx-danger tx-12');
            $('#user_name_error').text("");
            $('#email_error').empty("");
            $('#email_error').remove('tx-danger tx-12');
            $('#email_error').text("");
            $('#password_error').empty("");
            $('#password_error').remove('tx-danger tx-12');
            $('#password_error').text("");
            $('#state_error').empty("");
            $('#state_error').remove('tx-danger tx-12');
            $('#state_error').text("");
            $('#role_user_error').empty("");
            $('#role_user_error').remove('tx-danger tx-12');
            $('#role_user_error').text("");


            $('#edit_user_name_error').empty("");
            $('#edit_user_name_error').remove('tx-danger tx-12');
            $('#edit_user_name_error').text("");
            $('#edit_email_error').empty("");
            $('#edit_email_error').remove('tx-danger tx-12');
            $('#edit_email_error').text("");
            $('#edit_state_error').empty("");
            $('#edit_state_error').remove('tx-danger tx-12');
            $('#edit_state_error').text("");
            $('#edit_role_user_error').empty("");
            $('#edit_role_user_error').remove('tx-danger tx-12');
            $('#edit_role_user_error').text("");
        }


       
        $(document).on('click', '.close_clear_input', function(e) {
            close_clear_input('edit', 'close');
        });

        $(document).on('click', '.add_close_clear_input', function(e) {
            close_clear_input('add', 'close');
        });
        







        //##############-----  add new user------##############

        $(document).on('click', '#add_user_btn', function(e) {

            e.preventDefault();
            clear_input();
            clear_error();
            $('.add_save_btn').text('حفظ');

            var url = '{{ route('office.create.users') }}';
            $('#add_user_model').modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    $("add_user_model").modal('show');
                    $("#role_user").html(response.data);
                    $('#role_user').multiselect('rebuild');
                    $('.multiselect-container').append(
                        '<li><button data-toggle="dropdown" style="width: 100%;">Done</button></li>'
                        )
                    $('#role_user').multiselect('refresh');
                }
            });
        });



        $(document).on('click', '.add_save_btn', function(e) {

            e.preventDefault();
            clear_error();
            $(this).text('حفظ...');
            data = {};
            data = {
                'user_name': $('#user_name').val(),
                'email': $('#email').val(),
                'password': $('#password').val(),
                'confirm_password': $('#confirm_password').val(),
                'state': $('#state').val(),
                'role_user': $('#role_user').val(),
            }
            var url = '{{ route('office.store.users') }}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(response) {
                    if (response.state == 400) {

                        $.each(response.errors, function(key, err_value) {
                            $('#' + key + '_error').empty("");
                            $('#' + key + '_error').addClass('tx-danger tx-12');
                            $('#' + key + '_error').text(err_value);
                        });
                        $('.add_save_btn').text('حفظ');
                    } else {
                        $('#add_user_model').modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'تم أضافة المستخدم بنجاح .',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        fetch_data();
                    }
                }
            });

            // console.log(data);


        });









        //##############-----  edit user   ------##############

        $(document).on('click', '#edit_user_btn', function(e) {

            e.preventDefault();
            var id = 0;
            clear_error();
            close_clear_input('edit', 'clear');




            $('.edit_save_btn').text('تحديث');
            
            var index =0;
            var id = $(this).val();
            var url = '{{ route('office.edit.users', ':id') }}';
            url = url.replace(':id', id);

            $('#edit_user_model').modal('show');

            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    if (response.status == 404) {
                        alert('error');
                    } else {
                        
                        $('#edit_id_user').val(id);
                        $('#edit_user_name').val(response.message.user['name']);
                        $('#edit_email').val(response.message.user['email']);
                        $('#edit_state option[value=' + response.message.user[
                            'state_account'] + ']').attr('selected', 'selected');
                        $('#edit_select').empty();   
                        $.each(response.message.roles, function(key, value) {
                            if (response.message.role_user == key) {
                                console.log('test'+'++'+key+'++'+response.message.role_user);
                                $('#edit_select').append('<option value="' + value +
                                    '">' + key + '</option>');
                                    index=value;
                            } else {
                                $('#edit_select').append('<option value="' + value +
                                    '">' + key + '</option>');
                            }
                        });
                        $('#edit_select').val(index).attr('selected', true);
                    }
                }
            });
       
        });


        
        $(document).on('click', '.edit_save_btn', function(e) {

            e.preventDefault();
            clear_error();
            var id =  $('#edit_id_user').val();
            $(this).text('تحديث...');
            data = {};
            data = {
                'edit_user_name': $('#edit_user_name').val(),
                'edit_email': $('#edit_email').val(),
                'edit_state': $('#edit_state').val(),
                'edit_select': $('#edit_select').val(),
            }
           
             console.log(data);

            var url = '{{ route('office.update.users',':id') }}';
            url = url.replace(':id', id);

              
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(response) {

                    console.log(response);

                    if (response.state==400){
                        $('.edit_save_btn').text('تحديث');
                        $.each(response.errors, function(key, err_value) {
                            $('#' + key + '_error').empty("");
                            $('#' + key + '_error').addClass('tx-danger tx-12');
                            $('#' + key + '_error').text(err_value);
                        });
                    } else {
                        $('#edit_user_model').modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'تم تحديث المستخدم بنجاح .',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        fetch_data();
                    }

                    // }
                    //     $('#add_user_model').modal('hide');
                    //     Swal.fire({
                    //         position: 'center',
                    //         icon: 'success',
                    //         title: 'تم أضافة المستخدم بنجاح .',
                    //         showConfirmButton: false,
                    //         timer: 1500
                    //     });
                    //     fetch_data();
                    // }
                }
            });

            // console.log(data);


        });

        $(document).on('click', '#delete_user_btn', function(e) {

                e.preventDefault();
                                
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        cancelButton: 'btn btn-success mg-l-5',
                        confirmButton: 'btn btn-danger',
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: '?هل أنت متأكد من حذف المستخدم',
                    text: "لن تتمكن من التراجع عن هذا!",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonText: 'إحذف !',
                    cancelButtonText: 'رجوع!',
                    reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                      
                    var id = $('#delete_user_btn').val()
                    var url = '{{ route('office.delete.users', ':id') }}';
                    url = url.replace(':id', id);
                        $.ajax({
                        type: "POST",
                        url: url,
                        success: function(response) {
                        //     swalWithBootstrapButtons.fire(
                        //         'حذف!',
                        //         'تم حذف المستخدم بنجاح.',
                        //         'success'
                        //         );
                        //         fetch_data();
                        // }
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'تم حذف المستخدم بنجاح.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        fetch_data();

                    }
                 }); // end ajax  
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                    )
                }
                })


               

});



        //##############-----  Delete user   ------##############


      


        // $(document).on('click', '.deleteRole', function(e) {

        //     e.preventDefault();
        //     $(this).text('حذف...');
        //     var id = $('#idRoleDelete').val()
        //     var url = '{{ route('office.delete.roles', ':id') }}';
        //     url = url.replace(':id', id);

        //     $.ajax({
        //         type: "POST",
        //         url: url,
        //         success: function(response) {
        //             console.log(response.message);
        //             $('#success_message').html('');
        //             $('#success_message').addClass('alert alert-success');
        //             $('#success_message').text(response.message);
        //             $('.deleteRole').text('تحديث');
        //             fetch_data();
        //             $('#deleteModel').modal('hide');
        //             setTimeout(function() {
        //                 $("#success_message").fadeOut(1500);
        //             }, 5000);
                
        //         }
        //     });          
        // });







        //##############-----  refresh page   ------##############


        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });


        function fetch_data(page) {
            $.ajax({
                url: "/show/users?page=" + page,
                success: function(data) {
                    console.log('true');
                    $('#table_data').html(data);
                }
            });
        }




    });
</script>



@endsection
