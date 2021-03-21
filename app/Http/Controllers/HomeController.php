<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';

        //Api for Home Movies
        $mvContent = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key='.$TMDB_KEY.'&language=es-ES&Page=1');
        $mvContent = json_decode($mvContent, true)['results'];

        $npContent = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key='.$TMDB_KEY.'&language=es-ES&Page=1');
        $npContent = json_decode($npContent, true)['results'];

        $generosContent = file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key='.$TMDB_KEY.'&language=es-ES');
        $generosContent = json_decode($generosContent, true);

        //Api for Home Series
        $seContent = file_get_contents('https://api.themoviedb.org/3/tv/popular?api_key='.$TMDB_KEY.'&language=es-ES');
        $seContent = json_decode($seContent, true)['results'];

        return view("welcome", compact('mvContent', 'npContent', 'generosContent', 'seContent'));
    }
}
