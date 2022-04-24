<ul class="movie-list">
    <li>
        <div class="movie-card">
            <a href="{{route('series.show', $series['id'])}}">
                <figure class="card-banner">
                    <img src="https://image.tmdb.org/t/p/w300/{{$series['poster_path']}}" alt="{{$series['name']}}">
                </figure>
            </a>
            <div class="title-wrapper">
                <a href="{{route('series.show', $series['id'])}}" class="truncate">
                    <p class="card-title truncate">{{$series['name']}}</p>
                </a>
                <time datetime="2022">
                    @php
                        // Como la fecha viene en formato ingles, establecemos el localismo.
                        setlocale(LC_ALL, 'en_US');
    
                        // Fecha en formato yyyy/mm/dd
                        $timestamp = strtotime($series['first_air_date']);

                        // Fecha en formato dd/mm/yyyy
                        $fechaYear = strftime("%Y", $timestamp);
                        echo $fechaYear;
                    @endphp
                </time>
            </div>
        </div>
    </li>
</ul>