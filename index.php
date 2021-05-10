<?php
include_once 'config.php';
session_start();
if (isset($_POST['submit'])) {
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $userposition = $_POST['userposition'];
    $branch = $_POST['branch'];
    $sql = 'INSERT INTO `userdetails`(`userid`, `username`, `userposition`, `branch`)VALUES(:userid,:username,:userposition,:branch)';
    $query = $dbh->prepare($sql);
    $query->bindParam(':userid', $userid, PDO::PARAM_STR);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':userposition', $userposition, PDO::PARAM_STR);
    $query->bindParam(':branch', $branch, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId > 0) {
        echo "<script>alert('Data inserted');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Data not inserted');</script>";
    }
}
 ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<!--   <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link type="text/css" href="css/theme.css" rel="stylesheet">
  <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet"> -->
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
	 <style type="text/css">
       #link {
      text-decoration: none;
      position: absolute;
      top:180px;
      right: 600px;
      font-size: 30px;
      color:darkblue;
    
    }
 
</style>
 
</head>
<body >
  
   
          <br>
</h3>
<div class="container">
  <table  class="table ">
    <form class="info" name="insert" action="" method="post" id="link" class="form-row">
     
  <tr>
    <th width="26%" height="40" scope="row"  class="text-primary"><h2>User ID :</h2></th>
    <td width="74%"><h2><input type="text" name="userid" style="height:80px; width:400px;" class="form-control" required /></h2></td>
  </tr>
  <tr>
    <th height="60" scope="row"  class="text-primary"><h2>User Name :</h2></th>
    <td><h2><input type="text" name="username" value=""  style="height:80px; width:400px;" class="form-control" required /></h2></td>
  </tr>
  <tr>
    <th height="60" scope="row"  class="text-primary"><h2>Position</h2></th>
 <td>
<select name="userposition"   class="text-primary" style="height:50px; width:400px;" >
<option  class="text-primary"><h3>Director</h3></option>  
<option  class="text-primary"><h3>Lecture</h3></option>
</select>
    </td>
  </tr>
  <br>
  <tr>
    <th height="60" scope="row"  class="text-primary"> <h2>branch</h2></th>
 <td>
     <?php
       ob_start();
require 'common.php';
 $abc = $_SESSION['user'];
    $sql = " Select
    vhusers.id,
    vhusers.username,
    vhusers.branchid
From
    vhusers where id= $abc";
    $query = $db->prepare($sql);
      $query->execute();
     $results = $query->fetchAll();
foreach ($results as $row) {
}?>
<!-- <select name="branch"  class="text-primary"style="height:50px; width:400px;" >
<option value="100"  class="text-primary"><h3>100</h3></option> 
<option value="200"  class="text-primary"><h3>200</h3></option> -->
<input type="text" name="branch" value="  <?php echo $row['branchid']; ?>">
 
    </td>
  </tr>
  <tr>
    <th height="60" scope="row">&nbsp;</th>
    <td><input type="submit" value="ADD   USER" name="submit"  class="btn btn-info" /></td>
  </tr>
 
     </form>
 </table>
</div>
    
 
    </div>
  </div>
   
 
 <!-- 
    <div class="container">
      <div class="row">
      
      <div class="span8">
          <div class="content">
            <div class="module">
             
      
    
      <table width="100%"  border="1">
	  <tr>
	  <th>User Id</th>
	  <th>User Name</th>
	  <th>Userposition</th>
	  <th>Branch</th>
	  <th>Date</th>
	  </tr>
	  <?php
      $sql = 'SELECT * FROM userdetails';
      $query = $dbh->prepare($sql);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        ?>
	  
	   <tr>
	   <td align="center"><?php echo $result->userid; ?></td>
	  <td align="center"><?php echo $result->username; ?></td>
	  <td align="center"><?php echo $result->userposition; ?></td>
	  <td align="center"><?php echo $result->branch; ?></td>
	     <td align="center"><?php echo $result->creationDate; ?></td>
	  
	  </tr>
<?php
    }
}?>
	  </table>
</div>
</div>
</div>
</div>
</div>
</div>
 -->
 	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>