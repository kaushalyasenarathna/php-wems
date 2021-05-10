<?php
include_once("config.php");
 session_start(); 
 ?>

<!DOCTYPE html>
<html>
<head>
<title>ජාතික තරුණසේවා සභාව</title>
   
		
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
     
   

   
 
    <div class="container">
   
      <div class="span8">
          <div class="content">
 
</h3>
    <br>
		    <table class="table table-bordered table-wrap" cellpadding="3" >
	  <tr>
       <th class="text-dark"><h2><p align="center">User Id</h2></p></th>
        <th class="text-dark"><h2><p align="center">Request ID</h2></p></th>
	  
  </h4>
	  </tr>
	  <?php
	  $sql = "SELECT * FROM working";
	  $query = $dbh -> prepare($sql);
      $query -> execute();
      $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{

	  
	  ?>
	  
	   <tr>
	   <td   ><h5><?php echo $result -> userid; ?></h4>

	   	</td>
	  <td ><h5><?php echo $result -> requestid ; ?></h5>
	  </td>
	
		

	     	  </tr>
<?php  }
}
 

?>
	  </table>
</div>
</div>
</div>
 

 	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>