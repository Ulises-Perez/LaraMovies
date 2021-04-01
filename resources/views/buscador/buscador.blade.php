@extends('layouts.plantillaI')

@section('title', 'TMDB - '.$search.'')

@section('content')

    <main id="main">

    <section id="toggle-busquedas">
        <div class="w-full">
            <div class="container mx-auto px-4 xl:px-0 pt-10 mb-6 text-white flex justify-start">
                <!-- Toggle Button -->
                <label for="toogleA" class="flex items-center cursor-pointer">
                    <!-- label -->
                    <div class="mr-3 font-medium">
                        Películas
                    </div>
                    <!-- toggle -->
                    <div class="relative">
                        <!-- input -->
                        <input id="toogleA" type="checkbox" class="hidden" />
                        <!-- line -->
                        <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"
                        ></div>
                        <!-- dot -->
                        <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"
                        ></div>
                    </div>
                    <!-- label -->
                    <div class="ml-3 font-medium">
                        Series
                    </div>
                </label>
            </div>
        </div>
    </section>

    <section id="lista-peliculas">
        <div class="w-full py-10">
            <div class="container mx-auto flex justify-center content-center px-4 xl:px-0 mb-6">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 justify-center content-center text-white">
                    @if (!empty($bContent))
                        @foreach ($bContent as $busqueda)
                            @if ($busqueda['vote_average'] != "0" && !empty($busqueda['poster_path']))
                                <a href="{{route('peliculas.show', $busqueda['id'])}}" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                    <div class="poster relative">
                                        <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/{{$busqueda['poster_path']}}" alt="{{$busqueda['title']}}">
                                        <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                            <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                <i class="fas fa-play"></i>
                                            </button>
                                        </div>
                                        <div class="calificacion absolute top-0 left-0 h-8 w-8 bg-red-500 rounded-tl rounded-br shadow-md flex justify-center items-center">
                                            <p class="p-2">{{$busqueda['vote_average']}}</p>
                                        </div>
                                    </div>
                                    <p class="truncate w-full text-center">{{$busqueda['title']}}</p>
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="lista-series" class="hidden">
        <div class="w-full py-10">
            <div class="container mx-auto flex justify-center content-center px-4 xl:px-0 mb-6">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 justify-center content-center text-white">
                    @if (!empty($bSContent))
                        @foreach ($bSContent as $busquedaS)
                            @if ($busquedaS['vote_average'] != "0" && !empty($busquedaS['poster_path']))
                                <a href="{{route('series.show', $busquedaS['id'])}}" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                    <div class="poster relative">
                                        <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/{{$busquedaS['poster_path']}}" alt="{{$busquedaS['name']}}">
                                        <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                            <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                <i class="fas fa-play"></i>
                                            </button>
                                        </div>
                                        <div class="calificacion absolute top-0 left-0 h-8 w-8 bg-red-500 rounded-tl rounded-br shadow-md flex justify-center items-center">
                                            <p class="p-2">{{$busquedaS['vote_average']}}</p>
                                        </div>
                                    </div>
                                    <p class="truncate w-full text-center">{{$busquedaS['name']}}</p>
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    </main>
@endsection
