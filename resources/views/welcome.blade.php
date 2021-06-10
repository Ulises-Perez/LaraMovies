@extends('layouts.plantilla')

@section('title', 'TMDB')

@section('content')

    <section id="content-sliders">
        <div class="w-full">
            <div class="owl-carousel owl-theme owl-carousel-1">
                @php
                    $i=0;
                @endphp
                @foreach ($mvContent as $mvMovies)
                    @if ($i++ <= 5)
                        <div class="item">
                            <div class="sliders relative bg-cover bg-center py-24 px-10 object-fill"
                                style="background-image: url(https://image.tmdb.org/t/p/w1280/{{$mvMovies['backdrop_path']}}); ">
                                <div class="sombra absolute inset-0 flex justify-start items-center lg:px-16">
                                    <div class="info px-4">
                                        <h6 class="text-3xl md:text-4xl lg:text-5xl text-white font-bold">{{$mvMovies['title']}}</h6>
                                        <p class="text-base md:text-lg mb-10 leading-none text-white font-thin">
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

        <!--<section id="Generos">
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
        </section>-->

        <section>
            <div class="w-full my-20">
                <div class="container mx-auto px-4 md:px-0 text-white">
                    <a href="#" class="text-3xl hover:opacity-75 hover:text-red-500">
                        Populares
                        <hr class="border-gray-600 border-opacity-25 mb-4">
                    </a>
                </div>
                <div class="container mx-auto flex justify-center content-center px-4 sm:px-0 mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 justify-center content-center text-white">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($npContent as $npMovies)
                            @if ($i++ <= 11)
                                <a href="{{route('peliculas.show', $npMovies['id'])}}" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                    <div class="poster relative">
                                        <!--<img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/{{$npMovies['poster_path']}}" alt="{{$npMovies['title']}}">-->
                                        <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/{{$npMovies['poster_path']}}" alt="{{$npMovies['title']}}">
                                        <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                            <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                <i class="fas fa-play"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="truncate w-full text-center">{{$npMovies['title']}}</p>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="w-full my-20">
                <div class="container mx-auto px-4 xl:px-0 text-white">
                    <a href="#" class="text-3xl hover:opacity-75 hover:text-red-500">
                        Series Populares
                        <hr class="border-gray-600 border-opacity-25 mb-4">
                    </a>
                </div>
                <div class="container mx-auto flex justify-center content-center px-4 xl:px-0 mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 justify-center content-center text-white">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($seContent as $sEstrenos)
                            @if ($i++ <=11)
                                <a href="{{route('series.show', $sEstrenos['id'])}}" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                    <div class="poster relative">
                                        <!--<img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/{{$sEstrenos['poster_path']}}" alt="{{$sEstrenos['name']}}">-->
                                        <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/{{$sEstrenos['poster_path']}}" alt="{{$sEstrenos['name']}}">
                                        <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                            <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                <i class="fas fa-play"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="truncate w-full text-center">{{$sEstrenos['name']}}</p>
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
@endsection
