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

            <movie>
                <div class="span3">
                  <div class="well sidebar-nav">
                    <ul class="nav nav-list">
                      <li class="nav-header">Genres</li>
            <?php
            foreach ($genres as $a): ?>
                      <li><a href="/home/genres/<?php echo $a['genre_id']; ?>"><?php echo $a['genre_name']; ?></a></li>
            <?php 
            endforeach; ?>
        </div>
    </div>
            </movie>
            <?php
            foreach ($movies as $a): ?>
                      <ul><a href="/home/details/<?php echo $a['movie_id']; ?>"><?php echo $a['movie_title']; ?></a></ul>
            <?php 
            endforeach; ?>

         
    </body>
</html>