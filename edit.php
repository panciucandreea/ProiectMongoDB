

<?php
       //include connection file
        include 'connection.php';
        
        $bulk = new MongoDB\Driver\BulkWrite;
        
        if(!isset($_POST["submit"])){
$id = new \MongoDB\BSON\ObjectId($_GET['ID']);
$filter = ['_id' => $id];
$query = new MongoDB\Driver\Query($filter);          
$article = $client->executeQuery('broderii.broderii', $query);
$doc = current($article->toArray());
        }else
            {
            /* $sql2="SELECT * FROM componente WHERE ID='{$_POST['id']}'"; 
            $result2=mysqli_query($con, $sql2);
            $rec=mysqli_fetch_array($result2);
            */
            
            if($_FILES["image"]['name']>0){
           $target="./PHP IMAGINI/".basename($_FILES['image']['name']);
           }else{
               $ids = new \MongoDB\BSON\ObjectId($_POST['id']);
$filters = ['_id' => $ids];
$querys = new MongoDB\Driver\Query($filters);          
$articles = $client->executeQuery('broderii.broderii', $querys);
$docs = current($articles->toArray());
           $target=$docs->Img;
           echo $target;
           } 
            
 $data=[
    
    'Nume'=>$_POST['nume'],
    
    'Img'=>$target,
    
    ];
 
 $id = new \MongoDB\BSON\ObjectId($_POST['id']);
$filter = ['_id' => $id];
    
$update=['$set'=>$data];
 $bulk->update($filter, $update);
  $client->executeBulkWrite('broderii.broderii',$bulk);
header('location:shop.php');
            
            
            
            
            
            
            
     /*       
 $sql2="SELECT * FROM componente WHERE ID='{$_POST['id']}'"; 
           $result2=mysqli_query($con, $sql2);
            $rec=mysqli_fetch_array($result2);
           
            $title=$_POST['nume'];
            $type=$_POST['tip'];
           //basename($_FILES['image']['name']);
          if(isset($_POST['image'])){
           $target="./PHP IMAGINI/".basename($_FILES['image']['name']);
           }else{
           $target=$rec['Img'];
           echo $target;
           } 
          
           $producator=$_POST['producator'];
           $description=$_POST['descriere'];
           $pret=$_POST['pret'];
$sql1="UPDATE componente SET Nume='{$title}',tip='{$type}', Img='{$target}', Pret='{$pret}', Producator='{$producator}', Descriere='{$description}' WHERE ID='{$_POST['id']}'";
           mysqli_query($con, $sql1) or die(mysqli_error($con));
           move_uploaded_file($_FILES['image']['tmp_name'],$target);
          header('Location:admin.php');
      */
        }
 ?>
<h1>Editati inregistrarea:</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <table align="center">
        
        <tr><td> Nume componenta:</td><td><input type="text" name="nume" value="<?php echo $doc->Nume ;?>"/></td></tr>
    
   <tr><td>  Imagine: </td><td><input type="file" name="image" id="image" value="<?php echo $doc->Img ;?>" height='200' width='200'></td></tr>
   
    <img src="<?php echo $doc->Img ;?> "height='200' width='200'><br/>
    
    <input type="hidden" name="id" value="<?php echo $_GET['ID']; ?>"/>
    
   <tr calspan="2"><td><input type="submit" name="submit" value="Edit"/></td></tr>
    </table>
</form>
