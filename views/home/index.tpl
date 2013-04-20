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
            <div class ="span9">
                    <?php
                            if ($movies):
                            $counter=0;
                            foreach ($movies as $a):
                            $counter2=0; ?>
                            <div class="row-fluid">
                            <div class="span5" style="margin-right:20px">
                                <dl>
                                    <dt>
                                        <p class ="lead">
                                            <?php echo $a['movie_title']; ?>
                                            <small><?php echo "(" .$a['movie_year'].")"; ?></small>
                                        </p>
                                    </dt>
                                </dl>
                                    <div class="span5">
                                        <img src="<?php echo $a['movie_pic']; ?>" hight="250" width="150">
                                        <p><a class="btn" href="/home/details/<?php echo $a['movie_id']; ?>">View details »</a></p>

                                    </div>
                                    <div class="span5">
                                        <?php foreach ($actors[$counter] as $act){ ?>
                                        <a href="/home/actors/<?php echo($act['actor_id']);?>"><?php if($counter2!=0) { echo(" , "); };echo $act['actor_name']; ?>
                                        <?php if($counter2==2) break; $counter2++; };?>
                                        </a>
                                        <p> <?php echo $a['movie_description']; ?></p>
                                    </div>
                            </div>
                    <?php 
                       $counter++;
                       if($counter==6)
                       {
                        break;
                       }
                        endforeach;
                        else: ?>
                 
                    <p>We currently do not have any movies from your selection.</p>
                 
                    <?php endif; ?>
                </div>
            </div>
    </div> 
    </body>
</html>



