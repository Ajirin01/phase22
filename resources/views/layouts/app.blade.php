<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>Digi-Realm Elearning</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">

  <link
      rel="stylesheet"
      href="{{asset('site/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"
    />
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('site/dashboard/plugins/jqvmap/jqvmap.min.css')}}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('site/dashboard/dist/css/adminlte.min.css')}}" />
    <!-- overlayScrollbars -->
    <link
      rel="stylesheet"
      href="{{asset('site/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}"
    />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('site/dashboard/plugins/daterangepicker/daterangepicker.css')}}" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('site/dashboard/plugins/summernote/summernote-bs4.css')}}" />
    <!-- Google Font: Source Sans Pro -->
  <!-- fevicon -->
  <link rel="icon" href="{{asset('site/images/fevicon.png')}}" type="image/gif" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
  <!-- style css -->
  {{-- <link rel="stylesheet" href="{{asset('site/style_counter.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('site/css/animate.css')}}" />

  <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
  <!-- Responsive-->
  <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}">  
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="{{asset('site/css/jquery.mCustomScrollbar.min.css')}}">

  <link rel="stylesheet" href="{{asset('site/css/jquery.modal.css')}}">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  

  <link href="{{asset('site/css/all.min.css')}}" rel="stylesheet" />
  {{-- <link href="{{asset('site/css/templatemo-style.css')}}" rel="stylesheet" /> --}}
  {{-- <link rel="stylesheet" href="{{asset('site/style_counter.css')}}" /> --}}
  <link rel="stylesheet" href="{{asset('site/fonts/fontawesome-webfont.ttf')}}" />
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="{{asset('site/images/loading.gif')}}" alt="#" /></div>
  </div>
  <!-- end loader -->
  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header-top">
      <div class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-3 col logo_section">
              <div class="full">
                <div class="center-desk">
                  <div class="logo">
                    <a href="/"><img src="{{asset('site/images/digi-logo.png')}}" alt="#" /></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-9">
              <div class="header_information">
               <div class="menu-area">
                <div class="limit-box">
                  <nav class="main-menu ">
                    <ul class="menu-area-main">
                      <li class="active"> <a href="/">Home</a> </li>
                      <li> <a href="#courses">Courses </a> </li>
                      <li> <a href="#about">About</a> </li>
                      <li> <a href="#contact">Contact</a> </li>
                      @guest
                        <li ><a class="auth" href="{{ route('login') }}">login/sing up</a></li>
                        @else
                          <li >
                            <a class="auth" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                          </li>
                      @endguest 
                    </ul>
                </nav>
                </div>
              </div> 
              <div class="mean-last"  style="padding-bottom: 35px ">
                @guest
                  <a href="#"></a> <a href="{{ route('login') }}">login/sing up</a>
                    @else
                            <div class="">
                                <a class="" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                @endguest 
              </div>  
                                 
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- end header inner -->
     <main class="py-4">
        @yield('content')
    </main>
     <!-- end header -->
      

<!-- contact -->
<div id="contact" class="contact">
  <div class="container-fluid padding_left2">
    <div class="white_color">
      <div class="row">

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div id="map">
          </div>

        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

          <form class="contact_bg">
            <div class="row">
              <div class="col-md-12">
                <div class="titlepage">
                  <h2>Contact <strong class="yellow">us</strong></h2>
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Name" type="text" name="Your Name">
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Email" type="text" name="Your Email">
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Phone" type="text" name="Your Phone">
                </div>
                <div class="col-md-12">
                  <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <button class="send">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

    <!-- end contact -->

    <!--  footer -->
    <footer>
      <div class="footer ">
        <div class="container">
          <div class="row">

            <div class="col-md-12">
              <form class="news">
                <input class="newslatter" placeholder="Email" type="text" name=" Email">
                <button class="submit">Subscribe</button>
              </form>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
              <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                  <div class="address">
                    <h3>Contact us </h3>
                    <ul class="loca">
                      <li>
                        <a href="#"><img src="{{asset('site/icon/loc.png')}}" alt="#" /> Suite 7,<br> Yatudu Complex, <br>
                          Opposite Federal University of Technology, <br> Minna, Niger State, Nigeria. </a>
                      </li>
                        <li>
                          <a href="#"><img src="{{asset('site/icon/email.png')}}" alt="#" /></a> info@digirealm.com.ng</li>
                          <li>
                            <a href="#"><img src="{{asset('site/icon/call.png')}}" alt="#" /></a> +234 806 816 6776 <br> +234 817 174 9191
                          </li>
                          </ul>
                          {{-- <ul class="social_link">
                            <li><a href="#"><img src="{{asset('site/icon/fb.png')}}"></a></li>
                            <li><a href="#"><img src="{{asset('site/icon/tw.png')}}"></a></li>
                            <li><a href="#"><img src="{{asset('site/icon/lin(2).png')}}"></a></li>
                            <li><a href="#"><img src="{{asset('site/icon/instagram.png')}}"></a></li>
                          </ul> --}}

                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="address">
                          <h3>Courses</h3>
                          <ul class="Menu_footer">
                            <li class="active"> <a href="#">Website design and development</a> </li>
                            <li><a href="#">Cisco Networking and Implimentation</a> </li>
                            <li><a href="#">Software development</a> </li>
                            <li><a href="#"> Mobile/
                              Andriod App. Development
                            </a> </li>
                            <li><a href="#">CyberSecurity an 
                              Graphics design with Computer utilization.</a> </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="address">
                          <h3></h3>
                          <ul class="Links_footer">
                            <li class="active"><a href="#">Microsoft Technical Associate Networking,</a> </li>
                            <li><a href="#">Microsoft Technical Associate Security,</a> </li>
                            <li><a href="#">Microsoft Technical Associate Sever Administration and configuration</a> </li>
                            <li><a href="#">MTA Cloud computing</a> </li>
                            <li><a href="#">Leadership</a> </li>
                          </ul>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-6 col-sm-6 ">
                        <div class="address">
                          <a href="/"> <img src="{{asset('site/images/digi-logo1.jpg')}}" alt="logo"></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
              <div class="copyright">
                <div class="container">
                  <p>Copyright © <script> var date = new Date(); document.write(date.getFullYear())</script> Powered by <a href="http://digirealm.com.ng/">Digi-Realm City Solution </a></p>
                </div>
              </div>
            </div>
          </footer>
          <!-- end footer -->
          <!-- Javascript files-->
          <script src="{{asset('site/js/jquery.min.js')}}"></script>
          <script src="{{asset('site/js/popper.min.js')}}"></script>
          <script src="{{asset('site/js/bootstrap.bundle.min.js')}}"></script>
          {{-- <script src="{{asset('site/js/jquery-3.0.0.min.js')}}"></script> --}}
          <script src="{{asset('site/js/plugin.js')}}"></script>
          <!-- sidebar -->
          <script src="{{asset('site/js/animate.js')}}"></script>

          <script src="{{asset('site/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
          <script src="{{asset('site/js/custom.js')}}"></script>
          <script src="{{asset('site/js/jquery.modal.js')}}"></script>
          <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


          <script>
// This example adds a marker to indicate the position of Bondi Beach in Sydney,
// Australia.
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    center: {
      lat: 40.645037,
      lng: -73.880224
    },
  });

  var image = {{asset('site/images/maps-and-flags.png')}};
  var beachMarker = new google.maps.Marker({
    position: {
      lat: 40.645037,
      lng: -73.880224
    },
    map: map,
    icon: image
  });
}
</script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js -->



</body>

</html>