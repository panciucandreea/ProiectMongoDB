<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>

    <title>Embroidery landscapes</title>

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.min.css" rel="stylesheet">

  </head>

  <body>
      

    <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Enjoy the little things!</span>
      <span class="site-heading-lower">Embroidery landscapes</span>
    </h1>

     <div class="topnav">
          <a  href="home.php">Home</a>
          <a href="about.php">About</a>
          <a href="products.php">Products</a>
          <a href="store.php">Store</a>
          <a href="contact.php">Contact</a>
          <a href="logout.phpt">LogOut</a>
</div>
    <div class="container-fluid">
   
    
<?php
       //include connection file



        include 'connection.php';
       $id=new \MongoDB\BSON\ObjectId($_GET['ID']);
$filter=['_id'=>$id];
$query=new MongoDB\Driver\Query($filter);
$article=$client->executeQuery("broderii.broderii",$query);
$doc= current($article->toArray());
             echo "Title:       ".$doc->Nume."<br/>";
             echo "Image: <br><br><br> <img src='".$doc->Img."' height='200' width='200' ><br/>";
             
      
     
      
            ?>
        <a href="shop.php">Back</a>
</div>
    
    

    <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">Copyright &copy;  Panciuc Andreea Mălina  2018</p>
        <audio controls autoplay>
            <source src="music/bts.mp3" type="audio/mpeg" >
  
            </audio>
      </div>
    </footer>

    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
