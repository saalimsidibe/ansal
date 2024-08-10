@extends('layout.app')

@section('content')
  <main class="main">

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2" data-aos="fade-up" data-aos-delay="400">
            <div class="swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                    },
                    "1200": {
                      "slidesPerView": 1,
                      "spaceBetween": 1
                    }
                  }
                }
              </script>
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="{{ asset('images/accueil1.jpg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="swiper-slide">
                  <img src="{{ asset('images/accueil2.jpg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="swiper-slide">
                  <img src="{{ asset('images/accueil3.jpg') }}" alt="Image" class="img-fluid">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="col-lg-4 order-lg-1">
            <span class="section-subtitle" data-aos="fade-up"></span>
            <h1 class="mb-4" data-aos="fade-up">
            Troisième appel à candidatures pour l’admission
              de nouveaux membres de l’ANSAL-BF
            </h1>
            <p data-aos="fade-up">
             Dans le cadre de sa mission de mobilisation de tous les savoirs pour contribuer au
              développement socio-économique du Burkina Faso , l’Académie Nationale des Sciences, des
              Arts et des Lettres du Burkina Faso (ANSAL-BF) lance un troisième appel à candidatures
              pour l’admission de nouveaux membres, ouvert à partir du ..
              Cet appel s’adresse aux hommes et femmes des sciences, des lettres, des arts, de la culture,
              des détenteurs de savoirs endogènes ainsi qu’aux spécialistes des disciplines relevant des
              champs d’expertise de l’Académie, reconnues par leurs pairs et désireux de mettre leurs
              compétences et leurs connaissances au service de la communauté nationale.
              <strong>Tout candidat doit avoir moins de 70 ans au 31 octobre 2024, date de clôture du dépôt des
                  dossiers et devra être parrainé par deux (2) Académiciens du Collège concerné.</strong>
            </p>
            <p class="mt-5" data-aos="fade-up">
              <a href="{{route('accueil')}}" class="btn btn-get-started">Voir</a>
            </p>
          </div>
        </div>
      </div>
    </section><!-- /About Section -->

    
            
     

             

  

       

               

         

        
               

        
   
        

     
               

        

         

    
  </main>

@endsection
