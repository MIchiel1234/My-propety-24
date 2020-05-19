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
    <body>
        <?PHP require_once 'menu&&filter.php'; ?>
        <section id="main">
            <form method="POST" id="signin">
                <ol>   
                    <li>Username:<li><li><input type="text" name="Username" value="<?php $_SESSION['username'] ?>"/></li>
                    <li>last password you remeber:</li><li><input type="password" name="Password" value="" /></li>
                    <li> Email:</li><li><input type="text" name="email" value="" /></li>


                    <br ><li><input type="submit" value="Rest" name="btnlogin" class="btn-primary" /></li>
                </ol>
            </form>
            <?PHP
            require_once '../PHPfunctionsect/conectToDb.PHP';
            if (isset($_POST['btnlogin'])) {
                $connObj->recoverpassword($_POST['Username'], $_POST['Password']);
                $username = $_POST['Username'];
                $email = $_POST['email'];
                if (empty($username) || empty($email)) {
                    echo "Username and email can not be empty";
                }
                if (!@preg_match('/@/', $email) || !@preg_match('/./', $email)) {
                    echo "<div class ='erorsdiv'> Invaild Email</div>";
                } else {
                    $mailer->mailer($email);
                }
            }
            ?>
        </section>
    </body>
</html>
