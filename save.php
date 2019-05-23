<?php

require_once "connection.php";
$bulk=new MongoDB\Driver\BulkWrite;
echo "aici";
if(isset($_POST['submit'])) {
    $image="./PHP IMAGINI/". basename($_FILES['image']['name']);
 $data=array(
     '_id'=>new MongoDB\BSON\ObjectID,
    'Nume'=>$_POST['image_name'],
    
    'Img'=>$image,
    
    );
    echo 'Salut';
    
    $bulk->insert($data);
$client->executeBulkWrite('broderii.broderii',$bulk);

       header('location:shop.php');
   
}

    