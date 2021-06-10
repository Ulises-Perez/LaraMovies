<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListasController extends Controller
{
    public function index(){

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';

        //Api for Peliculas Page
        $listaTheAvengers = file_get_contents('https://api.themoviedb.org/3/list/5?api_key='.$TMDB_KEY.'&language=es-ES');
        $listaTheAvengers = json_decode($listaTheAvengers, true);

        $listaDc = file_get_contents('https://api.themoviedb.org/3/list/3?api_key='.$TMDB_KEY.'&language=es-ES');
        $listaDc = json_decode($listaDc, true);

        $listaMarvel = file_get_contents('https://api.themoviedb.org/3/list/1?api_key='.$TMDB_KEY.'&language=es-ES');
        $listaMarvel = json_decode($listaMarvel, true);

        $listaShrek = file_get_contents('https://api.themoviedb.org/3/list/7092633?api_key='.$TMDB_KEY.'&language=es-ES');
        $listaShrek = json_decode($listaShrek, true);

        $listaCars = file_get_contents('https://api.themoviedb.org/3/list/7092581?api_key='.$TMDB_KEY.'&language=es-ES');
        $listaCars = json_decode($listaCars, true);

        $listaMarvel = file_get_contents('https://api.themoviedb.org/3/list/1?api_key='.$TMDB_KEY.'&language=es-ES');
        $listaMarvel = json_decode($listaMarvel, true);
        //dd($listaTheAvengers);

        return view('listas.index', compact('listaTheAvengers','listaDc','listaMarvel','listaShrek','listaCars'));
    }
}
