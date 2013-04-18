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
    <div class="row-fluid">
        <?php
            if ($movies):
            $counter=0;
            foreach ($movies as $a):
            $counter2=0; ?>
            
            <movie>
            <div class="span4">
                <dl>
                    <dt>
                        <p class ="lead">
                              <?php echo $a['movie_title']; ?>
                              <small><?php echo "(" .$a['movie_year'].")"; ?></small>
                        </p>
                    </dt>
                        <dd>
                            <?php foreach ($actors[$counter] as $act){ ?>
                             <a href="/home/actors/<?php echo($act['actor_id']);?>"><?php if($counter2!=0) { echo(" , "); };echo $act['actor_name']; ?>
                             <?php $counter2++; };?>
                            </a>
                        </dd>   
                        <dd>                  
                              <p> <?php echo $a['movie_description']; ?></p>
                              <p><a class="btn" href="/home/details/<?php echo $a['movie_id']; ?>">View details »</a></p>
                        </dd>
              </dl>
            </div>
            </movie>
        <?php 
            $counter++;
            endforeach;
            else: ?>
 
        <p>We currently do not have any movies from your selection.</p>
 
        <?php endif; ?>
    </div>
         
    </body>
</html>



