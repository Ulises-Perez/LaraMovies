<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    public function index($page){

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';

        //Api for Peliculas Page
        $mpContent = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key='.$TMDB_KEY.'&language=es-ES&page='.$page);
        $mpContent = json_decode($mpContent, true)['results'];

        return view('peliculas.index', compact('page', 'mpContent'));
    }

    public function show($idpelicula){

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';

        //Api for Content of Movies
        $contentM = file_get_contents('https://api.themoviedb.org/3/movie/'.$idpelicula.'?api_key='.$TMDB_KEY.'&language=es-MX');
        $contentM = json_decode($contentM, true);
        $contentCast = file_get_contents('https://api.themoviedb.org/3/movie/'.$idpelicula.'/credits?api_key='.$TMDB_KEY.'&language=es-ES');
        $contentCast = json_decode($contentCast, true);
        $contentImg = file_get_contents('https://api.themoviedb.org/3/movie/'.$idpelicula.'/images?api_key='.$TMDB_KEY.'&language=es-ES&include_image_language=es');
        $contentImg = json_decode($contentImg, true);
        $contentTrailer = file_get_contents('https://api.themoviedb.org/3/movie/'.$idpelicula.'/videos?api_key='.$TMDB_KEY.'');
        $contentTrailer = json_decode($contentTrailer, true);
        $generosContent = file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key='.$TMDB_KEY.'&language=es-ES');
        $generosContent = json_decode($generosContent, true);

        $recomendationsContent = file_get_contents('https://api.themoviedb.org/3/movie/'.$idpelicula.'/recommendations?api_key='.$TMDB_KEY.'&language=es-MX&page=1');
        $recomendationsContent = json_decode($recomendationsContent, true)['results'];

        //dd($link);
        //dd($data);

        //dd($data['enlaces']);

        return view('peliculas.show', compact('idpelicula', 'contentM', 'contentCast', 'contentImg', 'contentTrailer', 'generosContent', 'recomendationsContent'));
    }
}
