
<html>
    <head>
        <meta charset="UTF-8">
        <title>E-Kay</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/MyCSS.css"/>       
    </head>
    <body>                     
        <?php require_once 'menu&&filter.php';?>
        <section id="main">
            <?PHP
           $seesionusername =  $_SESSION['username'];
             require_once '../PHPfunctionsect/conectToDb.PHP';
             $connObj->edidtthlisting($seesionusername);
           ?>
            
        </section>

    </body>
</html>
<?php
