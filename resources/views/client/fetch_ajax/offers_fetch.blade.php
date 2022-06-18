<div class="row">
  <div class="grid-option">
    
      <select id="search_offer_simple" style="border-color: #2eca6a;" class="form-control custom-select">  
        <option selected>جميع العقارات</option>
        <option value="البيع">البيع</option>
        <option value="الإيجار">الإيجار</option>
      </select>
    
  </div>

@foreach ($data as $row)

  <div class="col-md-4">
    <div class="card-box-a card-shadow">
      <div class="img-box-a">
        <img style="width:350px; height:300px"  src="{{asset('/storage/image/office/'.$offer_image[$row->id]) }}" alt="" class="img-a img-fluid">
      </div>
      <div class="card-overlay">
        <div class="card-overlay-a-content">
          <div class="card-header-a">
            <h2 class="card-title-a">
              <a href="#">
                <span style="font-size:20px" class="color-b">  مكتب{{' '.$row['office_infos']['name_office']}}</span>
                <br /> 
               {{$offer_details[$row->id]['title']}}
                {{-- offer_details --}}
              </a>
            </h2>
          </div>
          <div class="card-body-a">
            <div class="price-box d-flex">
              <span class="price-a">{{$row['state']}} | $  {{number_format( $offer_details[$row->id]['price'] )}}</span>
            </div>
            <a href="property-single.html" class="link-a">إضغط هنا لتفاصيل العقار
              <span class="bi bi-chevron-right"></span>
            </a>
          </div>
          <div class="card-footer-a">
            <ul class="card-info d-flex justify-content-around">
              <li>
                <h4 class="card-info-title">Area</h4>
                <span>340m
                  <sup>2</sup>
                </span>
              </li>
              <li>
                <h4 class="card-info-title">Beds</h4>
                <span>2</span>
              </li>
              <li>
                <h4 class="card-info-title">Baths</h4>
                <span>4</span>
              </li>
              <li>
                <h4 class="card-info-title">Garages</h4>
                <span>1</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>


@endforeach
</div>