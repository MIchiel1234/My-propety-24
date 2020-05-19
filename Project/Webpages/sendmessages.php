<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="../css/popupcss.css" rel="stylesheet">
    
    </head>
    <body id="body" style="overflow:hidden;">
        <div id="abc">
          
            <div id="popupContact">
         
                <form action="#" id="form" method="post" name="form">
                   
                    <h2>Contact Us</h2>
                    <hr>
                    <input id="name" name="name" placeholder="Name" type="text">
                    <input id="email" name="email" placeholder="Email" type="text" name ="email">
                    <textarea id="msg" name="message" placeholder="Message"></textarea>
                    <a href="#" id="submit">Send</a>
                </form>
            </div>
           
        </div>
        <?php
        if(isset($_POST['message'])){
           require_once '../PHPfunctionsect/conectToDb.PHP';
           $mailer->mailer($_POST['Email']);
        }
        
        ?>
        
       
    </body>
   
</html>