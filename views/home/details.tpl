<!DOCTYPE html>
 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
              <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
     
        <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
        
         <p align="right">
        <?php 
        $sid = session_id();
        if($sid) {
        }
        else {
            session_start();
            if (isset($_SESSION['username']))
                echo 'Gebruiker is ingelogd met gebruikersnaam '.$_SESSION['username'];
            else
                echo 'Niet ingelogd!';
        }
         ?>
        </p>
         
        <article>
            <header>
                <h1><?php echo $movie_title;?></h1>
                <p>Duration:<?php echo $movie_time; ?></p>
            </header>
            <p>
                <?php echo $movie_description; ?>
            </p>
        </article>
         
        <a href="/">Back to article list</a>
         
    </body>
</html>