@extends('layout.app')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>About</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">About</li>
          </ol>
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
                  Critères Spécifiques
                </h2>
                <p class="fst-italic"><span class="fw-bold">L’élection porte sur l’admission de cinq (05) nouveaux membres titulaires et deux (2) membres associés. </span></p>
                <p class="fst-italic"><span class="fw-bold">


                    Pour l’admission de nouveaux membres titulaires les profils sont les suivants :
                        <ol>
                            <li>un (1) spécialiste en droit privé ; </li>
                            <li> un (1) spécialiste en droit public et/ou science politique ;</li>
                            <li>un (1) spécialiste en sciences économiques ;</li>
                            <li>un (1) spécialiste en sciences de gestion.</li>

                        </ol>
 







                </span>
                
                </p>

                 <p class="fst-italic"><span class="fw-bold">


                    Pour l’admission de nouveaux membres associés les profils sont les suivants :
                        <ol>
                            <li>un (1) spécialiste en sciences juridique et politique; </li>
                            <li>  un (1) spécialiste en sciences économiques et gestion ;</li>
                        </ol>
                </span>
                
                </p>
              
                <p class="fst-italic"><span class="fw-bold">Candidat(e) provenant de l’enseignement supérieur ou de la recherche scientifique :</span>
                    	
                
                <p class="lead">
                    <ul class="">
                        <li class="">
                            avoir au moins dix (10) publications dans des revues diversifiées, dans la discipline ou la spécialité du candidat ; sur les dix publications, trois ouvrages au maximum sont pris en compte ; 
                        </li><br>
                        <li class="">
                            avoir fait au moins deux publications au cours des (05) dernières années ; 
                        </li><br>
                        <li class="">
                          pour les enseignants-chercheurs et les chercheurs avoir encadré seul et fait soutenir au moins une (01) thèse ou avoir co-encadré au moins deux thèses de doctorat ;
                        </li><br>
                        <li class="">
                          avoir une reconnaissance internationale, s’il y en a (Prix d’excellence scientifique, Appartenance à des sociétés savantes, etc.  
                        </li><br>
                        
                    </ul>
                </p>

                <p  class="fst-italic">
                    <span class="fw-bold">	Candidat(e) ne provenant pas de l’enseignement supérieur ou de la recherche scientifique :</span>
                </p>

                <p class="lead">
                    <ul>
                        <li class="">
                            être prêt à un apport attendu à l’Académie concernant sa compétence particulière  ;
                        </li><br>
                        <li>
                            être une personnalité reconnue par la communauté dans son milieu  
                        </li><br>
                        <li>
                           posséder des connaissances avérées dans un ou plusieurs domaines de la spécialité 
                        </li><br>
                        <li>
                           avoir un impact certain sur le milieu.
                        </li>
              </div>
            </div>
          </div>
          <center>
             <p class="mt-5" data-aos="fade-up">
              <a href="" class="btn btn-get-started">Passer à la phase de dépôt des candidatures</a>
            </p>
          </center>
          
        </div>
      </div>
     
    </section><!-- /About 2 Section -->
    @endsection