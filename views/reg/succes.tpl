<!DOCTYPE html>
 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
     
        <?php include HOME . DS .  'includes' . DS . 'menu.inc.php'; ?>
         
        <h1><?php echo $title; ?></h1>
        <h2>Data stored:</h2>
         
        <?php if (!empty($userData['username'])): ?>
            <h3>First Name:</h3>
            <p><?php echo $userData['username']; ?></p>
        <?php endif;?>

        <h3>E-mail:</h3>
        <p><?php echo $userData['email']; ?></p>
         
    </body>
</html>


