<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    public function index(){

        $animeAll = Http::get('https://aruppi-api.herokuapp.com/api/v3/AllAnimes');

        if($animeAll->failed()){
            dd($animeAll->body());
        }

        $animeImg = file_get_contents('https://aruppi-api.herokuapp.com/api/v3/images/query');
        dd($animeAll);

        return view('anime.index', ['animeAll'=>$animeAll]);
    }

    public function show($idanime){

        return view('peliculas.show', compact('idanime'));
    }
}
