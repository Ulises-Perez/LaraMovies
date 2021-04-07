<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SeriesController extends Controller
{
    public function index($page){

        $TMDB_KEY = env('TMDB_KEY');

        $spContent = Http::get('https://api.themoviedb.org/3/tv/popular?api_key='.$TMDB_KEY.'&language=es-ES&page='.$page.'')
            ->json()['results'];

        return view('series.index', compact('page', 'spContent'));
    }

    public function show($idserie){

        $TMDB_KEY = env('TMDB_KEY');

        $contentS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $contentCastS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'/credits?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $contentImgS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'/images?api_key='.$TMDB_KEY.'')
            ->json();

        return view('series.show', compact('idserie', 'contentS', 'contentCastS', 'contentImgS'));
    }

    public function showSeason($idserie, $idseason){

        $TMDB_KEY = env('TMDB_KEY');

        $contentS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $contentEpisodesS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'/season/'.$idseason.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();
        
        return view('series.showSeason', compact('idserie', 'idseason', 'contentS', 'contentEpisodesS'));
    }

    public function showEpisode($idserie, $idseason, $idepisode){

        $TMDB_KEY = env('TMDB_KEY');

        $contentS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $contentEpisodesS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'/season/'.$idseason.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();
        
        $content_Info_Episode = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'/season/'.$idseason.'/episode/'.$idepisode.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        return view('series.showEpisode', compact('idserie', 'idseason', 'idepisode', 'contentS', 'contentEpisodesS', 'content_Info_Episode'));
    }
}
