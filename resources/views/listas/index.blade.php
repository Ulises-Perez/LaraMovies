@extends('layouts.plantillaI')

@section('title', 'TMDB - Listas')

@section('content')

    <main>
        <div class="w-full">
            <div class="container mx-auto">


                <section id="lista_los_vengadores">
                    <div class="lista-image-background rounded-lg" style="background-image: url('https://image.tmdb.org/t/p/w780/7RyHsO4yDXtBv1zUU3mTpHeQ0d5.jpg')">
                        <div class="sombra-list bg-black bg-opacity-75 rounded-lg">
                            <div class="grid grid-cols-5 gap-6 text-white relative">
                                <div class="title-lista col-span-5 lg:col-span-1 flex justify-start items-center">
                                    <h1 class="text-lg lg:text-xl mt-4 p-2 backdrop-blur rounded-r border-white border-l-2">{{$listaTheAvengers['name']}}</h1>
                                </div>
                                <div class="col-span-5 lg:col-span-4 contenido flex justify-center items-center align-center gap-6 pl-1">
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




            </div>
        </div>
    </main>

@endsection