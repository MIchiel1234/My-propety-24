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
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/MyCSS.css"/>  
    </head>
    <script>
    function onclickstar(){
        document.getElementById("star").setAttribute("id","starclicked");
    }
   
    
    
    </script>
    
    <body>
        <?PHP require_once 'menu&&filter.php'; ?>
        <section id="main">
             
                <?PHP require_once '../PHPfunctionsect/conectToDb.PHP';
                $connObj->viewhouse();
                 
                ?>
        </section>
    </body>
</html>
