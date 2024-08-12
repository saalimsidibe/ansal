@extends('layout.app')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container">
            
            <nav class="breadcrumbs">
                <Center>
          <p>
         <H3>   Sciences et Techniques   </H3> 
         </p>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- About 2 Section -->
    <section id="about-2" class="about-2 section">

        <div class="container">
            <div class="content">
                <div class="row justify-content-center">
                    <div
                        class="col-sm-12 col-md-5 col-lg-4 col-xl-4 order-lg-2 offset-xl-1 mb-4">
                        <div class="img-wrap text-center text-md-left"
                            data-aos="fade-up" data-aos-delay="100">
                            <div class="img">
                                <img
                                    src="{{url('active/assets/img/img_v_3.jpg')}}"
                                    alt="circle image" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div
                        class="offset-md-0 offset-lg-1 col-sm-12 col-md-5 col-lg-5 col-xl-4"
                        data-aos="fade-up">
                        <div class="px-3">
                            <span class="content-subtitle"></span>
                            <h2 class="content-title text-start">
                                Critères Spécifiques
                            </h2>
                            <p class="fst-italic"><span
                                    class="fw-bold">L’élection porte sur
                                    l’admission de deux (02) nouveaux membres
                                    titulaires et de deux (02) membres associés
                                    avec les profils suivants : </span></p>
                            <p class="fst-italic"><span class="fw-bold">

                                    Pour l’admission de nouveaux membres
                                    titulaires :
                                    <ol>
                                        <li>un (1) spécialiste en Informatique décisionnelle, Big-Data, systèmes embarqués, ou sécurité des systèmes d’information  ; </li><br>
                                        <li>un (1) spécialiste en sciences des matériaux </li>
                                    </ol>
                                </span>

                            </p>

                            <p class="fst-italic"><span class="fw-bold">

                                    Pour l’admission de nouveaux membres
                                    associés les profils sont les suivants :
                                    <ol>
                                        <li>un (1) spécialiste en Intelligence Artificielle ; </li>
                                        <li>un (1) spécialiste Physique nucléaire ;</li>
                                    </ol>
                                </span>

                            </p>

                            <p class="fst-italic"><span
                                    class="fw-bold">Candidat(e) provenant de
                                    l’enseignement supérieur ou de la recherche
                                    scientifique :</span>

                                <p class="lead">
                                    <ul class>
                                        <li class>
                                            avoir au moins dix (10) publications dans des revues diversifiées, indexées dans la discipline ou la spécialité du candidat ;
                                        </li><br>
                                        <li class>
                                          	avoir fait au moins deux publications au cours des cinq (05) dernières années 
                                        </li><br>
                                        <li class>
                                            pour les enseignants-chercheurs, avoir encadré seul et fait soutenir au moins deux thèses de doctorat     
                                        </li><br>
                                            <li class="">
                                            pour les chercheurs, avoir encadré seul et fait soutenir deux thèses ou avoir co-encadré et fait soutenir au moins quatre thèses de doctorat         
                                            </li><br>
                                                <li>
                                                reconnaissance internationale s’il y en a (Prix d’excellence scientifique, Brevets, Appartenance à des sociétés savantes, etc.).
                                            
                                                  
                                                </li>
                                            
                                        </li><br>
                                    
                                        
                                  

                                    </p>

                                   
                                        <center>
                                            <p class="mt-5" data-aos="fade-up">
                                                <a href="{{route('formulaire')}}"
                                                    class="btn btn-get-started">Passer
                                                    à la phase de dépôt des
                                                    candidatures</a>
                                            </p>
                                        </center>

                                    </div>
                                </div>

                            </section><!-- /About 2 Section -->
                            @endsection