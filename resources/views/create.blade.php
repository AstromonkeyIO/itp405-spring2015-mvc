<html>
    <head>
        <meta charset="UTF-8">
        <title>Add DVDs</title>
	<link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">          
    </head>
    <body style="padding-top: 10%;">
        @if(Session::has('success')) 
        <h1>{{Session::get('success')}}</h1>
        @endif
        
       <div style="float:left"> 
        <form action="/dvds" method="POST">
            <input type="text" name="title" placeholder="DVD Name">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">            
            <select name="format_id" style="height: 200px;">
                @foreach($formats as $format)
                    <option value="{{$format->id}}">
                        {{$format->format_name}}
                    </option>
                @endforeach                    
            </select>
            <select name="genre_id">
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}">
                        {{$genre->genre_name}}
                    </option>
                @endforeach                    
            </select> 
            <select name="label_id">
                @foreach($labels as $label)
                    <option value="{{$label->id}}">
                        {{$label->label_name}}
                    </option>
                @endforeach                    
            </select>            
            <select name="rating_id">
                @foreach($ratings as $rating)
                    <option value="{{$rating->id}}">
                        {{$rating->rating_name}}
                    </option>
                @endforeach                    
            </select>              
            <select name="sound_id">
                @foreach($sounds as $sound)
                    <option value="{{$sound->id}}">
                        {{$sound->sound_name}}
                    </option>
                @endforeach                    
            </select>              
            <input type="submit" name="submit" value="Add!" class="addButton">            
        </form>
       </div>
    </body>
</html>
