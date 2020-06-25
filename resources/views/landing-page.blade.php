<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bale-Bale</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo m-0 p-0"><a href="/" class="mb-0">  <img src="{{URL::asset('/images/bale.png')}}" alt="profile Pic" height="50" width="150"></a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#properties-section" class="nav-link">Explore</a></li>
                <li><a href="#about-section" class="nav-link">About</a></li>
                <li><a  @guest href="{{ route('login') }}" @else href="/index"  @endguest class="nav-link">Register Homestay</a></li>
                @guest
                @else
                @if(Auth::user()->role == "admin")
                <li><a href="/verifikasi" class="nav-link">Verify Homestay</a></li>
                @endif
                @endguest
                @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
                @else
                  <!-- Munculin nama yang login -->
                  <li>
                    <div class="dropdown">
                      <button href="#" class="nav-link btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</button>
                      <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" style="color:black" href="#">Profile</a>
                        <a class="dropdown-item"  style="color:black" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </div>
                    </div>
                  </li>
              
                  
                @endguest
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

    
    <div class="site-block-wrap">
    <div class="owl-carousel with-dots">
      <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/hero_1.jpg);" data-aos="fade" id="home-section">


        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 mt-lg-5 text-center">
              <h1 class="text-shadow">Register Homestay </h1>
              <p class="mb-5 text-shadow">Register Homestay Now!</p>
              <p><a href="/login" target="_blank" class="btn btn-primary px-5 py-3">Get Started</a></p>
              
            </div>
          </div>
        </div>
  
        
      </div>  
  
      <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/hero_2.jpg);" data-aos="fade" id="home-section">
  
  
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 mt-lg-5 text-center">
              <h1 class="text-shadow">Verify Homestay </h1>
              <p class="mb-5 text-shadow">It's Verify Homestay </p>
              <p><a href="/login" target="_blank" class="btn btn-primary px-5 py-3">Get Started</a></p>
              
            </div>
          </div>
        </div>
  
        
      </div>  
    </div>   
    
  </div>      


  <div class="site-section" id="properties-section">
      <div class="container">
        <div class="row large-gutters">
          @foreach($homestay_verified as $h)
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
            <div class="ftco-media-1">
              <div class="ftco-media-1-inner">
                <a href="/property-single" class="d-inline-block mb-4">
                @if ($h->foto != null)
                <img src="foto_homestay/{{$h->foto}}"  class="img-fluid"></a>
                @else
                <img src="images/wayang1.jpg" alt="FImageo" class="img-fluid"></a>
                @endif
                <div class="ftco-media-details">
                  <h3>{{$h->nama_homestay}} </h3>
                  <p>{{$h->location->nama_kabupaten}}</p>
                  <h1>{{$h->harga}} </h1>
                </div>
  
              </div> 
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>

    <section class="py-5 bg-primary site-section how-it-works" id="howitworks-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-3 text-black">How It Works</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center">
            <div class="pr-5 first-step">
              <span class="text-black">01.</span>
              <span class="custom-icon flaticon-house text-black"></span>
              <h3 class="text-dark">Register Homestay</h3>
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div class="pr-5 second-step">
              <span class="text-black">02.</span>
              <span class="custom-icon flaticon-coin text-black"></span>
              <h3 class="text-dark">Verify Homestay</h3>
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div class="pr-5">
              <span class="text-black">03.</span>
              <span class="custom-icon flaticon-home text-black"></span>
              <h3 class="text-dark">Outstanding Homestays.</h3>
            </div>
          </div>
        </div>
      </div>  
    </section>



    <section class="site-section" id="about-section">
      <div class="container">
        
        <div class="row large-gutters">
          <div class="col-lg-6 mb-5">

              <div class="owl-carousel slide-one-item with-dots">
                  <div><img src="images/img_1.jpg" alt="Image" class="img-fluid"></div>
                  <div><img src="images/img_2.jpg" alt="Image" class="img-fluid"></div>
                  <div><img src="images/img_3.jpg" alt="Image" class="img-fluid"></div>
                </div>

          </div>
          <div class="col-lg-6 ml-auto">
            
            <h2 class="section-title mb-3">Bale-Bale</h2>
                <p class="lead">Register and Verify Your Homestay</p>
                <p>Bale-Bale is a website that provides homestay data collection in the Yogyakarta area. Homestay is one of the important supporting facilities in the management of a tourist village. But there are still many tourist village managers who do not understand homestay management properly. Therefore, this bale-bale site helps provide a homestay data collection so that it can be managed properly and correctly. For homestay owners who wish to register their homestays, there are a number of homestay requirements that must be met: </p>
                <ul class="list-unstyled ul-check success">
                  <li>Have a Building Permit</li>
                  <li>Guaranteed cleanliness</li>
                  <li>Adequate lighting</li>
                  <li>MCK Availability</li>
                  <li>Availability of adequate clean water</li>
                </ul>

            
          </div>
        </div>
      </div>
    </section>


    <section class="site-section bg-light bg-image" id="contact-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Contct Us</h2>
          </div>
        </div>         
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">St. Kaliurang Km 14,5 Sleman,Yogyakarta</p>


              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">18523018@students.uii.ac.id</a></p>
              <p class="mb-0"><a href="#">18523061@students.uii.ac.id</a></p>
              <p class="mb-0"><a href="#">18523096@students.uii.ac.id</a></p>
              <p class="mb-0"><a href="#">18523112@students.uii.ac.id</a></p>

            </div>
            
          </div>
        </div>
      </div>
    </section>

    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>Homestay is one of the important supporting facilities in the management of a tourist village.</p>
              </div>
              <div class="col-md-3 mx-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-4">
              <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
            <form action="#" method="post" class="footer-subscribe">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-black" type="button" id="button-addon2">Send</button>
                </div>
              </div>
            </form>  
            </div>
            
          

          </div>
        </div>
      </div>
    </footer>

  <a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a> 

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <script src="js/main.js"></script>
    
  </body>