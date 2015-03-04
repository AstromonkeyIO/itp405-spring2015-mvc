<!doctype html>
<html>
    <head>
        <title>Results</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">        
    </head>
    <body>
        <h1>
            You searched for genre: {{$genre}}
        </h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Rating</th>
                    <th>Genre</th>
                    <th>Label</th>
                    <th>Release Date</th>
                    <th>Review</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($dvds as $dvd)
            <tr>    
            <td>{{$dvd->title}}</td>                
            <td>{{$dvd->rating->rating_name}}</td>
            <td>{{$dvd->genre->genre_name}}</td>
            <td>{{$dvd->label->label_name}}</td>                
            <td><?php 
            $date = new DateTime($dvd->release_date); 
            echo $date->format('h:i:s M-d-Y');        
            ?></td>
            <td><a href="dvds/{{$dvd->id}}">Write a Review!</a></td>
            </tr>
            @endforeach                 
            </tbody>
        </table>
    </body> 
</html>