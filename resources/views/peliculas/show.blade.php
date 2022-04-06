@extends('layouts.plantillacontentP')

@section('title', 'TMDB - '.$contentM['title'].'')

@section('content')

    <main id="main" class="backdrop-blur">

      <section id="content-back">
        <div class="w-full h-screen md:h-full sombra-new-design">
          <div class="lg:container mx-auto pt-20 lg:pt-32 pb-16 px-2 xl:px-0">
            <div class="grid grid-cols-1 md:gap-2">
              <section id="video-content">
                <div class="w-full">
                  <div class="lg:container mx-auto w-full">
                    <!-- Inicio de los procesos de SCRAPPING -->
                      <?php //Iframe && Scrapper Movies in Cuevana.co
                      function scrape($URL){
                          //cURL options
                          $options = Array(
                                      CURLOPT_RETURNTRANSFER => TRUE, //return html data in string instead of printing it out on screen
                                      CURLOPT_FOLLOWLOCATION => TRUE, //follow header('Location: location');
                                      CURLOPT_CONNECTTIMEOUT => 60, //max time to try to connect to page
                                      CURLOPT_HEADER => FALSE, //include header
                                      CURLOPT_USERAGENT => "Mozilla/5.0 (X11; Linux x86_64; rv:21.0) Gecko/20100101 Firefox/21.0", //User Agent
                                      CURLOPT_URL => $URL //SET THE URL
                                      );

                          $ch = curl_init($URL);//initialize a cURL session
                          curl_setopt_array($ch, $options);//set the cURL options
                          $data = curl_exec($ch);//execute cURL (the scraping)
                          curl_close($ch);//close the cURL session

                          return $data;
                        }

                        function parse(&$data, $query, &$dom){
                            $Xpath = new DOMXpath($dom); //new Xpath object associated to the domDocument
                            $result = $Xpath->query($query);//run the Xpath query through the HTML
                            return $result;
                        }


                        //new domDocument
                        $dom = new DomDocument("1.0");

                        $nombreCineCalidad = $contentM['title'];
                        $nombreCineCalidadArreglado = str_replace(" ","-", $nombreCineCalidad);
                        $nombreCineCalidadArreglado2 = str_replace("'", "", $nombreCineCalidadArreglado);
                        $nombreCineCalidadFinal = str_replace(":", "", $nombreCineCalidadArreglado2);
                        $nombreCineCalidadFinal_Fin = quitar_tildes($nombreCineCalidadFinal);

                        function quitar_tildes($cadena) {
                          $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
                          $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
                          $texto = str_replace($no_permitidas, $permitidas ,$cadena);
                          return $texto;
                        }

                        //dd(strtolower($nombreCineCalidadFinal_Fin));


                        // -----------------------------------
                        // SCRAPPING FELIZ ESTRENO -----------------------------------

                          //Scrape and parse
                          $data = scrape('https://felizestreno.com/pelicula/'.strtolower($nombreCineCalidadFinal_Fin)); //scrape the website https://felizestreno.com/pelicula/luca/

                          $namevariable = 'https://felizestreno.com/pelicula/'.strtolower($nombreCineCalidadFinal_Fin).'/';
                          //dd($namevariable);

                          @$dom->loadHTML($data); //load the html data to the dom

                          $XpathQuery = '//iframe'; //Your Xpath query could look something like this
                          $iframes = parse($data, $XpathQuery, $dom); //parse the HTML with Xpath

                          //dd($data);
                          //dd($iframes);
                          //$valorLongitud = sizeof($iframes);
                          //dd($valorLongitud);

                          $i=0;
                          foreach($iframes as $iframe){
                                  if($i++ >= 1) break;
                                  $src = $iframe->getAttribute('src'); //get the src attribute
                                  //dd($src);
                                  if(empty($src)){
                                    echo '';
                                    //dd($src);
                                  }else{
                                    //dd($src);
                                    echo '

                                            <button class="text-white bg-white bg-opacity-25 font-bold uppercase px-6 py-2 mb-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 rounded-xl" data-link="'.$src.'">Opción FE</button>
                                            ';
                                  }
                          }

                        // SCRAPPING FELIZ ESTRENO -----------------------------------
                        // -----------------------------------


                        // -----------------------------------
                        // SCRAPPING CUEVANA3.me -----------------------------------

                          $nombreCuevana = $contentM['original_title'];
                          $nombreCuevanaArreglado = str_replace(" ","-", $nombreCuevana);
                          $nombreCuevanaArreglado2 = str_replace("'", "", $nombreCuevanaArreglado);
                          $nombreCuevanaFinal = str_replace(":", "", $nombreCuevanaArreglado2);

                          $data = scrape('https://cuevana3.me/'.strtolower($nombreCuevanaFinal).'/');

                          $nombremoviecuevana = 'https://cuevana3.me/'.strtolower($nombreCuevanaFinal).'/';

                          //dd($nombremoviecuevana);
                          //dd($data);

                          @$dom->loadHTML($data); //load the html data to the dom
                          //dd($dom);

                          $XpathQuery = '//iframe'; //Your Xpath query could look something like this
                          $iframes = parse($data, $XpathQuery, $dom); //parse the HTML with Xpath

                          //dd($iframes);
                          //$valorLongitud2 = sizeof($iframes);
                          //dd($valorLongitud2);

                          $i=0;
                            foreach($iframes as $iframe){
                                if($i++ >= 1) break;
                                $src = $iframe->getAttribute('data-src'); //get the src attribute
                                //dd($src);
                                if(empty($src)){
                                  echo '';
                                }else{
                                  echo '
                                          <button class="text-white bg-white bg-opacity-25 font-bold uppercase px-6 py-2 mb-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 rounded-xl" data-link="'.$src.'">Opción C</button>
                                          ';
                                }
                            }


                        // SCRAPPING CUEVANA3.me -----------------------------------
                        // -----------------------------------


                        // -----------------------------------
                        // SCRAPPING PELISYSERIESHD.com -----------------------------------

                              $nombrePelisySerieshd = $contentM['title'];
                              $nombrePelisySerieshdArreglado = str_replace(" ","-", $nombrePelisySerieshd);
                              $nombrePelisySerieshdArreglado2 = str_replace("'", "", $nombrePelisySerieshdArreglado);
                              $nombrePelisySerieshdArreglado3 = str_replace(":", "", $nombrePelisySerieshdArreglado2);
                              $nombrePelisySerieshdArreglado4 = str_replace("I", "i", $nombrePelisySerieshdArreglado3);
                              $nombrePelisySerieshdFinal = str_replace(",", "", $nombrePelisySerieshdArreglado4);

                              $nombrePelisySerieshdFinal_fin = quitar_tildes($nombrePelisySerieshdFinal);

                              $data = scrape('https://pelisyserieshd.com/pelicula/'.strtolower($nombrePelisySerieshdFinal_fin).'/');

                              $nameMoviePS = 'https://pelisyserieshd.com/pelicula/'.strtolower($nombrePelisySerieshdFinal_fin).'/';
                              //dd($nameMoviePS);

                              @$dom->loadHTML($data); //load the html data to the dom

                              //dd($dom);

                              $XpathQuery = '//iframe[contains(@class, "metaframe")]'; //Your Xpath query could look something like this
                              $iframes = parse($data, $XpathQuery, $dom); //parse the HTML with Xpath

                              //dd($iframes);
                              //$valorLongitud3 = sizeof($iframes);

                              $i=0;
                                foreach($iframes as $iframe){
                                    if($i++ >= 1) break;
                                    $src = $iframe->getAttribute('src'); //get the src attribute
                                    //dd($src);
                                    if(empty($src)){
                                      echo '';
                                    }else{
                                      echo '
                                              <button class="text-white bg-white bg-opacity-25 font-bold uppercase px-6 py-2 mb-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 rounded-xl" data-link="'.$src.'">Opción PS</button>
                                              ';
                                    }
                                }

                        // SCRAPPING PELISYSERIESHD.com -----------------------------------
                        // -----------------------------------



                        // -----------------------------------
                        // SCRAPPING SERIESKAO.tv - SRC PRINCIPAL -----------------------------------

                            $nombreKindor = $contentM['title'];
                            $nombreKindorArreglado = str_replace(" ","-", $nombreKindor);
                            $nombreKindorArreglado2 = str_replace("'", "", $nombreKindorArreglado);
                            $nombreKindorArreglado3 = str_replace(":", "", $nombreKindorArreglado2);
                            $nombreKindorArreglado4 = str_replace("I", "i", $nombreKindorArreglado3);
                            $nombreKindorFinal = str_replace(",", "", $nombreKindorArreglado4);
                            $nombreKindorFinal_fin = quitar_tildes($nombreKindorFinal);

                            $data = scrape('https://serieskao.tv/pelicula/'.strtolower($nombreKindorFinal_fin).'/');

                            $nameMovieSK = 'https://serieskao.tv/pelicula/'.strtolower($nombreKindorFinal_fin).'/';
                            //dd($nameMovieSK);

                            @$dom->loadHTML($data); //load the html data to the dom
                            //dd($dom);

                            $XpathQuery = '//iframe[contains(@class, "metaframe")]'; //Your Xpath query could look something like this
                            $iframes = parse($data, $XpathQuery, $dom); //parse the HTML with Xpath

                            //dd($iframes);
                            $valorLongitud3 = sizeof($iframes);

                            //dd($valorLongitud3);

                            if ($valorLongitud3 === 0) {
                              // -----------------------------------
                              // SCRAPPING CUEVANA3.me -----------------------------------

                                  $nombreCuevana = $contentM['original_title'];
                                  $nombreCuevanaArreglado = str_replace(" ","-", $nombreCuevana);
                                  $nombreCuevanaArreglado2 = str_replace("'", "", $nombreCuevanaArreglado);
                                  $nombreCuevanaFinal = str_replace(":", "", $nombreCuevanaArreglado2);

                                  $data = scrape('https://cuevana3.me/'.strtolower($nombreCuevanaFinal).'/');

                                  $nombremoviecuevana = 'https://cuevana3.me/'.strtolower($nombreCuevanaFinal).'/';

                                  //dd($nombremoviecuevana);
                                  //dd($data);

                                  @$dom->loadHTML($data); //load the html data to the dom
                                  //dd($dom);

                                  $XpathQuery = '//iframe'; //Your Xpath query could look something like this
                                  $iframes = parse($data, $XpathQuery, $dom); //parse the HTML with Xpath

                                  //dd($iframes);
                                  $valorLongitud2 = sizeof($iframes);
                                  //dd($valorLongitud2);

                                  if ($valorLongitud2 === 0) {
                                    $srcPrincipal = "https://www.youtube.com/embed/QGGCeF4PIQw";
                                  }else{
                                    $i=0;
                                    foreach($iframes as $iframe){
                                        if($i++ >= 1) break;
                                        $srcPrincipal = $iframe->getAttribute('data-src'); //get the src attribute
                                        //dd($src);
                                        /*if(empty($src)){
                                          echo '';
                                        }else{
                                          echo '
                                                  <button class="text-white bg-white bg-opacity-25 font-bold uppercase px-6 py-2 mb-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 rounded-xl" data-link="'.$srcPrincipal.'">Opción CP</button>
                                                  ';
                                        }*/
                                    }
                                  }


                              // SCRAPPING CUEVANA3.me -----------------------------------
                              // -----------------------------------
                            }else{
                              $i=0;
                              foreach($iframes as $iframe){
                                if($i++ >= 1) break;
                                  $srcPrincipal = $iframe->getAttribute('src'); //get the src attribute
                                  //dd($srcPrincipal);
                                    if(empty($src)){
                                      echo '';
                                    }else{
                                      echo '
                                              <button class="text-white bg-white bg-opacity-25 font-bold uppercase px-6 py-2 mb-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 rounded-xl" data-link="'.$srcPrincipal.'">Opción SK</button>
                                              ';
                                    }
                              }
                            }

                        // SCRAPPING SERIESKAO.tv - SRC PRINCIPAL -----------------------------------
                        // -----------------------------------

                      ?>


                        <!-- SCRIPT CAMBIA SRC DE LAS PELICULAS -->
                        <script>
                        window.onload = function()
                        {
                        var botones = document.getElementsByTagName("button"),
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


                    <!-- FIN DE LOS PROCESOS DE SCRAPPING -->
                    <div class="contentMovie ">
                      <iframe id="iframeplay" class="absolute inset-0 w-full h-full rounded-xl" src="<?=$srcPrincipal?>" frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                      </iframe>
                    </div>
                  </div>
                </div>
              </section>
              <!-- New Design for Movie Show
              <div id="itemsx" class="box-img-content relative hidden md:block relative col-span-2 lg:col-span-1 flex justify-center">
                <img src="https://image.tmdb.org/t/p/w342{{$contentM['poster_path']}}"
                  class="w-auto rounded-xl" alt="" />
                  <div class="hidden lg:block absolute top-0 left-0 m-2 flex items-center justify-center">
                    <a href="#" id="agregar-favoritos">
                      <button class="bg-red-500 text-white px-3 py-2 rounded-xl outline-none focus:outline-none">
                        <i class="far fa-heart"></i>
                      </button>
                    </a>
                  </div>
              </div>
              <div class="box-img-content-mobile md:hidden relative col-span-2 lg:col-span-1 flex justify-center">
                <img src="https://image.tmdb.org/t/p/w342{{$contentM['backdrop_path']}}"
                  class="w-auto rounded" alt="" />
              </div>
              -->
              <div class="box-info-content text-white pt-10">
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
                @if (empty($contentM['overview']))
                @else
                  <p class="descm text-base md:text-md text-justify text-gray-400 my-4 overflow-auto lg:overflow-hidden h-20 lg:h-auto leading-none">
                    {{$contentM['overview']}}
                  </p>
                @endif
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
                <div class="generosContent pt-2">
                  <h6 class="text-lg">Generos</h6>
                  <div class="descs flex gap-2 overflow-auto">
                    @foreach ($contentM['genres'] as $generos)
                      <a href="#{{$generos['name']}}">
                        <div class="genero w-40 h-12 relative flex justify-start px-4 items-center rounded-xl" style="
                              background-image: url(https://image.tmdb.org/t/p/w185/{{$contentM['backdrop_path']}});
                            ">
                          <div class="nombre-genero absolute inset-0 bg-gradient-to-r from-red-600 px-4 rounded-xl"></div>
                          <h6 class="opacity-100 absolute">{{$generos['name']}}</h6>
                        </div>
                      </a>
                    @endforeach
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="descubrir bg-back-oficial">
        <div class="w-full lg:container mx-auto px-2 xl:px-0 text-white">
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
                            @endphp
                            @foreach ($recomendationsContent as $recomendacion)
                                @if ($i++ <= 12)
                                    <a href="{{route('peliculas.show', $recomendacion['id'])}}" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                        <div class="poster relative">
                                            <img class="w-full h-full rounded-xl" src="https://image.tmdb.org/t/p/w300/{{$recomendacion['poster_path']}}" alt="{{$recomendacion['title']}}">
                                            <div class="sombra-content hidden absolute inset-0 flex justify-center items-center rounded">
                                                <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                    <i class="fas fa-play"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <p class="truncate w-full text-center">{{$recomendacion['title']}}</p>
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