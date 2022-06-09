
  @switch($data->model_name)
    @case('commercial')
            
      
      <div class="table-responsive">
        <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
            <thead>
                <tr>
                
                    <th class="wd-10p border-bottom-0">#</th>
                    <th class="wd-15p border-bottom-0"> نوع العقار</th>
                    <th class="wd-15p border-bottom-0"> المساحة </th>
                    <th class="wd-15p border-bottom-0">مزايا</th>
                    <th class="wd-15p border-bottom-0"> السعر </th>
                    <th class="wd-15p border-bottom-0"> طرق الدفع </th>
                    <th class="wd-15p border-bottom-0"> الوصف</th>
                    <th class="wd-15p border-bottom-0"> العمليات</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>تجاري</td>
                <td>{{ number_format($sub_model->area) }}-م</td>
                <td>
                  <div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                        <div  class="dropdown-menu tx-13">
                      @foreach($sub_model->extra_features as $extra_features)
                        @foreach($extra_features as $item)
                            <a class="dropdown-item" >{{$item}}</a>

                        @endforeach

                      @endforeach
                        </div>
                </div>
                </td>
                <td>{{ number_format($sub_model->price) }}</td>
                <td>
                    <div class="dropdown">
                      <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                      data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                            <div  class="dropdown-menu tx-13">
                          @foreach($sub_model->pyment_method as $pyment_method)
                            @foreach($pyment_method as $item)
                                <a class="dropdown-item" >{{$item}}</a>
                            @endforeach

                          @endforeach
                          </div>
                    </div>
                </td>
                <td> <button type="button" id="details_offer_btn" class="btn btn-sm btn-success" title="عرض الوصف"><i
                            class="fa fa-info-circle" aria-hidden="true"></i>
                    </button></td>
                <td> <button id="edit_details_offer_modal" class="btn btn-sm btn-info" title="تعديل"><i
                            class="las la-pen"></i></button></td>

            </tr>
              
            </tbody>
        </table>
      </div> 




    @break
    @case('lands')

      <div class="table-responsive">
        <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
            <thead>
                <tr>
                  <th class="wd-10p border-bottom-0">#</th>
                  <th class="wd-15p border-bottom-0"> نوع العقار</th>
                  <th class="wd-15p border-bottom-0"> المساحة </th>
                  <th class="wd-15p border-bottom-0"> نوع الوثائق </th>
                  <th class="wd-15p border-bottom-0">مزايا</th>
                  <th class="wd-15p border-bottom-0"> السعر </th>
                  <th class="wd-15p border-bottom-0"> طرق الدفع </th>
                  <th class="wd-15p border-bottom-0"> الوصف</th>
                  <th class="wd-15p border-bottom-0"> العمليات</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td>1</td>
                  <td>أراضي</td>
                  <td>{{ number_format($sub_model->area_land) }}-م</td>
                  <td>{{ $sub_model->document_type }}</td>
                  <td>
                    <div class="dropdown">
                      <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                      data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                      <div  class="dropdown-menu tx-13">
                        @foreach($sub_model->extra_features as $extra_features)
                          @foreach($extra_features as $item)
                              <a class="dropdown-item" >{{$item}}</a>
      
                          @endforeach
      
                        @endforeach
                      </div>
                    </div>
                  </td>
                  <td>{{ number_format($sub_model->price) }}</td>
                  <td>
                    <div class="dropdown">
                      <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                      data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                        <div  class="dropdown-menu tx-13">
                          @foreach($sub_model->pyment_method as $pyment_method)
                            @foreach($pyment_method as $item)
                                <a class="dropdown-item" >{{$item}}</a>
                            @endforeach
      
                          @endforeach
                        </div>
                    </div>
                  </td>
                  <td> <button type="button" id="details_offer_btn" class="btn btn-sm btn-success" title="عرض الوصف"><i
                              class="fa fa-info-circle" aria-hidden="true"></i>
                      </button></td>
                  <td> <button id="edit_details_offer_modal" class="btn btn-sm btn-info" title="تعديل"><i
                              class="las la-pen"></i></button></td>
                </tr>
              
            </tbody>
        </table>
      </div>   
          
    @break
     @case('apartment')  
      <div class="table-responsive">
        <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
            <thead>
                <tr>
                  <th class="wd-10p border-bottom-0">#</th>
                    <th class="wd-15p border-bottom-0"> نوع العقار</th>
                    <th class="wd-15p border-bottom-0"> المساحة </th>
                    <th class="wd-15p border-bottom-0"> نوع الوثائق </th>
                    <th class="wd-15p border-bottom-0"> الغرف </th>
                    <th class="wd-15p border-bottom-0"> دوراة المياة </th>
                    <th class="wd-15p border-bottom-0"> الطابق </th>
                    <th class="wd-15p border-bottom-0"> عمر البناء </th>
                    <th class="wd-15p border-bottom-0">حالة الفرش</th>
                    <th class="wd-15p border-bottom-0"> مزايا إضافية</th>
                    <th class="wd-15p border-bottom-0"> السعر </th>
                    <th class="wd-15p border-bottom-0"> طرق الدفع </th>
                    <th class="wd-15p border-bottom-0"> الوصف</th>
                    <th class="wd-15p border-bottom-0"> العمليات</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>شقق</td>
                <td>{{ number_format($sub_model->area) }}-م</td>
                <td>{{ $sub_model->document_type }}</td>
                <td>{{ $sub_model->rooms }}</td>
                <td>{{ $sub_model->bathrooms }}</td>
                <td>{{ $sub_model->floor }}</td>
                <td>{{ $sub_model->age }}</td>
                <td>{{ $sub_model->furnished }}</td>
                <td>
                  <div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                      @foreach($sub_model->extra_features as $extra_features)
                        @foreach($extra_features as $item)
                            <a class="dropdown-item" >{{$item}}</a>
      
                        @endforeach
      
                      @endforeach
                  </div>
                  </div>
                </td>
                <td>{{ number_format($sub_model->price) }}</td>
                <td>
                  <div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        @foreach($sub_model->pyment_method as $pyment_method)
                          @foreach($pyment_method as $item)
                              <a class="dropdown-item" >{{$item}}</a>
                          @endforeach
      
                        @endforeach
                    </div>
                  </div>
                </td>
                <td> <button type="button" id="details_offer_btn" class="btn btn-sm btn-success" title="عرض الوصف"><i
                            class="fa fa-info-circle" aria-hidden="true"></i>
                    </button></td>
                <td> <button id="edit_details_offer_modal" class="btn btn-sm btn-info" title="تعديل"><i
                            class="las la-pen"></i></button></td>
      
              </tr>
            </tbody>
        </table>
      </div>  

  
     @break
     @case('houses')

      <div class="table-responsive">
        <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
            <thead>
                <tr>
                  <th class="wd-15p border-bottom-0"> نوع العقار</th>
                  <th class="wd-15p border-bottom-0"> نوع الوثائق </th>
                  <th class="wd-15p border-bottom-0"> مساحة الأرض </th>
                  <th class="wd-15p border-bottom-0"> مساحة المنزل </th>
                  <th class="wd-15p border-bottom-0"> الغرف </th>
                  <th class="wd-15p border-bottom-0"> دوراة المياة </th>
                  <th class="wd-15p border-bottom-0"> الطابق </th>
                  <th class="wd-15p border-bottom-0"> عمر البناء </th>
                  <th class="wd-15p border-bottom-0">حالة الفرش</th>
                  <th class="wd-15p border-bottom-0"> مزايا إضافية</th>
                  <th class="wd-15p border-bottom-0"> السعر </th>
                  <th class="wd-15p border-bottom-0"> طرق الدفع </th>
                  <th class="wd-15p border-bottom-0"> الوصف</th>
                  <th class="wd-15p border-bottom-0"> العمليات</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>منازل</td>
                <td>{{ $sub_model->document_type }}</td>
                <td>{{ number_format($sub_model->area_land) }}-م</td>
                <td>{{ number_format($sub_model->area) }}-م</td>
                <td>{{ $sub_model->rooms }}</td>
                <td>{{ $sub_model->bathrooms }}</td>
                <td>{{ $sub_model->floor }}</td>
                <td>{{ $sub_model->ageسنة }}</td>
                <td>{{ $sub_model->furnished }}</td>
                <td>
                  <div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        @foreach($sub_model->extra_features as $extra_features)
                          @foreach($extra_features as $item)
                              <a class="dropdown-item" >{{$item}}</a>
      
                          @endforeach
      
                        @endforeach
                    </div>
                  </div>
                </td>
                <td>{{ number_format($sub_model->price) }}</td>
                <td>
                  <div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                        @foreach($sub_model->pyment_method as $pyment_method)
                          @foreach($pyment_method as $item)
                              <a class="dropdown-item" >{{$item}}</a>
                          @endforeach
      
                        @endforeach
                    </div>
                  </div>
                </td>
                <td> <button type="button" id="details_offer_btn" class="btn btn-sm btn-success" title="عرض الوصف"><i
                            class="fa fa-info-circle" aria-hidden="true"></i>
                    </button></td>
                <td> <button id="edit_details_offer_modal" class="btn btn-sm btn-info" title="تعديل"><i
                            class="las la-pen"></i></button></td>
      
              </tr>
            </tbody>
        </table>
      </div>   
       
     @break   
     @case('villas_palaces')
             
      <div class="table-responsive">
        <table class="table mg-b-0 text-center text-md-nowrap table-hover " id="example1_wrapper">
            <thead>
                <tr>
                  <th class="wd-15p border-bottom-0"> نوع العقار</th>
                  <th class="wd-15p border-bottom-0"> نوع الوثائق </th>
                  <th class="wd-15p border-bottom-0"> مساحة الأرض </th>
                  <th class="wd-15p border-bottom-0"> مساحة المنزل </th>
                  <th class="wd-15p border-bottom-0">  الأجنحة </th>
                  <th class="wd-15p border-bottom-0"> الغرف </th>
                  <th class="wd-15p border-bottom-0"> دوراة المياة </th>
                  <th class="wd-15p border-bottom-0"> الطابق </th>
                  <th class="wd-15p border-bottom-0"> عمر البناء </th>
                  <th class="wd-15p border-bottom-0">حالة الفرش</th>
                  <th class="wd-15p border-bottom-0"> مزايا إضافية</th>
                  <th class="wd-15p border-bottom-0"> السعر </th>
                  <th class="wd-15p border-bottom-0"> طرق الدفع </th>
                  <th class="wd-15p border-bottom-0"> الوصف</th>
                  <th class="wd-15p border-bottom-0"> العمليات</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>فلل -قصور</td>
                <td>{{ $sub_model->document_type }}</td>
                <td>{{ number_format($sub_model->area_land) }}-م</td>
                <td>{{ number_format($sub_model->area) }}-م</td>
                <td>{{ $sub_model->wings }}</td>
                <td>{{ $sub_model->rooms }}</td>
                <td>{{ $sub_model->bathrooms }}</td>
                <td>{{ $sub_model->floor }}</td>
                <td>{{ $sub_model->age }}</td>
                <td>{{ $sub_model->furnished }}</td>
                <td>
                  <div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                      @foreach($sub_model->extra_features as $extra_features)
                        @foreach($extra_features as $item)
                            <a class="dropdown-item" >{{$item}}</a>

                        @endforeach

                      @endforeach
                    </div>
                  </div>
                </td>
                <td>{{ number_format($sub_model->price) }}</td>
                <td>
                  <div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fas fa-caret-down ml-1"></i></button>
                    <div  class="dropdown-menu tx-13">
                      @foreach($sub_model->pyment_method as $pyment_method)
                        @foreach($pyment_method as $item)
                            <a class="dropdown-item" >{{$item}}</a>
                        @endforeach

                      @endforeach
                    </div>
                  </div>
                </td>
                <td> <button type="button" id="details_offer_btn" class="btn btn-sm btn-success" title="عرض الوصف"><i
                            class="fa fa-info-circle" aria-hidden="true"></i>
                    </button></td>
                <td> <button id="edit_details_offer_modal" class="btn btn-sm btn-info" title="تعديل"><i
                            class="las la-pen"></i></button></td>

              </tr>
            </tbody>
        </table>
      </div>   
     @break 
  @endswitch 

  
 







<div class="modal" id="details_offer_modal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content tx-size-sm">
            <div class=" card-header tx-medium bd-0 tx-white bg-primary">
              {{$sub_model->title}}   
            </div>
            <div class="card-body">
                <p class="mg-b-5">
                  {{$sub_model->description}}   
                  ...</p>
            </div>

            <div class="modal-footer">
                <button class="btn ripple btn-secondary close_details_offer_modal" type="button">رجوع</button>
            </div>
        </div>
    </div>
</div>