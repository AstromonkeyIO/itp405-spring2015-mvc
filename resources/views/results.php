<!doctype html>
<html>
    <head>
        <title>Results</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">        
    </head>
    <body>
        <h1>
            You searched for dvd title: <?php if($dvd_title) { echo $dvd_title; } else { echo "none";} ?>
            You searched for rating: <?php echo $rating ?> 
            You searched for genre: <?php echo $genre ?>
        </h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Rating</th>
                    <th>Genre</th>
                    <th>Label</th>
                    <th>Sound</th>
                    <th>Format</th>
                    <th>Release Date</th>                    
                </tr>
            </thead>
            <tbody>
            <?php foreach ($dvds as $dvd) : ?>
            <tr>    
            <td><?php echo $dvd->title ?></td>                
            <td><?php echo $dvd->rating_name ?></td>
            <td><?php echo $dvd->genre_name ?></td>
            <td><?php echo $dvd->label_name ?></td>                
            <td><?php echo $dvd->sound_name ?></td>
            <td><?php echo $dvd->format_name ?></td>
            <td><?php 
            $date = new DateTime($dvd->release_date); 
            echo $date->format('h:i:s M-d-Y');        
            ?></td> 
            </tr>
            <?php endforeach; ?>                 
            </tbody>
        </table>
    </body> 
</html>