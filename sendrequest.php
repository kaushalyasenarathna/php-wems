


<?php
session_start();
include_once("config.php");

if(isset($_POST['submit']))
{
$branchid=$_POST['branchid'];
$reason=$_POST['reason'];
$datetime= date("YmdHis");
$workdate=$_POST['workdate'];
$requestid= $branchid.$datetime;
 
$sql = "INSERT INTO `request`(`workdate`,`branchid`,`reason`,requestid)VALUES(:workdate,:branchid,:reason,:requestid)";
$query = $dbh -> prepare($sql);
$query->bindParam(':workdate',$workdate,PDO::PARAM_STR);
$query->bindParam(':branchid',$branchid,PDO::PARAM_STR);
$query->bindParam(':reason',$reason,PDO::PARAM_STR);
$query->bindParam(':requestid',$requestid,PDO::PARAM_STR);
$query -> execute();
$_SESSION['req']=$requestid;
$_SESSION['reason']=$reason;
header("location:adduser.php");
    
 
}

 ?>

<!DOCTYPE html>
<html>
<head>
<title>ජාතික තරුණසේවා සභාව</title>
 <!-- Boostrap Link ******************************************************************************************************************** -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- Boostrap link ******************************************************************************************************************** -->
  
 
 <style type="text/css">
   .wrapper{

    margin-right:20rem;
   }
   .span8{
margin-left: 20rem;

   }
 </style>
</head>
<body>

 
  <?php include('nav.php');?>
       
  
    <div class="container">
       
       
</h3>
<br>
   <table class="table table-bordered table-wrap" cellpadding="3" >
    <form name="insert" action="" method="post">
       
 
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
           }
       ?>
   
  <tr>
    <th height="60" scope="row"  class="text-dark"><h2>Reason</h2></th>
    <td> 
      <input type="hidden" name="branchid" style="height:20px; width:1000px;" value="<?php  echo $row['branchid'];?>" class="form-control" required />
        <textarea class="span8" name="reason" rows="5" style="height:80px; width:300px;" placeholder="please Enter reason & Work date:">
        </textarea>   
        
</td>
       </tr>
       <tr><th height="60" scope="row"  class="text-dark"><h2>workdate  </h2> </th>
        <td align="center">   <input type="date" name="workdate" ></td></tr>
 
  <tr>
    <p></p>
    <p></p>
    <th height="60" scope="row">&nbsp;</th>
    <td align="center"><h2><input type="submit" value="Send" name="submit"    type="button" class="btn btn-dark" /></h2></td>
  </tr>

</table>

     </form>
 
     
</div>
 
 	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>