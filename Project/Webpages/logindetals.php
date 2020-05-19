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

            <form name="Loginindetails" method="POST" enctype="multipart/form-data" id="Logindetails">

                <ol>
                    <li>UserName:</li><li><input type="text" name="username" value=""/><li>
                    <li>Email:</li><li><input type="text" name="Email" value=""/><li>
                    <li>Password:</li><li><input type="Password" name="password"value="" /></li>
                    <li>Confirm Password:</li><li><input type="Password" name="cpassword"value="" /></li>
                    <li>Security question:</li>
                    <li>
                        <select name="securityQ" style="color: black;">
                            <option>--Select your question --</option>
                            <?php
                            $Qesustions = array('Whats my Favroite Food?', 'My first pets name?', 'Where did my parents meet?', 'What was the first dish i leared to cook?', 'Whats my middel name?', 'The color of my first car?');
                            foreach ($Qesustions as $key => $value) {
                                echo "<option>$value</option>";
                            }
                            ?>
                        </select>
                    </li>
                    <li>Answer:</li>
                    <li><input type="text" name="SecA"value="" /></li>
                    <li>Choose a profile pic:</li>
                    <li><input type="file" name="profilepic" value="" /></li>
                    <li><input type="submit" value="sign up" name="btnlogin" class="btn-primary"/><li>
                </ol>
            </form>
            <?PHP
            if (isset($_POST['btnlogin'])) {
                $username = trim($_POST['username']);
                $Password = trim($_POST['password']);
                $confirm = trim($_POST['cpassword']);
                $securityQ = $_POST['securityQ'];
                $SecA = $_POST['SecA'];
                $email = $_POST['Email'];
                $Filename = $_FILES['profilepic']['name'];
                $filetype = $_FILES['profilepic']['type'];
                $tpm_name = $_FILES['profilepic']['tmp_name'];
                $errorcode = $_FILES['profilepic']['error'];
                $size = $_FILES['profilepic']['size'];
                $destination = "../uploadpfpic/$Filename";
                $errorsarray = array();
                if (empty($username) || empty($Password) || empty($SecA) || empty($email)) {
                    $errorsarray[] = "No empty Fields allowed";
                }

                if ($securityQ == '--Select your question --') {
                    $errorsarray[] = "Valid question is Reqiuererd";
                }
                if ($Password != $confirm) {
                    $errorsarray[] = "Invaild Email";
                }

                if (!@preg_match('/@/',$email )|| !@preg_match('/./',$email)){
                    $errorsarray[] = "Invaild Email";
                }

                $maxupload = 1024 * 1024 * 2;

                if ($errorcode != 0) {
                    $Filename = "default/jpeg";
                } else {

                    if ($filetype == "image/jpeg" || $filetype == "image/png"|| $filetype == "image/bimp") {

                        if ($size <= $maxupload) {

                            if (is_uploaded_file($tpm_name)) {

                                move_uploaded_file($tpm_name, $destination);

                                $_SESSION['pic'] = "<img src='$destination' >";
                            } else {
                                $errorsarray[] =  "some is hightjacking your session";
                            }
                        } else {
                            $errorsarray[] =  "file to large";
                        }
                    } else {
                       $errorsarray[] =  "only pics allowed";
                    }
                }
                if (count($errorsarray)!= 0) {
                    echo "<div class='errorsinsidemain'>";
                    foreach ($errorsarray as $key => $value) {
                        echo "$value<br >";
                    }
                    echo "</div>";
                } else {
                        
                    require_once '../PHPfunctionsect/conectToDb.PHP';
                    $connObj->adduserslogindetails($username,$Password,$destination,$securityQ,$SecA,$email,$_SESSION['type']);
                   if($connObj){
                         
                        $headerinfo = "location:signin.php";
                        header($headerinfo);
                    }
                }
            }
            ?>
        </section>
    </body>
</html>
    