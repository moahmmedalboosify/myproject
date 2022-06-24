@extends('client.layout_client.main')

@section('title')
 معلومات المكتب
@endsection

@section('content')
<main id="main">

    <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single"> <strong>مكتب  <span class="color-b"> {{$office[0]['name_office']}} </span></strong></h1>
                {{-- <span class="color-text-a">Agent Immobiliari</span> --}}
                 <input type="hidden" id="id_office" value="{{$office[0]['id']}}" >
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">مكاتب</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="#">عقارية</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    الصفحة الرئيسية
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section><!-- End Intro Single -->
  

  <!-- ======= Agent Single ======= -->
  <section class="agent-single">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
           
            @foreach( $office as $key => $item)
            <div class="col-md-6">
              <div class="agent-avatar-box">
                <img style="width:336; height:376px" src="{{asset('/storage/image/admin/'.$item['name']) }}" alt="" class="agent-avatar img-fluid">
              </div>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="agent-info-box">
                <div class="agent-title">
                  <div class="title-box-d">
                    <h3 class="title-d"><strong>مكتب  <span class="color-b"> {{$item['name_office']}} </span></strong>
                      <br> {{$item['regions']['name']}}
                    </h3>
                  </div>
                </div>
                <div class="agent-content mb-3">
                  <p  class="content-d color-text-a" >
                    {{$item['description']}}
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>رقم الهاتف: </strong>
                      <span class="color-text-a">  {{$item['phone']}} </span>
                    </p>
                  
                    <p>
                      <strong>البريد الإلكتروني: </strong>
                      <span class="color-text-a"> {{$item['email']}}</span>
                    </p>
                   
                    <p>
                      <strong>العنوان: </strong>
                      <span class="color-text-a"> {{$item['regions']['cities']['name']}}/{{$item['regions']['name']}}</span>
                    </p>
                  </div>
                    <a href="" onclick="return false;" id="request" data-value="0">
                     <div class="property-price foo mg-b-20">
                        <div class="card-header-c d-flex">
                          <div class="card-box-ico">
                         <strong> <h3 class="title-d" > تقييم المكتب</h3>  </strong>
                          </div>
                          
                        </div>
                    </a>
                  
                </div>
           
                <div class="socials-footer">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="bi bi-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="bi bi-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="bi bi-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="bi bi-linkedin" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>



        <div class="col-md-12 section-t8">
          <div class="title-box-d">
            <h3 class="title-d">العقارات({{$data->count()}})</h3>
          </div>
        </div>
        <div class="row property-grid grid">
          <div class="col-sm-12">
            <div class="grid-option">
              <form>
                <select id="search_offer_simple" class="custom-select">
                  <option selected>جميع العقارات</option>
                
                  <option value="البيع">البيع</option>
                  <option value="الإيجار">الإيجار</option>
                </select>
              </form>
            </div>
          </div>
          <div id="office_single_offer">
            @include('client.fetch_ajax.office_single_offer')
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Agent Single -->

</main><!-- End #main -->

@endsection



@section('js')


<script>

    $(document).ready(function() {

        $(document).on('change', '#search_offer_simple', function(e) {
       
         var data = {
               'value' :$('#search_offer_simple').val()
         }

         console.log(data)
         var id =$('#id_office').val()
         var url = '{{ route('client.search_single_offices', ':id') }}';
         url = url.replace(':id', id);
          $.ajax({
              type: "GET",
              url: url,
              data: data,
              success: function(res) {

         console.log(res)

                $('#office_single_offer').html(res)
              }

          });


        });


   });

</script>




@endsection

