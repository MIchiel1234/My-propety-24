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

            <form name="addlistings" method="POST" enctype="multipart/form-data" id="Logindetails">

                <ol>
                       <li>Region:</li>
                    <li>
                    <select name="region" style="color: black;">
                        <option>--Select your Region--</option>
                        <?php
                        $regions = array('The Eastern Cape', 'The Free State', 'Gauteng', 'KwaZulu-Natal', 'Limpopo', 'Mpumalanga', 'The Northern Cape', 'North West', 'The Western Cape');
                        foreach ($regions as $key => $value) {
                            echo "<option>$value</option>";
                        }
                        ?>
                    </select>
                    </li>
                    <li>Selling price:</li>
                    <li><input type="text" name="Price" value="" /></li>
                    <li>DO you want deposit:</li>
                    <li>

                        <ol>
                            <li>Yes</li>
                            <li><input type="radio" name="willingtopaydeposit" checked="checked" value="Yes" /></li>
                            <li>No</li>
                            <li><input type="radio" name="willingtopaydeposit" value="No" /></li>
                        </ol>

                    </li>
                    <li>Choose a picture to show off your house:</li>
                    <li><input type="file" name="profilepic" value="" /></li>
                    <li>A short description of the house</li>
                    <li><textarea name="Descrition" rows="4" cols="20">
                        </textarea>
                    </li>
                    <li><input type="submit" value="put it up for sales" name="addlisting" class="btn-primary"/><li>
                </ol>
            </form>
            <?PHP
            if (isset($_POST['addlisting'])) {
               $region = $_POST['region'];
               $price  = $_POST['Price'];
               $deposit = $_POST['willingtopaydeposit'];
               $Descrition = $_POST['Descrition'];
                $Filename = $_FILES['profilepic']['name'];
                $filetype = $_FILES['profilepic']['type'];
                $tpm_name = $_FILES['profilepic']['tmp_name'];
                $errorcode = $_FILES['profilepic']['error'];
                $size = $_FILES['profilepic']['size'];
                $destination = "../avalablehouses/$Filename";
                $errorsarray = array();
                $maxupload = 1024 * 1024 * 2;
                if($region == '--Select your Region--'){
                    $errorsarray[] = "Please select a region";
                }
                if(!is_numeric($price)){
                    $errorsarray[] = "Only numbers in allowed for price";
                }
                if(empty($price)){
                    $errorsarray[] ="Price is maditory" ;
                }
                if(!isset($deposit)){
                   $errorsarray[] = "Please select a i you want a deposit"; 
                }
                if(empty($Descrition)|| @preg_match('/*/') || @preg_match('/``/') ){
                    $errorsarray = "Some invaild charters were found no * or `` is allowed" ;
                }
                if ($errorcode != 0) {
                    $errorsarray[] = "A picture is requerded";
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
                    $connObj->addlistings($region,$price,$deposit,$_SESSION['username'],$Descrition,$destination);

                   if($connObj){
                         
                       $headerinfo = "location:Home.php";
                       header($headerinfo);
                    }
                }
            }
            ?>
        </section>
    </body>
</html>
    