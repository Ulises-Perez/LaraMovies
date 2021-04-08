<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
  
    <!-- Tailwind Css -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
  
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  
    <!-- Google Sans Fonts -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Google+Sans:100,300,400,500,700,900,100i,300i,400i,500i,700i,900i" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
  
    <!-- Owl Carrousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
  
    <link rel="icon" href="https://www.themoviedb.org/assets/2/favicon-32x32-543a21832c8931d3494a68881f6afcafc58e96c5d324345377f3197a37b367b5.png" type="image/png" />
    <!-- Estilos Propios -->
    <link rel="stylesheet" href="../../css/estilosContent.css" />
    <!-- PWA ASSETS -->
    @laravelPWA
  </head>

<body id="body" style="background-image: url(https://image.tmdb.org/t/p/w185<?=$contentS['backdrop_path']?>);">

    @include('layouts.plantillaHeaderSE')

    @yield('content')

    <footer class="border-t border-gray-600 border-opacity-25 bg-back-oficial">
        <div class="w-full">
            <div class="container mx-auto py-10 px-4">
                <div class="grid grid-cols-3 lg:grid-cols-10 gap-10">
                    <div class="col-span-3 lg:col-span-4 logo-info">
                        <h1 class="text-white text-xl mb-4">About</h1>
                        <div class="info">
                        <p class="text-white text-sm">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Delectus ullam minus nulla officia voluptates, expedita ab,
                            eos atque suscipit facere adipisci a laboriosam odio quos ut
                            beatae omnis vero eveniet?
                        </p>
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-2 list-category">
                        <h1 class="text-white text-xl mb-4">Pages</h1>
                        <div class="categories">
                        <ul class="text-white text-sm">
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> Inicio </a>
                            </li>
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> Contacto </a>
                            </li>
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> Terminos de Uso </a>
                            </li>
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> DMCA </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-2 list-category">
                        <h1 class="text-white text-xl mb-4">Generos</h1>
                        <div class="categories">
                        <ul class="text-white text-sm">
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> Acción </a>
                            </li>
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> Terror </a>
                            </li>
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> Comedia </a>
                            </li>
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> Familiar </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-2 list-category">
                        <h1 class="text-white text-xl mb-4">Explorar</h1>
                        <div class="categories">
                        <ul class="text-white text-sm">
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> Estrenos </a>
                            </li>
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> Películas Top </a>
                            </li>
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> Series Top </a>
                            </li>
                            <li class="py-1 hover:text-red-500">
                            <a href="#"> Más Vistas </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS Universal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src='https://cdn.rawgit.com/gijsroge/tilt.js/38991dd7/dest/tilt.jquery.js'></script>
    <script src="../../js/script.js"></script>
    <!-- JS Universal -->
</body>

</html>