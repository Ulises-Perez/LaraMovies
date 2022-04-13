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
                                        <h6 class="text-xl md:text-2xl lg:text-5xl font-bold uppercase text-white" id="movie-name">{{$mvMovies['title']}}</h6>
                                        <p class="text-base md:text-lg mb-10 leading-none text-white font-thin">
                                            {{$descC = substr_replace($mvMovies['overview'], "...", 156)}}
                                        </p>
                                        <a href="{{route('peliculas.show', $mvMovies['id'])}}"
                                            class="bg-red-500 py-4 px-8 text-white font-bold uppercase text-xs rounded-md hover:bg-gray-200 hover:text-gray-800 transition duration-300 ease-in-out">
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

        <section>
            <div class="w-full mt-10 mb-20">
                <div class="container mx-auto text-white mb-4 flex justify-center items-center">
                    <p class="text-3xl uppercase">
                        <b>TOP 6</b> de Hoy
                    </p>
                </div>
                <div class="container mx-auto flex justify-center content-center mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6 justify-center content-center text-white">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($trendingMovies['results'] as $trendingM)
                            @if ($i++ <=5)
                                <a href="{{route('peliculas.show', $trendingM['id'])}}" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                    <div class="poster relative">
                                        <img class="w-full h-full rounded-xl" src="https://image.tmdb.org/t/p/w300/{{$trendingM['poster_path']}}" alt="{{$trendingM['title']}}">
                                        <div class="absolute top-0 left-0 bg-back-oficial w-12 h-12 -m-3 rounded-full flex items-center justify-center">
                                            <h6 class="bg-red-500 rounded-full w-8 h-8 flex items-center justify-center">
                                                {{$i}}
                                            </h6>
                                        </div>
                                        <div class="sombra-content hidden absolute inset-0 flex justify-center items-center rounded">
                                            <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                <i class="fas fa-play"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex justify-center items-end rounded">
                                        <p class="truncate w-full text-center p-2">{{$trendingM['title']}}</p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!--<section>
            <div class="w-full mt-10 mb-20">
                <div class="container mx-auto text-white mb-4">
                    <p class="text-3xl uppercase">
                        <b>TOP 6</b> de Hoy
                    </p>
                </div>
                <div class="container mx-auto flex justify-center content-center">

                    <div class="owl-carousel owl-theme owl-carousel-top">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($trendingMovies['results'] as $trendingM)
                            @if ($i++ <=11)
                                <a href="{{route('peliculas.show', $trendingM['id'])}}" class="item tilt-poster">
                                    <div class="poster relative">
                                        <img class="w-full h-full rounded-xl" src="https://image.tmdb.org/t/p/w300/{{$trendingM['poster_path']}}" alt="{{$trendingM['title']}}">
                                    </div>
                                    <div class="flex justify-center items-end rounded">
                                        <p class="truncate w-full text-center text-white p-2">{{$trendingM['title']}}</p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </section>-->

        <section>
            <div class="w-full my-20">
                <div class="container mx-auto text-white mb-4 flex items-center gap-6">
                    <p class="text-3xl">
                        Populares
                    </p>
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
                                        <img class="w-full h-full rounded-xl" src="https://image.tmdb.org/t/p/w300/{{$npMovies['poster_path']}}" alt="{{$npMovies['title']}}">
                                        <div class="sombra-content hidden absolute inset-0 flex justify-center items-center rounded">
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

        <section class="w-full my-20">
            <div class="container mx-auto text-white">
                <div class="box-list-box rounded-xl shadow-lg shadow-gray-100/25">
                    <div class="box-list-shadow bg-black bg-opacity-75 w-full h-full rounded-xl ">
                        <div class="box-list h-full w-full flex flex-col justify-center items-start px-10 py-20">
                            <h1 class="text-3xl mb-1">Spider-Man: Colección</h1>
                            <p class="mb-6">Por primera vez en la historia cinematográfica de Spider-Man, la colección.</p>
                            <button class="bg-red-500 py-4 px-8 text-white font-bold uppercase text-xs rounded-md hover:bg-gray-200 hover:text-gray-800 transition duration-300 ease-in-out">
                                Ver la Colección
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="w-full my-20">
                <div class="container mx-auto text-white mb-4">
                    <p class="text-3xl">
                        Series Populares
                    </p>
                </div>
                <div class="container mx-auto flex justify-center content-center mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 justify-center content-center text-white">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($seContent as $sEstrenos)
                            @if ($i++ <= 11)
                                @if (!empty($sEstrenos['poster_path']))
                                    <a href="{{route('series.show', $sEstrenos['id'])}}" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                        <div class="poster relative">
                                            <img class="w-full h-full rounded-xl" src="https://image.tmdb.org/t/p/w300/{{$sEstrenos['poster_path']}}" alt="{{$sEstrenos['name']}}">
                                            <div class="sombra-content hidden absolute inset-0 flex justify-center items-center rounded">
                                                <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                    <i class="fas fa-play"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <p class="truncate w-full text-center">{{$sEstrenos['name']}}</p>
                                    </a>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
