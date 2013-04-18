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
            <dl>
                <?php
                $counter=0;
                foreach ($movies as $a): ?>
                        <p>
                        <dt style="margin-left: 230px">
                        <ul><a href="/home/details/<?php echo $a['movie_id']; ?>" style="color:black;font-size:30px;"><?php echo $a['movie_title']; ?></a></ul>
                        </dt>
                        <dd style="margin-left: 280px">
                                        <?php  $counter2=0; foreach ($actors[$counter] as $act){ ?>
                                            <a href="/home/actors/<?php echo($act['actor_id']);?>" style="color:black;font-size:15px;"><?php if($counter2!=0) { echo(" , "); };echo $act['actor_name']; ?>
                                            <?php if($counter2==3) break; $counter2++; };?>
                                            </a>
                                        <?php ; ?>
                        </dd>
                        <p>
                <?php 
                $counter++;
                endforeach; ?>
            </dl>         
    </body>
</html>