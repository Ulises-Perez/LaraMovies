@extends('layouts.plantillacontentSTE')

@section('title', 'TMDB - '.$contentS['name'].'')

@section('content')

    <main id="main" class="backdrop-blur">

        <section id="content-back">
            <div class="w-full h-full sombra-new-design">
              <div class="lg:container mx-auto pt-20 sm:pt-28">
                <div class="grid grid-cols-1">
                    <section id="video-content">
                        <div class="w-full">
                          <div class="lg:container mx-auto w-full h-full px-4 sm:px-0">
        
                            <!-- SCRIPT CAMBIA SRC DE LAS Series o episodios -->
                              <script>
                                window.onload = function()
                                  {
                                    var botones = document.getElementsByClassName("buttonLinks"),
                                        iframe = document.getElementById("iframeplay"),
                                        sizeBotones = botones.length;
              
                                    for (i = 0; i < sizeBotones; i++){
                                        botones[i].addEventListener("click", function(){
                                            iframe.src = this.getAttribute("data-link");
                                        }, false);
                                    }
                                  }
                              </script>
                            <!-- SCRIPT CAMBIA SRC DE LAS Series o episodios -->

                            <div class="grid grid-cols-1 sm:grid-cols-2">

                              <div class="py-4">
                                <!-- Opcion 1 - 2embed; https://www.2embed.ru/ -->
                                <button class="buttonLinks hidden sm:block text-white bg-white bg-opacity-25 font-bold uppercase px-6 py-2 text-sm rounded-xl" data-link="https://www.2embed.ru/embed/tmdb/tv?id={{$idserie}}&s={{$idseason}}&e={{$idepisode}}">Opción 1</button>
                              </div>

                              <div class="flex justify-between sm:justify-end items-center gap-2 text-white text-sm py-4">
                                @if ($content_Info_Episode['episode_number'] <= 1)
                                @else
                                  <div class="EpisodioAnterior">
                                    <a href="{{route('series.showEpisode', [$idserie, $idseason, $idepisode-1])}}" class="bg-red-500 py-2 px-3 sm:px-6 rounded-xl flex items-center w-full">
                                      <i class="fas fa-arrow-left pr-1 sm:pr-2"></i> Anterior
                                    </a>
                                  </div>
                                @endif
                            <!--<div class="Serie">
                                  <a href="{{route('series.show', [$idserie])}}" class="bg-white bg-opacity-25 uppercase px-3 sm:px-6 py-2 rounded-xl">
                                    <i class="fas fa-list-ol"></i>
                                  </a>
                                </div>-->
                                <div class="flex flex-wrap">
                                  <div class="w-full sm:w-6/12 md:w-4/12 px-2">
                                    <div class="relative inline-flex align-middle w-full">
                                      <button class="bg-white bg-opacity-25 rounded-xl text-xs uppercase text-white py-2 px-6 inline-flex items-start" type="button" onclick="openDropdown(event,'dropdown-id')">
                                        Episodios
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                      </button>
                                      <div class="hidden text-base z-40 float-left list-none text-left rounded-xl w-32 overflow-auto overflow-x-hidden h-60 mt-1" id="dropdown-id">
                                        @foreach ($contentEpisodesS['episodes'] as $episodiosNew)
                                          @if ($episodiosNew['episode_number'] == $content_Info_Episode['episode_number'])
                                            <a href="{{route('series.showEpisode', [$idserie, $idseason, $episodiosNew['episode_number']])}}" class="text-sm py-2 px-2 font-normal block w-full whitespace-nowrap bg-red-400 hover:bg-red-500 text-white truncate w-full">
                                              {{$episodiosNew['episode_number']}} - Viendo <i class="fas fa-eye"></i>
                                            </a>
                                          @else
                                            <a href="{{route('series.showEpisode', [$idserie, $idseason, $episodiosNew['episode_number']])}}" class="text-sm py-2 px-2 font-normal block w-full whitespace-nowrap bg-white hover:bg-gray-200 text-gray-800 truncate w-full">
                                              {{$episodiosNew['episode_number']}} - {{$episodiosNew['name']}}
                                            </a>
                                          @endif
                                        @endforeach

                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--<div class="dropdown inline-block relative">
                                  <button class="bg-white bg-opacity-25 rounded-xl text-xs uppercase text-white py-2 px-6 inline-flex items-center">
                                    <span class="mr-1">Episodios</span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                  </button>
                                      <ul class="dropdown-menu absolute hidden text-gray-800 overflow-auto rounded-xl z-50 h-60 w-32">
                                          @foreach ($contentEpisodesS['episodes'] as $episodiosNew)
                                            <li>
                                              @if ($episodiosNew['episode_number'] == $content_Info_Episode['episode_number'])
                                                <a href="{{route('series.showEpisode', [$idserie, $idseason, $episodiosNew['episode_number']])}}" class="bg-red-200 hover:bg-red-300 py-2 px-2 flex justify-start items-center w-full truncate">
                                                  {{$episodiosNew['episode_number']}} <b class="pl-1">Estas Viendo <i class="fas fa-eye"></i> </b>
                                                </a>
                                              @else
                                                <a href="{{route('series.showEpisode', [$idserie, $idseason, $episodiosNew['episode_number']])}}" class="bg-gray-200 hover:bg-gray-300 py-2 px-2 flex justify-start items-center w-full truncate">
                                                  {{$episodiosNew['episode_number']}} <b class="pl-1">{{$episodiosNew['name']}}</b>
                                                </a>
                                              @endif
                                            </li>
                                          @endforeach
                                      </ul>
                                </div>-->
                                @php
                                    $varTotalEpisodios = count($contentEpisodesS['episodes']);
                                @endphp
                                @if ($content_Info_Episode['episode_number'] >= $varTotalEpisodios)
                                @else
                                  <div class="EpisodioProximo">
                                    <a href="{{route('series.showEpisode', [$idserie, $idseason, $idepisode+1])}}" class="bg-red-500 py-2  px-3 sm:px-6 rounded-xl flex items-center">
                                      Proximo <i class="fas fa-arrow-right pl-1 sm:pl-2"></i>
                                    </a>
                                  </div>
                                @endif
                              </div>

                            </div>
                            
        
                            <div class="contentMovie">
                              <iframe id="iframeplay" class="absolute inset-0 w-full h-full rounded-xl" src="https://www.2embed.ru/embed/tmdb/tv?id={{$idserie}}&s={{$idseason}}&e={{$idepisode}}" frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                              </iframe>
                            </div>

                          </div>
                        </div>
                    </section>
                </div>

                <div class="box-info-content col-span-3 lg:col-span-4 text-white px-4 sm:px-0 pt-6">
                  <div class="info-title flex items-center justify-center lg:justify-between">
                    <h1 class="text-3xl lg:text-5xl font-bold uppercase" id="movie-name">
                      T{{$idseason}}E{{$idepisode}} - {{$content_Info_Episode['name']}}
                    </h1>
                    <!--<div class="info-year-definicion text-base flex items-center gap-6">
                      <div class="year hidden lg:block">
                        <?php
                          // Como la fecha viene en formato ingles, establecemos el localismo.
                          setlocale(LC_ALL, 'en_US');
    
                          // Fecha en formato yyyy/mm/dd
                          $timestamp = strtotime($contentS['first_air_date']);
    
                          // Fecha en formato dd/mm/yyyy
                          $fechaYear = strftime("%d-%m-%Y", $timestamp);
                          echo $fechaYear;
                        ?>
                      </div>
                      <div class="calificacion h-8 w-8 bg-red-500 rounded shadow-md flex justify-center items-center">
                        <p class="p-2"><?=$contentS['vote_average']?></p>
                      </div>
                      <!--
                      <div class="definicion bg-red-500 px-2 rounded-full">
                        HD
                      </div>
                    </div>-->
                  </div>
                  @if (empty($contentS['overview']))
                  @else
                    <p class="descm text-base md:text-md text-justify text-gray-300 py-4 leading-none">
                      {{$content_Info_Episode['overview']}}
                    </p>
                  @endif
                </div>

                <!--<section id="episodios-content-series">
                  <div class="w-full">
                      <div class="lg:container mx-auto px-4 sm:px-0 pb-6 text-white">
          
                          <div class="temporadas descs pt-2 pb-8 h-auto w-full overflow-auto flex gap-2">
                              <div class="block">
                                  <div class="flex gap-2">
                                    @foreach ($contentEpisodesS['episodes'] as $episodios)
                                        @if (empty($episodios['still_path']))
                                        @else
                                            <div class="gap-4">
                                                <button class="font-bold uppercase shadow-lg rounded leading-normal text-white shadow-inner text-white w-48 h-24 relative rounded-xl" style="background-image: url(https://image.tmdb.org/t/p/w342{{$episodios['still_path']}}); background-size:cover; background-repeat:no-repeat;">
                                                    <a href="{{route('series.showEpisode', [$idserie, $idseason, $episodios['episode_number']])}}">
                                                        @if ($episodios['name'] == $content_Info_Episode['name'])
                                                            <h6 class="text-white bg-red-700 bg-opacity-70 rounded-xl py-6 px-4 text-xs h-full flex justify-center items-center content-center">
                                                                <div class="absolute inset-0 w-full sombra-content-trending bg-opacity-50 py-1 bottom-0 rounded-xl flex justify-center items-end">
                                                                    <p>Estas Viendo</p>
                                                                </div>
                                                                <div class="absolute px-4 py-2 inset-0 h-full flex items-center justify-center content-center">
                                                                    <h6><i class="far fa-eye text-2xl"></i></h6>
                                                                </div>
                                                            </h6>
                                                        @else
                                                            <h6 class="text-white bg-black bg-opacity-60 rounded-xl py-6 px-4 text-xs h-full flex justify-center items-center content-center">
                                                                <div class="absolute bg-red-500 px-4 py-1 top-0 left-0 m-2 rounded-full">
                                                                    <h6>{{$episodios['episode_number']}}</h6>
                                                                </div>
                                                                <div class="absolute inset-0 w-full sombra-content-trending bg-opacity-50 py-1 bottom-0 rounded-xl flex justify-center items-end">
                                                                    <p class="truncate px-2">{{$episodios['name']}}</p>
                                                                </div>
                                                            </h6>
                                                        @endif
                                                    </a>
                                                </button>
                                            </div>
                                        @endif
                                    @endforeach
                                    <!--@if($idseason < count($contentS['seasons']))
                                      @php
                                          //dd(count($contentS['seasons']));
                                      @endphp
                                        <div class="gap-4">
                                            <button class="font-bold uppercase shadow-lg rounded leading-normal text-white shadow-inner text-white w-48 h-24 relative">
                                                <a href="{{route('series.showEpisode', [$idserie, $idseason+1, 1])}}">
                                                    <h6 class="text-white bg-red-500 rounded-xl py-6 px-4 text-xs h-full flex justify-center items-center content-center">
                                                        <div class="absolute px-4 py-2 inset-0 h-full flex items-center justify-center content-center">
                                                            <h6><i class="fas fa-arrow-right text-2xl"></i></h6>
                                                        </div>
                                                        <div class="absolute w-full bg-black bg-opacity-0 py-1 bottom-0 rounded-b-xl">
                                                            <p>
                                                                Temporada {{$idseason+1}}
                                                            </p>
                                                        </div>
                                                    </h6>
                                                </a>
                                            </button>
                                        </div>
                                    @endif
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </section>-->

              </div>
            </div>
        </section>

        <section class="descubrir bg-back-oficial">
            <div class="w-full lg:container mx-auto px-4 pt-6 xl:px-0 text-white">
              <div class="grid grid-cols-1 gap-6">
    
                <section id="section-similares">
    
                  <section>
                    <div class="w-full">
                        <div class="container mx-auto lg:px-0 text-white mb-6">
                            
                            <p class="flex-auto">
                              <a class="text-lg font-bold uppercase block leading-normal text-white">
                                Más Temporadas
                              </a>
                            </p>
                        </div>
                        <div class="container mx-auto flex justify-center content-center mb-14 md:mb-14 lg:mb-6">
                            <div class="temporadas descs pt-2 pb-8 h-auto w-full overflow-auto flex gap-2">
                                @foreach ($contentS['seasons'] as $temporadas)
                                    @if (!$temporadas['episode_count'] <= 0)
                                      <div class="block" id="{{$temporadas['season_number']}}">
                                        <div class="flex gap-2">
                                                <div class="gap-4">
                                                    <button class="font-bold uppercase shadow-lg rounded-xl leading-normal text-white shadow-inner text-white w-48 lg:w-60 h-60 relative" style="background-image: url(https://image.tmdb.org/t/p/w342{{$temporadas['poster_path']}}); background-size:cover; background-repeat:no-repeat;">
                                                        <a href="{{route('series.showEpisode', [$idserie, $temporadas['season_number'], 1])}}">
                                                          <h6 class="text-white bg-black bg-opacity-60 rounded-xl py-6 px-4 text-xs h-full flex justify-center items-center content-center">
                                                            <div class="absolute w-full flex justify-center items-end py-1 inset-0 rounded-xl">
                                                                <p class="truncate pb-2">{{$temporadas['name']}}</p>
                                                            </div>
                                                            <div class="absolute top-0 left-0 bg-red-500 px-2 py-1 ml-1 mt-1 md:ml-2 md:mt-2 rounded-xl flex items-center justify-center">
                                                              <h6>{{$temporadas['season_number']}}</h6>
                                                            </div>
                                                          </h6>
                                                        </a>
                                                    </button>
                                                </div>
                                        </div>
                                      </div>
                                    @endif
                                @endforeach
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