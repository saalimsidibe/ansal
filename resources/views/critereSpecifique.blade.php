@extends('layout.app')

@section('content')

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>Contact</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Contact</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->
    @section('content')
    <section id="" class="">

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
                  Critères Spécifiques
                </h2>
                <p class="fst-italic"><span class="fw-bold">NB:Tout candidat doit avoir moins de 70 ans au 31 octobre 2024, date de clôture du dépôt des dossiers et devra être parrainé par deux (2) Académiciens du Collège concerné.</span></p>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection