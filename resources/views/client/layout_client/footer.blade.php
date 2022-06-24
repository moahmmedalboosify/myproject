
  
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
  <script src="{{asset('client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('client/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>


 
  <!-- Template Main JS File -->
  <script src="{{asset('client/assets/js/main.js') }}"></script>
  <script src="{{asset('client/assets/js/convert.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
               'email' :$('#email_login').val(),
               'password' :$('#password_login').val()
          } 

         
          
         
           var url = '{{ route('client.login') }}';
           console.log(data)
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

                  console.log(res.id)
                  $('#email').val(''),
                  $('#password').val('')
                  localStorage.setItem('state_login','200')
                  localStorage.setItem('id_client',res.id)
                  header_resresh();
                   $('#login_client').modal('hide')
                  

                  //location.reload() 

                }
         
                
                }
              

          });    
 
      });

      function header_resresh(){
         var url = '{{ route('client.refresh_header') }}';
          
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $.ajax({
              type: "GET",
              url: url,
       
              success: function(res) {
                $('#header_refresh').html(res)
              }
            });
      }

      $(document).on('click', '#logout_client', function(e) {
          
          e.preventDefault();
      
          localStorage.setItem('state_login','0')

          var url = '{{ route('client.logout') }}';
          $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
         $.ajax({
             type: "GET",
             url: url,
            
             success: function(res) {
               console.log(res)
               if(res.state == 200){
                localStorage.removeItem("state_login");        
                var url = '{{ route('home') }}';
                    location.href = url ;
                
               }
              }
             

         });    

     });
      
      $(document).on('click', '#close_new_account_save', function(e) {
                
                e.preventDefault();
            $('#new_account_modal').modal('hide')
            $('#email_login').val(' '),
            $('#password_login').val(' ')
            $('#login_client').modal('show')

                

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


      $('#city_search').on('change', function(e) {

          var id_city = $(this).children("option:selected").val();

          e.preventDefault();

          console.log(id_city)
          var url = '{{ route('office.step_four_city.offer') }}';
          $.ajax({
              type: "GET",
              url: url,
              data: {
                  'id_city': id_city
              },
              success: function(res) {
                console.log(res.region)
                  $('#region_search').html(res.region);
              }
          });

      });

      $('#form_search').on('submit', function(e) {


        e.preventDefault();

       
       var data ={
        'city' : $('#city_search').val(),
        'region' : $('#region_search').val(),
        'price_max' : $('#price_max').val(),
        'type_offer' : $('#type_offer').val(),
        'state_offer' : $('#state_offer').val(),
        'search' : '200'
       }
    

          var url = '{{ route('client.search_advanced') }}';
            
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

            $.ajax({
                url: url,
                method: 'GET', 
                data: data,
              
                success: function(res) {
                  $('#offer_fetch').html(res)
                  $('body').removeClass('box-collapse-open');
                  $('body').addClass('box-collapse-closed');

                  
                
                  
                  
                }

            });    
  
      });    

    });
</script>