<div class="row">
    <div class="grid-option">

     
 

        <div class="dropdown" style="text-align: right; ">
            <a aria-expanded="false" aria-haspopup="true" style=" border-color: #2eca6a;"  class="form-control custom-select"
            data-toggle="dropdown" id="dropdownMenuButton" type="button"> جميع المكاتب</a>
            <div  class="dropdown-menu tx-13 ">
               
                <a  aria-controls="" aria-expanded="false" data-toggle="collapse"  id="all" > جميع المكاتب</a>
                <br>
                <a  aria-controls="name_office" aria-expanded="false" data-toggle="collapse" href="#name_office" >الإسم</a>
                <br>
                <a  aria-controls="city_office" aria-expanded="false" data-toggle="collapse" href="#city_office" >المدينة</a>

          
            </div>
        </div>
        <div class="collapse" id="name_office">
            <div class="row" style="margin-top: 20px;">
                <div class="col-4 float-right" >
                <input type="text" id="name" class="form-control" placeholder="أدخل إسم المكتب" required="required">
                </div>
    
                <div class="col-4 mg-t-10">
    
                <button type="button" id="name_office_search" class="btn btn-b-n " >
                    <i class="bi bi-search"></i>
                  </button>

               
                  
                </div> 
            </div>
        </div>

         <div class="collapse" id="city_office">
            <div class="row" style="margin-top: 20px;">
                <div class="col-4 float-right" >
                        <select name="city" id="city_test"  class="form-control SlectBox">
                            <!--placeholder-->
                            <option value="0"> حدد المدينة</option>
                            <option value="طرابلس"> طرابلس</option>
                            <option value="مصراته">مصراته </option>
                            <option value="بنغازي"> بنغازي</option>
                            <option value="صبراته"> صبراته </option>
                            <option value="الزاوية">الزاوية </option>
                        </select>
            
                </div>

                <div class="col-4 float-right" >
                        <select name="region" id="region_test" class="form-control">
                          <!--placeholder-->
                          <option value="0" selected disabled>حدد المنطقة</option>
                      </select>
                </div>

                <div class="col-4 mg-t-10">
    
                <button type="button" id="city_office_search"  class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
                    <i class="bi bi-search"></i>
                  </button>

               

                </div>
            </div>
        </div>
      
    </div>
    <hr>

    @if($offices !=0)
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
                            <h3>  مكتب {{ $item['name_office']}} </h3>

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
    @else
     <div>
       <h2> المكتب الذي تبحث عنه غير موجود .</h2>
     </div>
    @endif
  </div>