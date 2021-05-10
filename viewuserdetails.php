 <?php
include_once("config.php");
session_start();


if(isset($_POST['submit']))
{
$userid=$_POST['userid'];
$req=$_SESSION['req'] ;                                                    
 
$sql = "INSERT INTO `working`(`userid`, `requestid`)VALUES(:userid,:req)";
$query = $dbh -> prepare($sql);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':req',$req,PDO::PARAM_STR);
 
$query -> execute();
$lastInsertId = $dbh->lastInsertId();

 

 
if($lastInsertId>0)
{

echo "<script>alert('ADD User');</script>";
echo "<script>window.location.href='viewuserdetails.php';</script>";
}
else
{

echo "<script>alert('Data not inserted');</script>";
}

}

 ?>

<!DOCTYPE html>
<html>
<head>
<title></title>
  
    
   <style type="text/css">
       #link {
      text-decoration: none;
      position: absolute;
      top:180px;
      right: 600px;
      font-size: 30px;
      color: black;
    
    }
</style>
</head>
<body>

 
  <?php include('nav.php');?>  
      
  
   

     <div class="wrapper">
 
    <div class="container">
      <div class="row">
      
      <div class="span8">
          <div class="content">

            <div class="module">
             
       <div class="module-body">
       
</h3>
    
       
 
     <table  class="table text-primary">
    <tr>
      
    <th><h4><p align="center">User Id</p></h4></th>
    <th><h4><p align="center">User Name</p></h4></th>
    <th><h4><p align="center">Userposition</p></h4></th>
    <th><h4><p align="center">Branch</p></h4></th>
    <th><h4><p align="center">Date</p></h4></th>
    <th><h4><p align="center">Update</p></h4></th>
   
  </h4>
   <?php 
       
       
       ob_start();
        
require 'common.php';
 $abc=$_SESSION['user'] ; 
    $sql = " Select
    vhusers.id,
    vhusers.username,
    vhusers.branchid
From
    vhusers where id= $abc";


 
    $query = $db -> prepare($sql);
      $query -> execute();
     $results=$query->fetchAll();

foreach($results as $row)
{
     
        // echo $row['branchid'];
    }
    
 $a=$row['branchid'];

    $sql = "SELECT * FROM userdetails where branch=$a "; 
    $query = $db -> prepare($sql);
      $query -> execute();
      $results = $query -> fetchAll(PDO::FETCH_OBJ);
    
if($query -> rowCount() > 0)
{
foreach($results as $result)
{

 $_SESSION[`userid`]=$result -> userid;
   
    ?>
    
     <tr>
     <td class="text-dark" ><?php echo $result -> userid; ?>
      </td>
    <td  class="text-dark"><?php echo $result -> username ; ?></td>    
    <td class="text-dark"><?php echo $result -> userposition ;?></td>
    <td class="text-dark"><?php echo $result -> branch ; ?></td>
    <td class="text-dark"><?php echo $result -> creationDate; ?>  <input type="hidden"  value="<?php echo $result -> userid; ?>"</td>

     
  
 
                  
    <td><a href="edit.php?code=<?php echo $result -> code;  ?>"><input type="submit" name="update" value="update" class="btn btn-dark"></a>&nbsp;&nbsp;

          </tr>
<?php  }
}
 

?>

  <form method="_POST">
<input type="hidden"  value="<?php echo$$result -> userid; ?>" name="">
</form>
    </table>
</div>
</div></div>
</div>
</div>
</div>
</div>
 
</body>
</html>