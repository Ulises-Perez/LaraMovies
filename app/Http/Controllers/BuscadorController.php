<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function search(Request $request){

        /*$request->validate([
            'search' => ['required']
        ]);*/

        $TMDB_KEY = 'd1b0f4017f214c6a8fa7bcc9e89faa80';
        $lang = 'es-MX';

        if (empty($request->input('search'))) {
            //Api for Home Movies
            $mvContent = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key='.$TMDB_KEY.'&language=es-ES&Page=1');
            $mvContent = json_decode($mvContent, true)['results'];

            $npContent = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key='.$TMDB_KEY.'&language=es-ES&Page=1');
            $npContent = json_decode($npContent, true)['results'];

            $generosContent = file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key='.$TMDB_KEY.'&language=es-ES');
            $generosContent = json_decode($generosContent, true);

            $trendingMovie = file_get_contents('https://api.themoviedb.org/3/collection/87118?api_key='.$TMDB_KEY.'&language=es-ES');
            $trendingMovie = json_decode($trendingMovie, true);

            $trendingMovies = file_get_contents('https://api.themoviedb.org/3/trending/movie/day?api_key='.$TMDB_KEY.'&language=es-ES');
            $trendingMovies = json_decode($trendingMovies, true);

            $upcomingMovies = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key='.$TMDB_KEY.'&language=es-ES&page=1');
            $upcomingMovies = json_decode($upcomingMovies, true)['results'];

            //Api for Home Series
            $seContent = file_get_contents('https://api.themoviedb.org/3/tv/popular?api_key='.$TMDB_KEY.'&language=es-ES');
            $seContent = json_decode($seContent, true)['results'];

            $seTopRated = file_get_contents('https://api.themoviedb.org/3/tv/top_rated?api_key='.$TMDB_KEY.'&language=es-ES');
            $seTopRated = json_decode($seTopRated, true)['results'];

            return view("welcome", compact('mvContent', 'npContent', 'generosContent', 'trendingMovies', 'upcomingMovies', 'seContent', 'seTopRated'));
        }else {

            // Get the search value from the request
            $search = $request->input('search');
        
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
}
