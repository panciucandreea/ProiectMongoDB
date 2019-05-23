<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search a item</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>




    <br>
    
<form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
     Search:<input type="text" name="nume" value="" />
     <input type="submit" name="search" value="Search the table">
     <input type="reset" value="Reset">
     
     
     
 </form>
<?php
include "connection.php";
/*
$sql="SELECT * FROM componente ";
if(isset($_POST["search"])){
$search_term= mysqli_real_escape_string($con,$_POST["search_box"]);
$sql.="WHERE Nume='{$search_term}'";
$sql.="OR Producator='{$search_term}'";
}
 $query= mysqli_query($con, $sql)or die(mysqli_error($con));*/
if(isset($_POST["search"])){
$nume=$_POST['nume'];
echo "<br><br><br><br><br><br>";
//if($nume!=NULL){

$filter=['Nume'=>$nume];
$query=new MongoDB\Driver\Query($filter);
$article = $client->executeQuery("broderii.broderii", $query);
$doc = $article->toArray();
if($doc){


?>


  <table width="70" cellpadding="4" cellspace="4" align="center">
            <tr>
                <th>Nume</th>
                <th>Imagine</th>
                
                
               
                
            </tr>
           <?php foreach($doc as $val):?> 
            <tr>
                <td><?php echo $val->Nume; ?></td>
                
                <td><img src="<?php echo $val->Img; ?>" height="100" width="100"></td>
                
                 </tr>
             <?php endforeach;?>
        </table>
<?php }}?>


</body>
</html>