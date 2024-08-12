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
                <p class="fst-italic"><span class="fw-bold">L’élection porte sur l’admission de deux (02) nouveaux membres titulaires et deux (02) membres associés avec les profils précisés ci-dessous. </span></p>
                <p class="fst-italic"><span class="fw-bold">


                Pour l’admission de nouveaux membres titulaires :
                        <ol>
                            <li>un (1) spécialiste en biologie avec toutes options (médecine, pharmacie, vétérinaire, sciences biologiques) ; </li>
                            <li>un (1) spécialiste en odontologie ouvert à toutes les spécialités cliniques</li>
                        </ol>
                </span>
                
                </p>

                 <p class="fst-italic"><span class="fw-bold">


                  Pour l’admission de nouveaux membres associés les profils sont les suivants :
                        <ol>
                            <li>un (1) spécialiste en médecine vétérinaire (pathologies infectieuses ou aquaculture/pisciculture</li>
                            <li> un (1) spécialiste en oncologie (oncologie médicale ou chirurgicale). ;</li>
                        </ol>
                </span>
                
                </p>
              
                <p class="fst-italic"><span class="fw-bold">Candidat(e) provenant de l’enseignement supérieur ou de la recherche scientifique :</span>
                    	
                
                <p class="lead">
                    <ul class="">
                        <li class="">
                            	avoir une expérience d'expertises dans le domaine de la santé et/ou de la biologie  ; 
                        </li><br>
                        <li class="">
                            avoir une expertise confirmée dans son domaine de spécialité 
                        </li><br>
                        <li class="">
                            disposer d’une capacité et d’un esprit de travail en équipe (expérience notifiée)
                        </li><br>
                        <li class="">
                           disposer de relations professionnelles dans le domaine de la santé au niveau national et international (appartenance à une société savante de santé et dans sa spécialité serait un atout) ;
                        </li><br>
                        <li>
                            justifier, durant sa carrière, de plusieurs publications, et particulièrement durant les 05 dernières années qui précèdent la soumission de la demande d’admission à l’Académie, d’au moins 05 publications dans des revues internationales (ou reconnues de niveau international) à comité de lecture à parution annuelle régulière ;
                        </li><br>
                        <li>
                            avoir des résultats de recherches utilisés dans le domaine de la santé ou de la biologie, un ou plusieurs titres de propriété intellectuelle (brevet d’invention…) des distinctions scientifiques (décorations, prix d’excellence, etc.) 
                        </li><br>
                        <li>
                            avoir participé au niveau national, régional et international à des fora et rencontres scientifiques concernant son domaine d’expertise.
                        </li>
                    </ul>
                </p>

                <p  class="fst-italic">
                    <span class="fw-bold">	Candidat(e) ne provenant pas de l’enseignement supérieur ou de la recherche scientifique :</span>
                </p>

                <p class="lead">
                    <ul>
                        <li class="">
                          	être titulaire d’un diplôme universitaire de niveau BAC + 8 au moins, et/ou d’un doctorat dans le domaine ;
                        </li><br>
                        <li>
                            avoir au minimum 15 années d'expérience professionnelle dans le domaine de la santé humaine ou animale ou de la biologie 
                        </li><br>
                        <li>
                          avoir effectué des travaux scientifiques à fort impact apprécié à travers : <br>
                            <ul>
                                <li>
                                   des résultats de recherches utilisés  
                                </li><br>
                                <li>
                                    un ou plusieurs titres de propriété intellectuelle (brevet d’invention…) à fort impact sanitaire dans le domaine
                                </li>
                            </ul>
                        </li><br>
                        <li>
                            avoir un rayonnement scientifique et technique, notamment un leadership apprécié à travers des responsabilités scientifiques et techniques tels que conception et gestion de projet, coordonnateur de projet, directeur ou toute autre haute responsabilité
                        </li><br>

                        <li>
                            avoir élaboré ou contribué à élaborer des politiques, stratégies et programmes de développement de son secteur
                        </li><br>

                        <li>
                            avoir une bonne connaissance des enjeux et défis pour son secteur et les politiques y relatives au plan national, régional et international 
                        </li><br>

                        <li>
                            avoir participé au niveau national, régional et international à des fora et rencontres scientifiques concernant son domaine 
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