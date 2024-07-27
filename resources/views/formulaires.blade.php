@extends('layout.app')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>Services</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Services</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->



    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <div class="container">
        <div class="row gy-4 justify-content-center">

          <div class="col-lg-3">
            <div class="services-item" data-aos="fade-up">
              <div class="services-icon">
                <i class="bi bi-bullseye"></i>
              </div>
              <div>
                <h3>Chercheur</h3>
                <p>Candidatures pour les chercheurs</p>
                <a href="{{url('/etape1chercheur')}}" class="btn btn-success"> S'inscrire</a>

              </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="services-item" data-aos="fade-up" data-aos-delay="100">
              <div class="services-icon">
                <i class="bi bi-command"></i>
              </div>
              <div>
                <h3>Autres </h3>
                <p>Candidatures pour les autres profils</p>
                <a href="{{url('/etape1autre')}}" class="btn btn-success"> S'inscrire</a>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section><!-- /Services Section -->

  </main>

@endsection
