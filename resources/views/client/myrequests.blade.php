@extends('client.layout_client.main')



@section('title')
طلباتي
@endsection

@section('content')
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">طلباتي</h1>
              <span class="color-text-a">متابعة الطلبات </span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
             
                <li class="breadcrumb-item">
                  <a href="property-grid.html">الطلبات/</a>
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

    <section class="property-single nav-arrow-b">
        <div class="container">
          <div class="row justify-content-center">
             <div class="row">
                <div style="margin-bottom: 60px ; margin-top:30px">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 text-md-nowrap">
                            <thead style="font-family: 'Cairo', sans-serif">
                                <?php $i=0;?>
                                <tr>
                                    <th>رقم</th>
                                    <th>نوع الطلب</th>
                                    <th>حالة الطلب</th>
                                    <th>المكتب</th>
                                    <th>تاريخ الإنشاء</th>
                                    <th>التفاصيل</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$item['type']}}</td>

                                    <td> <label style="color:{{$item['state'] =='قيد التنفيذ'? '#2eca6a' : '#2eca6a'}} ">{{$item['state']}}</label> </td>
                                
                                    <td> <a href="{{route('client.single_office',['id'=>$item['offices']['id']])}}"> {{$item['offices']['name_office']}}  </a>  </td>
                                    <td>{{ date('d-m-Y', strtotime( $item['created_at']))}} </td>
                                
                                <td> <button type="button" id="details_request_btn"  data-id="{{$item['id']}}"   data-type="{{$item['type']}}"  class="btn btn-sm btn-success" title="عرض التفاصيل"><i
                                        class="fa fa-info-circle" aria-hidden="true"></i>
                                </button></td>
                            <td> <a   id="delete_request_btn"  data-id="{{$item['id']}}"  data-type="{{$item['type']}}" class="btn btn-sm btn-danger" title="حذف الطلب"><i
                                class="las la-trash"></i></a>
                            </td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div> 
              </div> 
          </div> 
        </div> 

 




    
    <div id="private_request_model" class="modal fade">
      <div class="modal-dialog modal-lg ">
          <div class="modal-content "  >
               
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 text-md-nowrap">
                            <thead style="font-family: 'Cairo', sans-serif">
                               
                                <tr>
                                    <th>نوع العقار</th>
                                    <th>المساحة</th>
                                    <th>السعر</th>
                                    <th>الرسالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="private_request_tr">

                                </tr>
                            </tbody>
                        </table>
                    </div>
                 </div>
                <div class="modal-footer">
                    <input   type="submit"  id="close_my__request"  data-type="طلب معاينة" style="background-color:#2eca6a ;border-color: #2eca6a;" class="float-left btn btn-primary" value="رجوع">
                </div>
            
          </div>
      </div>
    </div> 

   
  

  </main><!-- End #main -->
@endsection


@section('js')



    <!-- Map Api js -->


  <script>
  
  $(document).on('click', '#delete_request_btn', function(e) {

        e.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    cancelButton: 'btn btn-danger mg-l-5',
                    confirmButton: 'btn btn-success',
                },
                buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                        title: 'هل أنت متأكد من حذف العقار ؟ ',
                        text: "في حالة الموافقة سيتم  حذف نهائيا !",
                        icon: 'error',
                        showCancelButton: true,
                        confirmButtonText: 'إحذف',
                        cancelButtonText: 'رجوع',
                        reverseButtons: false
                    }).then((result) => {
                    if (result.isConfirmed) {
                        var id = $(this).data('id')
                        var data={
                            'type' : $(this).data('type')
                        }
                        console.log(id) ;
                        var url = '{{ route('client.delete_request',':id') }}';
                        url = url.replace(':id', id);
                        $.ajax({
                            type: "GET",
                            url: url,
                             data:data,
                            success: function(res) {
                                if(res.state == 400){
                                console.log(res.message) ;
                                }else{
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: res.message,
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    location.reload();
                                }
                            }
                        });
                    }

            });
});  
      


$(document).on('click', '#details_request_btn', function(e) {

        console.log('test')
        var id=$(this).data('id')
        var type=$(this).data('type')
         if(type == 'طلب خاص'){

                    var data={
                            'type' : type
                        }
                    var url = '{{ route('client.details_request',':id') }}';
                    url = url.replace(':id', id);
                    $.ajax({
                        type: "GET",
                        url: url,
                        data:data,
                        success: function(res) {
                        var tr =[
                            '<td>' + res.message[0].type_request + '</td>',
                        '<td>' + res.message[0].area_from  +' => '+ res.message[0].area_to + '</td>',
                        '<td>' +  res.message[0].price_from + ' => ' + res.message[0].price_to +'</td>',
                        '<td>' + res.message[0].message+'</td>' 
                        ]
                        $('#private_request_tr').html(tr)
                      
                       
                        
                        console.log(tr)
                       
                        }
                    });
                    
                    $('#private_request_model').modal('show')

        }


});


$(document).on('click', '#close_my__request', function(e) {

        console.log('test')
        
        var type=$(this).data('type')
        if(type == 'طلب خاص'){
        $('#private_request_model').modal('hide')

        }else{
        $('#preview_request_model').modal('hide')

        }


});
</script>


@endsection