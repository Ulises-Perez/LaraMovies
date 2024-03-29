<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SeriesController extends Controller
{
    public function index($page){

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';

        $spContent = Http::get('https://api.themoviedb.org/3/tv/popular?api_key='.$TMDB_KEY.'&language=es-ES&page='.$page.'')
            ->json()['results'];

        $generosContent = file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key='.$TMDB_KEY.'&language=es-ES');
        $generosContent = json_decode($generosContent, true);

        return view('series.index', compact('page', 'spContent', 'generosContent'));
    }

    public function show($idserie){

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';

        $contentS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $contentCastS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'/credits?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $contentImgS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'/images?api_key='.$TMDB_KEY.'')
            ->json();

        $generosContent = file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key='.$TMDB_KEY.'&language=es-ES');
        $generosContent = json_decode($generosContent, true);

        $recomendationsContent = file_get_contents('https://api.themoviedb.org/3/tv/'.$idserie.'/recommendations?api_key='.$TMDB_KEY.'&language=es-MX&page=1');
        $recomendationsContent = json_decode($recomendationsContent, true)['results'];

        $upcomingMovies = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key='.$TMDB_KEY.'&language=es-ES&page=1');
        $upcomingMovies = json_decode($upcomingMovies, true)['results'];

        //dd($contentImgS['logos']);

        return view('series.show', compact('idserie', 'contentS', 'contentCastS', 'contentImgS', 'generosContent', 'recomendationsContent', 'upcomingMovies'));
    }

    public function showSeason($idserie, $idseason){

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';

        $contentS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $contentEpisodesS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'/season/'.$idseason.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $generosContent = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $upcomingMovies = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key='.$TMDB_KEY.'&language=es-ES&page=1');
        $upcomingMovies = json_decode($upcomingMovies, true)['results'];
        
        return view('series.showSeason', compact('idserie', 'idseason', 'contentS', 'contentEpisodesS', 'generosContent', 'upcomingMovies'));
    }

    public function showEpisode($idserie, $idseason, $idepisode){

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';

        $contentS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $contentEpisodesS = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'/season/'.$idseason.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();
        
        $content_Info_Episode = Http::get('https://api.themoviedb.org/3/tv/'.$idserie.'/season/'.$idseason.'/episode/'.$idepisode.'?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $generosContent = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json();

        $upcomingMovies = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key='.$TMDB_KEY.'&language=es-ES&page=1');
        $upcomingMovies = json_decode($upcomingMovies, true)['results'];

        //dd($contentEpisodesS['episodes']);


        return view('series.showEpisode', compact('idserie', 'idseason', 'idepisode', 'contentS', 'contentEpisodesS', 'content_Info_Episode', 'generosContent', 'upcomingMovies'));
    }
}
