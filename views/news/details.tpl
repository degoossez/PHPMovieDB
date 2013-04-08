<!DOCTYPE html>
 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $movie_title; ?> | Article Details</title>
    </head>
    <body>
     
        <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
         
        <article>
            <header>
                <h1><?php echo $movie_title; ?></h1>
                <p>Published on: <time pubdate="pubdate"><?php echo $movie_time; ?></time></p>
            </header>
            <p>
                <?php echo $movie_description; ?>
            </p>
        </article>
         
        <a href="/">Back to article list</a>
         
    </body>
</html>