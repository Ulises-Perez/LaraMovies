<header>
    <div class="w-full">
        <div class="mx-auto">
            <form action="{{route('buscador.search')}}" method="GET">
                <div class="flex flex-wrap items-stretch h-16 hidden z-40" id="searchMobile">
                    <input type="search" id="search" name="search" placeholder="Buscar Peliculas, Series o Animes"
                        class="px-3 py-3 placeholder-white text-white bg-transparent rounded text-sm shadow outline-none focus:outline-none w-full h-full pr-10" />
                </div>
            </form>
        </div>
    </div>
    <div class="flex flex-wrap relative">
        <div class="menu w-full fixed z-10 transition duration-700 ease-in-out">
            <nav class="relative flex flex-wrap items-center justify-between px-2 navbar-expand-lg">
            <div class="container mx-auto flex flex-wrap items-center justify-between">
                <div
                class="w-full relative flex justify-between items-center lg:w-auto lg:static lg:block lg:justify-between">
                <div class="flex items-center pt-3 pb-2">
                    <a class="text-xl font-bold leading-relaxed inline-block py-2 whitespace-no-wrap" href="{{route('welcome')}}">
                    <img class="w-40 py-2" src="../img/tmdb_logo.svg" alt="" />
                    </a>
                </div>
                <div class="flex">
                    <button
                    class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent text-white rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                    type="button" onclick="toggleSearchMobile('searchMobile')">
                    <i id="btn-lupa" class="fas fa-search"></i>
                    </button>
                </div>
                </div>
                <div class="lg:flex lg:flex-grow items-center hidden" id="example-collapse-navbar">
                <ul class="flex flex-col lg:items-center lg:flex-row list-none lg:mr-auto text-white">
                    <form action="{{route('buscador.search')}}" method="GET">
                        <div class="relative flex flex-wrap items-stretch hidden lg:block ml-6 mr-10"
                            style="width: 400px;">
                            <input type="search" id="query" name="search" placeholder="Buscar Peliculas, Series o Animes"
                                class="relative w-full bg-transparent px-3 py-3 pr-10 placeholder-white placeholder-opacity-50 text-white text-sm rounded shadow outline-none focus:outline-none border border-white border-opacity-50" />
                            <span
                                class="z-10 h-full leading-snug font-normal absolute text-center text-white absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                                <a href="#" class="text-center">
                                    <i class="fas fa-search"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded bg-white bg-opacity-0 hover:bg-opacity-25"
                        href="{{route('welcome')}}">
                        Inicio
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded bg-white bg-opacity-0 hover:bg-opacity-25"
                        href="{{route('peliculas.index', $page=1)}}">
                        Películas
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded bg-white bg-opacity-0 hover:bg-opacity-25"
                        href="{{route('series.index', $page=1)}}">
                        Series
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug rounded bg-white bg-opacity-0 hover:bg-opacity-25"
                            href="{{route('listas.index')}}">
                            Sagas
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown inline-block relative">
                            <button class="text-xs uppercase text-white py-2 px-3 inline-flex items-center">
                              <span class="mr-1">Generos</span>
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                            </button>
                                <ul class="dropdown-menu absolute hidden text-gray-800 pt-1 rounded" style="height: 200px; overflow:auto;">
                                    @foreach ($generosContent['genres'] as $generos)
                                        <li class="">
                                            <a class="bg-gray-200 hover:bg-gray-300 py-2 px-4 block whitespace-no-wrap" href="#">
                                                {{$generos['name']}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                        </div>
                    </li>
                </ul>
                <div class="flex items-center text-white text-sm">
                    <button class="px-3 py-2">Register</button>
                    <button class="bg-red-500 px-3 py-2 rounded">Login</button>
                </div>
                </div>
            </div>
            </nav>
        </div>
    </div>
</header>