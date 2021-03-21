<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    public function index(){
        return view('peliculas.index');
    }

    public function show($idpelicula){

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';

        //Api for Content of Movies
        $contentM = file_get_contents('https://api.themoviedb.org/3/movie/'.$idpelicula.'?api_key='.$TMDB_KEY.'&language=es-ES');
        $contentM = json_decode($contentM, true);
        $contentCast = file_get_contents('https://api.themoviedb.org/3/movie/'.$idpelicula.'/credits?api_key='.$TMDB_KEY.'&language=es-ES');
        $contentCast = json_decode($contentCast, true);
        $contentImg = file_get_contents('https://api.themoviedb.org/3/movie/'.$idpelicula.'/images?api_key='.$TMDB_KEY.'');
        $contentImg = json_decode($contentImg, true);
        //print_r($contentM);

        return view('peliculas.show', compact('idpelicula', 'contentM', 'contentCast', 'contentImg'));
    }
}
