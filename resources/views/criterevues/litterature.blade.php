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
                <p class="fst-italic"><span class="fw-bold">Le présent appel porte sur l’admission de trois (03) membres titulaires et de deux (02) membres associés parmi les enseignants-chercheurs et chercheurs et un (01) membre titulaire ne relevant pas des personnels enseignants-chercheurs et chercheurs ; </span></p>
                <p class="fst-italic"><span class="fw-bold">Pour les enseignants-chercheurs et chercheurs l’élection porte sur l’admission de nouveaux membres titulaires avec les profils suivants :
                    <ol>
                          <li>un (1) spécialiste en sociologie  ;</li>
                          <li>un (1) spécialiste en linguistique;</li>
                    </ol>
                  
 </span></p>
                <p class="fst-italic"><span class="fw-bold">


                 Pour les enseignants-chercheurs et chercheurs l’élection porte sur l’admission de nouveaux membres associés avec les profils suivants :
                        <ol>
                            <li>un (1) spécialiste en anthropologie  </li>
                            <li> un (1) spécialiste en philosophie ;</li>
                        </ol>
 







                </span>
                
                </p>

                 <p class="fst-italic"><span class="fw-bold">
                
                </p>
              
                <p class="fst-italic"><span class="fw-bold">Candidat(e) provenant de l’enseignement supérieur ou de la recherche scientifique :</span>
                    	
                
                <p class="lead">
                    <ul class="">
                        <li class="">
                           avoir au moins dix (10) publications dans des revues diversifiées, dans la discipline ou la spécialité du candidat ;  
                        </li><br>
                        <li class="">
                           pour les enseignants-chercheurs, avoir encadré et fait soutenir au moins deux thèses de doctorat ou co-encadré et fait soutenir quatre thèses ; 
                        </li><br>
                        <li class="">
                          pour les enseignants-chercheurs et les chercheurs avoir encadré seul et fait soutenir au moins une (01) thèse ou avoir co-encadré au moins deux thèses de doctorat ;
                        </li><br>
                        <li class="">
                         pour les chercheurs, avoir encadré seul une (01) thèse ou co-encadré au moins deux thèses de doctorat ;  
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
                           reconnaissance internationale s’il y en a (Prix d’excellence scientifique, Brevets, Appartenance à des sociétés savantes, etc.). 
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