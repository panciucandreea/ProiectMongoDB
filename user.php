<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>User</title>
    </head>
    <body>
        <?php
       
              if(isset($_POST["submit"]))
                  if($_POST["username"]="admin"){
          
                  
                  
              echo "Click <a href='home.php' > here </a> to visit our website!";
              echo "Click here to <a href='logout.php'>Logout.</a>";
              
              
          }
          else{
              header("Location:login.php");
          }
        ?>
    </body>
</html>
