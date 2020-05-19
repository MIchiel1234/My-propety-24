<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/MyCSS.css"/>
        <title></title>
    </head>
    <body>
         <?PHP require_once 'menu&&filter.php'; ?>
        <section id="main">
        <?php
      if(isset($_POST['btnupdate']))
        {
            $id = $_POST['id'];
            $price = $_POST['price'];
            $deposid = $_POST['Deposit'];    
           $region = $_POST['Region'];
           $des = $_POST['Descrition'];
           require_once '../PHPfunctionsect/conectToDb.PHP';
           $connObj->Editthelissing($id,$region,$price,$deposid,$des);  
        }
        if(isset($_POST['delet'])){
            $id = $_POST['id'];
             require_once '../PHPfunctionsect/conectToDb.PHP';
             $connObj->deletlisting($id);
        }
        ?>
         </section>
    </body>
</html>
