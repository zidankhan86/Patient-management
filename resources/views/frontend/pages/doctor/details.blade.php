@extends('frontend.master')

  @section('content')

 
 <!--================Home Banner Area =================-->
 <section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
      <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
      <div class="container">
          <div class="banner_content text-center">
              <h2> Details</h2>
              <div class="page_link">
                  <a href="{{ route('home') }}">Home</a>
                  <a href="{{ route('shop') }}">Product</a>
                  <a>Product Details</a>
              </div>
          </div>
      </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<section class="portfolio_details_area p_120">
  <div class="container">
      <div class="portfolio_details_inner">
          <div class="row">
              <div class="col-md-6">
                  <div class="left_img">
                      <img class="img-fluid" src="{{ asset('/public/uploads/' . $details->image) }}" alt="">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="portfolio_right_text">
                      <h4>{{ $details->name }}</h4>
                      
                      <ul class="list">
                          <li><span>Stock</span>: {{ $details->stock }}</li>
                          <li><span>Price</span>:  {{ $details->price }} Tk.</li>
                          {{-- <li><span>Website</span>:  colorlib.com</li> --}}
                          @if ($details->stock != 0)
                          <li><a href="{{route('add.to.cart',$details->id)}}" class="genric-btn primary circle">Add to cart</a></li>
                          @else
                          <li><a href="#" class="genric-btn danger circle">Out of stock</a></li>
                          @endif
                          
                      </ul>
                  </div>
              </div>
          </div>
             <p><p>{!!($details->product_information)!!}</p></p>
            
      </div>
  </div>
</section>

 @endsection
