@extends('layouts.plantillacontentP')

@section('title', 'TMDB - '.$contentM['title'].'')

@section('content')

    <main id="main" class="backdrop-blur">

      <script>
        document.onreadystatechange = () => {
          if (document.readyState === 'complete') {
              var DomListo = 1;
              $('#video-content').show();
          }
        };
      </script>

      <section id="content-back">
        <div class="w-full h-full md:h-full sombra-new-design">
          <div class="lg:container mx-auto pt-20 lg:pt-24 px-2 xl:px-0">
            <div class="grid grid-cols-1 md:gap-2">
              <section id="movie-play">
                <div class="movie-play-box py-20 flex justify-center items-center">
                  <button class="play-btn bg-red-500 text-white rounded-full h-16 w-16 outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                    <i class="fas fa-play"></i>
                  </button>
                </div>
              </section>
              <div class="box-info-content text-white pt-8">
                <!-- TITULO Y AÑO -->
                <div class="info-title flex items-center justify-center lg:justify-between">
                  <h1 class="text-3xl lg:text-5xl font-bold uppercase" id="movie-name">
                    {{$contentM['title']}}
                  </h1>
                  <div class="info-year-definicion text-base flex items-center gap-6">
                    <div class="year hidden lg:block">
                      @php
                          // Como la fecha viene en formato ingles, establecemos el localismo.
                          setlocale(LC_ALL, 'en_US');
    
                          // Fecha en formato yyyy/mm/dd
                          $timestamp = strtotime($contentM['release_date']);

                          // Fecha en formato dd/mm/yyyy
                          $fechaYear = strftime("%Y", $timestamp);
                          echo $fechaYear;
                      @endphp
                    </div>
                  </div>
                </div>
                <!-- FIN TITULO Y AÑO -->

                <!-- DESCRIPCIÓN -->
                @if (empty($contentM['overview']))
                @else
                  <p class="descm text-base md:text-md text-justify text-gray-400 my-3 leading-none">
                    {{$contentM['overview']}}
                  </p>
                @endif
                <!-- FIN DESCRIPCIÓN -->

                <!-- REPARTO -->
                <div class="hidden md:grid grid-cols-4 gap-4 pt-1 pb-4 text-sm lg:text-base">
                  @php
                    $i=0;
                  @endphp
                  @foreach ($contentCast['crew'] as $pcrew)
                      @if ($i++ <= 7)
                        <div class="col-span-2 md:col-span-1 text-white">
                          {{$pcrew['name']}}
                          <p class="text-sm text-gray-400">
                            {{$pcrew['job']}}
                          </p>
                        </div>
                      @endif
                  @endforeach
                </div>
                <!-- FIN REPARTO -->

                <!-- GENEROS -->
                <div class="generosContent pt-2">
                  <h6 class="text-lg">Generos</h6>
                  <div class="descs flex gap-2 overflow-auto">
                    @foreach ($contentM['genres'] as $generos)
                      <a href="#{{$generos['name']}}">
                        <div class="genero w-40 h-12 relative flex justify-start px-4 items-center rounded-xl" style="
                              background-image: url(https://image.tmdb.org/t/p/w185/{{$contentM['backdrop_path']}});
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
                              @foreach ($recomendationsContent as $movies)
                                @if ($i++ <= 12)
                                  <x-movie-card :movies="$movies"/>
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

      <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
        <div class="relative w-full px-2 my-6 mx-auto max-w-3xl lg:max-w-6xl">
          <!--content-->
          <div class="border-0 relative flex flex-col w-full outline-none focus:outline-none">
            <!--header
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">x
              <button class="p-1 ml-auto bg-white border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                  ×
                </span>
              </button>
            </div>-->
            <!--body-->
            <div class="flex flex-col items-center justify-center w-full gap-2">
              <!-- SCRIPT CAMBIA SRC DE LAS PELICULAS -->
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
                <!-- SCRIPT CAMBIA SRC DE LAS PELICULAS -->

                <div class="flex flex-wrap">
                  <div class="w-full sm:w-6/12 md:w-4/12 mb-2">
                    <div class="relative inline-flex align-middle w-full gap-2">

                      <button class="bg-white bg-opacity-25 rounded-xl text-xs uppercase text-white py-2 px-6 inline-flex items-start" type="button" onclick="openDropdown(event,'dropdown-id')">
                        Ingles
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                      </button>
                      <div class="hidden text-base z-40 float-left list-none text-left w-32 overflow-auto overflow-x-hidden h-32 mt-1" id="dropdown-id">

                        <button class="buttonLinks text-sm py-2 px-2 font-normal block w-full whitespace-nowrap bg-white hover:bg-gray-200 text-gray-800 truncate w-full" data-link="https://vidsrc.me/embed/{{$contentM['imdb_id']}}/">Opción VS1</button>

                        <button class="buttonLinks text-sm py-2 px-2 font-normal block w-full whitespace-nowrap bg-white hover:bg-gray-200 text-gray-800 truncate w-full" data-link="https://www.2embed.ru/embed/imdb/movie?id={{$contentM['imdb_id']}}">Opción 2EMRU</button>

                        <button class="buttonLinks text-sm py-2 px-2 font-normal block w-full whitespace-nowrap bg-white hover:bg-gray-200 text-gray-800 truncate w-full" data-link="https://Trailers.to/player/embed/imdb/{{$contentM['imdb_id']}}">Opción TTO</button>

                      </div>
                      
                    </div>
                  </div>
                </div>

              
              

              <div class="contentMovie" id="contentMovie">
                <iframe id="iframeplay" class="absolute inset-0 w-full h-full rounded-xl" src="https://www.2embed.ru/embed/imdb/movie?id={{$contentM['imdb_id']}}" frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen>
                </iframe>
              </div>
            </div>

            <!--footer-->
            <div class="flex items-center justify-center w-full mt-2">
              <button class="text-red-500 bg-white font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 rounded-xl" type="button" onclick="cerrarModalVideo('modal-id')">
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="hidden opacity-75 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
  
    </main>
@endsection