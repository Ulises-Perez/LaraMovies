@extends('layouts.plantillaI')

@section('title', 'TMDB - Listas')

@section('content')

    <main class="mt-20">
        <div class="w-full">
            <div class="container mx-auto">
                
                <section id="lista_los_vengadores" class="mb-1">
                    <h1 class="text-lg lg:text-2xl mt-4 p-2 text-white hidden lg:block ">{{$listaTheAvengers['name']}}</h1>
                    <div class="lista-image-background md:rounded-lg" style="background-image: url('https://image.tmdb.org/t/p/w780/7RyHsO4yDXtBv1zUU3mTpHeQ0d5.jpg')">
                        <div class="sombra-list bg-black bg-opacity-75 md:rounded-lg">
                            <div class="grid grid-cols-5 gap-6 text-white relative lg:py-4 flex justify-center items-center align-center">
                                <div class="title-lista col-span-5 lg:col-span-1 flex justify-start items-center lg:hidden">
                                    <h1 class="text-lg lg:text-xl mt-4 p-2 backdrop-blur rounded-r border-white border-l-2">{{$listaTheAvengers['name']}}</h1>
                                </div>
                                <div class="col-span-5 contenido gap-6 pl-1 lg:px-4">
                                    <div class="temporadas pt-2 pb-2 h-auto w-full overflow-auto flex gap-2">
                                        @foreach ($listaTheAvengers['items'] as $movies)
                                            <div class="flex gap-2">
                                                <div class="gap-4">
                                                    <div class="w-40 xl:w-52 relative">
                                                        <x-movie-card :movies="$movies"/>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="lista_los_vengadores" class="mb-1">
                    <h1 class="text-lg lg:text-2xl mt-4 p-2 text-white hidden lg:block">{{$listaDc['name']}}</h1>
                    <div class="lista-image-background md:rounded-lg" style="background-image: url('https://image.tmdb.org/t/p/w780/sd4xN5xi8tKRPrJOWwNiZEile7f.jpg')">
                        <div class="sombra-list bg-black bg-opacity-75 md:rounded-lg">
                            <div class="grid grid-cols-5 gap-6 text-white relative lg:py-4 flex justify-center items-center align-center">
                                <div class="title-lista col-span-5 lg:col-span-1 flex justify-start items-center lg:hidden">
                                    <h1 class="text-lg lg:text-xl mt-4 p-2 backdrop-blur rounded-r border-white border-l-2">{{$listaDc['name']}}</h1>
                                </div>
                                <div class="col-span-5 contenido gap-6 pl-1 lg:px-4">
                                    <div class="temporadas pt-2 pb-2 h-auto w-full overflow-auto flex gap-2">
                                        @foreach ($listaDc['items'] as $movies)
                                            <div class="flex gap-2">
                                                <div class="gap-4">
                                                    <div class="w-40 xl:w-52 relative">
                                                        <x-movie-card :movies="$movies"/>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="lista_los_vengadores" class="mb-1">
                    <h1 class="text-lg lg:text-2xl mt-4 p-2 text-white hidden lg:block ">{{$listaMarvel['name']}}</h1>
                    <div class="lista-image-background md:rounded-lg" style="background-image: url('https://image.tmdb.org/t/p/w780/7RyHsO4yDXtBv1zUU3mTpHeQ0d5.jpg')">
                        <div class="sombra-list bg-black bg-opacity-75 md:rounded-lg">
                            <div class="grid grid-cols-5 gap-6 text-white relative lg:py-4 flex justify-center items-center align-center">
                                <div class="title-lista col-span-5 lg:col-span-1 flex justify-start items-center lg:hidden">
                                    <h1 class="text-lg lg:text-xl mt-4 p-2 backdrop-blur rounded-r border-white border-l-2">{{$listaMarvel['name']}}</h1>
                                </div>
                                <div class="col-span-5 contenido gap-6 pl-1 lg:px-4">
                                    <div class="temporadas pt-2 pb-2 h-auto w-full overflow-auto flex gap-2">
                                        @foreach ($listaMarvel['items'] as $movies)
                                            <div class="flex gap-2">
                                                <div class="gap-4">
                                                    <div class="w-40 xl:w-52 relative">
                                                        <x-movie-card :movies="$movies"/>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </main>

@endsection