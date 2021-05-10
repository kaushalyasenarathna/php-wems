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
//.........................................................................

//........................................................................
 

 
if($lastInsertId>0)
{

echo "<script>alert('ADD User');</script>";
echo "<script>window.location.href='adduser.php';</script>";
}
else
{

echo "<script>alert('Data not inserted');</script>";
}

}

//......................................................................


if(isset($_POST['submit']))
{
// Get the userid
$userid=intval($_POST['userid']);

 
$requestid=$_SESSION['req'];
   
 
 
// Query for Query for Updation
$sql="update userdetails set requestid=:requestid where userid=:userid";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':requestid',$requestid,PDO::PARAM_STR);
 
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
// Query Execution
$query->execute();
 }
 //............................................................................

 ?>

<!DOCTYPE html>
<html>
<head>
<title></title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
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
        <h3><font color="red">User dateils</font>
</h3>
    
			 
      <table width="100%"  border="2"  cellspacing="5" cellpadding="14">
	  <tr>
      
	  <th><h4>User Id</h4></th>
	  <th><h4>User Name</h4></th>
	  <th><h4>Userposition</h4></th>
	  <th><h4>Branch</h4></th>
	  <th><h4>Date</h4></th>

	  <th>ADD</th>
  </h4>
	  </tr>
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
	  $abc=$_SESSION['req'] ; 
  
	  $sql = " Select
    userdetails.userid,
    userdetails.branch,
    userdetails.username,
     userdetails.creationDate,
      userdetails.userposition,
      userdetails.username,
    userdetails.requestid
From
    userdetails  where  requestid!= $abc And branch=$a";


 
	  $query = $dbh -> prepare($sql);
      $query -> execute();
      $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{

	  
	  ?>
	  
	   <tr>
	   <td align="center"   ><h4><?php echo $result -> userid; ?></h4>
	   	</td>
	  <td align="center"><h4><?php echo $result -> username ; ?></h4></td>
	  <td align="center"><h4><?php echo $result -> userposition ;?></h4></td>
	  <td align="center"><h4><?php echo $result -> branch ; ?></h4></td>
	     <td align="center"><h4><?php echo $result -> creationDate; ?></h4></td>
	     
<form method="post" id="myform">

				<td><input type="hidden" name="userid" value="<?php echo $result -> userid; ?>">
					<input type="hidden" name="req" value="<?php echo $_SESSION['req'] ;  ?>"> 
					<input type="hidden" name="requestid" value="<?php echo $_SESSION['req'] ;  ?>"> 

					<input   class="btn btn-primary" type="submit" name="submit" value="ADD"></td>

 
</form>
			
		

	     	  </tr>
<?php  }
}
 

?>
	  </table>
</div>
</div></div>
</div>
</div>
</div>
</div>
 
</body>
</html>