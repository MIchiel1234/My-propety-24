<?php ob_start(); ?>
<header <?php session_start(); ?>>
    <nav>
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="Availablehouses.php">Available house's</a></li>
            <li><a href="aboutus.php">About us</a></li>
            <li><a href="#" onclick="window.open('sendmessages.php', 'popupContact_parent', 'width=2000,height=1500');">contact us</a></li>
            <li><a href="agents.php">Your Retail agents</a></li>
            <li><a href="signin.php">sign in</a></li>
            <li><a href="singup.php">sign up</a></li>
            <li> <div id="profifle">
                    <?php
                    $username = $_SESSION['username'];
                   
                    if (empty($username)) {
                        require'../PHPfunctionsect/conectToDb.PHP';
                        $connObj->logindetailsdisplay($username);
                    } else {
                       
                            require '../PHPfunctionsect/conectToDb.PHP';
                            $connObj->logindetailsdisplay($username);
                        }
                        ?>
                </div>  
            </li>
        </ul>

        </div>
    </nav>
</header>
<section id="search">
    <form name="Filterform" method="POST" enctype="multipart/form-data" action= "viewfillterresluts.php">
        <select name="Selectprovince">
            <option>--Select a province--</option>
            <option>The Eastern Cape</option>
            <option>The Free State</option>
            <option>Gauteng</option>
            <option>KwaZulu-Natal</option>
            <option>Limpopo</option>
            <option>Mpumalanga</option>
            <option>The Northern Cape</option>
            <option>North West</option>
            <option>The Western Cape</option>
        </select>
        <select name="Selecpricerange">
            <option>--Select a price range--</option>
            <option> less than R100000</option>
            <option>R100000-R240000</option>
            <option>R250000-R400000</option>
            <option>R410000-R500000</option>
            <option>500000+</option>
        </select>
        <select name="Selectimeinmarket">
            <option>--Time in market--</option>
            <option>less than 1 month</option>
            <option>1-3 month</option>
            <option>4-6 month</option>
            <option>7-9 month</option>
            <option>10-12 month</option>
            <option>more than 1 year</option>       
        </select>
        <select name="Selecagentselling">
            <option>--Agent selling--</option>
            <option>Tim Doe</option>
            <option>Angelina Maticza</option>
            <option>Tanya Du Pless</option>       
        </select>
        <input type="submit" value="Fillter" name="Filterdata" />
    </form>
</section>
  <?PHP
    
    if(isset($_POST['Filterdata'])){
      $region=$_POST['Selectprovince'];
      $_SESSION['region'] = $region;
      
   }
    ?>
<section id="add">
        <h1>Want to build<br/>
        own cabin?<br/>
        click here and<br/>
        ask one<br/>
        of our wood <br/>
        cabin specialist<br/>
        for advice</h1>
 
</section>
<section id="news">
    <ul>
        <h3>Latest News</h3>
        <li><a href="https://www.property24.com/articles/you-can-now-invest-in-mauritian-property-from-r22m/25489" target="_blank">Invest in mauritian property from R22 million</a></li>
        <br/>
        <li><a href="https://www.property24.com/articles/great-property-investment-opportunities-in-joburgs-dunkeld-west/25487" target="_blank">Great investment opportunities in joburgs</a></li>
        <br/>
        <li><a href="https://www.property24.com/articles/great-property-investment-opportunities-in-joburgs-dunkeld-west/25487" target="_blank">2017 set to be tough for SA’s commercial property market</a></li>
        <br/>
        <li><a href="https://www.property24.com/articles/new-apartments-on-cape-towns-bree-street-selling-from-r15m/25483" target="_blank">New apartments on Cape Town’s Bree Street selling from R1.5m</a></li>
        <br/>
        <li><a href="https://www.property24.com/articles/buyers-just-cant-get-enough-of-cape-towns-city-bowl-property/25468" target="_blank">Buyers just can't get enough of Cape Town’s City Bowl property</a></li>
        <br/>
        <li><a href="https://www.property24.com/articles/2-income-generating-aparments-in-stellenbosch-up-for-auction/25478" target="_blank">income-generating aparments in Stellenbosch up for auction</a>
    </ul>
</section>



