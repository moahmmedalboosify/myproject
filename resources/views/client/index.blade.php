@extends('client.layout_client.main')

@section('content')




<div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">

      


      @foreach ($data as $key =>$row)
        @if( $key <2)
        <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image:url({{asset('/storage/image/office/'.$row['name_image']) }}) ">
          <div class="overlay overlay-a"></div>
          <div class="intro-content display-table">
            <div class="table-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="intro-body"> 
                      <p class="intro-title-top">
                        <span class="color-b">{{  $row['regions']['cities']['name']}} </span>,{{$row['regions']['name'] }}
                        <br>  رقم العقار :{{$row['number_offer']}}
                      </p>
                      <h1 class="intro-title mb-4 ">
                        <span class="color-b">
                        {{$row['title']}}
                        </span> 
                        <br>
                      </h1>
                      <p class="intro-subtitle intro-price">
                        <a href="#"><span class="price-a">دينار | $ {{number_format($row['price'])}}</span></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      @endforeach

        
         



  
     

    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="section-services section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">خدماتنا</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-cart"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">مكاتب عقارية </h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                 خدمت مكاتب عقارية ,هيا خدمة مقدمة للعملاء المحتملين والباحثين عن عقار , حيث تختص المكاتب بعرض العقارات
                 بمواصفات عالية.
                </p>
              </div>
              <div class="card-footer-c">
                <a href="#" class="link-c link-icon">إكتشف المزيد
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-calendar4-week"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">طلب خاص</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  طلب خاص هيا خدمة مقدمة من المكاتب العقارية , حيث في بعض الأحيان
                   يبحث العميل عن عقار بمواصفات خاصه.
                </p>
              </div>
              <div class="card-footer-c">
                <a href="#" class="link-c link-icon">إكتشف المزيد
                  <span class="bi bi-calendar4-week"></span>
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico" >
                  <span class="bi bi-card-checklist"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">طلب معاينة</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  طلب معاينة هيا خدمة مقدمة من المكاتب العقارية , تم توفير هذه الخدمة
                  لتوفير الوقت لزبون  حيث يتم إرسال طلب يحتوي علي معلومات الزبون
                  والعقار المراد معاينته  ثم يقوم المكتب بترتيب الموعد مع مالك العقار
                  ويتم معاينة العقار.
                </p>
              </div>
              {{-- <div class="card-footer-c">
                <a href="#" class="link-c link-icon">إكتشف المزيد
                  <i class="bi bi-card-checklist"></i>

                </a>
              </div> --}}
            </div>
          </div>
       
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">عقارات حديثة</h2>
              </div>
              <div class="title-link">
                <a href="{{route('view.offers')}}">جميع العقارات
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
            @foreach ($data as $key =>$item)
              @if( $key >1)

              <div class="col-md-4">
               <div class="card-box-d">
                  <div class="img-box-a">
                    <img style="width:350px; height:300px"  src="{{asset('/storage/image/office/'.$item['name_image']) }}" alt="" class="img-a img-fluid">
                  </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a href="property-single.html">
                            {{$item['title']}}
                          </a>
                        </h2>
                      </div>
                      <div class="card-body-a">
                        <div class="price-box d-flex">
                          <span class="price-a">{{$item['state']}} | $ {{number_format($item['price'])}}</span>
                        </div>
                        <a href="#" class="link-a">المزيد من التفاصيل
                          <span class="bi bi-chevron-right"></span>
                        </a>
                      </div>
                      <div class="card-footer-a">
                        <ul class="card-info d-flex justify-content-around">
                          @if($item['model_name'] == 'lands' || $item['model_name'] == 'commercial' )
                          <li>
                            <h4 class="card-info-title">المساحة</h4>
                            <span>{{  $item['model_name'] == 'lands'?  $item['area_land'] : $item['area'] }}m
                              <sup>2</sup>
                            </span>
                          </li>
                           @if($item['model_name'] == 'lands' )
                          <li>
                            <h4 class="card-info-title">الوثائق</h4>
                            <span>{{$item['document_type']}}</span>
                          </li>
                          @endif
                         
                          @else
                          <li>
                            <h4 class="card-info-title">المساحة</h4>
                            <span>{{$item['area']}}m
                              <sup>2</sup>
                            </span>
                          </li>
                          <li>
                            <h4 class="card-info-title">الغرف</h4>
                            <span>{{$item['rooms']}}</span>
                          </li>
                          <li>
                            <h4 class="card-info-title">الحمامات</h4>
                            <span>{{$item['bathrooms']}}</span>
                          </li>
                          <li>
                            <h4 class="card-info-title">الطابق</h4>
                            <span>{{$item['floor']}}</span>
                          </li>

                          @endif
                       

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End carousel item -->
              @endif
            @endforeach
        </div>
       
        {{-- <div class="propery-carousel-pagination carousel-pagination"></div> --}}

      </div>
    </section><!-- End Latest Properties Section -->

    <!-- ======= Agents Section ======= -->
    <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">أفضل المكاتب</h2>
              </div>
              <div class="title-link">
                <a href="agents-grid.html">جميع المكاتب
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          @foreach( $offices as $key => $item)
        
            <div class="col-md-4">
              <div class="card-box-d">
                <div class="card-img-d">
                  <img style="width:350px; height:300px" src="{{asset('/storage/image/admin/'.$item['name']) }}" alt="dfsdfd" class="img-d img-fluid">
                </div>
                <div class="card-overlay card-overlay-hover">
                  <div class="card-header-d">
                    <div class="card-title-d align-self-center">
                      <h3 class="title-d">
                        <a href="{{route('client.single_office',['id'=>$item['id']])}}" class="link-two">
                          {{$item['description']}}
                        </a>
                      </h3>
                    </div>
                  </div>
                  <div class="card-body-d">
                   
                    <div class="info-agents color-a">
                      <p>
                        <strong>رقم الهاتف: </strong>{{$item['phone']}}
                      </p>
                      <p>
                        <strong>البريد الألكتروني: </strong> {{$item['email']}}
                      </p>
                    </div>
                  </div>
                  <div class="card-footer-d">
                    <div class="socials-footer d-flex justify-content-center">
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
              </div>
            </div>
        

          @endforeach
        
        </div>
      </div>
    </section><!-- End Agents Section -->

    <!-- ======= Latest News Section ======= -->
    <section class="section-news section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">مقالات حديثة</h2>
              </div>
              <div class="title-link">
                <a href="blog-grid.html">جميع المقالات
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="news-carousel" class="swiper">
          <div class="swiper-wrapper">

            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="client/assets/img/post-2.jpg" alt="" class="img-b img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="#" class="category-b">House</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="blog-single.html">House is comming
                          <br> new</a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">18 Sep. 2017</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="client/assets/img/post-5.jpg" alt="" class="img-b img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="#" class="category-b">Travel</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="blog-single.html">Travel is comming
                          <br> new</a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">18 Sep. 2017</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="client/assets/img/post-7.jpg" alt="" class="img-b img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="#" class="category-b">Park</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="blog-single.html">Park is comming
                          <br> new</a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">18 Sep. 2017</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="client/assets/img/post-3.jpg" alt="" class="img-b img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="#" class="category-b">Travel</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="#">Travel is comming
                          <br> new</a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">18 Sep. 2017</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

          </div>
        </div>

        <div class="news-carousel-pagination carousel-pagination"></div>
      </div>
    </section><!-- End Latest News Section -->


  </main><!-- End #main -->



@endsection
