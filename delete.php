<?php
require_once 'connection.php';
$bulk = new MongoDB\Driver\BulkWrite;
$id = new \MongoDB\BSON\ObjectId($_GET['ID']);
$filter = ['_id' => $id];
$bulk->delete($filter);
$client->executeBulkWrite('broderii.broderii',$bulk);
header('location:shop.php');
?>


