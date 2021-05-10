<?php

require_once "config.php";
  
if(isset($_REQUEST['code']))
{
  try
  {
    $code= $_REQUEST['code']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
    $query = $dbh->prepare('SELECT * FROM userdetails WHERE code=:code'); //sql select query
    $query->bindParam(':code',$code);

    $query->execute(); 
    $result= $query->fetch(PDO::FETCH_ASSOC);
    extract($result);
  }
  catch(PDOException $e)
  {
    $e->getMessage();
  }
  
}

if(isset($_REQUEST['btn_update']))
{
  try
  {
    $username =$_REQUEST['username']; //textbox name "txt_name"
    $userposition=$_REQUEST['userposition'];
   $userid=$_REQUEST['userid'];
 
      
 
  
    if(!isset($errorMsg))
    {
      $query=$dbh->prepare('UPDATE userdetails SET userid=:userid,username=:username,userposition=:userposition WHERE code=:code'); //sql update query
      $query->bindParam(':username',$username);
        $query->bindParam(':userposition',$userposition);
     $query->bindParam(':userid',$userid);
       //bind all parameter
      $query->bindParam(':code',$code);
       
      if($query->execute())
      {
        $updateMsg="File Update Successfully......."; //file update success message
        header("refresh:3;viewuserdetails.php"); //refresh 3 second and redirect to index.php page
      }
    }
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
  
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>PHP PDO File Upload Using MySQL:onlyxscript.blogspot.in</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
</head>
<style type="text/css">
  

form{
  width: 50rem;
  height: 50rem;
  margin-left: 20REM;
}

</style>
  <body>
  
 
  <div class="wrapper">
  
  <div class="container">
      
    <div class="col-lg-12">
    
    <?php
    if(isset($errorMsg))
    {
      ?>
            <div class="alert alert-danger">
              <strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
    }
    if(isset($updateMsg)){
    ?>
      <div class="alert alert-success">
        <strong>UPDATE ! <?php echo $updateMsg; ?></strong>
      </div>
        <?php
    }
    ?>   
    
      <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
        <label class="col-sm-3 control-label">User Id</label>
        <div class="col-sm-6">
        <input type="text" name="userid" class="form-control" value="<?php echo $userid; ?>"  />
        </div>
        </div>
        
      <div class="form-group">
        <label class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"  />
        </div>
        </div>
          <div class="form-group">
        <label class="col-sm-3 control-label">Position</label>
        <div class="col-sm-6">
        <input type="text" name="userposition" class="form-control" value="<?php echo $userposition; ?>"  />
        </div>
        </div>
        
          
          
        
          
          
        <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9 m-t-15">
        <input type="submit"  name="btn_update" class="btn btn-primary" value="Update">
   

        <?php 
require_once "config.php";
  if(isset($_REQUEST['delete_id']))
  {
    // select image from db to delete
    $code=$_REQUEST['delete_id'];  //get delete_id and store in $id variable
    
    $select_stmt= $dbh->prepare('SELECT * FROM uaerdetails WHERE code=:code');  //sql select query
    $select_stmt->bindParam(':code',$code);
    $select_stmt->execute();
    $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
     
    //delete an orignal record from db
    $delete_stmt = $dbh->prepare('DELETE FROM userdetails WHERE code=:code');
    $delete_stmt->bindParam(':code',$code);
    $delete_stmt->execute();
    
    header("Location:viewuserdetails.php");
  }
 ?>


       <td><a href="edit.php?delete_id=<?php echo $result['code']; ?>" class="btn btn-danger">Delete</a></td>

            <a href="viewuserdetails.php" class="btn btn-info">Cancel</a>
        </div>
        </div>
         <td>
  
      </td> 
      </form>
      
    </div>
    
  </div>
      
  </div>
                    
  </body>
</html>