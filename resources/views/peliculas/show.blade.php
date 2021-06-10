@extends('layouts.plantillacontentP')

@section('title', 'TMDB - '.$contentM['title'].'')

@section('content')

@php
    $id = $contentM['id'];
    $nombre = $contentM['title'];
    $imagen = 'https://image.tmdb.org/t/p/w342'.$contentM['poster_path'];
@endphp

<script>
  window.onload = function () {
      // Variables
      const baseDeDatos = [
          {
              id: {{$id}},
              nombre: "{{$nombre}}",
              precio: 1,
              imagen: "{{$imagen}}"
          }
      ];

      let carrito = [];
      let total = 0;
      const DOMitems = document.querySelector('#items');
      const DOMcarrito = document.querySelector('#carrito');
      const DOMtotal = document.querySelector('#total');
      const DOMbotonVaciar = document.querySelector('#boton-vaciar');
      const miLocalStorage = window.localStorage;

      // Funciones

      /**
      * Dibuja todos los productos a partir de la base de datos. No confundir con el carrito
      */
      function renderizarProductos() {
          baseDeDatos.forEach((info) => {
              // Estructura
              const miNodo = document.createElement('div');
              miNodo.classList.add('card', 'col-sm-4');
              // Body
              const miNodoCardBody = document.createElement('div');
              miNodoCardBody.classList.add('card-body','relative');
              // Titulo
              const miNodoTitle = document.createElement('h5');
              miNodoTitle.classList.add('card-title');
              miNodoTitle.textContent = info.nombre;
              // Imagen
              const miNodoImagen = document.createElement('img');
              miNodoImagen.classList.add('rounded');
              miNodoImagen.setAttribute('src', info.imagen);
              // Precio
              const miNodoPrecio = document.createElement('p');
              miNodoPrecio.classList.add('card-text');
              miNodoPrecio.textContent = info.precio + '€';
              // Div Absolute
              const miNodoDivAbsolute = document.createElement('div');
              miNodoDivAbsolute.classList.add('absolute','hidden','lg:block','absolute','top-0','left-0','m-2','flex','items-center','justify-center');
              // Boton 
              const miNodoBoton = document.createElement('button');
              miNodoBoton.classList.add('bg-red-500','text-white','px-3','py-2','rounded','outline-none','focus:outline-none');
              miNodoBoton.textContent = 'Favoritos +';
              miNodoBoton.setAttribute('marcador', info.id);
              miNodoBoton.addEventListener('click', anyadirProductoAlCarrito);
              // Insertamos
              miNodoCardBody.appendChild(miNodoImagen);
              miNodoDivAbsolute.appendChild(miNodoBoton);
              miNodoCardBody.appendChild(miNodoDivAbsolute);
              miNodo.appendChild(miNodoCardBody);
              DOMitems.appendChild(miNodo);
          });
      }

      /**
      * Evento para añadir un producto al carrito de la compra
      */
      function anyadirProductoAlCarrito(evento) {
          // Anyadimos el Nodo a nuestro carrito
          carrito.push(evento.target.getAttribute('marcador'))
          // Calculo el total
          //calcularTotal();
          // Actualizamos el carrito 
          renderizarCarrito();
          // Actualizamos el LocalStorage
          guardarCarritoEnLocalStorage();
      }

      /**
      * Dibuja todos los productos guardados en el carrito
      */
      function renderizarCarrito() {
          // Vaciamos todo el html
          DOMcarrito.textContent = '';
          // Quitamos los duplicados
          const carritoSinDuplicados = [...new Set(carrito)];
          // Generamos los Nodos a partir de carrito
          carritoSinDuplicados.forEach((item) => {
              // Obtenemos el item que necesitamos de la variable base de datos
              const miItem = baseDeDatos.filter((itemBaseDatos) => {
                  // ¿Coincide las id? Solo puede existir un caso
                  return itemBaseDatos.id === parseInt(item);
              });
              // Cuenta el número de veces que se repite el producto
              const numeroUnidadesItem = carrito.reduce((total, itemId) => {
                  // ¿Coincide las id? Incremento el contador, en caso contrario no mantengo
                  return itemId === item ? total += 1 : total;
              }, 0);
              // Creamos el nodo del item del carrito
              const miNodo = document.createElement('li');
              miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
              miNodo.textContent = `${numeroUnidadesItem} x ${miItem[0].nombre} - ${miItem[0].precio}€`;
              // Boton de borrar
              const miBoton = document.createElement('button');
              miBoton.classList.add('btn', 'btn-danger', 'mx-5');
              miBoton.textContent = 'X';
              miBoton.style.marginLeft = '1rem';
              miBoton.dataset.item = item;
              miBoton.addEventListener('click', borrarItemCarrito);
              // Mezclamos nodos
              miNodo.appendChild(miBoton);
              DOMcarrito.appendChild(miNodo);
          });
      }

      /**
      * Evento para borrar un elemento del carrito
      */
      function borrarItemCarrito(evento) {
          // Obtenemos el producto ID que hay en el boton pulsado
          const id = evento.target.dataset.item;
          // Borramos todos los productos
          carrito = carrito.filter((carritoId) => {
              return carritoId !== id;
          });
          // volvemos a renderizar
          renderizarCarrito();
          // Calculamos de nuevo el precio
          calcularTotal();
          // Actualizamos el LocalStorage
          guardarCarritoEnLocalStorage();

      }

      /**
      * Calcula el precio total teniendo en cuenta los productos repetidos
      */
      function calcularTotal() {
          // Limpiamos precio anterior
          total = 0;
          // Recorremos el array del carrito
          carrito.forEach((item) => {
              // De cada elemento obtenemos su precio
              const miItem = baseDeDatos.filter((itemBaseDatos) => {
                  return itemBaseDatos.id === parseInt(item);
              });
              total = total + miItem[0].precio;
          });
          // Renderizamos el precio en el HTML
          DOMtotal.textContent = total.toFixed(2);
      }

      /**
      * Varia el carrito y vuelve a dibujarlo
      */
      function vaciarCarrito() {
          // Limpiamos los productos guardados
          carrito = [];
          // Renderizamos los cambios
          renderizarCarrito();
          calcularTotal();
          // Borra LocalStorage
          localStorage.clear();

      }

      function guardarCarritoEnLocalStorage () {
          miLocalStorage.setItem('carrito', JSON.stringify(carrito));
      }

      function cargarCarritoDeLocalStorage () {
          // ¿Existe un carrito previo guardado en LocalStorage?
          if (miLocalStorage.getItem('carrito') !== null) {
              // Carga la información
              carrito = JSON.parse(miLocalStorage.getItem('carrito'));
          }
      }

      // Eventos
      DOMbotonVaciar.addEventListener('click', vaciarCarrito);

      // Inicio
      cargarCarritoDeLocalStorage();
      renderizarProductos();
      calcularTotal();
      renderizarCarrito();
  }

</script>

    <main id="main" class="backdrop-blur">

      <section id="content-back">
        <div class="w-full">
          <div class="lg:container mx-auto pt-20 lg:pt-32 pb-6 lg:pb-16 px-2 xl:px-0">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-y-4 md:gap-4">
              <div id="itemsx" class="box-img-content relative hidden md:block relative col-span-2 lg:col-span-1 flex justify-center">
                <img src="https://image.tmdb.org/t/p/w342{{$contentM['poster_path']}}"
                  class="w-auto rounded" alt="" />
                  <div class="hidden lg:block absolute top-0 left-0 m-2 flex items-center justify-center">
                    <a href="#" id="agregar-favoritos">
                      <button class="bg-red-500 text-white px-3 py-2 rounded outline-none focus:outline-none">
                        <i class="far fa-heart"></i>
                      </button>
                    </a>
                  </div>
              </div>
              <div class="box-img-content-mobile md:hidden relative col-span-2 lg:col-span-1 flex justify-center">
                <img src="https://image.tmdb.org/t/p/w342{{$contentM['backdrop_path']}}"
                  class="w-auto rounded" alt="" />
              </div>
              <div class="box-info-content col-span-3 lg:col-span-4 text-white">
                <div class="info-title flex items-center justify-between">
                  <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold" id="movie-name">
                    {{$contentM['title']}}
                  </h1>
                  <input type="hidden" id="movie-id" value="{{$contentM['id']}}" />
                  <div class="info-year-definicion text-base flex items-center gap-6">
                    <div class="duracion hidden lg:block">{{$contentM['runtime']}}m</div>
                    <div class="year hidden lg:block">
                      @php
                          // Como la fecha viene en formato ingles, establecemos el localismo.
                          setlocale(LC_ALL, 'en_US');
    
                          // Fecha en formato yyyy/mm/dd
                          $timestamp = strtotime($contentM['release_date']);

                          // Fecha en formato dd/mm/yyyy
                          $fechaYear = strftime("%d-%m-%Y", $timestamp);
                          echo $fechaYear;
                      @endphp
                    </div>
                    <div class="calificacion h-8 w-8 bg-red-500 rounded shadow-md flex justify-center items-center">
                      <p class="p-2">{{$contentM['vote_average']}}</p>
                    </div>
                    <!--
                    <div class="definicion bg-red-500 px-2 rounded-full">
                      HD
                    </div>
                    -->
                  </div>
                </div>
                <p class="descm text-base md:text-lg text-justify text-gray-500 my-4 overflow-auto h-20 leading-none">
                    @php
                      if(!empty($contentM['overview'])){
                        echo substr_replace($contentM['overview'], "...", 350);
                      }else{
                        echo '¡Lo sentimos, no hay ninguna descripción disponible!';
                      }
                    @endphp
                </p>
                <div class="hidden md:grid grid-cols-4 gap-4 my-4 text-sm lg:text-base">
                  @php
                    $i=0;
                  @endphp
                  @foreach ($contentCast['crew'] as $pcrew)
                      @if ($i++ <= 7)
                        <div class="col-span-2 md:col-span-1 text-white">
                          {{$pcrew['name']}}
                          <p class="text-sm text-gray-500">
                            {{$pcrew['job']}}
                          </p>
                        </div>
                      @endif
                  @endforeach
                </div>
                <div class="generosContent my-4 hidden md:block">
                  <h6 class="text-lg">Generos</h6>
                  <div class="grid grid-cols-4 lg:grid-cols-6 gap-2">
                    @foreach ($contentM['genres'] as $generos)
                      <a href="#{{$generos['name']}}">
                        <div class="col-span-2 genero h-12 relative flex justify-start px-4 items-center rounded" style="
                              background-image: url(https://image.tmdb.org/t/p/w185/{{$contentM['backdrop_path']}});
                            ">
                          <div class="nombre-genero absolute inset-0 bg-gradient-to-r from-red-600 px-4 rounded"></div>
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

      <!--<div class="container">
        <div class="row">
             Elementos generados a partir del JSON
            <main id="" class="col-sm-8 row"></main>
             Carrito
            <aside class="col-sm-4">
                <h2>Carrito</h2>
                  Elementos del carrito
                <ul id="carrito" class="list-group"></ul>
                <hr>
                 Precio total
                <p class="text-right">Total: <span id="total"></span>&euro;</p>
                <button id="boton-vaciar" class="btn btn-danger">Vaciar</button>
            </aside>
        </div>
      </div>-->

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

                      //$title_cuevana = scrape('https://cuevana3.io/'.strtolower($contentM['title']));
  
                      if($nombreCuevana = $contentM['original_title']){
                        $nombreCuevana = $contentM['original_title'];
                        $nombreCuevanaArreglado = str_replace(" ","-", $nombreCuevana);
                        $nombreCuevanaFinal = str_replace("'", "", $nombreCuevanaArreglado);
                      }

                      $nombreCuevana2 = $contentM['title'];
                      $nombreCuevanaArreglado2 = str_replace(" ","-", $nombreCuevana2);
                      $nombreCuevanaFinal2 = str_replace("'", "", $nombreCuevanaArreglado2);
  
                      //Scrape and parse
                      $data = scrape('https://cuevana3.io/'.strtolower($nombreCuevanaFinal)); //scrape the website
                      @$dom->loadHTML($data); //load the html data to the dom
  
                      $XpathQuery = '//iframe'; //Your Xpath query could look something like this
                      $iframes = parse($data, $XpathQuery, $dom); //parse the HTML with Xpath

                      //dd($data);

                      if(empty($iframes)) {
                        $nombreFlix = $contentM['title'];
                        $nombreFlixArreglado = str_replace(" ","-", $nombreFlix);
                        $nombreFlixFinal = str_replace("'", "", $nombreFlixArreglado);

                        $data = scrape('https://peliculasflix.co/peliculas/'.strtolower($nombreFlixFinal).'/'); //scrape the website

                        //dd($data);

                        @$dom->loadHTML($data); //load the html data to the dom

                        //dd($dom);
  
                        $XpathQuery = '//iframe'; //Your Xpath query could look something like this
                        //dd($XpathQuery);
                        $iframes = parse($data, $XpathQuery, $dom); //parse the HTML with Xpath

                        //dd($iframes);
                        $i=0;
                        foreach($iframes as $iframe){
                            if($i++ >= 2) break;
                            $src = $iframe->getAttribute('src'); //get the src attribute
                            //print($src);
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

                      }else{
  
                      $i=0;
                      foreach($iframes as $iframe){
                          if($i++ >= 1) break;
                          $src = $iframe->getAttribute('data-src'); //get the src attribute
                          //print($src);
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
                    }
                  ?>
          </div>
        </div>
      </section>
  
      <section id="section-reparto">
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
                          @php
                              if(empty($contentM['tagline'])){
                                echo '¡Lo, sentimos, no hay ninguna frase disponible!';
                              }else{
                                echo '"'.$contentM['tagline'].'"';
                              }
                          @endphp
                        </p>
                      </div>
                      <div class="hidden" id="tab-reparto">
                        <div class="owl-carousel owl-theme owl-carousel-2">
                          @php
                              $i=0;
                          @endphp
                          @foreach ($contentCast['cast'] as $pcast)
                              @if ($i++ <= 7)
                                  @if (!empty($pcast['profile_path']))
                                    <div class="item">
                                      <div class="max-w-xs rounded overflow-hidden shadow-lg relative">
                                        <img class="w-full"
                                          src="https://image.tmdb.org/t/p/w185/{{$pcast['profile_path']}}"
                                          alt="Sunset in the mountains" />
                                        <div class="px-6 py-1 w-full absolute bottom-0 backdrop-blur">
                                          <div class="font-bold text-md md:text-lg truncate">
                                          {{$pcast['name']}}
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  @endif
                              @endif
                          @endforeach
                        </div>
                      </div>
                      <div class="hidden" id="tab-multimedia">
                        <div class="owl-carousel owl-theme owl-carousel-3">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($contentImg['backdrops'] as $imgBackdrop)
                            @if ($i++ <= 7)
                              <div class="item">
                                <a href="https://image.tmdb.org/t/p/w1280{{$imgBackdrop['file_path']}}" target="_blank">
                                  <div class="img-content">
                                    <img src="https://image.tmdb.org/t/p/w185{{$imgBackdrop['file_path']}}" class="rounded shadow" alt="{{$imgBackdrop['vote_average']}}" />
                                  </div>
                                </a>
                              </div>
                            @endif
                        @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  
    </main>
@endsection