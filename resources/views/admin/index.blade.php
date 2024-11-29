<!DOCTYPE html>
<html>
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
       @include('admin.body')
       @include('admin.footer')
  </body>
</html>