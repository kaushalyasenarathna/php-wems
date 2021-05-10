<!DOCTYPE html>
<html>
<head>
  <title>ජාතික තරුණසේවා සභාව</title>

<!-- Boostrap Link ******************************************************************************************************************** -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- Boostrap link ******************************************************************************************************************** -->

<!-- icon******************************************************************************************************************************-->
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<!--icon*******************************************************************************************************************************-->
<style type="text/css">
  img{
    margin-right:5rem;
  }

</style>
</head>
<body>

 
  

<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><img src="image/nysc2logo.png" width="90rem" height="60rem"></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="userregistration.php"><font color="white">Add Employee </font><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="sendrequest.php"><font color="white">Send Request</font> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="viewrequest.php"><font color="white">View Request </font><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="workingdetails.php"><font color="white">Working Details</font><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="viewuserdetails.php"><font color="white">View User Details</font><span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="status.php"><font color="white">Status</font><span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0"> 

      <i class='far fa-user' style='font-size:20px;color:darkblue'>  

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
      echo $row['username']."  ".$row['branchid'];
   
    }
       ?>
     </i> 
      <a href="logout.php"  class="nav-item">  <button type="button" class="btn btn-info">LogOut</button></a> 
  </div>
</nav>



<!-- Boostrap script ******************************************************************************************************************** -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Boostrap script ******************************************************************************************************************** -->
</body>
</html>