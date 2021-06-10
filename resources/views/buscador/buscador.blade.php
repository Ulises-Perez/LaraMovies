@extends('layouts.plantillaI')

@section('title', 'TMDB - '.$search.'')

@section('content')

    <main id="main" class="mt-20">

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
                        @foreach ($bContent as $movies)
                            @if ($movies['vote_average'] != "0" && !empty($movies['poster_path']))
                                <x-movie-card :movies="$movies"/>
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
                        @foreach ($bSContent as $series)
                            @if ($series['vote_average'] != "0" && !empty($series['poster_path']))
                                <x-tv-card :series="$series" />
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    </main>
@endsection
