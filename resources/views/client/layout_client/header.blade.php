
  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Type</label>
              <select class="form-control form-select form-control-a" id="Type">
                <option>All Type</option>
                <option>For Rent</option>
                <option>For Sale</option>
                <option>Open House</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="city">City</label>
              <select class="form-control form-select form-control-a" id="city">
                <option>All City</option>
                <option>Alabama</option>
                <option>Arizona</option>
                <option>California</option>
                <option>Colorado</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bedrooms">Bedrooms</label>
              <select class="form-control form-select form-control-a" id="bedrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="garages">Garages</label>
              <select class="form-control form-select form-control-a" id="garages">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bathrooms">Bathrooms</label>
              <select class="form-control form-select form-control-a" id="bathrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="price">Min Price</label>
              <select class="form-control form-select form-control-a" id="price">
                <option>Unlimite</option>
                <option>$50,000</option>
                <option>$100,000</option>
                <option>$150,000</option>
                <option>$200,000</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
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
      
      <a class="navbar-brand text-brand" href="index.html">التجمع <span class="color-b"> العقاري&nbsp;</span></a>

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
              @if(Auth::guard('client')->check())
              <a class="dropdown-item " href="blog-single.html">طلب خاص</a>
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

      <button type="button" class="m-l-10 float-leaft btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>


      @if(Auth::guard('client')->check())
      <a  href="{{ route('client.logout') }}"  title='تسجيل الخروج' style="background-color: #f04444; margin-left:10px"  type="button" class=" float-leaft  btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" >
         <i class="bi bi-box-arrow-left"></i>

      </a>
      @else
      <button type="button" id="test" title='تسجيل الدخول' style="background-color: #7d8575;"  class="m-l-10 float-leaft btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse">
        <i class="bi bi-box-arrow-in-right"></i>
      </button>
      @endif
     




    </div>
  </nav><!-- End Header/Navbar -->
