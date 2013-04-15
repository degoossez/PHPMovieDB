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
                  
        <?php
        if (isset($errors))
        {
            echo '<ul>';
            foreach ($errors as $e)
            {
                echo '<li>' . $e . '</li>';
            }
            echo '</ul>';
        }
         
        if (isset($saveError))
        {
            echo "<h2>Error saving data. Please try again.</h2>" . $saveError;
        }
        ?>

        <form action="/reg/save" method="post">
 
            <p>
                <label for="username">User Name:</label>
                <input value="<?php if(isset($formData)) echo $formData['username']; ?>" type="text" id="username" name="username" />
            </p>
                        
            <p>
                <label for="email">E-mail:</label>
                <input value="<?php if(isset($formData)) echo $formData['email']; ?>" type="text" id="email" name="email" />
            </p>
             
            <p>
                <label for="password">Password:</label>
                <input value="<?php if(isset($formData)) echo $formData['password']; ?>" type="password" id="password" name="password" />
            </p>
             
            <input type="submit" name="regFormSubmit" value="Send" />
        </form>
         
    </body>
</html>


