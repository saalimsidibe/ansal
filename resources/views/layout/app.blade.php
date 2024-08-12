<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Ansal BF| Plateforme de depots des candidatures </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('active/assets/img/favicon.png')}}" rel="icon">
  <link href="{{url('active/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('active/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('active/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('active/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('active/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{url('active/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{url('active/assets/css/main.css')}}" rel="stylesheet">


</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

     
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="{{ asset('images/ansal.png') }}" alt=""> 
      

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{url('/')}}" class="active">Accueil</a></li>
       
        


          <li><a href="{{url('/contact')}}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
  @yield('content')



  <footer id="footer" class="footer light-background">
    <div class="container">
      <div class="row g-4">
        
      
       

      <div class="copyright d-flex flex-column flex-md-row align-items-center justify-content-md-between">
        <p>© <span>ANSAL BURKINA FASO 2024 - </span> <span>Tous droits réservés</span></p>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{url('active/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('active/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{url('active/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{url('active/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{url('active/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{url('active/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{url('active/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{url('active/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{url('active/assets/js/main.js')}}"></script>

  @yield('scripts')

</body>

</html>
