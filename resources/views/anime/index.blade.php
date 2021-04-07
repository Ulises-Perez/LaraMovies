@extends('layouts.plantillaI')

@section('title', 'TMDB - Películas')

@section('content')

    <main id="main">

        <section>
            <div class="w-full py-10" id="scrollingPanel1">
                <div class="container mx-auto flex justify-center content-center px-4 xl:px-0 mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 justify-center content-center text-white">
                        @foreach ($animeAll as $animes)
                            <a href="#idanime" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                <div class="poster relative">
                                    <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/imganime" alt="#titleanime">
                                    <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                        <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                            <i class="fas fa-play"></i>
                                        </button>
                                    </div>
                                    <div class="calificacion absolute top-0 left-0 h-8 w-8 m-2 bg-red-500 rounded shadow-md flex justify-center items-center">
                                        <p class="p-2"></p>
                                    </div>
                                </div>
                                <p class="truncate w-full text-center">{{ $animes['title'] }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection