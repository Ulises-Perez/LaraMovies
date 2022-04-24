<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';
        $lang = 'es-MX';
    
        // Search in the tmdb api
        if(!isset($page)){
            $page = 1;
        }
        //Api for Peliculas Page
        $bContent = @file_get_contents('https://api.themoviedb.org/3/search/movie?api_key='.$TMDB_KEY.'&language='.$lang.'&query='.urlencode($search).'&page='.$page.'&include_adult=false');
        if(empty($bContent)){
            $bContent = '';
        }else{
            $bContent = json_decode($bContent, true)['results'];
        }
    
        //Api for Series Page
        $bSContent = @file_get_contents('https://api.themoviedb.org/3/search/tv?api_key='.$TMDB_KEY.'&language='.$lang.'&query='.urlencode($search).'&page='.$page.'&include_adult=false');
        if(empty($bSContent)){
            $bSContent = '';
        }else{
            $bSContent = json_decode($bSContent, true)['results'];
        }

        $generosContent = file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key='.$TMDB_KEY.'&language=es-ES');
        $generosContent = json_decode($generosContent, true);
    
        // Return the search view with the resluts compacted
        return view('buscador.buscador', compact('search', 'bContent', 'bSContent', 'generosContent'));
    }
}
