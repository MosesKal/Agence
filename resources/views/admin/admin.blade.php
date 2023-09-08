<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>


        <title>@yield('title') | Administration</title>

        <style>
          @layer reset {
            button {
              all : unset;
            }
          }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Agence</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              @php
                  $route = request()->route()->getName();
              @endphp

              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_contains($route, 'property.')]) aria-current="page" href="{{route('admin.property.index')}}">Gerer les biens</a>
                  </li>

                  <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_contains($route, 'option.')]) aria-current="page" href="{{route('admin.option.index')}}">Gerer les option</a>
                  </li>
                </ul>

                <div class="ms-auto">
                  @auth
                    <ul class="navbar-nav">
                      <li class="nav-item">
                         <form action="{{route('logout')}}" method="post">
                          @csrf
                          @method('delete')
                          <button class="nav-link">Se deconnecter</button>
                         </form>
                      </li>
                    </ul>  
                  @endauth
                </div>

              </div>
            </div>
          </nav>

        <div class="container mt-5">
            @include('shared.flash')
            @yield('content')
        </div>
        <script>
          new TomSelect('select[multiple]', {plugins : {remove_button : {title : 'Supprimer'}}})
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
