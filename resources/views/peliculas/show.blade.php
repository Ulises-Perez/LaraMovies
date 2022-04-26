@extends('layouts.plantillacontentP')

@section('title', 'TMDB - '.$contentM['title'].'')

@section('content')

    <main id="main" class="backdrop-blur">

      <!--<script>
        document.onreadystatechange = () => {
          if (document.readyState === 'complete') {
              var DomListo = 1;
              alert("Hola Mundo" + DomListo);
          }
        };
      </script>-->

      <section id="content-back">
        <div class="w-full h-full md:h-full sombra-new-design">
          <div class="lg:container mx-auto pt-20 lg:pt-24 px-2 xl:px-0">
            <div class="grid grid-cols-1 md:gap-2">
              <section id="video-content">
                <div class="w-full">
                  <div class="lg:container mx-auto w-full">

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

                    <div class="optionsLinks flex overflow-auto">
                      <button class="buttonLinks text-white font-bold uppercase px-6 py-2 mb-2 text-sm outline-none focus:outline-none mr-1 mb-1 transition duration-300 ease-in-out rounded-xl hover:bg-red-500" data-link="https://vidsrc.me/embed/{{$contentM['imdb_id']}}/">Opción VS1</button>

                      <button class="buttonLinks text-white font-bold uppercase px-6 py-2 mb-2 text-sm outline-none focus:outline-none mr-1 mb-1 transition duration-300 ease-in-out rounded-xl hover:bg-red-500" data-link="https://www.2embed.ru/embed/imdb/movie?id={{$contentM['imdb_id']}}">Opción 2EMRU</button>

                      <button class="buttonLinks text-white font-bold uppercase px-6 py-2 mb-2 text-sm outline-none focus:outline-none mr-1 mb-1 transition duration-300 ease-in-out rounded-xl hover:bg-red-500" data-link="https://Trailers.to/player/embed/imdb/{{$contentM['imdb_id']}}">Opción TTO</button>

                  <!--<button id="MostrarVideoTorrent" class="hidden lg:block bg-red-500 border-red-500 text-white font-bold uppercase px-6 py-2 mb-2 text-sm outline-none focus:outline-none mr-1 mb-1 rounded-xl" type="submit">Descargar Torrent</button>-->
                    </div>
                    

                    <div class="contentMovie" id="contentMovie">
                      <iframe id="iframeplay" class="absolute inset-0 w-full h-full rounded-xl" src="https://www.2embed.ru/embed/imdb/movie?id={{$contentM['imdb_id']}}" frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                      </iframe>
                    </div>

                    <!--

                    <div id="VideoTorrentClass">
                      <video id="iframeplay" class="rounded" controls src="magnet:?xt=urn:btih:DA3B70ACC355DEB539D56DF1ED0481AC92287B9F&dn=Turning.Red.2022.SPANiSH.1080p.DSNP.WEB-DL.x264-dem3nt3&tr=udp%3A%2F%2Fmovies.zsw.ca%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=udp%3A%2F%2Fretracker.lanta-net.ru%3A2710%2Fannounce&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=udp%3A%2F%2Ftracker.0x.tf%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Fcamera.lei001.com%3A6969%2Fannounce&tr=http%3A%2F%2Fvps02.net.orel.ru%3A80%2Fannounce&tr=https%3A%2F%2Ftracker.nanoha.org%3A443%2Fannounce&tr=udp%3A%2F%2Ffe.dealclub.de%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A1337%2Fannounce&tr=https%3A%2F%2Ftr.torland.ga%3A443%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.files.fm%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.zer0day.to%3A1337%2Fannounce&tr=udp%3A%2F%2Ftracker.leechers-paradise.org%3A6969%2Fannounce&tr=udp%3A%2F%2Fcoppersurfer.tk%3A6969%2Fannounce" data-title="Opción Torrent" width="100%" height="480px">
                        <track srclang="en" label="Default" default src="https://raw.githubusercontent.com/andreyvit/subtitle-tools/master/sample.srt">
                      </video>
                      <div class="bg-red-500 text-white rounded-b flex justify-center items-center">
                        <p class="px-2 py-1 text-sm ">Porfavor, pausar el video antes de elegir otra opción. Esta opción todavia esta en desarrollo, lamentamos las molestias.</p>
                      </div>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/@webtor/embed-sdk-js/dist/index.min.js" charset="utf-8" async></script>-->


                  </div>
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

      <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center lg:items-end" id="modal-id">
        <div class="relative w-full px-1 my-6 mx-auto max-w-sm md:max-w-3xl lg:max-w-6xl">
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
            <div class="flex items-center justify-start w-full gap-2 pb-2">
            </div>

            <!--footer-->
            <div class="flex items-center justify-center w-full">
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