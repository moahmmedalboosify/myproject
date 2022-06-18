@extends('client.layout_client.main')


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
       
         <div id="offices_fetch">
           @include('client.fetch_ajax.offices_fetch')
         </div>

       
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->

  @endsection


  @section('js')

  <script>

      $(document).ready(function() {
        // city_office_search name_office_search
        $(document).on('click', '#name_office_search', function(e) {
         
            var data = {
                    'name' :$('#name').val(),
                    'type' :'name_office'
            }


            
            var url = '{{ route('client.search_offices') }}';
                $.ajax({
                    type: "GET",
                    url: url,
                    data: data,
                    success: function(res) {
                    $('#offices_fetch').html(res)
                    }

                });


        });


        $(document).on('click', '#city_office_search', function(e) {
         
         var data = {
                 'name' :$('#city_test').val(),
                 'type' :'city_office'
         }

        
         
         var url = '{{ route('client.search_offices') }}';
             $.ajax({
                 type: "GET",
                 url: url,
                 data: data,
                 success: function(res) {
                 $('#offices_fetch').html(res)
                 }

             });


        });  
        $(document).on('click', '#all', function(e) {
            
            var data = {
                    'type' :'all'
            }


            
            var url = '{{ route('client.search_offices') }}';
                $.ajax({
                    type: "GET",
                    url: url,
                    data: data,
                    success: function(res) {
                    $('#offices_fetch').html(res)
                    }

                });


        });  
     

        $('#city_test').on('change', function(e) {

            var id_city = $(this).children("option:selected").val();

            e.preventDefault();

            var url = '{{ route('office.step_four_city.offer') }}';
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    'id_city': id_city
                },
                success: function(res) {
                    $('#region_test').html(res.region);
                }
            });

            });


        });

  </script>




@endsection
