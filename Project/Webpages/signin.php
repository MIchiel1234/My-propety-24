<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/MyCSS.css"/>  
    </head>
    <body>
        <?PHP require_once 'menu&&filter.php';?>
        <section id="main">
            <form method="POST" id="signin">
                <ol id="loginlist">
                    <li> Username:</li>
                    <li><input type="text" name="Username" value=""/><li>
                    <li>Password:</li> 
                    <li><input type="password" name="Password" value="" /></li>
                    <li><a href ="forgotpassword.php">Forgot Password/username?</a></li>
                    <li><input type="submit" value="Login" name="btnlogin" class="btn-primary"/></li>
                </ol>
            </form>
            <?PHP
            require_once '../PHPfunctionsect/conectToDb.PHP';
            if (isset($_POST['btnlogin'])) {
                $username = $_POST['Username'];
                $Passwordl = $_POST['Password'];
                if (empty($username) || empty($Passwordl)) {
                    echo "<div class= 'erorsdiv'>No empty fields please. ";
                    echo"Don't have a account <a href='singup.php'>click here</a>";
                    echo"</div>";
                } else {
                   $_SESSION['username']=$username;
                    $connObj->logintodb($username, $Passwordl);
                    $connObj->logindetailsdisplay($_SESSION['username']);
                    
                }
            }
            ?>
        </section>
    </body>
</html>
