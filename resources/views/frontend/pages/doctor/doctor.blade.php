@extends('frontend.master')

  @section('content')


  <!-- doctor section -->

  <section class="doctor_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Doctors
        </h2>
        <p class="col-md-10 mx-auto px-0">
          Incilint sapiente illo quo praesentium officiis laudantium nostrum, ad adipisci cupiditate sit, quisquam aliquid. Officiis laudantium fuga ad voluptas aspernatur error fugiat quos facilis saepe quas fugit, beatae id quisquam.
        </p>
      </div>
      <div class="row">

@foreach ($doctors as $doctor)
  

        <div class="col-sm-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('/public/uploads/' . $doctor->image) }}" alt="">
            </div>
            <div class="detail-box">
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </div>
              <h5>
                {{ $doctor->name }}
              </h5>
              <h6 class="">
                {{ $doctor->specialization }}
                
              </h6>
              <h6 class="">
                <b>{{ $doctor->title }}</b>
                
              </h6>
              <div class="btn-box">
                <a href="{{ route('appoint') }}">
                 Appointment
                </a>
              </div>
            </div>
            
          </div>
        </div>
       
        @endforeach 


      </div>
     
    </div>
  </section>

  <!-- end doctor section -->


@endsection
