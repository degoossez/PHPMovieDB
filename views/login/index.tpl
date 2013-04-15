<!DOCTYPE html>
 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
     
        <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>
         
        <h1><?php echo $title; ?></h1>
         
        <div align="left">  
             <form action="/login/check" method="post">  
                    <label>User Name:</label>
                    <input name="username" type="text" value="" size="9"><br>  
                    <label>Password :</label>
                    <input name="password" type="password" value="" size="9"><br>  
                    <input type="submit" name="loginFormSubmit" value="Log in">  
             </form>  
             <form action="/login/logoff" method="post">  
                    <input type="submit" name="logoffFormSubmit" value="Log Out">  
             </form>  
        </div>           
    </body>
</html>