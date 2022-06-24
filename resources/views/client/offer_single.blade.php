@extends('client.layout_client.main')

@section('content')
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">{{$offer_details[$data[0]['id']]['title']}}</h1>
              <span class="color-text-a">{{$data[0]['regions']['cities']['name'] . ','.$data[0]['regions']['name']}} </span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
             
                <li class="breadcrumb-item">
                  <a href="property-grid.html">عقارات/</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  الصفحة الرئيسية
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div style="height:400px;" class="intro intro-carousel swiper position-relative">
              <div class="swiper-wrapper">
 
                @foreach($offer_image[$data[0]['id']] as $row)
                  
                        <div id="show_image_btn" data-path="{{$row['name']}}" class="swiper-slide carousel-item-a intro-item bg-image" style="height:300px; background-image: url({{asset('/storage/image/office/'.$row['name']) }})">
                        </div>
                  
                 @endforeach
              </div>
           </div>
          </div>

        <div class="row">
          <div class="col-sm-12">

            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="bi bi-cash">$</span>
                      <input type="hidden" id="lat" value="{{$offer_details[$data[0]['id']]['lat']}}">
                      <input type="hidden" id="lng" value="{{$offer_details[$data[0]['id']]['lng']}}">
                      <input type="hidden" id="id_offer_client" value="{{$data[0]['id']}}">
                      <input type="hidden" id="id_office" value="{{$data[0]['office_info_id']}}">
                      
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c">{{number_format($offer_details[$data[0]['id']]['price'])}}</h5>
                    </div>
                  </div>
                </div>

               
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">معلومات العقار</h3>
                      </div>
                    </div>
                  </div>
                    <a href="" onclick="return false;" id="request" data-value="0">
                     <div class="property-price foo mg-b-20">
                        <div class="card-header-c d-flex">
                          <div class="card-box-ico">
                         <strong> <h3 class="title-d">  طلب معاينة</h3>  </strong>
                          </div>
                          
                        </div>
                    </a>
                     
                    {{-- <input type="submit" id="login_client_save"  style="background-color:#2eca6a ;border-color: #2eca6a;" class="float-left btn btn-primary" value="طلب معاينة"> --}}
                </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex ">
                        <strong>رقم العقار  : </strong>
                        <span class="float-right" >  {{$data[0]['number_offer']}}</span>
                      </li>
                      <li class="d-flex ">
                        <strong>العنوان  :</strong>
                        <span>{{$data[0]['regions']['name'] . ','.$offer_details[$data[0]['id']]['point'] }}</span>
                      </li>
                      <li class="d-flex ">
                        <strong>نوع العقار  :</strong>
                        @switch($data[0]['model_name'])
                        @case('commercial')
                        <span>تجاري</span>
                        
                            @break
                        @case('lands')
                        <span>أراضي</span>
                        
                            @break
                         @case('apartment')  
                        <span>شقق</span>
                        
                            @break
                         @case('houses')
                        <span>منازل</span>
                        
                            @break   
                         @case('villas_palaces')
                        <span>فلل-قصور</span>
                            @break   
                    @endswitch
                      </li>
                      <li class="d-flex ">
                        <strong>الغرض  :</strong>
                        <span>{{$data[0]['state']}}</span>
                      </li>

                      @if($data[0]['model_name'] == 'lands' || $data[0]['model_name'] == 'commercial' )
                      <li class="d-flex ">
                        <strong>{{$data[0]['model_name']  == 'lands' ?  'مساحة الأرض' : 'المساحة'  }}  :</strong>
                        <span>{{$data[0]['model_name']  == 'lands'?  $offer_details[$data[0]['id']]['area_land'] : $offer_details[$data[0]['id']]['area']  }}m
                          <sup>2</sup>
                        </span>
                       
                      </li>
                       @if($data[0]['model_name'] == 'lands' )
                       <li class="d-flex ">
                        <strong>الوثائق  :</strong>

                       
                        <span>{{ $offer_details[$data[0]['id']]['document_type'] }}</span>
                      </li>
                      @endif
                     
                      @else
                      <li class="d-flex ">
                        <strong>المساحة  :</strong>
                        <span>{{ $offer_details[$data[0]['id']]['area']}}m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li class="d-flex ">
                        <strong>الغرف :</strong>

                        <span>{{ $offer_details[$data[0]['id']]['rooms']}}</span>
                      </li>
                      <li class="d-flex ">
                        <strong>الحمامات :</strong>

                        <span>{{ $offer_details[$data[0]['id']]['bathrooms']}}</span>
                      </li>
                      <li class="d-flex ">
                        <strong>الطابق :</strong>
                          
                        <span>{{ $offer_details[$data[0]['id']]['floor']}}</span>
                      </li>

                      @endif

                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">وصف العقار</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    {{ $offer_details[$data[0]['id']]['description'] }}
                  </p>
                 
                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">مزايا إضافية</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="">
                  
                   @foreach($offer_details[$data[0]['id']]['extra_features'] as $row)
                      @foreach($row as $item)
                        <li>{{$item}}</li>
                      @endforeach
                   @endforeach
                   
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center">

        
          <div class="col-md-10 offset-md-1 ">
              <div style="width: 930px ; height:460px" id="map"></div>
          </div>
        </div>
          <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">معلومات المكتب</h3>
                </div>
              </div>
            </div>
              <div class="row">
                <div class="d-flex justify-content-center">

                <div class="col-md-6 col-lg-4">
                  <img src="{{asset('/storage/image/admin/'.$office[0]['name']) }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="property-agent">
                    <a href="{{route('client.single_office',['id'=>$office[0]['id']])}}">

                    <h4 class="title-agent"> <strong>مكتب  <span class="color-b"> {{$office[0]['name_office']}} </span></strong></h4>
                    </a>
                    <p class="color-text-a">
                      {{$office[0]['description']}}
                    </p>
                    <ul class="list-unstyled">
                      <li class="">
                        <strong>رقم الهاتف: </strong>
                        <span class="color-text-a">  {{$office[0]['phone']}} </span>
                      </li>
                    
                      <li class="">
                        <strong>البريد الإلكتروني: </strong>
                        <span class="color-text-a"> {{$office[0]['email']}}</span>
                      </li>
                    
                    </ul>
                
                  </div>
                </div>
              </div>
              </div>
          </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Single-->



    <div class="modal" id="show_image_modal">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content tx-size-sm">
            
              <div>
                  <img id="image_add_src" style="width: 100%; heigth:160px;" alt="img">
              </div>
            
            
          </div>
      </div>
    </div>


    <div id="message_request_model" class="modal fade">
      <div class="modal-dialog modal-login">
          <div class="modal-content "  >
                <div class="modal-header">				
                  <h3 class="modal-title"><strong>طلب معاينة</strong></h3>
                  
                </div>
                <div class="col-12">
                  <textarea id="message_request"  name="description" placeholder="يمكنك ترك الرسالة فارغة في حالة لايوجد أي ملاحظة" class="form-control" id="exampleTextarea" name="note"
                      rows="3"></textarea>
                 </div>
                <div class="modal-footer">
                    <input type="submit" id="message_request_save"  style="background-color:#2eca6a ;border-color: #2eca6a;" class="float-left btn btn-primary" value="إرسال">
                </div>
            
          </div>
      </div>
    </div>  
  

  </main><!-- End #main -->
@endsection


@section('js')

<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

<!--  Map APi css !-->
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-language/v1.0.0/mapbox-gl-language.js'></script>

<script src='https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js'></script>



    <!-- Map Api js -->
    <script>

      var lat = $('#lat').val()
      var lng = $('#lng').val()
      console.log(lat)
      console.log(lng)

      mapboxgl.accessToken =
          'pk.eyJ1IjoibW9oYW1tZWRhbGJvb3NpZnkiLCJhIjoiY2wzMHBpcmgyMXJyZDNibXA2aXM4cWN6MiJ9.zh5hoOMhrgtoAudRTSXAPg';
      const map = new mapboxgl.Map({
          container: 'map', // container ID
          style: 'mapbox://styles/mapbox/streets-v11', // style URL
          center: [lng, lat], // starting position [lng, lat]
          zoom: 11// starting zoom
      });

      var marker = new mapboxgl.Marker({
              color: "red",
              draggable: true
          }).setLngLat( [lng, lat])
          .addTo(map);

     


    


    

     


      // add search plugin

      mapboxgl.setRTLTextPlugin(
          'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js');

      map.addControl(new MapboxLanguage({
          defaultLanguage: 'ar'
      }));
    </script>

  <script>
  


  $(document).on('click', '#show_image_btn', function(e) {

        e.preventDefault();
        var el =$(this) ;

        var path = el.data("path")

     

        var url = '{{ asset('/storage/image/office/:path') }}';
        url = url.replace(':path', path);

        $('#image_add_src').attr("src",url);
    
        $('#show_image_modal').modal('show');


  });


  $(document).on('click', '#request', function(e) {


   
   if(localStorage.getItem('state_login') == '200'){
    
    $('#message_request_model').modal('show')
  
   }else{
   
    $('#login_client').modal('show')
   }
  });

  $(document).on('click', '#message_request_save', function(e) {

    send_request();
    $('#message_request_model').modal('hide');
   

});

  

  function send_request(){
   

     if($('#message_request').val()){
      var message=$('#message_request').val() 
      }else{
       var message='لايوجد'
      }

      if(localStorage.getItem('id_client')){
      var client= localStorage.getItem('id_client') 
      }else{
       var client=0
      }


  
  
    var data = {
          'id_client' : client,
          'id_offer' :$('#id_offer_client').val(),
          'id_office' :$('#id_office').val(),
          'message' :message
    } 

    
    var url = '{{ route('client.request_send_preview') }}';
    
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
          if(res.state == 200){
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'تم إرسال الطلب بنجاح سيتم التواصل معك في أقرب وقت.',
              showConfirmButton: false,
              timer: 3000
          });
          }else{
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'لقد قمت بإرسال الطلب مسبقا سيتم التواصل معك قريبا .',
              showConfirmButton: false,
              timer: 3000
          });
          }
       
        }
        
    });  

  }
      
      

    
     


</script>


@endsection