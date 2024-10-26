@extends('layout.app')

@section('content')
    <main class="main">
        <div class="page-title light-background">
            <div class="container">
                <h1>Formulaire-Autre</h1>
                <nav class="breadcrumbs">
                    <ol>

                        <li>Etape1</li>
                        <li>Etape2</li>
                        <li>Etape3</li>
                        <li class="current"><a href="#">Etape4</a></li>
                        <li>Etape5</li>
                        <li >Etape6</a></li>
                         <li>Etape7</li>
                        <li>Etape Finale</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

              <section id="contact" class="contact section">
                <div class="container" data-aos="fade">
                    <div class="row ">
                        <div class="col-2"> </div>
                        <div class="col-8">
                            <div class="card ">
                                <div class="card-head info bg-light"> <h3>Contributions et Implications</h3></div>
                                <div class="card-body">
   <form action="{{Route('validerX.autre')}}" method="POST">
    @csrf
 @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

            @php
              // $travaux=old('travaux',session('etapeX.travaux',[]));

              // $implication=old('implication',session('etapeX.implication',[]));
              
            @endphp
       

       <textarea name="travaux" id="" cols="30" rows="10" class="form-control"   placeholder=" contribution et travaux significatifs">{{old('travaux',session('etapeX.travaux',''))}}</textarea>
       <br> 
     <textarea name="implication" id="" cols="30" rows="10" class="form-control"   placeholder=" implication communautaire">{{old('implication',session('etapeX.implication',''))}}</textarea><br>
     
     <div class="btn-group mt-4">
         <a href="{{route('etape3.autre')}}" class="btn btn-warning">Précédent</a>
         <button type="submit" class="btn btn-info">Suivant</button>
        </div>
    
    </form>
  </div>
                           
                        
</div>
                        
                        <div class="col-2"> </div>
                         
                    </div>
            </section>
           
        </div>
    </main>
    @endsection
  
    
        
