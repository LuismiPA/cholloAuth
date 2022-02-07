<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  </head>
  <body class="">
    
    <div class="pagina m-auto">
      <div class="pagina justify-content-between">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white mb-3">
          <a class="navbar-brand" href={{ route('index') }}>Chollo Severo</a>
          <a class="navbar-brand" href={{ route('index') }}><img src="{{asset('assets/images/logo.png')}}" alt="logo" width="30" height="30" class="d-inline-block align-top" alt="logo"></a>
          <div class="navegador collapse navbar-collapse my-auto justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link text-white" href={{ route('index') }}>Inicio</a>
              <a class="nav-item nav-link text-white" href={{ route('index' , 'nuevos') }}>Nuevos</a>
              <a class="nav-item nav-link text-white" href={{ route('index' , 'destacados') }}>Destacados</a>
              <a class="nav-item nav-link text-white" href={{ route('formChollo') }}>NuevoProducto</a>
            </div>
          </div>
        </nav>
        
        @yield('name')

        @yield('contenido')
        
        <footer>
          <div class="bg-dark d-flex justify-content-between text-white pt-4 pb-4 pl-3 pr-3 mt-4">
            <h6>Luis Miguel Pedriza Abella</h6>
            <h6><i class="far fa-copyright"></i> CholloSevero <?=date('Y',time())?></h6>
          </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
      </div>
    </div>
    
    
  </body>
  </html>