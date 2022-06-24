
      	<div class="carousel-slider">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    @foreach ($images as $key => $item)
                       <div class="carousel-item {{$key ==0 ? 'active': ''}}" >
                        <a data-id_offer={{$data->id}} data-path={{$item->name}} data-image_id={{$item->id}} id="show_image_btn"> <img style="height: 350px"src="{{asset('/storage/image/office/' . $item->name) }}" alt="img"></a>
                       </div>
                    @endforeach
                   
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <i class="fa fa-angle-left fs-30" aria-hidden="true"></i>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <i class="fa fa-angle-right fs-30" aria-hidden="true"></i>
                    </a>
                </div>
            </div>


            <div class="clearfix">
                <div id="thumbcarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            @foreach ($images as $key => $item)
                            <div data-path={{$item->name}} data-image_id={{$item->id}}  id="show_image_btn" data-target="#carousel" data-slide-to="{{$key}}" class="thumb"><img src="{{  asset('/storage/image/office/' . $item->name) }}" alt="img"></div>
                           @endforeach
                         </div>
                      
                    </div>
                    <a class="carousel-control-prev" href="#thumbcarousel" role="button" data-slide="prev">
                        <i class="fa fa-angle-left fs-20" aria-hidden="true"></i>
                    </a>
                    <a class="carousel-control-next" href="#thumbcarousel" role="button" data-slide="next">
                        <i class="fa fa-angle-right fs-20" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    

































        <div class="modal" id="show_image_modal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                 
                    <div class="card-body">
                            <div>
                                <img id="image_add_src" style="width: 100%; heigth:150px;" alt="img">
                            </div>
                            <input type="hidden" id="image_modal_id" value="">
                            <input type="hidden" id="offer_modal_id" value="">
                    </div>
        
                    <div class="modal-footer">
                        <button class="btn ripple btn-danger delete_image_modal" type="button">حذف</button>
                        <button class="btn ripple btn-secondary close_image_modal" type="button">رجوع</button>
                    </div>
                </div>
            </div>
        </div>
  
  
     
