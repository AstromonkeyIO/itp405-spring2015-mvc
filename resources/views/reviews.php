<!doctype html>
<html>
    <head>
        <title>Reviews</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">        
    </head>
    <body style="text-align: center">
 
    <?php foreach($errors->all() as $errorMessage) : ?>
        <p><?php echo $errorMessage ?></p> 
    <?php endforeach ?>
    <?php if(Session::has('success')) : ?>
        <p><?php echo Session::get('success')?></p>
    <?php endif ?>        
        
        <h1>
            Reviews for dvd id: <?php echo $dvd_id; ?>
        </h1>
	<form method="post" action="<?php echo url("/dvds/".$dvd_id); ?>">  
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            
            <div class="form-group">
                <label>Rating</label>            
                <select name="rating" style="height: 200px;">
                    <?php if(Request::old('rating')) : ?>
                    <option value="<?php echo Request::old('rating') ?>" selected="selected">
                        <?php echo Request::old('rating') ?>
                    </option>                                
                    <?php endif ?>                    
                    <?php for($i = 1; $i <= 10; $i++) { ?>
                        <option value="<?php echo $i ?>">
                            <?php echo $i ?>
                        </option>
                    <?php } ?>                   
                </select> 
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="title" placeholder="Write a review" value="<?php echo Request::old('title') ?>">
            </div>
            <div class="form-group">
                <textarea name="description" style="width: 400px;" value="<?php echo Request::old('description') ?>"><?php echo Request::old('description') ?></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>            
        </form>
        
        <?php foreach($reviews as $review) : ?>
            <div style="padding: 10px;">
            <h1><?php echo $review->title ?></h1>
            <h2><?php echo $review->description ?></h2>
            <h3><?php echo $review->rating ?></h3>
            </div>
         <?php endforeach ?>       
    </body>
</html>