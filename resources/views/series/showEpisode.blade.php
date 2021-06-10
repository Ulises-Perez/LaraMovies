@extends('layouts.plantillacontentSTE')

@section('title', 'TMDB - '.$contentS['name'].'')

@section('content')

    <main id="main" class="backdrop-blur">

        <section id="content-back">
            <div class="w-full">
                <div class="lg:container mx-auto pt-20 lg:pt-32 pb-6 lg:pb-16 px-2 xl:px-0">
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-y-4 md:gap-4">
                        <div class="box-img-content relative col-span-2 lg:col-span-1 flex justify-center lg:justify-start">
                            <img src="https://image.tmdb.org/t/p/w342{{$contentS['poster_path']}}"
                                class="w-auto rounded" alt="" />
                                <div class="absolute left-0 m-2 flex items-center justify-center">
                                    <a href="{{route('series.show', $idserie)}}">
                                        <button class="bg-red-500 text-white px-3 py-2 rounded outline-none focus:outline-none">
                                            <i class="fas fa-list-ul"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="box-info-content col-span-3 lg:col-span-4 text-white">
                            <div class="info-title flex items-center justify-between">
                                <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold">
                                T{{$idseason}}E{{$idepisode}} - {{$content_Info_Episode['name']}}
                                </h1>
                                <div class="info-year-definicion text-base flex items-center gap-6">
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
                                <div class="info-year-definicion text-base flex items-center gap-6">
                                    <div class="calificacion h-8 w-8 bg-red-500 rounded shadow-md flex justify-center items-center">
                                        <p class="p-2">{{$contentS['vote_average']}}</p>
                                    </div>
                                </div>
                                <!--
                                <div class="definicion bg-red-500 px-2 rounded-full">
                                    HD
                                </div>
                                -->
                                </div>
                            </div>
                            <p
                                class="text-base md:text-lg text-justify text-gray-500 my-4 overflow-auto h-20 leading-none">
                                @php
                                    if(!empty($content_Info_Episode['overview'])){
                                        echo substr_replace($content_Info_Episode['overview'], "...", 350);
                                    }else{
                                        echo '¡Lo sentimos, no hay ninguna descripción disponible!';
                                    }
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="video-content">
            <div class="w-full">
              <div class="lg:container mx-auto px-2 xl:px-0 text-white">
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
      
                          if($nombreCuevana = $contentS['original_name']){
                            $nombreCuevana = $contentS['original_name'];
                          }else{
                            $nombreCuevana = $contentS['name'];
                          }
      
                          $nombreCuevanaArreglado = str_replace(" ","-", $nombreCuevana);
      
                          $nombreCuevanaFinal = str_replace("'", "", $nombreCuevanaArreglado);
      
                          //Scrape and parse
                          $data = scrape('https://cuevana3.io/episodio/'.strtolower($nombreCuevanaFinal).'-'.$idseason.'x'.$idepisode.''); //scrape the website
                          @$dom->loadHTML($data); //load the html data to the dom
      
                          $XpathQuery = '//iframe'; //Your Xpath query could look something like this
                          $iframes = parse($data, $XpathQuery, $dom); //parse the HTML with Xpath
      
                          $i=0;
                          foreach($iframes as $iframe){
                              if($i++ >= 1) break;
                              $src = $iframe->getAttribute('data-src'); //get the src attribute
                              if(empty($src)){
                                echo '';
                              }else{
                                echo '
                                        <div class="contentMovie">
                                            <div class="absolute inset-0 flex flex-col items-center">
                                                <iframe class="w-full h-full rounded" src="'.$src.'" frameborder="0" 
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        ';
                              }
                          }
                      ?>
              </div>
            </div>
        </section>

        <section id="episodes-content">
            <div class="w-full">
                <div class="lg:container mx-auto px-2 xl:px-0 text-white">
                    <div class="episodios descs py-8 h-auto overflow-auto">
                            @php
                                $i=0;
                            @endphp
                            @foreach ($contentS['seasons'] as $temporadas)
                                @if ($i++ <= 0)
                                <div class="block" id="{{$idseason}}">
                                    <div class="flex gap-2">
                                        @foreach ($contentEpisodesS['episodes'] as $episodios)
                                            @if (empty($episodios['still_path']))
                                            @else
                                                <div class="gap-4">
                                                    <button class="font-bold uppercase shadow-lg rounded leading-normal text-white shadow-inner text-white w-48 h-24 relative" style="background-image: url(https://image.tmdb.org/t/p/w342{{$episodios['still_path']}}); background-size:cover; background-repeat:no-repeat;">
                                                        <a href="{{route('series.showEpisode', [$idserie, $idseason, $episodios['episode_number']])}}">
                                                            @if ($episodios['name'] == $content_Info_Episode['name'])
                                                                <h6 class="text-white bg-red-700 bg-opacity-60 rounded py-6 px-4 text-xs h-full flex justify-center items-center content-center">
                                                                    <div class="absolute px-4 py-2 inset-0 h-full flex items-center justify-center content-center">
                                                                        <h6><i class="far fa-eye text-2xl"></i></h6>
                                                                    </div>
                                                                    <div class="absolute w-full bg-black bg-opacity-50 py-1 bottom-0 rounded-b">
                                                                        <p>Estas Viendo</p>
                                                                    </div>
                                                                </h6>
                                                            @else
                                                                <h6 class="text-white bg-black bg-opacity-60 rounded py-6 px-4 text-xs h-full flex justify-center items-center content-center">
                                                                    <div class="absolute bg-red-500 px-4 py-1 top-0 left-0 m-2 rounded-full">
                                                                        <h6>{{$episodios['episode_number']}}</h6>
                                                                    </div>
                                                                    <div class="absolute w-full bg-black bg-opacity-50 py-1 bottom-0 rounded-b">
                                                                        <p class="truncate px-2">{{$episodios['name']}}</p>
                                                                    </div>
                                                                </h6>
                                                            @endif
                                                        </a>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
                                        <!--@if ($contentS['seasons'] >= count($contentS['seasons']))
                                            <div class="gap-4">
                                                <button class="font-bold uppercase shadow-lg rounded leading-normal text-white shadow-inner text-white w-48 h-24 relative">
                                                    <a href="{{route('series.showSeason', [$idserie, $idseason+1])}}">
                                                        <h6 class="text-white bg-red-500 rounded py-6 px-4 text-xs h-full flex justify-center items-center content-center">
                                                            <div class="absolute px-4 py-2 inset-0 h-full flex items-center justify-center content-center">
                                                                <h6><i class="fas fa-arrow-right text-2xl"></i></h6>
                                                            </div>
                                                            <div class="absolute w-full bg-black bg-opacity-0 py-1 bottom-0 rounded-b">
                                                                <p>
                                                                    Temporada {{$idseason+1}}
                                                                </p>
                                                            </div>
                                                        </h6>
                                                    </a>
                                                </button>
                                            </div>
                                        @endif-->
                                    </div>
                                </div>
                                @endif
                            @endforeach
                    </div>
                </div>
            </div>
        </section>

  </main>

@endsection