<!doctype html>
<html>
    <head>
        <title>DVD Search</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">        
    </head>
    <body style="text-align: center">
        <div style="float:left" width="100px">
            <?php foreach($genres as $genre) : ?>
            <p>
                <a href="/genres/<?php echo $genre->genre_name?>/dvds">
                    <?php echo $genre->genre_name ?>
                </a>
            </p>
            <?php endforeach ?>             
        </div>
        <div style="float:left" width="300px">
        <h1>DVD Search</h1>
        <form action="/dvds" method="get">
            <h1>
            <input class="form-control" type="text" name="dvd_title" placeholder="Search DVD!">
            </h1>
            <h1>
            <select name="genres" style="height: 200px;">
                <option value="All">
                All
                </option>
                <?php foreach($genres as $genre) : ?>
                    <option value="<?php echo $genre->genre_name ?>">
                        <?php echo $genre->genre_name ?>
                    </option>
                <?php endforeach ?>                   
            </select>
            <select name="ratings" style="height: 200px;">
                <option value="All">
                All
                </option>                
                <?php foreach($ratings as $rating) : ?>
                    <option value="<?php echo $rating->rating_name ?>">
                        <?php echo $rating->rating_name ?>
                    </option>
                <?php endforeach ?> 
            </select>
            </h1>
            <p>
            <input class="btn btn-default" type="submit" value="Search">
            </p>
        </form>
        </div>
    </body> 
</html>
