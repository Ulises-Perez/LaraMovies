@extends('layouts.plantillacontentS')

@section('title', 'TMDB - '.$contentS['name'].'')

@section('content')
<main id="main" class="backdrop-blur">

    <section id="content-back">
      <div class="w-full">
        <div class="lg:container mx-auto pt-20 lg:pt-28 pb-6 lg:pb-10 px-2 xl:px-0">
          <div class="grid grid-cols-1 md:grid-cols-5 gap-y-4 md:gap-4">
            <div class="box-info-content col-span-3 lg:col-span-4 text-white">
              <div class="info-title flex items-center justify-center lg:justify-between">
                <h1 class="text-3xl lg:text-5xl font-bold uppercase" id="movie-name">
                  {{$contentS['name']}}
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
                <p class="descm text-base md:text-md text-justify text-gray-400 my-4 overflow-auto lg:overflow-hidden h-20 lg:h-auto leading-none">
                  {{$contentS['overview']}}
                </p>
              @endif
              <div class="hidden md:grid grid-cols-4 gap-4 pt-1 pb-4 text-sm lg:text-base">
                @php
                  $i=0;
                @endphp
                @foreach ($contentCastS['crew'] as $pcrew)
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
              <div class="generosContent pt-2 pb-6">
                <h6 class="text-lg">Generos</h6>
                <div class="descs flex gap-2 overflow-auto">
                  @foreach ($contentS['genres'] as $generos)
                    <a href="#{{$generos['name']}}">
                      <div class="genero w-40 h-12 relative flex justify-start px-4 items-center rounded-xl" style="
                            background-image: url(https://image.tmdb.org/t/p/w185/{{$contentS['backdrop_path']}});
                          ">
                        <div class="nombre-genero absolute inset-0 bg-gradient-to-r from-red-600 px-4 rounded-xl"></div>
                        <h6 class="opacity-100 absolute">{{$generos['name']}}</h6>
                      </div>
                    </a>
                  @endforeach
                </div>
              </div>
              <!--<div class="flex flex-wrap">
                <div class="w-full sm:w-6/12 md:w-4/12">
                  <div class="relative inline-flex align-middle w-full">
                    <button class="text-white font-bold uppercase text-sm px-6 py-3 rounded-xl shadow hover:shadow-lg outline-none focus:outline-none mb-1 bg-red-500 ease-linear transition-all duration-150" type="button" onclick="openDropdown(event,'dropdown-id')">
                      Temporadas
                    </button>
                    <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg my-1" style="min-width:12rem" id="dropdown-id">
                      @foreach ($contentS['seasons'] as $temporadas)
                        <a href="{{route('series.showSeason', [$contentS['id'], $temporadas['season_number']])}}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">
                          {{$temporadas['name']}}
                        </a>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="temporadas-content-series">
        <div class="w-full">
            <div class="lg:container mx-auto px-2 xl:px-0 text-white">

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

    <section class="descubrir bg-back-oficial border-t border-gray-600 border-opacity-25">
      <div class="w-full lg:container mx-auto py-2 px-2 xl:px-0 text-white">
        <div class="grid grid-cols-1 gap-6">

          <section id="section-similares">

            <section>
              <div class="w-full">
                  <div class="container mx-auto px-4 md:px-0 text-white mb-6 pt-3">
                      
                      <p class="flex-auto">
                        <a class="text-lg font-bold uppercase py-2 block leading-normal text-white">
                          Te recomendamos
                        </a>
                      </p>
                  </div>
                  <div class="container mx-auto flex justify-center content-center px-4 sm:px-0 mb-14 md:mb-14 lg:mb-6">
                      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 justify-center content-center text-white">
                          @php
                              $i=1;
                          @endphp
                          @foreach ($recomendationsContent as $recomendacion)
                              @if ($i++ <= 12)
                                  <a href="{{route('series.show', $recomendacion['id'])}}" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                      <div class="poster relative">
                                          <img class="w-full h-full rounded-xl" src="https://image.tmdb.org/t/p/w300/{{$recomendacion['poster_path']}}" alt="{{$recomendacion['name']}}">
                                          <div class="sombra-content hidden absolute inset-0 flex justify-center items-center rounded">
                                              <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                  <i class="fas fa-play"></i>
                                              </button>
                                          </div>
                                      </div>
                                      <p class="truncate w-full text-center">{{$recomendacion['name']}}</p>
                                  </a>
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

    <!--<section id="section-reparto">
      <div class="w-full">
        <div class="lg:container mx-auto px-2 xl:px-0">
          <div class="flex flex-wrap" id="tabs-id">
            <div class="w-full">
              <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                  <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-red-500"
                    onclick="changeAtiveTab(event,'tab-frase')">
                    Fráse
                  </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                  <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-back-oficial"
                    onclick="changeAtiveTab(event,'tab-reparto')">
                    Reparto
                  </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                  <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-back-oficial"
                    onclick="changeAtiveTab(event,'tab-multimedia')">
                    Multimedia
                  </a>
                </li>
              </ul>
              <div class="relative flex flex-col min-w-0 break-words bg-transparent text-white w-full mb-6 rounded">
                <div class="py-5 flex-auto">
                  <div class="tab-content tab-space">
                    <div class="block" id="tab-frase">
                      <p class="flex justify-center text-center">
                        <?php
                          if(empty($contentS['tagline'])){
                            echo '¡Lo, sentimos, no hay ninguna frase disponible!';
                          }else{
                            echo '"'.$contentS['tagline'].'"';
                          }
                        ?>
                      </p>
                    </div>
                    <div class="hidden" id="tab-reparto">
                      <div class="owl-carousel owl-theme owl-carousel-2">
                        <?php
                          if(empty($contentCastS)){
                            echo '¡Lo sentimos, no hay reparto disponible!';
                          }else{
                            $i=0;
                            foreach($contentCastS['cast'] as $pcast){
                              if($i++ >= 8) break;
                              if(!empty($pcast['profile_path'])){
                                echo '<div class="item">
                                        <div class="max-w-xs rounded overflow-hidden shadow-lg relative">
                                          <img class="w-full"
                                            src="https://image.tmdb.org/t/p/w185/'.$pcast['profile_path'].'"
                                            alt="Sunset in the mountains" />
                                          <div class="px-6 py-1 w-full absolute bottom-0 backdrop-blur">
                                            <div class="font-bold text-md md:text-lg truncate">
                                            '.$pcast['name'].'
                                            </div>
                                          </div>
                                        </div>
                                      </div>';
                              }else{
                                echo '';
                              }
                            }
                          }
                        ?>
                      </div>
                    </div>
                    <div class="hidden" id="tab-multimedia">
                      <div class="owl-carousel owl-theme owl-carousel-3">
                      <?php
                        $i=0;
                        foreach($contentImgS['backdrops'] as $imgBackdrop){
                          if($i++ > 7) break;
                          echo '<div class="item">
                                  <a href="https://image.tmdb.org/t/p/w1280'.$imgBackdrop['file_path'].'" target="_blank">
                                    <div class="img-content">
                                      <img src="https://image.tmdb.org/t/p/w185'.$imgBackdrop['file_path'].'" class="rounded shadow" alt="'.$imgBackdrop['vote_average'].'" />
                                    </div>
                                  </a>
                                </div>';
                        }

                      ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>-->

  </main>
@endsection