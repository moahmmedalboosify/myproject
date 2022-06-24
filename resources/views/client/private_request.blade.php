@extends('client.layout_client.main')

@section('title')
طلب خاص
@endsection
@section('content')
  <main id="main">

    

    <!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">
     

         
          <div class="col-sm-12 section-t8">
            <div class="row" style="margin-top:20px;margin-bottom:30px ;display: flex;
            justify-content: center;">
              <div class="col-md-7 ">
             
                  <form id="private_request" role="form" class="php-email-form">
                    <div class="row">
                    

                  

                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input type="number" name="area_from" id="area_from" class="form-control form-control-lg form-control-a"  placeholder="المساحة" >
                        </div>
                        <span class="text-danger" id="area_from_error"></span>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input type="number" name="area_to"   id="area_to" class="form-control form-control-lg form-control-a" placeholder="إلي" >
                        </div>
                        <span  class="text-danger" id="area_to_error"></span>

                      </div>
                      <div class="col-md-12 mb-3">
                          <div class="form-group" >
                              <select  name="type" id="type" class="form-control form-control-lg form-control-a">
                                  <option selected>حدد نوع العقار</option>
                                  <option value="شقق"> شقق</option>
                                  <option value="منازل"> منازل </option>
                                  <option value="فلل-قصور">  </option>
                                  <option value="أراضي"> أراضي </option>
                                  <option value="تجاري"> تجاري </option>
                              </select>
                          </div>
                        <span  class="text-danger" id="type_error"></span>

                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group" >
                            <select  name="city" id="city" class="form-control form-control-lg form-control-a">
                                <option selected> حدد المدينة</option>
                                <option value="طرابلس"> طرابلس</option>
                                <option value="مصراته"> مصراته </option>
                                <option value="بنغازي"> بنغازي </option>
                                <option value="الزاوية"> الزاوية </option>
                                <option value="ترهونة"> ترهونة </option>
                            </select>
                        </div>
                      <span  class="text-danger" id="city_error"></span>

                    </div>


                      
                      <div class="col-md-6 mb-3">
                        <div class="form-group"> 
                        <input type="hidden" name="id_client" id="id_client" value="" >
                          <input type="number" name="price_from" id="price_from" class="form-control form-control-lg form-control-a" placeholder="السعر" >
                        </div>
                        <span  class="text-danger" id="price_from_error"></span>

                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input  type="number" name="price_to"  id="price_to" class="form-control form-control-lg form-control-a"  placeholder="إلي" >
                        </div>
                        <span  class="text-danger" id="price_to_error"></span>

                      </div>
                    
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea name="message" id="message" class="form-control"  cols="45" rows="8" placeholder="تفاصيل الطلب" ></textarea>
                        </div>
                        <span  class="text-danger" id="message_error"></span>

                      </div>

                  
                    

                      <div class="col-md-12 text-center" style="margin-top:10px">
                        <button type="submit" class="btn btn-a">إرسال</button>
                      </div>
                    </div>
                  </form>
           
            </div>
            </div>
          </div>
 
         </div>

      </div>
    </section><!-- End Contact Single-->

  </main><!-- End #main -->
@endsection



@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function() {
      

      
      $('#private_request').on('submit', function(e) {

          e.preventDefault();
        $('#id_client').val(localStorage.getItem('id_client'))
        
        console.log(localStorage.getItem('id_client'))
        var form = new FormData(this);

            
          var url = '{{ route('client.send_private_request') }}';
            
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            $.ajax({
              
                url: url,
                method: 'POST', 
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(res) {
                  
                      if(res.state == 400){
                        console.log(res)
                        $.each(res.message, function(key,value) {
                            $('#'+key+'_error').text(value);
                        });
                      }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: res.message,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#message').val('')
                        $('#area_from').val('')
                        $('#area_to').val('')
                        $('#price_from').val('')
                        $('#price_to').val('')
                        $('#type').val('')

                      }
                
                }

            });    
  



      });
    
  });
</script>
  @endsection