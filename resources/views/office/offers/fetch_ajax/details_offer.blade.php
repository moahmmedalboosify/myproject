<input type="hidden" id="type_offer_test" value="{{$data->model_name}}" >
<input type="hidden" id="id_offer" value="{{$data->id}}" >
<input type="hidden" id="sub_model_id" value="{{$sub_model->id}}" >

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
                <td> <button id="edit_details_offer_btn" class="btn btn-sm btn-info" title="تعديل"><i
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
                  <td> <button id="edit_details_offer_btn" class="btn btn-sm btn-info" title="تعديل"><i
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
                <td> <button id="edit_details_offer_btn" class="btn btn-sm btn-info" title="تعديل"><i
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
                <td> <button id="edit_details_offer_btn" class="btn btn-sm btn-info" title="تعديل"><i
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
                <td> <button id="edit_details_offer_btn" class="btn btn-sm btn-info" title="تعديل"><i
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




<div class="modal" id="edit_details_offer_model">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
        <form id="details_offer_form">

          <input type="hidden" name="model" id="model_test" value="" >
          <input type="hidden" name="model_id" id="model_id_test" value="" >

          <div class="modal-header">
              <h6 class="modal-title">تحديث تفاصيل العقار</h6><button aria-label="Close"
                  class="close" data-dismiss="modal" type="button"><span
                      aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
       
          
      
          <div class="my-3">
            <div class="row">

                <div class="col" id="document_div">
                    <label for="inputName" class="control-label mt-2">نوع الوثائق</label>
                    <select name="document_type" id="document_type" class="form-control SlectBox">
                        <!--placeholder-->
                        <option value="شهادة عقارية"> شهادة عقارية</option>
                        <option value="تخصيص"> تخصيص</option>
                    </select>
                    <span id="document_error" class="text-danger"></span>
                </div>


                <div class="col" id="age_div">
                    <label for="inputName" class="control-label mt-2">عمر البناء</label>
                    <select id="age" name="age" class="form-control SlectBox">
                        <option value="جديد">جديد</option>
                        <option value="1-5">1-5 سنة</option>
                        <option value="6-10">6-10 سنة</option>
                        <option value="+10">+10 سنة</option>
                    </select>
                    <span id="age_error" class="text-danger"></span>

                </div>


                <div class="col" id="wings_div">
                    <label for="inputName" class="control-label mt-2"> عدد الأجنحة </label>
                    <select id="wings" name="wings" class="form-control SlectBox">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="+4">+4</option>

                    </select>
                    <span id="wings_error" class="text-danger"></span>

                </div>


            </div>
            <div class="row">

                <div class="col" id="area_div">
                    <label for="inputName" class="control-label mt-2">المساحة</label>

                    <div class="input-group ">

                        <input type="number" id="area" name="area" class="form-control"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append ">
                            <span class="input-group-text" id="basic-addon2">متر مربع</span>
                        </div>
                    </div>
                    <span id="area_error" class="text-danger"></span>

                </div>

                <div class="col" id="area_land_div">
                    <label for="inputName" class="control-label mt-2">المساحة الأرض</label>

                    <div class="input-group ">

                        <input type="number" id="area_land" name="area_land" class="form-control"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append ">
                            <span class="input-group-text" id="basic-addon2">متر مربع</span>
                        </div>
                    </div>
                    <span id="area_land_error" class="text-danger"></span>

                </div>



                <div class="col" id="room_div">
                    <label for="inputName" class="control-label mt-2">الغرف</label>
                    <select id="rooms" name="rooms" class="form-control ">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="+4">+4</option>
                    </select>
                    <span id="room_error" class="text-danger"></span>
                </div>

                <div class="col" id="bathroom_div">
                    <label for="inputName" class="control-label mt-2">دورات المياه</label>
                    <select id="bathrooms" name="bathrooms" class="form-control ">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="+4">+4</option>
                    </select>
                    <span id="bathroom_error" class="text-danger"></span>

                </div>
            </div>

            <div class="row">
                <div class="col" id="floor_div">
                    <label for="inputName" class="control-label mt-2">الطابق</label>
                    <select id="floor" name="floor" class="form-control SlectBox">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="+4">+4</option>
                    </select>
                    <span id="floor_error" class="text-danger"></span>

                </div>

                <div class="col" id="furnished_div">
                    <label for="inputName" class="control-label mt-2">نوع الفرش </label>
                    <select id="furnished" name="furnished" class="form-control SlectBox">
                        <option value="مفروش">مفروش</option>
                        <option value="غير مفروش">غير مفروش</option>

                    </select>
                    <span id="furnished_error" class="text-danger"></span>

                </div>


                <div class="col" id="extra_features_div">
                    <label for="inputName" class="control-label mt-2">مميزات أضافية </label>
                    <select id="extra_features" name="extra_features[]" multiple class="form-control SlectBox">
                        <option  value="مكيف">مكيف</option>
                        <option value="قراج خاص">قراج خاص</option>
                        <option value="بلكونة"> بلكونة</option>
                        <option value="حديقة"> حديقة</option>
                        <option value="مدخل خاص"> مدخل خاص</option>
                        <option value="قرب الخدمات"> قرب الخدمات</option>
                        <option value="بئر ماء"> بئر ماء</option>
                        <option value="حارس"> حارس</option>
                        <option value="بركة سباحة"> بركة سباحة</option>
                    </select>
                    <span id="extra_features_error" class="text-danger"></span>
                </div>




            </div>


            <div class="row">
                <div class="col">
                    <label for="inputName" class="control-label mt-2">السعر</label>

                    <div class="input-group ">

                        <input type="number" id="price" name="price" class="form-control"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append ">
                            <span class="input-group-text" id="basic-addon2">$</span>
                        </div>
                    </div>
                    <span id="price_error" class="text-danger"></span>
                </div>    

                <div class="col">
                    <label for="inputName" class="control-label mt-2"> طريقة الدفع </label>
                    <select id="pyment_method" name="pyment_method[]" multiple class="form-control SlectBox">
                        <option value="نقدا">نقدا</option>
                        <option value="شيك"> شيك</option>
                        <option value="أقساط"> أقساط</option>
                    </select>
                    <span id="pyment_method_error" class="text-danger"></span>
                </div>
            </div>
            <div class="row">

                <div class="col-8">
                    <label for="inputName" class="control-label mt-2">عنوان العرض </label>
                    <div class="input-group ">
                        <input type="text" id="title" name="title" class="form-control"
                            aria-label="Recipient's username" aria-describedby="basic-addon2"
                            placeholder=" أدخل عنوان العرض مثل : شقة تشطيب فاخر">
                    </div>

                    <span id="title_error" class="text-danger"></span>
                </div>
                <div class="col-12">
                    <label for="exampleTextarea">وصف العرض</label>
                    <textarea id="description" name="description" class="form-control" id="exampleTextarea" name="note"
                        rows="3"></textarea>
                </div>
                <span id="description_error" class="text-danger"></span>
            </div>


        
        
          </div>
         

          </div>
          <div class="modal-footer">
              <button type="submit" class="btn ripple btn-primary edit_details_offer_save" type="button">تحديث</button>
              <button class="btn ripple btn-secondary close_edit_details_offer_modal">رجوع</button>
          </div> 
        </form> 
      </div>
  </div>
</div>