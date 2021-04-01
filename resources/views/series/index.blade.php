@extends('layouts.plantillaI')

@section('title', 'TMDB - Series')

@section('content')
<main id="main">

<section>
    <div class="w-full">
        <div class="container mx-auto flex justify-center content-center px-2 xl:px-0 py-10 mb-6">
            <div class="px-2 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 justify-center content-center text-white">
                <?php
                    foreach ($spContent as $series){
                        if(!empty($series['poster_path'])){
                        echo   '<a href="'.route('series.show', $series['id']).'" class="tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
                                    <div class="poster relative">
                                        <img class="w-full h-full rounded" src="https://image.tmdb.org/t/p/w300/'.$series['poster_path'].'" alt="'.$series['name'].'">
                                        <div class="sombra-content absolute inset-0 flex justify-center items-center rounded">
                                            <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                                                <i class="fas fa-play"></i>
                                            </button>
                                        </div>
                                        <div class="calificacion absolute top-0 left-0 h-8 w-8 m-2 bg-red-500 rounded shadow-md flex justify-center items-center">
                                            <p class="p-2">'.$series['vote_average'].'</p>
                                        </div>
                                    </div>
                                    <p class="truncate w-full text-center">'.$series['name'].'</p>
                                </a>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="w-full">
        <div class="container mx-auto my-6">
            <div class="py-2">
                <nav class="block">
                    <ul class="flex pl-0 rounded list-none flex-wrap justify-center">
                        <?php
                            if($page > 1){
                                ?>
                                <li>
                                    <a href="./<?=$page-1?>" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-red-500 bg-white text-red-500">
                                    <i class="fas fa-chevron-left -ml-px"></i>
                                    </a>
                                </li>
                                <?php
                            }
                        ?>
                        <li>
                            <a href="#" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-red-500 bg-white text-red-500">
                                <?=$page?>
                            </a>
                        </li>
                        <?php
                            if($page < 500 ){
                                ?>
                                <li>
                                    <a href="./<?=$page+1?>" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-red-500 bg-white text-red-500">
                                        <?=$page+1?>
                                    </a>
                                </li>
                                <li>
                                    <a href="./<?=$page+1?>" class="first:ml-0 text-xs font-semibold flex w-8 h-8 mx-1 p-0 rounded-full items-center justify-center leading-tight relative border border-solid border-red-500 bg-white text-red-500">
                                    <i class="fas fa-chevron-right -mr-px"></i>
                                    </a>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

</main>
@endsection