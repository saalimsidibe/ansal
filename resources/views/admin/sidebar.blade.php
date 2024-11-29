<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Pr Toure Hamidou</h1>
            <p>Administrateur</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="{{ request()->routeIs('evaluateur.admin') ? 'active' : '' }}"><a href="{{route('evaluateur.admin')}}"> <i class="icon-home"></i>Liste des candidatures </a></li>

               {{-- <li class="{{ request()->routeIs('statistiques') ? 'active' : '' }}"><a href="{{route('statistiques')}}"><a href="{{route('statistiques')}}"> <i class="fa fa-bar-chart"></i>Statistiques </a></li>--}}
        <li class="{{ request()->routeIs('statistiques*') ? 'active' : '' }} dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bar-chart"></i>Statistiques <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li class="{{ request()->routeIs('statistiques.economie') ? 'active' : '' }}">
                <a href="{{ route('statistiques.economie') }}"><small>Sciences juridiques, politiques,économiques et de gestion</small> </a>
            </li>
            <li class="{{ request()->routeIs('statistiques.agronomie') ? 'active' : '' }}">
                <a href="{{ route('statistiques.agronomie') }}"><small>Sciences naturelles et agronomiques</small></a>
            </li>
            <li class="{{request()->routeIs('statistiques.st') ? 'active' : '' }}">
              <a href="{{route('statistiques.st')}}"><small>Sciences et Techniques</small></a>
            </li>
            <li class="{{request()->routeIs('statistiques.medecine') ? 'active' : ''}}">
              <a href="{{route('statistiques.medecine')}}"> <small>Sciences de la santé humaine et animale</small></a>
            </li>
            <li class="{{request()->routeIs('statistiques.lettre')? 'active': ''}}">
              <a href="{{request()->routeIs('statistiques.lettre')? 'active': ''}}"> <small> Sciences humaines, arts, lettres et culture </small></a>

            </li>
        </ul>
    </li>
       
              </ul>
      </nav>
      <!-- Sidebar Navigation end-->