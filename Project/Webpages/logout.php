<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         require_once 'menu&&filter.php';
      $_SESSION['username']=null;
       $_SESSION['pic'] = NULL;
       $headerinfo = "location:Home.php";
       header($headerinfo);
        ?>
    </body>
</html>
