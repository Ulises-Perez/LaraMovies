@extends('layouts.plantilla')

@section('title', 'TMDB')

@section('content')
    <header>
        <div class="w-full">
            <div class="mx-auto">
                <div class="flex flex-wrap items-stretch h-16 hidden z-40" id="searchMobile">
                    <input type="search" id="search" placeholder="Buscar Peliculas, Series o Animes"
                        class="px-3 py-3 placeholder-white text-white bg-transparent rounded text-sm shadow outline-none focus:outline-none w-full h-full pr-10" />
                </div>
            </div>
        </div>
        <div class="flex flex-wrap relative">
            <div class="w-full absolute z-10">
                <nav class="relative flex flex-wrap items-center justify-between px-2 navbar-expand-lg">
                    <div class="container mx-auto flex flex-wrap items-center justify-between">
                        <div
                            class="w-full relative flex justify-between items-center lg:w-auto lg:static lg:block lg:justify-between">
                            <div class="flex items-center pt-3 pb-2">
                                <a class="text-xl font-bold leading-relaxed inline-block py-2 whitespace-no-wrap"
                                    href="#">
                                    <img class="w-40 py-2" src="img/tmdb_logo.svg" alt="" />
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
                                <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                                    id="modal-id">
                                    <div class="relative w-auto my-6 mx-auto max-w-sm">
                                        <!--content-->
                                        <div
                                            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                            <!--header-->
                                            <div
                                                class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                                                <h3 class="text-3xl font-semibold">
                                                    Modal Title
                                                </h3>
                                                <button
                                                    class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                                    onclick="toggleModal('modal-id')">
                                                    <span
                                                        class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                                        ×
                                                    </span>
                                                </button>
                                            </div>
                                            <!--body-->
                                            <div class="relative p-6 flex-auto">
                                                <p class="my-4 text-gray-600 text-lg leading-relaxed">
                                                    I always felt like I could do anything. That’s the main
                                                    thing people are controlled by! Thoughts- their perception
                                                    of themselves! They're slowed down by their perception of
                                                    themselves. If you're taught you can’t do anything, you
                                                    won’t do anything. I was taught I could do everything.
                                                </p>
                                            </div>
                                            <!--footer-->
                                            <div
                                                class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                                                <button
                                                    class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1"
                                                    type="button" style="transition: all .15s ease"
                                                    onclick="toggleModal('modal-id')">
                                                    Close
                                                </button>
                                                <button
                                                    class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                                    type="button" style="transition: all .15s ease"
                                                    onclick="toggleModal('modal-id')">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                            </div>
                            <div class="hidden bg-back-oficial text-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                                style="min-width:12rem" id="dropdown-id">
                                <a class="px-3 py-2 flex items-center text-sm leading-snug bg-white bg-opacity-0 hover:bg-opacity-25"
                                    href="{{route('welcome')}}">
                                    Inicio
                                </a>
                                <a class="px-3 py-2 flex items-center text-sm leading-snug bg-white bg-opacity-0 hover:bg-opacity-25"
                                    href="{{route('peliculas.index')}}">
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
                                <form action="busqueda.php">
                                    <div class="relative flex flex-wrap items-stretch hidden lg:block ml-6 mr-10"
                                        style="width: 400px;">
                                        <input type="search" id="query" name="query" placeholder="Buscar Peliculas, Series o Animes"
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
                                        href="{{route('peliculas.index')}}">
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
                                <button class="px-3 py-2">
                                    Register
                                </button>
                                <button class="bg-red-500 px-3 py-2 rounded">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <section id="content-sliders">
        <div class="w-full">
            <div class="owl-carousel owl-theme owl-carousel-1">
                @php
                    $i=0;
                @endphp
                @foreach ($mvContent as $mvMovies)
                    @if ($i++ <= 5)
                        <div class="item">
                            <div class="sliders relative bg-cover bg-center text-white py-24 px-10 object-fill"
                                style="background-image: url(https://image.tmdb.org/t/p/w1280/{{$mvMovies['backdrop_path']}}); ">
                                <div class="sombra absolute inset-0 flex justify-start items-center lg:px-16">
                                    <div class="info px-4">
                                        <h6 class="text-3xl md:text-4xl lg:text-5xl">{{$mvMovies['title']}}</h6>
                                        <p class="text-base md:text-xl mb-10 leading-none">
                                            {{$descC = substr_replace($mvMovies['overview'], "...", 156)}}
                                        </p>
                                        <a href="{{route('peliculas.show', $mvMovies['id'])}}"
                                            class="bg-red-500 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800 transition duration-300 ease-in-out">
                                            <i class="fas fa-play mr-2"></i> Reproducir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <main id="main">

        <section id="Generos">
            <div class="w-full">
                <div class="container mx-auto px-4 xl:px-0 py-10 text-white">
                    <a href="#" class="text-3xl hover:opacity-75 hover:text-red-500">
                        Géneros
                        <hr class="border-gray-600 border-opacity-25 mb-4">
                    </a>
                    <div class="owl-carousel owl-theme owl-carousel-generos">
                        @foreach ($generosContent['genres'] as $generos)
                            <a href="#{{$generos['name']}}">
                                <div class="col-span-2 genero h-12 relative flex justify-start px-4 items-center rounded">
                                    <div class="nombre-genero absolute inset-0 bg-gradient-to-r from-red-600 px-4 rounded"></div>
                                    <h6 class="opacity-100 absolute">{{$generos['name']}}</h6>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="listapeliculas" class="bg-back-second">
            <div class="w-full">
                <div class="container mx-auto px-4 xl:px-0 py-10 mb-16 text-white">
                    <a href="#" class="text-3xl hover:opacity-75 hover:text-red-500">
                        Populares
                        <hr class="border-gray-600 border-opacity-25 mb-4">
                    </a>
                    <div class="container_p flex flex-wrap justify-center xl:justify-start">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($npContent as $npMovies)
                            @if ($i++ <= 11)
                                <a href="{{route('peliculas.show', $npMovies['id'])}}" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                    <div class="poster relative">
                                        <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/{{$npMovies['poster_path']}}" alt="{{$npMovies['title']}}">
                                        <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                            <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                <i class="fas fa-play"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="truncate w-full">{{$npMovies['title']}}</p>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="listaseries" class="bg-back-oficial">
            <div class="w-full">
                <div class="container mx-auto px-4 xl:px-0 py-10 mb-16 text-white">
                    <a href="#" class="text-3xl hover:opacity-75 hover:text-red-500">
                        Series Populares
                        <hr class="border-gray-600 border-opacity-25 mb-4">
                    </a>
                    <div class="container_p flex flex-wrap justify-center xl:justify-start">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($seContent as $sEstrenos)
                            @if ($i++ <=11)
                                <a href="{{route('series.show', $sEstrenos['id'])}}" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                    <div class="poster relative">
                                        <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/{{$sEstrenos['poster_path']}}" alt="{{$sEstrenos['name']}}">
                                        <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                            <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                <i class="fas fa-play"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="truncate w-full">{{$sEstrenos['name']}}</p>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="border-t border-gray-600 border-opacity-25">
        <div class="w-full">
            <div class="container mx-auto my-10 px-4">
                <div class="grid grid-cols-3 lg:grid-cols-10 gap-10">
                    <div class="col-span-3 lg:col-span-4 logo-info">
                        <div class="imgFooter flex items-center justify-center lg:justify-start">
                            <img class="h-32" src="https://www.themoviedb.org/assets/2/v4/logos/v2/blue_square_2-d537fb228cf3ded904ef09b136fe3fec72548ebc1fea3fbbd1ad9e36364db38b.svg" alt="">
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-2 list-category">
                        <h1 class="text-white text-xl mb-4">Pages</h1>
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
@endsection
