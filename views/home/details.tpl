<!DOCTYPE html>
 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
              <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
     
        <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
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
                <h1><?php echo $movie['movie_title'];?></h1>
            </header>
            <p>
                 <?php $counter=0; foreach ($moviegen as $movgen){ ?>
                 <a href="/home/genres/<?php echo($movgen[0]['genre_id']);?>"><?php if($counter!=0) { echo(" , "); };echo $movgen[0]['genre_name']; ?>
                 <?php $counter++; };?>
                 </a>
            </p>
                <p>Duration:<?php echo $movie['movie_time']; ?></p>
                <img src="<?php echo $movie['movie_pic']; ?>" hight="250" width="150">

            <p>
                 <?php $counter2=0; foreach ($actors as $act){ ?>
                 <a href="/home/actors/<?php echo($act['actor_id']);?>"><?php if($counter2!=0) { echo(" , "); };echo $act['actor_name']; ?>
                 <?php $counter2++; };?>
                 </a>
            </p>
            <?php echo $movie['movie_description']; ?>
        </article>
         
        <a href="/">Back to article list</a>
         
    </body>
</html>