<?php 
require_once "config.php";
	if(isset($_REQUEST['code']))
	{
		// select image from db to delete
		$code=$_REQUEST['code'];	//get delete_id and store in $id variable
		
		$select_stmt= $dbh->prepare('SELECT * FROM uaerdetails WHERE code=:code');	//sql select query
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