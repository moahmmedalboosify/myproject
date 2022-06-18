
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">

              <li class="list-inline-item">
                <a href="     {{route('home')}}">الرئيسية</a>
              </li>
              <li class="list-inline-item">
                <a href="  {{route('client.view_about')}}">من نحن</a>
              </li>
              <li class="list-inline-item">
                <a href="     {{route('view.offers')}}">عقارات</a>
              </li>
              <li class="list-inline-item">
                <a href="     {{route('client.view_offices')}}">مكاتب</a>
              </li>
              <li class="list-inline-item">
                <a href="           {{ route('client.view_contact')}}">تواصل معنا</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a"><strong>GroupRE</strong></span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
          -->
            Designed by <a href="https://MohmmedAlboosify.com/">Mohammed Alboosify</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{URL::asset('officepanal/assets/plugins/jquery/jquery.min.js')}}"></script>

  @yield('js')
  <script src="client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="client/assets/vendor/php-email-form/validate.js"></script>
  <script src="client/assets/vendor/swiper/swiper-bundle.min.js"></script>
  

  <!-- Template Main JS File -->
  <script src="client/assets/js/main.js"></script>
  <script src="client/assets/js/convert.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  
  <script>
    $(document).ready(function() {
    
        $(document).on('click', '#test', function(e) {
           console.log('test') ;
           e.preventDefault();

            $('#login_client').modal('show')
    
    
        });

        
        $(document).on('click', '#new_account', function(e) {
          e.preventDefault();

                $('#new_name_error').text(''),
                  $('#new_email_error').text(''),
                  $('#new_phone_error').text(''),
                  $('#new_password_error').text('')

                  $('#new_name').text(''),
                  $('#new_email').text(''),
                  $('#new_phone').text(''),
                  $('#new_password').text('')
            $('#login_client').modal('hide')
            $('#new_account_modal').modal('show')
   
        });

        
        $(document).on('click', '#new_account_save', function(e) {
          
          e.preventDefault();
            $('#new_name_error').text(''),
                  $('#new_email_error').text(''),
                  $('#new_phone_error').text(''),
                  $('#new_password_error').text('')

          var data = {
               'name' :$('#new_name').val(),
               'email' :$('#new_email').val(),
               'phone' :$('#new_phone').val(),
               'password' :$('#new_password').val()
          } 

         
          
         
           var url = '{{ route('client.registration') }}';
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $.ajax({
              type: "POST",
              url: url,
              data: data,
              success: function(res) {
                if(res.state == 400){
                  $.each(res.message, function(key, value) {
                    console.log(key)

                    $('#new_'+key+'_error').text(value);

                  });
                }else{
                  $('#new_name').val(''),
                  $('#new_email').val(''),
                  $('#new_phone').val(''),
                  $('#new_password').val('')
                  $('#login_client').modal('show')
                  $('#new_account_modal').modal('hide')
                }
              }

          });    
 
      });

      $(document).on('click', '#login_client_save', function(e) {
          
           e.preventDefault();
          $('#email_error').text('')
          $('#password_error').text('')

          var data = {
               'email' :$('#email').val(),
               'password' :$('#password').val()
          } 

         
          
         
           var url = '{{ route('client.login') }}';
           console.log(url)
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $.ajax({
              type: "GET",
              url: url,
              data: data,
              success: function(res) {
                console.log(res)
                if(res.state == 400){
                  $.each(res.message, function(key, value) {
                    console.log(key)

                    $('#'+key+'_error').text(value);

                  });
                }else if(res.state == 404){
                        $('#email_error').text(res.message);
                }else{
                  $('#email').val(''),
                  $('#password').val('')
            
                  location.reload() 

                }
         
                
                }
              

          });    
 
      });
      



      $(document).on('change', '#search_offer_simple', function(e) {
         
         var data = {
               'value' :$('#search_offer_simple').val()
         }

         
         var url = '{{ route('client.search_simple_ajax') }}';
          $.ajax({
              type: "GET",
              url: url,
              data: data,
              success: function(res) {
                $('#offer_fetch').html(res)
              }

          });


        });
    });
</script>