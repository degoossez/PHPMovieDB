<!DOCTYPE html>
 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
              <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
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
        <?php
            if ($movies):
            foreach ($movies as $a): ?>
 
            <movie>
                <header>
                    <h1><a href="/home/details/<?php echo $a['movie_id']; ?>"><?php echo $a['movie_title']; ?></a></h1>
                    <p><?php echo $a['movie_description']; ?></p>
                    <p>Published on: <time pubdate="pubdate"><?php echo $a['movie_time']; ?></time></p>
                </header>
                <p><?php echo $a['movie_title']; ?></p>
                <p><a href="/home/details/<?php echo $a['movie_id']; ?>">Continue reading</a></p>
                <hr/>
            </movie>
        <?php 
            endforeach;
            else: ?>
 
        <h1>Welcome!</h1>
        <p>We currently do not have any articles.</p>
 
        <?php endif; ?>

         
    </body>
</html>