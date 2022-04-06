@extends('layouts.plantillacontentST')

@section('title', 'TMDB - '.$contentS['name'].'')

@section('content')

    <main id="main" class="backdrop-blur h-full">

        <section id="content-back">
            <div class="w-full">
                <div class="lg:container mx-auto pt-20 lg:pt-32 pb-6 lg:pb-16 px-2 xl:px-0">
                <div class="gap-y-4 md:gap-4">
                    <div class="box-info-content col-span-3 lg:col-span-4 text-white">
                        <div class="info-title flex items-center justify-between">
                            <h1 class="text-3xl lg:text-5xl font-bold uppercase" id="movie-name">
                                {{$contentS['name']}} - T{{$idseason}}
                            </h1>
                        </div>
                        <div class="episodios descs my-2 lg:my-4 h-72 lg:h-auto overflow-auto lg:overflow-hidden">
                            @php
                                $i=0;
                            @endphp
                            @foreach ($contentS['seasons'] as $temporadas)
                                @if ($i++ <= 0)
                                    <div class="block" id="'.$idseason.'">
                                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2">
                                            @foreach ($contentEpisodesS['episodes'] as $episodios)
                                                @if (empty($episodios['still_path']))
                                                @else
                                                <button class="font-bold uppercase shadow-lg rounded-xl leading-normal text-white w-full shadow-inner text-white h-40 relative" style="background-image: url(https://image.tmdb.org/t/p/w342{{$episodios['still_path']}}); background-size:cover; background-repeat:no-repeat;">
                                                    <a href="{{route('series.showEpisode', [$idserie, $idseason, $episodios['episode_number']])}}">
                                                        <h6 class="text-white bg-black bg-opacity-60 rounded-xl py-6 px-4 text-xs h-full flex justify-center items-center content-center">
                                                            <div class="absolute w-full sombra-content-trending flex justify-center items-end py-1 inset-0 rounded-xl">
                                                                <p class="truncate pb-2">{{$episodios['name']}}</p>
                                                            </div>
                                                            <div class="absolute top-0 left-0 bg-red-500 px-2 py-1 ml-1 mt-1 md:ml-2 md:mt-2 rounded-xl flex items-center justify-center">
                                                                <h6>{{$episodios['episode_number']}}</h6>
                                                            </div>
                                                        </h6>
                                                    </a>
                                                </button>
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

        <section id="temporadas-content-series">
            <div class="w-full">
                <div class="lg:container mx-auto px-2 xl:px-0 text-white">
                    <h1 class="text-xl">Temporadas</h1>
                    <div class="temporadas descs pt-2 pb-8 h-auto w-full overflow-auto flex gap-2">
                        @foreach ($contentS['seasons'] as $temporadas)
                            <div class="block" id="{{$temporadas['season_number']}}">
                                <div class="flex gap-2">
                                        <div class="gap-4">
                                            @if (!empty($temporadas['poster_path']))
                                              <button class="font-bold uppercase shadow-lg rounded-xl leading-normal text-white shadow-inner text-white w-48 lg:w-60 h-20 relative" style="background-image: url(https://image.tmdb.org/t/p/w342{{$temporadas['poster_path']}}); background-size:cover; background-repeat:no-repeat;">
                                                <a href="{{route('series.showSeason', [$contentS['id'], $temporadas['season_number']])}}">
                                                  <h6 class="text-white bg-black bg-opacity-60 rounded-xl py-6 px-4 text-xs h-full flex justify-center items-center content-center">
                                                    <div class="absolute w-full sombra-content-trending flex justify-center items-end py-1 inset-0 rounded-xl">
                                                        <p class="truncate pb-2">{{$temporadas['name']}}</p>
                                                    </div>
                                                    <div class="absolute top-0 left-0 bg-red-500 px-2 py-1 ml-1 mt-1 md:ml-2 md:mt-2 rounded-xl flex items-center justify-center">
                                                      <h6>{{$temporadas['season_number']}}</h6>
                                                    </div>
                                                  </h6>
                                                </a>
                                              </button>
                                            @endif
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