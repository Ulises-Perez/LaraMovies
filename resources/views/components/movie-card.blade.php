<a href="{{route('peliculas.show', $movies['id'])}}" class="item tilt-poster transform hover:scale-105 transition duration-300 ease-in-out">
    <div class="poster relative">
        <img class="w-full h-full rounded-xl" src="https://image.tmdb.org/t/p/w300/{{$movies['poster_path']}}" alt="{{$movies['title']}}">
        <div class="sombra-content hidden absolute inset-0 flex justify-center items-center rounded">
            <button class="play-btn bg-red-500 text-white rounded-full h-10 w-10 lg:h-16 lg:w-16 outline-none focus:outline-none">
                <i class="fas fa-play"></i>
            </button>
        </div>
        <div class="calificacion absolute top-0 left-0 h-8 w-8 m-2 bg-red-500 rounded shadow-md flex justify-center items-center">
            <p class="p-2">{{$movies['vote_average']}}</p>
        </div>
    </div>
    <p class="truncate w-full text-center">{{$movies['title']}}</p>
</a>