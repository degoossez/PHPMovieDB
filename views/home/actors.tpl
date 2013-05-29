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
                    <form  action="/home/search" method="post">
                        <input class ="span8" name="searchquery" type="text" value="" placeholder="Type here">
                         <button type="submit" class="btn" name="searchFormSubmit" value="Search">Search</button> 
                    </form>
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
            <div class="span9">
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
            <div class="span7" style="margin-left: 50px">
              <h2 ><?php echo $actor['actor_name'];?></h2>
              <div class="span3">
                <img src="<?php echo $actor['actor_pic']; ?>" hight="250" width="150">                
              </div>
              <div class="span3">
                <?php echo $actor['actor_birth'];?>
              </div>
            </div>
            <div class="span3">
              <h4>Movie List</h4>
               <?php foreach ($movies as $a): ?>
                        <p>
                        <dt>
                        <ul><a href="/home/details/<?php echo $a['movie_id']; ?>" style="color:black; font-size:15px;"><?php echo $a['movie_title'] ." (".$a['movie_year'].")"; ?></a></ul>
                        </dt>
                        <p>
                <?php 
                endforeach; ?>
            </div>
          </div>
        </div>
          </div>
      </div>
         
    </body>
</html>