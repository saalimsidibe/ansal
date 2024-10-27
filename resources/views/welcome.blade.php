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
          
            <h3 class="mb-4" data-aos="fade-up" style="text-align: justify">
            Troisième appel à candidatures pour l’admission de nouveaux membres de l’ANSAL-BF
            </h3>
            <p data-aos="fade-up" style="text-align: justify">
          <p style="text-align: justify"> Dans le cadre de sa mission de mobiliser tous les savoirs pour contribuer au développement socio-économique du Burkina Faso ,l’Académie Nationale des Sciences, des Arts et des Lettres du Burkina Faso (ANSAL-BF) lance un nouvel appel à candidature pour l’admission de nouveaux membres. <strong>La date de clôture des candidatures initialement prévue le jeudi 31 octobre 2024 à minuit est prolongée au samedi 30 novembre  2024 à minuit.</strong>

Alternativment les candidats peuvent déposer une version numérique de leur dossier complet sous clé USB au secrétariat du Secrétaire Perpétuel de l’Académie à son siège à Ouaga 2000 les heures ouvrables au plus tard le Vendredi 29 novembre 2024 à 14 h délai de rigueur. </p>

              <strong>Tout candidat doit avoir moins de 70 ans à la date du 31 octobre 2024 à minuit  et devra être parrainé par deux (2) Académiciens du Collège auquel il postule. </strong>
              <p>Pour ce présent appel, l’admission portera sur treize (13) membres titulaires et dix (10) membres associés, répartis dans les cinq (5) Collèges de l’Académie. </p>
              <p> Le dossier de candiature  comprend également un curriculum vitae (CV) complet du candidat  et des documents en format pdf à télécharger.</p>
              <strong>Il est conseillé au candidat de se familiariser avec la plateforme en simulant une candidature jusqu’au niveau de demande de téléchargement des éléments de preuves sans procéder à la validation du dossier.</strong>
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
