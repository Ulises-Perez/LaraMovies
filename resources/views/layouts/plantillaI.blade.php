<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
    
        <!-- Tailwind Css -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    
        <!-- Google Sans Fonts -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Google+Sans:100,300,400,500,700,900,100i,300i,400i,500i,700i,900i">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
        <!-- Owl Carrousel -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    
        <link rel="icon" href="https://www.themoviedb.org/assets/2/favicon-32x32-543a21832c8931d3494a68881f6afcafc58e96c5d324345377f3197a37b367b5.png" type="image/png" />
        <!-- Estilos Propios -->
        <link rel="stylesheet" href="../css/estilos.css">
    </head>
<body>
    
    <header>
        <div class="w-full">
          <div class="mx-auto">
              <form action="{{route('buscador.search')}}" method="GET">
                  <div class="flex flex-wrap items-stretch h-16 hidden z-40" id="searchMobile">
                      <input type="search" id="search" name="search" placeholder="Buscar Peliculas, Series o Animes"
                          class="px-3 py-3 placeholder-white text-white bg-transparent rounded text-sm shadow outline-none focus:outline-none w-full h-full pr-10" />
                  </div>
              </form>
          </div>
        </div>
        <div class="flex flex-wrap relative">
          <div class="w-full z-10">
            <nav class="relative flex flex-wrap items-center justify-between px-2 navbar-expand-lg">
              <div class="container mx-auto flex flex-wrap items-center justify-between">
                <div
                  class="w-full relative flex justify-between items-center lg:w-auto lg:static lg:block lg:justify-between">
                  <div class="flex items-center pt-3 pb-2">
                    <a class="text-xl font-bold leading-relaxed inline-block py-2 whitespace-no-wrap" href="../Home">
                      <img class="w-40 py-2" src="../img/tmdb_logo.svg" alt="" />
                    </a>
                    <button
                      class="cursor-pointer text-xl leading-none px-3 py-2 ml-2 border border-solid border-transparent text-white rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                      type="button" onclick="openDropdown(event,'dropdown-id')">
                      <i class="fas fa-bars"></i>
                    </button>
                  </div>
                  <div class="flex">
                    <button
                      class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent text-white rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                      type="button" onclick="toggleSearchMobile('searchMobile')">
                      <i id="btn-lupa" class="fas fa-search"></i>
                    </button>
                    <button
                      class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent text-white rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                      type="button" onclick="toggleModal('modal-id')">
                      <i class="fas fa-user"></i>
                    </button>
                  </div>
                  <div
                    class="hidden bg-back-oficial text-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                    style="min-width: 12rem" id="dropdown-id">
                    <a class="px-3 py-2 flex items-center text-sm leading-snug bg-white bg-opacity-0 hover:bg-opacity-25"
                      href="{{route('welcome')}}">
                      Inicio
                    </a>
                    <a class="px-3 py-2 flex items-center text-sm leading-snug bg-white bg-opacity-0 hover:bg-opacity-25"
                      href="{{route('peliculas.index', $page=1)}}">
                      Películas
                    </a>
                    <a class="px-3 py-2 flex items-center text-sm leading-snug bg-white bg-opacity-0 hover:bg-opacity-25"
                      href="{{route('series.index', $page=1)}}">
                      Series
                    </a>
                  </div>
                </div>
                <div class="lg:flex lg:flex-grow items-center hidden" id="example-collapse-navbar">
                  <ul class="flex flex-col lg:items-center lg:flex-row list-none lg:mr-auto text-white">
                    <form action="{{route('buscador.search')}}" method="GET">
                      <div class="relative flex flex-wrap items-stretch hidden lg:block ml-6 mr-10"
                          style="width: 400px;">
                          <input type="search" id="query" name="search" placeholder="Buscar Peliculas, Series o Animes"
                              class="relative w-full bg-transparent px-3 py-3 pr-10 placeholder-white placeholder-opacity-50 text-white text-sm rounded shadow outline-none focus:outline-none border border-white border-opacity-50" />
                          <span
                              class="z-10 h-full leading-snug font-normal absolute text-center text-white absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                              <a href="#" class="text-center">
                                  <i class="fas fa-search"></i>
                              </a>
                          </span>
                      </div>
                    </form>
                    <li class="nav-item">
                      <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded bg-white bg-opacity-0 hover:bg-opacity-25"
                        href="{{route('welcome')}}">
                        Inicio
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded bg-white bg-opacity-0 hover:bg-opacity-25"
                        href="{{route('peliculas.index', $page=1)}}">
                        Películas
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded bg-white bg-opacity-0 hover:bg-opacity-25"
                        href="{{route('series.index', $page=1)}}">
                        Series
                      </a>
                    </li>
                  </ul>
                  <div class="flex items-center text-white text-sm">
                    <button class="px-3 py-2">Register</button>
                    <button class="bg-red-500 px-3 py-2 rounded">Login</button>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </div>
    </header>

    @yield('content')

    <!-- JS Universal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src='https://cdn.rawgit.com/gijsroge/tilt.js/38991dd7/dest/tilt.jquery.js'></script>
    <script src="../js/script.js"></script>
    <!-- JS Universal -->
</body>
</html>