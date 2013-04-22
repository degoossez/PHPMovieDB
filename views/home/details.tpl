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
        <div class="span9">
            <header>
                <h1><?php echo $movie['movie_title'];?></h1>
            </header>
              <p>
            <div class="span6">
                   <?php $counter2=0; foreach ($actors as $act){ ?>
                   <a href="/home/actors/<?php echo($act['actor_id']);?>"><?php if($counter2!=0) { echo(" , "); };echo $act['actor_name']; ?>
                   <?php $counter2++; };?>
                   </a>
              </p>
                <div class="span3"><p>Duration:<?php echo $movie['movie_time']; ?></p></div>
                <div class="span6"> <?php if(!$av) { $av=0; };?> Rating: <?php for($counter=1;$counter<=($av/2);$counter++) { ?>
                  <a href="/home/addrating/<?php echo ($movie['movie_id'] . "." .($counter*2));?>"><i class="icon-star" ></i></a> 
                  <?php }; 
                  for($counter2=$av/2+1;$counter2>($av/2) && $counter2 < 6;$counter2++) { ?>
                  <a href="/home/addrating/<?php echo ($movie['movie_id'] . "." .($counter2*2));?>"><i class="icon-star-empty" ></i></a> 
                  <?php };?>
                </div>
            </div>
            <div class="span6">
              <p>
                <?php echo $movie['movie_description']; echo " " . $movie['movie_year']; ?>
                <br>
                <?php $counter=0; foreach ($moviegen as $movgen){ ?>
                <a href="/home/genres/<?php echo($movgen[0]['genre_id']);?>"><?php if($counter!=0) { echo(" , "); };echo $movgen[0]['genre_name']; ?>
                <?php $counter++; };?>
                </a>
                   <form action="/comment/addcomment/<?php echo $movie['movie_id']?>" method="post">  
                          <label>Comment :</label>
                          <div span="span12">
                          <textarea class="span12" rows="5" name="commentdata" type="text" value="" size="9"></textarea>  
                          </div>
                          <div span="span3">
                          <input type="submit" name="commentFormSubmit" value="Comment"> 
                          </div> 
                   </form>  
                    <div class="span9"> 
                        <h3>Comment section</h3>
                         <?php if($comments) { $counter=0; foreach ($comments as $c): ?>
                                  <p>
                                  <p><h4><?php echo $c[0]['comment_user']?></h4><strong><?php echo $c[0]['comment_date'] ?></strong></p>
                                  <em><?php echo '"' .$c[0]['comment_data'] . '"'; $counter++; ?><em>
                                  <p>
                                    <hr>
                          <?php 
                          endforeach; 
                        }
                        else {?>
                        <p><h4>There are no comments, be the first to place a comment!</h4></p>
                        <?php };?>
                      <a href="/">Back</a>        
                    </div> 
              </p>
              <br>
            </div>
            <div class="span5" align="right">
                <img src="<?php echo $movie['movie_pic']; ?>" hight="500" width="350">
            </div> 
        </div>      
    </div>
</div>

    </body>
</html>