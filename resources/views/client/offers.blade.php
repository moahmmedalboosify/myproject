@extends('client.layout_client.main')
@section('title')
العقارات
@endsection

@section('content')
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="mb-t-10">
      
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
       
         <div id="offer_fetch">
           @include('client.fetch_ajax.offers_fetch')
         </div>

       
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->

  @endsection


  @section('js')

  <script>

      $(document).ready(function() {

          $(document).on('change', '#search_offer_simple', function(e) {
         
           var data = {
                 'value' :$('#search_offer_simple').val()
           }

           
           var url = '{{ route('client.search_simple_ajax') }}';
            $.ajax({
                type: "GET",
                url: url,
                data: data,
                success: function(res) {
                  $('#offer_fetch').html(res)
                }

            });


          });


     });

  </script>




@endsection
