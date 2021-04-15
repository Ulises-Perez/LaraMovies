@extends('layouts.plantillaI')

@section('title', 'TMDB - Listas')

@section('content')

    <main>
        <div class="w-full">
            <div class="container mx-auto px-4">


                <section id="lista_los_vengadores">
                    <div class="lista-image-background rounded-lg" style="background-image: url('https://image.tmdb.org/t/p/w780/7RyHsO4yDXtBv1zUU3mTpHeQ0d5.jpg')">
                        <div class="sombra-list bg-black bg-opacity-75 rounded-lg">
                            <div class="grid grid-cols-5 gap-6 text-white">
                                <div class="title-lista col-span-5 lg:col-span-1 flex justify-center items-center pt-2">
                                    <h1 class="text-md lg:text-xl">{{$listaTheAvengers['name']}}</h1>
                                </div>
                                <div class="col-span-5 lg:col-span-4 contenido flex justify-center items-center align-center gap-6 p-6">
                                    
                                    <div class="temporadas pt-2 pb-8 h-auto w-full overflow-auto flex gap-2">
                                        @foreach ($listaTheAvengers['items'] as $movies)
                                            <div class="flex gap-2">
                                                <div class="gap-4">
                                                    <div class="w-40 lg:w-48 lg:w-60 h-80 relative lol-sas">
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