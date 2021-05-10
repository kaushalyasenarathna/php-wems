<!DOCTYPE html>
<html>
<head>
	<title></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
	<style type="text/css">
	 
  nav{
      background:#87ceeb;
  }
 #navbarSupportedContent{
   margin-left: 1rem;
   margin-right: 0rem;
   font-size: 18px;
 }
 
 li{
 	width: 9.2rem;
 }
  
	</style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ">
  <a class="navbar-brand" href="#">  <img src="image/nysc2logo.png" width="90rem" height="60rem"></a>
  <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link" href="userregistration.php"><font color="white">Add Employee | </font><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="sendrequest.php"><font color="white">Send Request |</font> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="viewrequest.php"><font color="white">View Request | </font><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="workingdetails.php" width="9rem"><font color="white">Working Details|</font><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="viewuserdetails.php"><font color="white">User Details |</font><span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="status.php"><font color="white">Status |</font><span class="sr-only">(current)</span></a>
      </li>
      </ul>
  </div>
   
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
   <ul class="navbar-nav mr-auto ">
    
             <li class="nav-item " width="10rem">
                <a class="nav-link text-white" href="#">      
                <font color="red">
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
  
     </li>

 </font>

              <li class="nav-item">
                  <a href="logout.php"  class="nav-item">  <button type="button" class="btn btn-info">LogOut</button></a> 
</a>
        
            </li>

    </ul>
    </form>
  </div>
</nav>

</body>
</html>