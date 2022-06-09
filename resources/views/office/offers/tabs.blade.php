
<div class="tab-pane active" id="tab1">
    <div id="table_client_info">
        @include('office.offers.fetch_ajax.client_info')
    </div>
</div>


<div class="tab-pane" id="tab2">
    <div id="table_offer_info">
        @include('office.offers.fetch_ajax.offer_info')
    </div>
</div>



<div class="tab-pane" id="tab3">


    @include('office.offers.fetch_ajax.details_offer')



</div>


<div class="tab-pane" id="tab4">


    @include('office.offers.fetch_ajax.address_offer')
 

</div>

<div class="tab-pane" id="tab5">

    <div id="table_image_offer">
      @include('office.offers.fetch_ajax.image_offer')
    </div>

</div>
  
  

