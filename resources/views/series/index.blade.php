@extends('layouts.plantillaI')

@section('title', 'TMDB - Series')

@section('content')
<main id="main" class="mt-20">

<section>
    <div class="w-full">
        <div class="container mx-auto flex justify-center content-center px-2 xl:px-0 py-10 mb-6">
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