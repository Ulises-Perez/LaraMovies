@extends('layouts.plantillacontentST')

@section('title', 'TMDB - '.$contentS['name'].'')

@section('content')

    <main id="main" class="backdrop-blur h-full">

        <section id="content-back">
            <div class="w-full">
                <div class="lg:container mx-auto pt-20 lg:pt-32 pb-6 lg:pb-16 px-2 xl:px-0">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-y-4 md:gap-4">
                    <div class="box-img-content relative col-span-2 lg:col-span-1 flex justify-center lg:justify-start">
                        <img src="https://image.tmdb.org/t/p/w342{{$contentS['poster_path']}}"
                        class="w-auto rounded" alt="" />
                        <div class="hidden lg:block absolute top-0 right-0 rounded flex items-center justify-center">
                            <a href="{{route('series.show', $idserie)}}">
                                <button class="bg-red-500 text-white px-3 py-2 rounded-bl rounded-tr outline-none focus:outline-none">
                                <i class="fas fa-list-ul"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="box-info-content col-span-3 lg:col-span-4 text-white">
                        <div class="info-title flex items-center justify-between">
                            <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold">
                            Temporada: {{$idseason}}
                            </h1>
                            <div class="info-year-definicion text-base flex items-center gap-6">
                                <div class="calificacion h-8 w-8 bg-red-500 rounded shadow-md flex justify-center items-center">
                                    <p class="p-2">{{$contentS['vote_average']}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="episodios lg:px-2 my-2 lg:my-4 h-72 overflow-auto">
                            @php
                                $i=0;
                            @endphp
                            @foreach ($contentS['seasons'] as $temporadas)
                                @if ($i++ <= 0)
                                    <div class="block" id="'.$idseason.'">
                                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                                            @foreach ($contentEpisodesS['episodes'] as $episodios)
                                                @if (empty($episodios['still_path']))
                                                @else
                                                <div class="gap-4">
                                                    <button class="font-bold uppercase shadow-lg rounded leading-normal text-white w-full shadow-inner text-white h-20 relative" style="background-image: url(https://image.tmdb.org/t/p/w342{{$episodios['still_path']}}); background-size:cover; background-repeat:no-repeat;">
                                                        <a href="{{route('series.showEpisode', [$idserie, $idseason, $episodios['episode_number']])}}">
                                                            <h6 class="text-white bg-black bg-opacity-60 rounded py-6 px-4 text-xs h-full flex justify-center items-center content-center">
                                                                <div class="absolute bg-red-500 px-3 py-1 top-0 left-0 rounded-tl rounded-br">
                                                                    <h6>{{$episodios['episode_number']}}</h6>
                                                                </div>
                                                                <div class="absolute w-full bg-black bg-opacity-50 py-1 bottom-0 rounded-b">
                                                                    <p class="truncate px-2">{{$episodios['name']}}</p>
                                                                </div>
                                                            </h6>
                                                        </a>
                                                    </button>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section id="temporadas-content">
            <div class="w-full">
                <div class="lg:container mx-auto px-2 xl:px-0 text-white">
                <h1 class="text-xl">Temporadas</h1>
                <div class="temporadas pt-2 pb-8 h-auto w-full overflow-auto flex gap-2">
                            @foreach ($contentS['seasons'] as $temporadas)
                                <div class="block" id="{{$temporadas['season_number']}}">
                                    <div class="flex gap-2">
                                        <div class="gap-4">
                                            <button class="font-bold uppercase shadow-lg rounded leading-normal text-white shadow-inner text-white w-48 lg:w-60 h-20" style="background-image: url(https://image.tmdb.org/t/p/w342{{$temporadas['poster_path']}}); background-size:cover; background-repeat:no-repeat;">
                                                <a href="{{route('series.showSeason', [$idserie, $temporadas['season_number']])}}">
                                                    <h6 class="text-white bg-black bg-opacity-60 rounded py-4 px-4 text-xs h-full flex justify-center items-center">
                                                        {{$temporadas['name']}}
                                                    </h6>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection