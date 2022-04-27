<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Tailwind Css -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <!-- Google Sans Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Google+Sans:100,300,400,500,700,900,100i,300i,400i,500i,700i,900i">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet">

    <!-- Owl Carrousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

    <link rel="icon" href="https://www.themoviedb.org/assets/2/favicon-32x32-543a21832c8931d3494a68881f6afcafc58e96c5d324345377f3197a37b367b5.png" type="image/png" />
    <!-- Estilos Propios -->
    <link rel="stylesheet" href="css/estilos.css">
    <!-- PWA ASSETS -->
    @laravelPWA
</head>
<body class="relative">

    <header>
        <div class="flex flex-wrap relative">
            <div class="menu w-full fixed z-10 transition duration-700 ease-in-out">
                <!-- Barra de Busqueda - Solo Movil -->
                <form action="{{route('buscador.search')}}" method="GET">
                    @csrf
                    <div class="fixed flex items-center z-10 bg-back-oficial w-full px-4 hidden" id="searchMobile">
                        <input type="search" id="search" name="search" placeholder="Buscar Peliculas, Series..."
                            class="py-7 w-full bg-transparent placeholder-white text-white rounded text-sm outline-none focus:outline-none" />
                    </div>
                </form>
                <nav class="relative flex flex-wrap items-center justify-between px-4 navbar-expand-lg">
                    <div class="container mx-auto flex flex-wrap items-center justify-between">
                        <div class="w-full relative flex justify-between items-center lg:w-auto lg:static lg:block lg:justify-between">
                            <div class="flex items-center pt-3 pb-2">
                                <a class="text-xl font-bold leading-relaxed inline-block py-2 whitespace-no-wrap"
                                    href="#">
                                    <img class="w-40 py-2" src="img/tmdb_logo.svg" alt="" />
                                </a>
                            </div>
                            <div class="flex">
                                <button
                                    class="cursor-pointer text-xl leading-none py-1 border border-solid border-transparent text-white rounded bg-transparent block lg:hidden outline-none focus:outline-none z-20"
                                    type="button" onclick="toggleSearchMobile('searchMobile')">
                                    <i id="btn-lupa" class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="md:flex md:flex-grow items-center hidden" id="example-collapse-navbar">
                            <ul class="flex flex-col lg:items-center md:flex-row list-none md:mr-auto text-white">
                                <form action="{{route('buscador.search')}}" method="GET">
                                    <div class="relative flex flex-wrap items-stretch hidden lg:block ml-6 mr-10 barra-busqueda"
                                        style="width: 340px;">
                                        <input type="search" id="query" name="search" placeholder="Buscar Peliculas, Series o Animes"
                                            class="relative w-full bg-transparent px-3 py-3 pr-10 placeholder-white placeholder-opacity-50 text-white text-sm rounded-md shadow outline-none focus:outline-none border border-white border-opacity-50" />
                                        <span
                                            class="h-full leading-snug font-normal absolute text-center text-white absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                                            <a href="#" class="text-center">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form>
                                <li class="nav-item">
                                    <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded-md bg-white bg-opacity-0 hover:bg-opacity-25"
                                        href="{{route('welcome')}}">
                                        Inicio
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded-md bg-white bg-opacity-0 hover:bg-opacity-25"
                                        href="{{route('peliculas.index', $page=1)}}">
                                        Películas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded-md bg-white bg-opacity-0 hover:bg-opacity-25"
                                        href="{{route('series.index', $page=1)}}">
                                        Series
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded-md bg-white bg-opacity-0 hover:bg-opacity-25"
                                        href="{{route('listas.index')}}">
                                        Sagas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown inline-block relative">
                                        <button class="text-xs uppercase text-white py-2 px-3 inline-flex items-center">
                                          <span class="mr-1">Generos</span>
                                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                        </button>
                                            <ul class="dropdown-menu absolute hidden text-gray-800 pt-1 rounded" style="height: 200px; overflow:auto;">
                                                @foreach ($generosContent['genres'] as $generos)
                                                    <li class="">
                                                        <a class="bg-gray-200 hover:bg-gray-300 py-2 px-4 block whitespace-no-wrap" href="#">
                                                            {{$generos['name']}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                    </div>
                                </li>
                            </ul>
                            <!-- Disabled Options for Login in Web-->
                            <div class="flex items-center content-center text-white text-sm">
                                <!--<button class="px-3 py-2">
                                    Register
                                </button>
                                <button class="bg-red-500 px-3 py-2 rounded">
                                    Login
                                </button>-->
                                <div class="flex space-x-2">
                                    <div class="relative w-10 h-10">
                                      <img class="rounded-full w-10 h-10 shadow-sm" src="img/user.jpeg" alt="user image" />
                                      <div class="absolute top-0 right-0 h-3 w-3 my-1 border-2 border-white rounded-full bg-green-400"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    @yield('content')

    <div class="menu-phone fixed bottom-0 w-full block md:hidden">
        <div class="box">
            <ul class="bg-back-oficial border-t border-gray-500 border-opacity-25 w-full rounded-t-xl flex justify-between py-2 px-4 gap-4">
                <li>
                    <a class="text-center text-2xl block py-1 px-3 text-white rounded-xl bg-red-500" href="{{route('welcome')}}">
                        <i class="fas fa-home"></i>
                        <p class="text-xs">Inicio</p>
                    </a>
                </li>
                <li>
                    <a class="text-center text-2xl block py-1 px-3 text-white" href="{{route('peliculas.index', $page=1)}}">
                        <i class="fas fa-film"></i>
                        <p class="text-xs">Películas</p>
                    </a>
                </li>
                <li>
                    <a class="text-center text-2xl block py-1 px-3 text-white" href="{{route('series.index', $page=1)}}">
                        <i class="fas fa-theater-masks"></i>
                        <p class="text-xs">Series</p>
                    </a>
                </li>
                <li>
                    <a class="text-center text-2xl block py-1 px-3 text-white" href="{{route('listas.index')}}">
                        <i class="fas fa-list-ol"></i>
                        <p class="text-xs">Listas</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <footer class="hidden md:block border-t border-gray-600 border-opacity-25">
        <div class="w-full">
            <div class="container mx-auto my-10 px-4 xl:px-0">
                <div class="grid grid-cols-3 lg:grid-cols-10 gap-10">
                    <div class="col-span-3 lg:col-span-4 logo-info">
                        <div class="imgFooter flex items-center justify-center lg:justify-start">
                            <img class="h-32" src="https://www.themoviedb.org/assets/2/v4/logos/v2/blue_square_2-d537fb228cf3ded904ef09b136fe3fec72548ebc1fea3fbbd1ad9e36364db38b.svg" alt="">
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-2 list-category">
                        <h1 class="text-white text-xl mb-4">Paginas</h1>
                        <div class="categories">
                            <ul class="text-white text-sm">
                                <li class="py-1 hover:text-red-500">
                                    <a href="#">
                                        Inicio
                                    </a>
                                </li>
                                <li class="py-1 hover:text-red-500">
                                    <a href="#">
                                        Contacto
                                    </a>
                                </li>
                                <li class="py-1 hover:text-red-500">
                                    <a href="#">
                                        Terminos de Uso
                                    </a>
                                </li>
                                <li class="py-1 hover:text-red-500">
                                    <a href="#">
                                        DMCA
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-2 list-category">
                        <h1 class="text-white text-xl mb-4">Generos</h1>
                        <div class="categories">
                            <ul class="text-white text-sm">
                                <li class="py-1">
                                    <a href="#" class="hover:text-red-500">
                                        Acción
                                    </a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="hover:text-red-500">
                                        Terror
                                    </a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="hover:text-red-500">
                                        Comedia
                                    </a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="hover:text-red-500">
                                        Familiar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-2 list-category">
                        <h1 class="text-white text-xl mb-4">Explorar</h1>
                        <div class="categories">
                            <ul class="text-white text-sm">
                                <li class="py-1 hover:text-red-500">
                                    <a href="#">
                                        Estrenos
                                    </a>
                                </li>
                                <li class="py-1 hover:text-red-500">
                                    <a href="#">
                                        Películas Top
                                    </a>
                                </li>
                                <li class="py-1 hover:text-red-500">
                                    <a href="#">
                                        Series Top
                                    </a>
                                </li>
                                <li class="py-1 hover:text-red-500">
                                    <a href="#">
                                        Más Vistas
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS Universal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src='https://cdn.rawgit.com/gijsroge/tilt.js/38991dd7/dest/tilt.jquery.js'></script>
    <script src="js/script.js"></script>
    <!-- JS Universal -->
</body>
</html>