<!DOCTYPE html>
 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
     
        <?php include HOME . DS .  'includes' . DS . 'menu.inc.php'; ?>

        <h2>Thank you for voting!</h2>
        <p><a href="/home/details/<?php echo $movieid; ?>" >Back</a>
         
    </body>
</html>