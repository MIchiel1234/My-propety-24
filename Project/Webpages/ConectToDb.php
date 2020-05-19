<?php

class ConectToDb {

    public $host, $username, $password, $link, $database;

    function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    function conecttouserdb() {
        $this->link = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if ($this->link) {
            $conceted = TRUE;
        } else {
            $conceted = FALSE;
        }
    }

    function adduser($Fullname, $Surname, $Region, $BankingName, $paydepositornot, $CashorBAnkloan, $age) {
        $query = "INSERT INTO `users_details` (`Userreg_ID`, `Users_FullName`, `USers_Surname`, `User_Region`, `Users_BankingName`, `USersWillingtoPaydepostitoraccept`, `Cash_or_Bankloan`, `Age`) VALUES (NULL, '$Fullname', '$Surname','$Region', '$BankingName', '$paydepositornot', '$CashorBAnkloan', '$age');";
        $reslut = mysqli_query($this->link, $query);
        if ($reslut) {
            $savedata = TRUE;
        } else {
            $savedata = FALSE;
        }
    }

    function adduserslogindetails($Username, $Password, $profiflepic, $secq, $seca, $email, $typeofuser) {
        $insertqry = "INSERT INTO `users_logindetails` (`Logindetails_ID`, `UserName`, `Password`, `Profilepic`, `Sec_Qeustion`, `Sec_Answer`, `User_email`, `Type_of_user`) VALUES (NULL, '$Username', '$Password', '$profiflepic', '$secq', '$seca', '$email', '$typeofuser');";
        $result = mysqli_query($this->link, $insertqry);
        if ($result) {
            $savedthedata = TRUE;
        } else {
            $savedthedata = FALSE;
        }
    }

    function logintodb($username, $password) {
        $query = "SELECT * FROM `users_logindetails` WHERE `UserName` LIKE '$username' AND `Password` LIKE '$password'";
        $reslut = mysqli_query($this->link, $query);
        $row = mysqli_fetch_array($reslut, 1);
        if ($username == $row['UserName'] && $password == $row['Password']) {
            $headerinfo = "location:home.php";
            header($headerinfo);
        } else {
            echo "<div class= 'erorsdiv'>Username or Password does not match please try again </div>";
        }
    }

    function logindetailsdisplay($username) {
        $query = "SELECT * FROM `users_logindetails` WHERE UserName like '$username'";
        $reslut = mysqli_query($this->link, $query);
        while ($row = mysqli_fetch_array($reslut, 1)) {

            $username = $row['UserName'];
            $pic = $row['Profilepic'];
            $type = $row['Type_of_user'];


            if ($type == "Selling") {
                echo "<img src='$pic' id='profilepic' style='border-radius: 500px;width: 30px;height: 30px;'/> <b><style='color:black;'> $username</b>    <a href = 'logout.php'>logout | <a href='mylistings'>Edit Listings here</a>  <a href='addlisting.php'>add a listing</a>";
            } else {
                echo "<img src='$pic' id='profilepic' style='border-radius: 500px;width: 30px;height: 30px;'/> <b>$username</b>    <a href = 'logout.php'>logout | <a href='mylistings'>view favrouts here</a>";
            }
        }
    }

    function viewhouse() {
        $qeury = "SELECT * FROM `available_houses`";
        $result = mysqli_query($this->link, $qeury);
        $count = 1;
        while ($row = mysqli_fetch_array($result, 1)) {
            $id = $row['House_ID'];
            $counter = $count++;
            $idstring = "id" . $counter;
            $price = $row['House_SellingPrice'];
            $depositornot = $row['House_depositornot'];
            $descrition = $row['Descrtion'];
            $loginguser = $row['Logindetails_username'];
            $Picutre = $row['Picutre'];
            $Region = $row['House_Region'];

            echo "<img src='$Picutre'style='height: 300px; width: 300px;'/>";
            echo "<div id='avalablehousestext'>";
            echo "<div id='star' onclick = 'onclickstar()' ></div>";
            echo "R $price <br >  Region : $Region<br > add placed by: $loginguser <br >";
            if ($depositornot == "Yes") {
                echo "The seller of this House does want a Deposit";
            } else {
                echo "The seller of this House does not want a Deposit";
            }
            echo "<br >$descrition";
            echo "  <div id='googleMap'style='width: 40%; height: 100px; position: relative; overflow: hidden;'></div>";
            echo "
<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
};
var map=new google.maps.Map(document.getElementById('googleMap'),mapProp);
}
</script>

<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyA8PO2_oZY8I3E5P_CB6ND2TE0SiwM63x4&callback=myMap'></script>";
            echo "</div>";
            echo "<br >";
        }
    }

    function edidtthlisting($username) {
        $qeury = "SELECT * FROM `available_houses` WHERE `Logindetails_username` LIKE '$username'";
        $result = mysqli_query($this->link, $qeury);

        $count = 1;
        while ($row = mysqli_fetch_array($result, 1)) {

            $id = $row['House_ID'];
            $counter = $count++;
            $idstring = "id" . $counter;
            $price = $row['House_SellingPrice'];
            $depositornot = $row['House_depositornot'];
            $loginguser = $row['Logindetails_username'];
            $Picutre = $row['Picutre'];
            $Region = $row['House_Region'];
            $Description = $row['Descrtion'];

            echo "<img src='$Picutre'style='height: 300px; width: 300px;'/><br >";
            echo" <div id = editform>";
            echo"<form action='editform.php' method='POST' enctype='multipart/form-data'>";
            echo "<input type='hidden' name='id' value='$id' />";
            echo "R <input type='text' name = 'price' value='$price'/><br ><br >";
            echo "Region:<select name = 'Region'>";

            $regions = array('The Eastern Cape', 'The Free State', 'Gauteng', 'KwaZulu-Natal', 'Limpopo', 'Mpumalanga', 'The Northern Cape', 'North West', 'The Western Cape');
            foreach ($regions as $key => $value) {
                if ($Region == $value) {
                    echo "<option selected>$value</option>";
                } else {
                    echo "<option>$value</option>";
                }
            }
            echo "</select><br > <br >";
            echo "Deposit: <br >"
            . "<input type= 'radio'";
            if ($depositornot == "Yes") {
                echo "checked";
            } echo " name= 'Deposit' value='Yes' />Yes<br /><input type= 'radio' ";
            if ($depositornot == "No") {
                echo "checked";
            } echo " name= 'Deposit' value='No' />No<br />";
            echo "<br > <textarea name='Descrition' rows='4' cols='20'>$Description </textarea><br ><br > ";
            echo "<input type='submit' value='eddit' name='btnupdate' class='btn-primary'/><br >";
            echo "<br > <input type='submit' value='deledelt' name='delet' class='btn-primary'/>";
            echo "</form>";
            echo "</div>";
        }
    }

    function Editthelissing($id, $Region, $price, $depsosit, $DES) {
        $query = "UPDATE `available_houses` SET `House_Region` = '$Region', `House_SellingPrice` = '$price', `House_depositornot` = '$depsosit',`Descrtion` = '$DES' WHERE `available_houses`.`House_ID` = $id;";
        $reslut = mysqli_query($this->link, $query);
        if ($reslut) {
            $updated = TRUE;
        } else {

            $updated = FALSE;
        }
    }

    function deletlisting($id) {
        $query = "DELETE FROM `available_houses` WHERE `available_houses`.`House_ID` = $id ";
        $reslut = mysqli_query($this->link, $query);
        if ($reslut) {
            $updated = TRUE;
        } else {

            $updated = FALSE;
        }
    }

    function addlistings($Region, $price, $depsosit, $loginusername, $DES, $picture) {
        $query = "INSERT INTO `available_houses` (`House_ID`, `House_Region`, `House_SellingPrice`, `House_depositornot`, `Logindetails_username`, `Picutre`, `Descrtion`) VALUES (NULL, '$Region', '$price', '$depsosit', '$loginusername', '$picture', '$DES');";
        $reslut = mysqli_query($this->link, $query);
    }

    function dispalyagents() {
        $qeury = "SELECT * FROM `agents` ";
        $result = mysqli_query($this->link, $qeury);
        $count = 1;
        while ($row = mysqli_fetch_array($result, 1)) {
            $counter = $count++;
            $idstring = "id" . $counter;
            $id = $row['Agent_ID'];
            $Name = $row['Agent_Name'];
            $surname = $row['Agent_Surname'];
            $Password = $row['Agent_password'];
            $Status = $row['Agent_Status'];
            $pic = $row['Pic'];
            $Region = $row['Agent_Regions'];
            echo "<div id='agents'>";
            echo "<img src='$pic'/><br >$Name $surname <br > This agent has a:$Status status<br > Region Responable : $Region ";

            echo "</div>";
        }
    }

    function recoverpassword($username, $password) {
        $query = "SELECT * FROM `users_logindetails` WHERE `UserName` LIKE '$username' AND `Password` LIKE '$password'";
        $reslut = mysqli_query($this->link, $query);
        $row = mysqli_fetch_array($reslut, 1);
        if ($username == $row['UserName'] && $password == $row['Password']) {
            echo "<div id='thepasswordisoky'>The details you entered match</div>";
        } else {
            echo "<div class= 'erorsdiv'>password reset link will be send now</div>";
        }
    }

    function mailer($email) {
        mail($email, 'Password Reset Reqeust', "<a href= 'rest password'>Rest your passord here</a> ");
    }

    function filterRegion($Region) {

        $qeury = "SELECT * FROM `available_houses` WHERE `House_Region`LIKE '$Region'";

        $result = mysqli_query($this->link, $qeury);
          $count =  mysqli_num_rows($result);
          if($count == 0){echo "<div id = 'noreslut'>No Reslute</div>";}
       
         while ($row = mysqli_fetch_array($result, 1)) {
                $id = $row['House_ID'];
                $price = $row['House_SellingPrice'];
                $depositornot = $row['House_depositornot'];
                $descrition = $row['Descrtion'];
                $loginguser = $row['Logindetails_username'];
                $Picutre = $row['Picutre'];
                $Region = $row['House_Region'];
                echo "<img src='$Picutre'style='height: 300px; width: 300px;'/>";
                echo "<div id='avalablehousestext'>";
                echo "<div id='star'onclick = 'onclickstar()'></div>";
                echo "R $price <br >  Region : $Region<br > add placed by: $loginguser <br >";
                if ($depositornot == "Yes") {
                    echo "The seller of this House does want a Deposit";
                } else {
                    echo "The seller of this House does not want a Deposit";
                }
                echo "<br >$descrition";
                echo "  <div id='googleMap'style='width: 40%; height: 100px; position: relative; overflow: hidden;'></div>";
            }
     
    }

}

$connObj = new ConectToDb('localhost', 'E-Kay_User', 1234, 'e-kay');
$connObj->conecttouserdb();
