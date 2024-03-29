<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        $trendingMovies = Http::get('https://api.themoviedb.org/3/trending/movie/day?api_key='.$TMDB_KEY.'&language=es-ES')
            ->json()['results'];

        $upcomingMovies = Http::get('https://api.themoviedb.org/3/movie/upcoming?api_key='.$TMDB_KEY.'&language=es-ES&page=1')
            ->json()['results'];

        //Api for Home Series
        $seContent = file_get_contents('https://api.themoviedb.org/3/tv/popular?api_key='.$TMDB_KEY.'&language=es-ES');
        $seContent = json_decode($seContent, true)['results'];

        $seTopRated = file_get_contents('https://api.themoviedb.org/3/tv/top_rated?api_key='.$TMDB_KEY.'&language=es-ES');
        $seTopRated = json_decode($seTopRated, true)['results'];

        $generoAccion = Http::get('https://api.themoviedb.org/3/discover/movie?api_key='.$TMDB_KEY.'&language=es-ES&page=1&with_genres=28')
            ->json()['results'];

        //dd($generoAccion);

        /* Image
        $dir = 'https://image.tmdb.org/t/p/w300/';
        $name = 'uoMyXY1ReK5I1kkMMQfqod7YhXh.jpg';
        $newName = 'uoMyXY1ReK5I1kkMMQfqod7YhXh.webp';

        // Create and save
        $img = imagecreatefromjpeg($dir . $name);
        imagepalettetotruecolor($img);
        imagealphablending($img, true);
        imagesavealpha($img, true);
        imagewebp($img, $dir . $newName, 100);
        imagedestroy($img);
        */

        //dd($img);

        return view("welcome", compact('mvContent', 'npContent', 'generosContent', 'trendingMovies', 'upcomingMovies', 'seContent', 'seTopRated', 'generoAccion'));
    }
}
