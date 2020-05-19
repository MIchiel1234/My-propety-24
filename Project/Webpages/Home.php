<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>E-Kay</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/MyCSS.css"/>       
    </head>
    <body>                     
        <?php require_once 'menu&&filter.php';?>
        
      

        <section id="main">

            <div id="houseslide"  class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#houseslide" data-slide-to="0" class="active"></li>
                    <li data-target="#houseslide" data-slide-to="1"></li>
                    <li data-target="#houseslide" data-slide-to="2"></li>
                    <li data-target="#houseslide" data-slide-to="3"></li>
                    <li data-target="#houseslide" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="../media/housepic1.jpg" alt="Wood cabins">
                        <div class="carousel-caption">
                            <h1>Welcome to E-kay</h1>
                        </div>
                    </div>

                    <div class="item">
                        <img src="../media/housepic2.jpeg" alt="woodcabins">
                        <div class="carousel-caption">
                            <h2>Want a Wood cabin?</h2>
                        </div>
                    </div>

                    <div class="item">
                        <img src="../media/housepic3.jpeg" alt="woodcabins">
                        <div class="carousel-caption">
                            <h2>E-kay the best place for all your cabin needs</h2>
                        </div>
                    </div>


                    <div class="item">
                        <img src="../media/housepic4.jpeg" alt="woodcabins">
                        <div class="carousel-caption">
                            <h2>Intrested? contact one of our agents</h2>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../media/housepic5.jpeg" alt="woodcabins">
                        <div class="carousel-caption">
                            <h2>Buy your wood cabins now!!!!!</h2>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#houseslide" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

                </a>
                <a class="right carousel-control" href="#houseslide" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </section>

        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>


    </body>
</html>
