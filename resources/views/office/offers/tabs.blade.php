<div class="tab-pane active" id="tab1">
    <div id="table_client_info">
        @include('office.offers.fetch_ajax.client_info')
    </div>
</div>


<div class="tab-pane " id="tab2">
    <div id="table_client_info">
        @include('office.offers.fetch_ajax.offer_info')
    </div>
</div>



<div class="tab-pane " id="tab3">

    <div class="row justify-content-between">
        <div class="col-md-5 col-lg-4">
        
          <div class="property-summary">
            <div class="row">
              <div class="col-sm-12">
                <div class="title-box-d section-t4">
                  <h3 class="title-d">Quick Summary</h3>
                </div>
              </div>
            </div>
            <div class="summary-list">
              <ul class="list">
                <li class="d-flex justify-content-between">
                  <strong>Property ID:</strong>
                  <span>1134</span>
                </li>
                <li class="d-flex justify-content-between">
                  <strong>Location:</strong>
                  <span>Chicago, IL 606543</span>
                </li>
                <li class="d-flex justify-content-between">
                  <strong>Property Type:</strong>
                  <span>House</span>
                </li>
                <li class="d-flex justify-content-between">
                  <strong>Status:</strong>
                  <span>Sale</span>
                </li>
                <li class="d-flex justify-content-between">
                  <strong>Area:</strong>
                  <span>340m
                    <sup>2</sup>
                  </span>
                </li>
                <li class="d-flex justify-content-between">
                  <strong>Beds:</strong>
                  <span>4</span>
                </li>
                <li class="d-flex justify-content-between">
                  <strong>Baths:</strong>
                  <span>2</span>
                </li>
                <li class="d-flex justify-content-between">
                  <strong>Garage:</strong>
                  <span>1</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-lg-7 section-md-t3">

            <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">العنوان الرئيسي</h3>
                  </div>
                </div>
              </div>
              <div class="border property-description">
                <p class="description color-text-a">
                 شقة في السلماني تشطيب فاخر
                </p>
                
              </div> 

          <div class="row">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Property Description</h3>
              </div>
            </div>
          </div>
          <div class="border property-description">
            <p class="description color-text-a">
                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع..
            </p>
            <p class="description color-text-a no-margin">
                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
            </p>
          </div>
          <div class="row section-t3">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Amenities</h3>
              </div>
            </div>
          </div>
          <div class="amenities-list color-text-a">
            <ul class="list-a no-margin">
              <li>Balcony</li>
              <li>Outdoor Kitchen</li>
              <li>Cable Tv</li>
              <li>Deck</li>
              <li>Tennis Courts</li>
              <li>Internet</li>
              <li>Parking</li>
              <li>Sun Room</li>
              <li>Concrete Flooring</li>
            </ul>
          </div>
        </div>
      </div>

    {{-- @switch($row->model_name)
    @case('commercial')
        
        @break
    @case('land')
         
        @break
     @case('apartment')  
        
        @break
     @case('houses')
       
        @break   
     @case('villas_palaces')
     
        @break    --}}


</div>

<div class="tab-pane " id="tab4">

    <div class="table-responsive">
        <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
            <thead>
                <tr>
                    <th class="wd-10p border-bottom-0">#</th>
                    <th class="wd-15p border-bottom-0">أسم الزبون</th>
                    <th class="wd-20p border-bottom-0"> رقم الهاتف</th>
                    <th class="wd-15p border-bottom-0"> المستخدم</th>
                    <th class="wd-10p border-bottom-0">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @php
                  $i=0;  
                @endphp
                @foreach ($data as $key => $row)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td >{{ $row->clients->name }}</td>
                        <td>{{ $row->clients->phone }}</td>
                        <td> <label class="badge badge-success">{{ $row->users->email }}</label> </td>
                        <td>
                         <button id="edit_client_btn" data-name="{{$row->clients->name}}"  data-phone="{{ $row->clients->phone}}"  data-value="{{$row->clients->id}}" class="btn btn-sm btn-info"
                                    title="تعديل"><i class="las la-pen"></i></button>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>


<div class="tab-pane " id="tab5">

    <div class="table-responsive">
        <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
            <thead>
                <tr>
                    <th class="wd-10p border-bottom-0">#</th>
                    <th class="wd-15p border-bottom-0">أسم الزبون</th>
                    <th class="wd-20p border-bottom-0"> رقم الهاتف</th>
                    <th class="wd-15p border-bottom-0"> المستخدم</th>
                    <th class="wd-10p border-bottom-0">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @php
                  $i=0;  
                @endphp
                @foreach ($data as $key => $row)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td >{{ $row->clients->name }}</td>
                        <td>{{ $row->clients->phone }}</td>
                        <td> <label class="badge badge-success">{{ $row->users->email }}</label> </td>
                        <td>
                         <button id="edit_client_btn" data-name="{{$row->clients->name}}"  data-phone="{{ $row->clients->phone}}"  data-value="{{$row->clients->id}}" class="btn btn-sm btn-info"
                                    title="تعديل"><i class="las la-pen"></i></button>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>





