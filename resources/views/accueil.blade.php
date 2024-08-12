@extends('layout.app')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <nav class="breadcrumbs">
          <Center>
          <p>
         <H3>Critères</H3> 
         </p>
         </Center>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About 2 Section -->
    <section id="about-2" class="about-2 section">

      <div class="container">
        <div class="content">
          <div class="row justify-content-center">
            <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 order-lg-2 offset-xl-1 mb-4">
              <div class="img-wrap text-center text-md-left" data-aos="fade-up" data-aos-delay="100">
                <div class="img">
                  <img src="{{url('active/assets/img/img_v_3.jpg')}}" alt="circle image" class="img-fluid">
                </div>
              </div>
            </div>

            <div class="offset-md-0 offset-lg-1 col-sm-12 col-md-5 col-lg-5 col-xl-4" data-aos="fade-up">
              <div class="px-3">
                <span class="content-subtitle"></span>
                <h2 class="content-title text-start">
                  Critères Généraux
                </h2>
                <p class="fst-italic"><span class="fw-bold">NB:Tout candidat doit avoir moins de 70 ans au 31 octobre 2024, date de clôture du dépôt des dossiers et devra être parrainé par deux (2) Académiciens du Collège concerné.</span></p>
                <p class="">
                    1.	Candidat(e) provenant de l’enseignement supérieur ou de la recherche scientifique :
                </p>
                
                <p class="lead">
                    <ul class="">
                        <li class="">
                            être spécialiste d’une discipline parmi celles relevant du Collège considéré ou  avoir conduit des travaux scientifiques avérés de portée internationale dans le domaine ;
                        </li><br>
                        <li class="">
                            disposer d’une thèse de spécialité de doctorat datant d’au moins dix (10) ans à la date de clôture des dépôts des dossiers de candidature 
                        </li><br>
                        <li class="">
                            être de rang A dans l’enseignement supérieur ou dans la recherche scientifique
                        </li><br>
                        <li class="">
                            avoir un rayonnement scientifique international 
                        </li><br>
                        <li class="">
                            prendre l’engagement de respecter ses devoirs vis-à-vis de l’Académie en s’acquittant de sa cotisation annuelle et en participant pleinement aux activités de l’institution pour son rayonnement national et international.
                        </li>
                    </ul>
                </p>

                <p class="">
                    2.	Candidat(e) ne provenant pas de l’enseignement supérieur ou de la recherche scientifique :
                </p>

                <p class="lead">
                    <ul>
                        <li class="">
                            être spécialiste d’une discipline parmi celles relevant du Collège considéré ou avoir conduit des travaux avérés de portée internationale dans le domaine ;
                        </li><br>
                        <li>
                            avoir une notoriété nationale et internationale à travers ses œuvres ou disposer de titres de propriétés intellectuelles  dans le domaine 
                        </li><br>
                        <li>
                            être suffisamment impliqué dans la vie de la communauté
                        </li><br>
                        <li>
                            prendre l’engagement de respecter ses devoirs vis-à-vis de l’Académie en s’acquittant de sa cotisation annuelle et en participant pleinement aux activités de l’institution pour son rayonnement national et international
                        </li>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </section><!-- /About 2 Section -->
 
<section id="" class="">

      <div class="container">
        <div class="content">
          <div class="row justify-content-center">
            <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 order-lg-2 offset-xl-1 mb-4">
              <div class="img-wrap text-center text-md-left" data-aos="fade-up" data-aos-delay="100">
                <div class="img">
                  <img src="" alt="circle image" class="img-fluid">
                </div>
              </div>
            </div>

            <div class="offset-md-0 offset-lg-1 col-sm-12 col-md-5 col-lg-5 col-xl-4" data-aos="fade-up">
              <div class="px-3">
                <span class="content-subtitle"></span>
                <h2 class="content-title text-start">
                  Consulter les critères spécifiques de collège souhaiter avant de passer à la phase de  dépot des candidatures
                </h2>
                <p class="fst-italic"><span class="fw-bold">NB:Tout candidat doit avoir moins de 70 ans au 31 octobre 2024, date de clôture du dépôt des dossiers et devra être parrainé par deux (2) Académiciens du Collège concerné.</span></p>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

 










































              <!-- Start Stats Item -->
             

            </div>
          </div>

        </div>

      </div>
    </section><!-- /Stats Section -->

    <!-- Team Section -->
    <section id="team" class="team section">

      <div class="site-section slider-team-wrap">
        <div class="container">

          <div class="slider-nav d-flex justify-content-end mb-3">
            <a href="#" class="js-prev js-custom-prev"><i class="bi bi-arrow-left-short"></i></a>
            <a href="#" class="js-next js-custom-next"><i class="bi bi-arrow-right-short"></i></a>
          </div>

          <div class="swiper init-swiper" data-aos="fade-up" data-aos-delay="100">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "1",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "navigation": {
                  "nextEl": ".js-custom-next",
                  "prevEl": ".js-custom-prev"
                },
                "breakpoints": {
                  "640": {
                    "slidesPerView": 2,
                    "spaceBetween": 30
                  },
                  "768": {
                    "slidesPerView": 3,
                    "spaceBetween": 30
                  },
                  "1200": {
                    "slidesPerView": 3,
                    "spaceBetween": 30
                  }
                }
              }
            </script>
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="team">
                  <div class="pic">
                    <img src="{{ asset('images/arts.jpg') }}" alt="Image" class="img-fluid">
                  </div>
                  <h3 clas="">
                    <a href=""><span class=""> Collège Sciences humaines, arts, lettres et culture </span> </a>
                  </h3>
                  <span class="d-block position"></span>
                
                  <p class="mb-0">
                    <a href="{{route('litterature')}}" class="more dark"> Consulter et Passer au dépôt <span class="bi bi-arrow-right-short"></span></a>
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="team">
                  <div class="pic">
                    <img src="{{ asset('images/seg.webp') }}" alt="Image" class="img-fluid">
                  </div>
                  <h3 clas="">
                    <a href="#"><span class="">Collège Sciences juridiques, politiques, économiques et de gestion   </span> </a>
                  </h3>
                  <span class="d-block position"></span>
               
                  <p class="mb-0">
                    <a href="{{route('economie')}}" class="more dark">Consulter et Passer au dépôt  <span class="bi bi-arrow-right-short"></span></a>
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="team">
                  <div class="pic">
                    <img src="{{ asset('images/sante.webp') }}" alt="Image" class="img-fluid">
                  </div>
                  <h3 clas="">
                    <a href="#"><span class="">Collège Sciences de la Santé Humaine et Animale</span></a>
                  </h3>
                  <span class="d-block position"></span>
                
                  <p class="mb-0">
                    <a href="{{route('sante')}}" class="more dark">Consulter et Passer au dépôt  <span class="bi bi-arrow-right-short"></span></a>
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="team">
                  <div class="pic">
                    <img src="{{ asset('images/agro.jpg') }}" alt="Image" class="img-fluid">
                  </div>
                  <h3 clas="">
                    <a href="#"><span class="">Collège Sciences naturelles et agricoles</span> </a>
                  </h3>
                  <p class="mb-0">
                    <a href="{{route('agro')}}" class="more dark">Consulter et Passer au dépôt <span class="bi bi-arrow-right-short"></span></a>
                  </p>
                </div>
              </div>

              <div class="swiper-slide">

                <div class="team">
                  <div class="pic">
                    <img src="{{ asset('images/st.jpeg') }}" alt="Image" class="img-fluid">
                  </div>
                  <h3 clas="">
                    <a href=""><span class=""> Collège Sciences et <br> Techniques </span> </a>
                  </h3>
                
                  <p class="mb-0">
                    <a href="{{route('sciencestech')}}" class="more dark"> Consulter et Passer au dépôt <span class="bi bi-arrow-right-short"></span></a>
                  </p>
                </div>
              </div>
              <!-- <div class="swiper-slide"></div> -->
            </div>
          </div>
        </div>
        <!-- /.container -->
      </div>
    </section><!-- /Team Section -->

    <!-- Testimonials Section -->
    
           
            
               
              
  </main>

@endsection
