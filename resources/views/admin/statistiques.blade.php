<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
  
   <header class="header">
    @include('admin.header') 
</header> 
@include('admin.sidebar')
<div class="page-content">
    <div class="page-header">
<div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Tableau de board</h2>
    </div>
</div>
   <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong><a href="">College Sciences Juridiques, politiques, économiques et de gestion</a></strong>
                    </div>
                    <div class="number dashtext-1">{{$economies}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
              <a href="">
                
              </a>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-contract"></i></div><strong><a href="">Collège Sciences de la Santé Humaine et Animale</a></strong>
                    </div>
                    <div class="number dashtext-2">{{$medecins}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong><a href="">Collège Sciences Naturelles et Agricoles</a></strong>
                    </div>
                    <div class="number dashtext-3">{{$agronomes}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong><a href="">Collège Sciences et Techniques</a></strong>
                    </div>
                    <div class="number dashtext-4">{{$scientifiques}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>


  <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong><a href="">Collège Sciences Humaines, Arts, Lettres et Culture</a></strong>
                    </div>
                    <div class="number dashtext-1">{{$comms}}</div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>


        </section>
       
              
        <section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
            </div>
          </div>
        </section>
     
       @include('admin.footer')

</body>
</html>             