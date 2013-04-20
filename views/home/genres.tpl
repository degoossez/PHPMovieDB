<!DOCTYPE html>
 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
              <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
     
        <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>

    <div class="row-fluid">
        <div class="span12">
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
            <div class="row-fluid">
                <div class="span8" >
                            <?php
                            $counter=0;
                            if($movies):
                            foreach ($movies as $a): ?>
                            <div class="row-fluid">
                                <div class="span4" style="margin-bottom:5px; margin-left:10px">
                                    <h4><a href="/home/details/<?php echo $a['movie_id']; ?>" style="color:black;"><?php echo $a['movie_title']; ?></a></h4>
                                    <div class="span5">
                                        <img src="<?php echo $a['movie_pic']; ?>" hight="250" width="150">
                                    </div>
                                    <div class="span5" style="margin-top:10px">
                                        <?php  $counter2=0; foreach ($actors[$counter] as $act){ ?>
                                        <a href="/home/actors/<?php echo($act['actor_id']);?>" style="color:black;font-size:15px;"><?php echo $act['actor_name']; if($counter2!=count($actors)) {echo(", "); };?> <br>
                                        <?php if($counter2==3) break; $counter2++; };?>
                                        </a>
                                        <?php ; ?>
                                    </div>
                                </div>
                            <?php 
                            $counter++;
                            endforeach; 
                            endif;?>  
                </div>  
            </div>  
        </div>
    </div>
    </body>
</html>