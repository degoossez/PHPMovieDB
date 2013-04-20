<!DOCTYPE html>
 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
     
        <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
         
        <h1><?php foreach($errors as $e) echo($e);  ?></h1>
         
             <form action="/comment/addcomment/<?php echo $movie['movie_id']?>" method="post">  
                    <label>Comment :</label>
                    <div span="span5">
                    <textarea class="span6" rows="4" name="commentdata" type="text" value="" size="9"></textarea>  
                    </div>
                    <div span="span3">
                    <input type="submit" name="commentFormSubmit" value="Comment"> 
                    </div> 
             </form> 
        <p><a href="/home/details/<?php echo $movieid; ?>" >Back</a>
         
    </body>
</html>