<!-- header section strats -->
<header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{ route('home') }}">
          <span>
            Orthoc
          </span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}"> About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="departments.html">Departments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('doctor') }}">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
            </li>
            @auth
            @if (auth()->user()->role == 'customer')
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" style="color: red"><i class="fa fa-user"></i> <b>Logout</b></a>
            </li>
                @endif
        @endauth


        @auth
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login.frontend') }}"><i class="fa fa-user"></i> Sign in</a>
        </li>
            
        @endauth

           
            <span>/</span>
            
            @guest
            <li class="nav-item">
            <a class="nav-link" href="{{ route('registration') }}">
                
                   Registration
                
              
            </a>
        </li>
        @endguest

        @auth
        
            @if (auth()->user()->role == 'customer')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/profile') }}">
                    <div>Profile</div>
                </a>
            </li>
               
            @endif
        @endauth
           
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section --><!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container ">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                        We Provide Best Healthcare
                      </h1>
                      <p>
                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn1">
                          Read More
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container ">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                        We Provide Best Healthcare
                      </h1>
                      <p>
                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn1">
                          Read More
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container ">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                        We Provide Best Healthcare
                      </h1>
                      <p>
                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn1">
                          Read More
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
  
      </section>
      <!-- end slider section -->