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
        echo "<script>window.location.href='userregistration.php';</script>";
    } else {
        echo "<script>alert('Data not inserted');</script>";
    }
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <title>ජාතික තරුණසේවා සභාව</title>
     <!-- Boostrap Link ******************************************************************************************************************** -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
         integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <!-- Boostrap link ******************************************************************************************************************** -->
     <style type="text/css">
     #link {
         text-decoration: none;
         position: absolute;
         top: 180px;
         right: 600px;
         font-size: 20px;
         color: darkblue;
     }
     </style>
 </head>
 <body>
     <?php include 'nav.php'; ?>
     <br>
     </h3>
     <div class="container">
         <br>
         <table class="table table-bordered table-wrap" cellpadding="3">
             <form class="info" name="insert" action="" method="post" id="link" class="form-row">
                 <tr>
                     <th width="26%" height="40" scope="row" class="text-dark">
                         <h4>User ID :</h4>
                     </th>
                     <td width="74%">
                         <h4><input type="text" name="userid" style="height:60px; width:400px;" class="form-control"
                                 required /></h4>
                     </td>
                 </tr>
                 <tr>
                     <th height="60" scope="row" class="text-dark">
                         <h4>User Name :</h4>
                     </th>
                     <td>
                         <h4><input type="text" name="username" value="" style="height:60px; width:400px;"
                                 class="form-control" required /></h4>
                     </td>
                 </tr>
                 <tr>
                     <th height="60" scope="row" class="text-dark">
                         <h4>Position</h4>
                     </th>
                     <td>
                         <select name="userposition" class="text-dark" style="height:50px; width:400px;">
                             <option class="text-primary">
                                 <h4>Director</h4>
                             </option>
                             <option class="text-primary">
                                 <h4>Lecture</h4>
                             </option>
                         </select>
                     </td>
                 </tr>
                 <br>
                 <tr>
                     <th height="60" scope="row" class="text-dark">
                         <h4>branch</h4>
                     </th>
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
                     <td><input type="submit" value="ADD   USER" name="submit" class="btn btn-dark" /></td>
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