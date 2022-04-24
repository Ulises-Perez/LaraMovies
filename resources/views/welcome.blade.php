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
                            <div class="sliders relative bg-cover bg-center object-fill"
                                style="background-image: url(https://image.tmdb.org/t/p/w1280/{{$mvMovies['backdrop_path']}}); ">
                                <div class="sombra absolute inset-0 flex justify-start items-center lg:px-16">
                                    <div class="container mx-auto px-4 xl:px-0">
                                        <h6 class="text-3xl lg:text-5xl font-bold uppercase text-white" id="movie-name">{{$mvMovies['title']}}</h6>
                                        <p class="text-base md:text-lg mb-10 leading-none text-white font-thin">
                                            {{$descC = substr_replace($mvMovies['overview'], "...", 156)}}
                                        </p>
                                        <a href="{{route('peliculas.show', $mvMovies['id'])}}"
                                            class="bg-black bg-opacity-25 py-4 px-8 text-white border-2 border-white hover:border-red-500 font-bold uppercase text-xs rounded-full hover:bg-red-500 hover:text-white" id="movie-name">
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
            <div class="w-full py-20">
                <div class="container mx-auto px-4 xl:px-0 text-white mb-10">
                    <p class="text-2xl md:text-3xl tracking-wide" id="movie-name">
                        Peliculas Tendencias
                    </p>
                    <p class="text-sm text-red-400">Solo en Streaming</p>
                </div>
                <div class="container mx-auto flex justify-center content-center px-4 xl:px-0 mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6 justify-center content-center text-white">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($trendingMovies['results'] as $movies)
                            @if ($i++ <=11)

                                <x-movie-card :movies="$movies"/>
                                
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="w-full py-20 bg-zinc-900">
                <div class="container mx-auto px-4 xl:px-0 text-white mb-10">
                    <p class="text-2xl md:text-3xl tracking-wide" id="movie-name">
                        Peliculas Populares
                    </p>
                    <p class="text-sm text-red-400">Solo en Streaming</p>
                </div>
                <div class="container mx-auto flex justify-center content-center px-4 xl:px-0 mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 justify-center content-center text-white">
                        @php
                            $i=1;
                        @endphp
                        @foreach ($npContent as $movies)
                            @if (empty($movies['poster_path']))
                            @else
                                @if ($i++ <= 12)
                                    <x-movie-card :movies="$movies"/>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!--<section class="w-full my-20">
            <div class="container mx-auto px-4 xl:px-0 text-white">
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
        </section>-->

        <section>
            <div class="w-full py-20">
                <div class="container mx-auto px-4 xl:px-0 text-white mb-10">
                    <p class="text-2xl md:text-3xl tracking-wide" id="movie-name">
                        Series Top
                    </p>
                    <p class="text-sm text-red-400">Series más Valoradas</p>
                </div>
                <div class="container mx-auto flex justify-center content-center px-4 xl:px-0 mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 justify-center content-center text-white">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($seTopRated as $series)
                            @if ($i++ <= 11)
                                @if (!empty($series['poster_path']))
                                    <x-tv-card :series="$series" />
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section style="background-image: url(https://codewithsadee.github.io/filmlane/assets/images/hero-bg.jpg); background-size:cover; background-position: center center;">
            <div class="w-full py-20 bg-black bg-opacity-75">
                <div class="container mx-auto px-4 xl:px-0 text-white mb-10">
                    <p class="text-2xl md:text-3xl tracking-wide" id="movie-name">
                        Series Populares
                    </p>
                    <p class="text-sm text-red-400">Solo en Streaming</p>
                </div>
                <div class="container mx-auto flex justify-center content-center px-4 xl:px-0 mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 justify-center content-center text-white">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($seContent as $series)
                            @if ($i++ <= 11)
                                @if (!empty($series['poster_path']))
                                    <x-tv-card :series="$series" />
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="w-full py-20">
                <div class="container mx-auto px-4 xl:px-0 text-white mb-10">
                    <p class="text-2xl md:text-3xl tracking-wide" id="movie-name">
                        Peliculas en Estreno
                    </p>
                    <p class="text-sm text-red-400">Disponibles Ya!</p>
                </div>
                <div class="container mx-auto flex justify-center content-center px-4 xl:px-0 mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6 justify-center content-center text-white">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($upcomingMovies as $movies)
                            @if ($i++ <=11)
                                <x-movie-card :movies="$movies"/>   
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
