<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index($page){

        $TMDB_KEY = env('TMDB_KEY');
    
        //Api for Series Page
        $spContent = file_get_contents('https://api.themoviedb.org/3/tv/popular?api_key='.$TMDB_KEY.'&language=es-ES&page='.$page);
        $spContent = json_decode($spContent, true)['results'];

        return view('series.index', compact('page', 'spContent'));
    }

    public function show($idserie){

        $TMDB_KEY = env('TMDB_KEY');

        //api for Content of Series or Tv
        $contentS = file_get_contents('https://api.themoviedb.org/3/tv/'.$idserie.'?api_key='.$TMDB_KEY.'&language=es-ES');
        $contentS = json_decode($contentS, true);

        $contentCastS = file_get_contents('https://api.themoviedb.org/3/tv/'.$idserie.'/credits?api_key='.$TMDB_KEY.'&language=es-ES');
        $contentCastS = json_decode($contentCastS, true);

        $contentImgS = file_get_contents('https://api.themoviedb.org/3/tv/'.$idserie.'/images?api_key='.$TMDB_KEY.'');
        $contentImgS = json_decode($contentImgS, true);

        return view('series.show', compact('idserie', 'contentS', 'contentCastS', 'contentImgS'));
    }

    public function showSeason($idserie, $idseason){

        $TMDB_KEY = env('TMDB_KEY');

        //api for Content of Series or Tv
        $contentS = file_get_contents('https://api.themoviedb.org/3/tv/'.$idserie.'?api_key='.$TMDB_KEY.'&language=es-ES');
        $contentS = json_decode($contentS, true);

        $contentEpisodesS = file_get_contents('https://api.themoviedb.org/3/tv/'.$idserie.'/season/'.$idseason.'?api_key='.$TMDB_KEY.'&language=es-ES');
        $contentEpisodesS = json_decode($contentEpisodesS, true);
        return view('series.showSeason', compact('idserie', 'idseason', 'contentS', 'contentEpisodesS'));
    }

    public function showEpisode($idserie, $idseason, $idepisode){

        $TMDB_KEY = env('TMDB_KEY');

        //api for Content of Series or Tv
        $contentS = file_get_contents('https://api.themoviedb.org/3/tv/'.$idserie.'?api_key='.$TMDB_KEY.'&language=es-ES');
        $contentS = json_decode($contentS, true);

        $contentEpisodesS = file_get_contents('https://api.themoviedb.org/3/tv/'.$idserie.'/season/'.$idseason.'?api_key='.$TMDB_KEY.'&language=es-ES');
        $contentEpisodesS = json_decode($contentEpisodesS, true);

        $content_Info_Episode = file_get_contents('https://api.themoviedb.org/3/tv/'.$idserie.'/season/'.$idseason.'/episode/'.$idepisode.'?api_key='.$TMDB_KEY.'&language=es-ES');
        $content_Info_Episode = json_decode($content_Info_Episode ,true);

        return view('series.showEpisode', compact('idserie', 'idseason', 'idepisode', 'contentS', 'contentEpisodesS', 'content_Info_Episode'));
    }
}
