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

            <form  method="POST" id="signup">
                <ol>
                    <li>Name:</li><li><input type="text" name="name" value="" placeholder="e.g John"/><li>
                    <li>Surname:</li><li><input type="text" name="Surname"value="" placeholder="e.g Doe" /></li>
                    <li>Age:</li>
                    <li>
                        <select name="Age" style="color: black;">
                            <option>--Select your age--</option>
                            <?PHP
                            for ($index = 21; $index < 101; $index++) {
                                echo "<option>$index</option>";
                            }
                            ?>
                        </select>
                    </li>
                    <li>Type of User:</li>
                    <li> <select name="type" style="color: black;">
                            <option>--Select A type user--</option>
                            <option>Selling</option>
                            <option>Buying</option>
                        </select>
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
                    <li>Banking Name:</li>
                    <li>
                        <select name="bank" style="color: black;">
                            <option>--Select your bank--</option>
                            <?PHP
                            $banknames = array('Absa Bank Limited', 'Albaraka Bank Limited', 'Habib Overseas Bank', 'Limited Habib Bank', 'AG Zurich Mercantile Bank', 'Limited South African Bank of Athens Limited');
                            foreach ($banknames as $key => $value) {
                                echo "<option>$value</option>s";
                            }
                            ?>
                        </select>
                    </li>
                    <li>Payment Method:</li>
                    <li>
                        <select name="payment" style="color: black;">
                            <option>--Choose payment Method--</option>
                            <option>Cash</option>
                            <option>Bank loan</option>
                        </select>
                    </li>
                    <li>Willing to pay deposit:</li>
                    <li>

                        <ol>
                            <li>Yes</li>
                            <li><input type="radio" name="willingtopaydeposit" checked="checked" value="Yes" /></li>
                            <li>No</li>
                            <li><input type="radio" name="willingtopaydeposit" value="No" /></li>
                        </ol>

                    </li>

                    <li><input type="submit" value="sign up" name="btnlogin" class="btn-primary"/><li>
                </ol>
            </form>
            <?PHP
            if (isset($_POST['btnlogin'])) {
                $Name = trim($_POST['name']);
                $Surname = trim($_POST['Surname']);
                $Age = $_POST['Age'];
                $typeofuser = $_POST['type'];
                $Region = $_POST['region'];
                $bankname = $_POST['bank'];
                $payment = $_POST['payment'];
                $errors = array();
                if (empty($Name) || empty($Surname)) {
                    $errors[] = "No empty Fields allowed";
                }
                
                if ($Age == '--Select your age--') {
                    $errors[] = "Valid age requeride";
                }
                if ($typeofuser == '--Select A type user--') {
                    $errors[] = "select a type of user";
                }
                if ($Region == '--Select your Region--') {
                    $errors[] = "Valid region is Reqierd";
                }
                if ($bankname == '--Select your bank--') {
                    $errors[] = "Select a bank";
                }
                if ($payment == '--Choose payment Method--') {
                    $errors[] = "payment Metho is requeride";
                }
                if (isset($_POST['willingtopaydeposit'])) {
                    $Willing = $_POST['willingtopaydeposit'];
               } else {
                  $errors = "Willing to pay a deposit is madirory";
               }
                if (count($errors)== 0) {
                    require_once '../PHPfunctionsect/conectToDb.PHP';
                    $_SESSION['type'] = $typeofuser;
                    $connObj->adduser($Name, $Surname, $Region, $bankname, $Willing, $payment, $Age);
                    if($connObj){
                         
                        $headerinfo = "location:logindetals.php";
                        header($headerinfo);
                    }
                } else {
                     echo "<div class='errorsinsidemain'>";
                    foreach ($errors as $key => $value) {
                        echo "$value<br >";
                    }
                    echo "</div>";
                   
                }
            }
            ?>
        </section>
    </body>
</html>
