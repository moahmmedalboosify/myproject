<!DOCTYPE html>
<html lang="ar" id='html'>

<head>

    @include('client.layout_client.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body id='body' dir="RTL">
    @include('client.layout_client.header')

    @yield('content')

    @include('client.layout_client.footer')

    @section('js')
     

    @endsection
    <div id="login_client" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content "  >
                <form action="/examples/actions/confirmation.php" method="post">
                    <div class="modal-header">				
                        <h2 class="modal-title"><strong> تسجيل الدخول</strong></h2>
                        <span class="close" data-dismiss="modal" aria-hidden="true" style="font-size: 60px ; color:#2eca6a"><i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="modal-body">				
                        <div class="form-group text-right">
                            <label><strong>  البريد الإلكتروني : </strong></label>
                            <input type="email" id="email" class="form-control" required="required">
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <div class="clearfix text-right">
                                <label><strong>  كلمة المرور : </strong></label>
                                
                            </div>
                            
                            <input type="password" id="password" class="form-control" required="required" min="3" max="15">
                            <span id="password_error" class="text-danger"></span>

                        </div>
                       <a href="#"  id="new_account"class="float-right" style="color:#2eca6a"><small> إنشاء حساب* </small></a>

                    </div>
                    <div class="  modal-footer justify-content-between">
                        <input type="submit" id="login_client_save"  style="background-color:#2eca6a ;border-color: #2eca6a;" class="float-left btn btn-primary" value="تسجيل الدخول">
                    </div>
                </form>
            </div>
        </div>
    </div>  
    
    <div id="new_account_modal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content "  >
                <form action="/examples/actions/confirmation.php" method="post">
                    <div class="modal-header">				
                        <h2 class="modal-title"><strong> إنشاء حساب جديد </strong></h2>
                        <span class="close" data-dismiss="modal" aria-hidden="true" style="font-size: 60px ; color:#2eca6a"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group text-right">
                            <label><strong>   الإسم الثلاثي:   </strong> </label>
                            <input type="text" id="new_name" class="form-control" required="required" max="30" min="10">
                            <span id="new_name_error" class="text-danger"></span>

                        </div>
                        <div class="form-group text-right">
                            <label><strong> البريد الإلكتروني: </strong></label>
                            <input type="email" id="new_email"  class="form-control" required="required">
                            <span id="new_email_error" class="text-danger"></span>

                        </div>

                        <div class="form-group text-right">
                            <label><strong> الهاتف: </strong></label>
                            <input type="text" id="new_phone"  class="form-control" required="required">
                            <span id="new_phone_error" class="text-danger"></span>

                        </div>

                        <div class="form-group">
                            <div class="clearfix text-right">
                                <label><strong>كلمة المرور : </strong></label>
                            </div>
                            
                            <input type="password" id="new_password"  class="form-control" required="required" min="3" max="15">
                            <span id="new_password_error" class="text-danger"></span>

                        </div>

                    </div>
                    <div dir="ltr" class=" modal-footer justify-content-between">
                        <input type="submit" id="new_account_save" style="background-color:#2eca6a ;border-color: #2eca6a;" class="float-left btn btn-primary" value="إنشاء حساب">
                    </div>
                </form>  
            </div>
        </div>
    </div> 
  

   

</body>

</html>


