@extends('layouts.plantillacontentS')

@section('title', 'TMDB - '.$contentS['name'].'')

@section('content')
<main id="main" class="backdrop-blur">

    <section id="content-back">
      <div class="w-full h-full sombra-new-design">
        <div class="lg:container mx-auto pt-20 lg:pt-24 px-4 xl:px-0">
          <div class="grid grid-cols-1 md:gap-2">
            <div class="box-info-content text-white pt-8">
              <!-- TITULO Y AÑO -->
              <div class="info-title flex items-center justify-center lg:justify-between">
                <h1 class="text-3xl lg:text-5xl font-bold uppercase" id="movie-name">
                  {{$contentS['name']}}
                </h1>
            <!--@if (!empty($contentImgS['logos']))
                  @php
                  $i=1;
                  @endphp
                  @foreach ($contentImgS['logos'] as $imgSerieLogo)
                    @if ($i++ <= 1)
                      <img class="sm:hidden" src="https://image.tmdb.org/t/p/original/{{$imgSerieLogo['file_path']}}" alt="{{$contentS['name']}}">
                    @endif
                  @endforeach
                @else
                  <h1 class="text-3xl lg:text-5xl font-bold uppercase" id="movie-name">
                    {{$contentS['name']}}
                  </h1>
                @endif-->
                <div class="info-year-definicion text-base flex items-center gap-6">
                  <div class="year hidden lg:block">
                    @php
                        // Como la fecha viene en formato ingles, establecemos el localismo.
                        setlocale(LC_ALL, 'en_US');
  
                        // Fecha en formato yyyy/mm/dd
                        $timestamp = strtotime($contentS['first_air_date']);

                        // Fecha en formato dd/mm/yyyy
                        $fechaYear = strftime("%Y", $timestamp);
                        echo $fechaYear;
                    @endphp
                  </div>
                </div>
              </div>
              <!-- FIN TITULO Y AÑO -->

              <!-- DESCRIPCIÓN -->
              @if (empty($contentS['overview']))
              @else
                <p class="descm text-base md:text-md text-justify text-gray-400 py-3 h-20 sm:h-auto descs overflow-auto leading-none">
                  {{$contentS['overview']}}
                </p>
              @endif
              <!-- FIN DESCRIPCIÓN -->

              <section id="temporadas-content-series">
                  <div class="w-full">
                      <div class="lg:container mx-auto text-white">
          
                          <div class="temporadas descs pt-2 pb-2 h-auto w-full overflow-auto flex gap-2">
                              @foreach ($contentS['seasons'] as $temporadas)
                                  @if (!$temporadas['episode_count'] <= 0)
                                    <div class="block" id="{{$temporadas['season_number']}}">
                                      <div class="flex gap-2">
                                              <div class="gap-4">
                                                  @if (!empty($temporadas['poster_path']))
                                                    <button class="font-bold uppercase shadow-lg rounded-xl leading-normal text-white shadow-inner text-white w-48 lg:w-60 h-20 relative" style="background-image: url(https://image.tmdb.org/t/p/w342{{$temporadas['poster_path']}}); background-size:cover; background-repeat:no-repeat;">
                                                      <a href="{{route('series.showEpisode', [$contentS['id'], $temporadas['season_number'], 1])}}">
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
                                  @endif
                              @endforeach
                          </div>
                      </div>
                  </div>
              </section>

              <!-- GENEROS -->
              <div class="generosContent pt-2">
                <h6 class="text-lg">Generos</h6>
                <div class="descs flex gap-2 overflow-auto">
                  @foreach ($contentS['genres'] as $generos)
                    <a href="#{{$generos['name']}}">
                      <div class="genero w-40 h-12 relative flex justify-start px-4 items-center rounded-xl" style="
                            background-image: url(https://image.tmdb.org/t/p/w185/{{$contentS['backdrop_path']}});
                          ">
                        <div class="nombre-genero absolute inset-0 bg-gradient-to-r from-red-600 via-red-500 px-4 rounded-xl"></div>
                        <h6 class="opacity-100 absolute">{{$generos['name']}}</h6>
                      </div>
                    </a>
                  @endforeach
                </div>
              </div>
              <!-- FIN GENEROS -->

            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="descubrir bg-back-oficial py-10">
      <div class="w-full lg:container mx-auto text-white">
        <div class="grid grid-cols-1 gap-6">

          <section id="section-similares">

            <section>
              <div class="w-full">
                  <div class="container mx-auto px-4 md:px-0 text-white mb-6">
                      
                      <p class="flex-auto">
                        <a class="text-lg font-bold uppercase block leading-normal text-white">
                          Te recomendamos
                        </a>
                      </p>
                  </div>
                  <div class="container mx-auto flex justify-center content-center px-4 sm:px-0 mb-14 md:mb-14 lg:mb-6">
                      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 justify-center content-center text-white">
                          @php
                              $i=1;
                              $varC = count($recomendationsContent);
                          @endphp
                          @if (!$varC == 0)
                            @foreach ($recomendationsContent as $series)
                              @if (!empty($series['poster_path']))
                                @if ($i++ <= 12)
                                  <x-tv-card :series="$series" />
                                @endif
                              @endif
                            @endforeach
                          @else
                            @foreach ($upcomingMovies as $movies)
                              @if ($i++ <= 12)
                                <x-movie-card :movies="$movies"/>
                              @endif
                            @endforeach
                          @endif
                      </div>
                  </div>
              </div>
          </section>

          </section>
        </div>
      </div>
    </section>

  </main>
@endsection