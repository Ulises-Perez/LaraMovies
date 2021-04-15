<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListasController extends Controller
{
    public function index(){

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';

        //Api for Peliculas Page
        $listaTheAvengers = file_get_contents('https://api.themoviedb.org/3/list/7092572?api_key='.$TMDB_KEY.'&language=es-ES');
        $listaTheAvengers = json_decode($listaTheAvengers, true);
        //dd($listaTheAvengers);

        return view('listas.index', compact('listaTheAvengers'));
    }
}
