
<!DOCTYPE html>
<html>

<head>
 @include('frontend.fixed.css')

</head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <img src="{{asset ('frontend/images/hero-bg.png') }}" alt="">
    </div>

    @include('frontend.fixed.header')
    
  </div>


 

  

  @yield('content')
  @include('sweetalert::alert')

 

  @include('frontend.fixed.footer')

@include('frontend.fixed.js')

</body>

</html>