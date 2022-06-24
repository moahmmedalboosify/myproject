
  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">

    <div style="float: left" class="title-box-d ">
      <h3 class="title-d">إبحث عن عقار</h3>
    </div>

    <span class="close-box-collapse bi bi-x"></span>
 
 
    <div class="box-collapse-wrap form">
      <form class="form-a" id="form_search">
        <div class="row">
      
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">نوع العقار</label>
              <select class="form-control form-select form-control-a" name="type_offer" id="type_offer">
                <option value=""> حددد النوع </option>
                <option value="apartment"> شقق</option>
                <option value="houses"> منازل </option>
                <option value="villas_palaces"> فلل-قصور </option>
                <option value="lands"> أراضي </option>
                <option value="commercial"> تجاري </option>
              </select>
            </div> 
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="city">حالة العقار</label>
              <select class="form-control form-select form-control-a" name="state_offer" id="state_offer">
                <option value="">حدد الحالة</option>
                <option value="البيع">البيع</option>
                <option value="الإيجار">الإيجار</option>
                
              </select>
            </div>
          </div> 
         
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bathrooms">المدينة</label>
              <select class="form-control form-select form-control-a" name="city" id="city_search">
                <option value=""> حدد المدينة</option>
                <option value="1"> طرابلس</option>
                <option value="3">مصراته </option>
                <option value="2"> بنغازي</option>
                <option value="صبراته"> صبراته </option>
                <option value="الزاوية">الزاوية </option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bathrooms">المنطقة</label>
              <select class="form-control form-select form-control-a" name="region" id="region_search">
                <option  value="" >حدد المنطقة</option>

              </select>
            </div>
          </div>
         
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="price_max">السعر الأعلي</label>
              <input type="number" class="form-control form-control-lg form-control-a" name="price_max" id="price_max" placeholder="السعر الأعلي">
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">إبحث</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      
      <a class="navbar-brand text-brand"  href="{{route('home')}}">التجمع <span class="color-b"> العقاري&nbsp;</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="{{route('home')}}">الرئيسية</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link " href="{{route('view.offers')}}">عقارات</a>
          </li>

         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">خدماتنا</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="{{route('client.view_offices')}}">مكاتب عقارية</a>
             
              <a class="dropdown-item " href="{{route('client.view_private_request')}}">طلب خاص</a>
              @if(Auth::guard('client')->check())
              <a class="dropdown-item " href="   {{route('client.myrequests',['id'=>Auth::guard('client')->user()->id])}}"> طلباتي</a>
              @endif
           
            </div>
          </li>
        
          {{-- <li class="nav-item">
            <a class="nav-link " href="blog-grid.html">مقالات</a>
          </li> --}}

          <li class="nav-item">
            <a class="nav-link " href="{{route('client.view_about')}}">من نحن</a>
          </li>
      
          <li class="nav-item">
            <a class="nav-link " href="{{ route('client.view_contact')}}">تواصل معنا </a>
          </li>
        </ul>
      </div>

      @php
      $route = Route::current()->getName();
      @endphp
   
   @if($route == 'view.offers')
      <button type="button" class="m-l-10 float-leaft btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>
      @endif

      @if(Auth::guard('client')->check())
      <a  id="logout_client"  title='تسجيل الخروج' style="background-color: #f04444; margin-left:10px"  type="button" class=" float-leaft  btn btn-b-n " >
         <i class="bi bi-box-arrow-left"></i>

      </a>
      @else
      <button type="button" id="test" title='تسجيل الدخول' style="background-color: #99b6a4;margin-right: 10px; "  class="m-l-10 float-leaft btn btn-b-n">
        <i class="bi bi-box-arrow-in-right"></i>
      </button>
      @endif
     




    </div>
  </nav><!-- End Header/Navbar -->
