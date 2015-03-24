<html>
    <head> 
	<link href="/css/app.css" rel="stylesheet">        
    </head>
    <body>
        <div style="text-align: center">
        <center>
        @if($noData)
            <p>{{$noData}}</p>
        @else
       
        @foreach ($rottenTomatoData as $movie)
            <div class="movieDiv">
            <img src='{{$movie->posters->thumbnail}}'>
            <p>{{ $movie->title }}</p>
            <p>{{ $movie->runtime }} mins</p>
            <p>Critics Score: {{ $movie->ratings->critics_score }}</p>
            <p>Audience Score: {{ $movie->ratings->audience_score }}</p>
            <p>
            Cast:     
            @foreach ($movie->abridged_cast as $cast)
                {{ $cast->name }}
            @endforeach
            </p>
            </div>
        @endforeach
        
        @endif
        </center>
        </div>
    </body>
</html>