@extends('layouts.plantillaI')

@section('title', 'TMDB - Series')

@section('content')
<main id="main" class="mt-10">

<section>
    <div class="w-full py-10 lg:py-20">
        <div class="container mx-auto flex justify-center content-center px-4 xl:px-0 mb-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 justify-center content-center text-white">
                @foreach ($spContent as $series)
                    @if (!empty($series['poster_path']))
                        <x-tv-card :series="$series" />
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<section>
    <div class="w-full">
        <div class="container mx-auto mb-20">
            <div class="py-2">
                <nav class="block">
                    <ul class="flex pl-0 rounded list-none flex-wrap justify-center items-center gap-2">
                        <?php
                            if($page > 1){
                                ?>
                                <li>
                                    <a href="./<?=$page-1?>" class="first:ml-0 text-xs font-semibold flex w-12 h-12 mx-1 p-0 rounded-full items-center justify-center leading-tight relative bg-red-500 text-white">
                                    <i class="fas fa-chevron-left -ml-px"></i>
                                    </a>
                                </li>
                                <?php
                            }
                        ?>
                        <li>
                            <a>
                                <p class="bg-red-500 text-white rounded-full py-4 px-6"><b class="bg-red-400 rounded-xl p-2"><?=$page?></b> de 500</p>
                            </a>
                        </li>
                        <?php
                            if($page < 500 ){
                                ?>
                                <li>
                                    <a href="./<?=$page+1?>" class="first:ml-0 text-xs font-semibold flex w-12 h-12 mx-1 p-0 rounded-full items-center justify-center leading-tight relative text-white bg-red-500">
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