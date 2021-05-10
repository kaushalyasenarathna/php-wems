  
 <?php
 include_once 'config.php';
session_start();
if (isset($_POST['submit'])) {
    $userid = $_POST['userid'];
    $reason = $_POST['reason'];
    $sql = 'INSERT INTO `request`(`userid`, `reason`)VALUES(:userid,:reason)';
    $query = $dbh->prepare($sql);
    $query->bindParam(':userid', $userid, PDO::PARAM_STR);
    $query->bindParam(':reason', $reason, PDO::PARAM_STR);
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
<title>ජාතික තරුණසේවා සභාව</title>
  
  
  </style>
</style>
 
</head>
<body>
 
  <?php include 'nav.php'; ?>
   
 
    <div class="container">
    
 <br>
        <table class="table table-bordered table-wrap" cellpadding="3" >
                                    <thead>
                                        <tr>
                                            <th><h3>Request ID</h3></th>
                                            
                                            <th><h3>Reason</h3></th>
                                          
                                             <th><h3>Status</h3></th>
                                               
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = 'SELECT * from  request ';
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $result) {               ?>  
                                        <tr>
                                          <!--   <td> <?php echo htmlentities($cnt); ?></td> -->
                                            <td><?php echo htmlentities($result->requestid); ?></td>
                                            <td><?php echo htmlentities($result->reason); ?></td>
                                      
         
</h5>
                                             </td>
                                             <td  ><font color="red"><?php $stats = $result->state;
if ($stats == 1) {
    ?>
                                                 <a class="waves-effect waves-green btn-flat m-b-xs"><font color="red">Accept</font></a>
                                                 <?php
} elseif ($stats == 0) { ?>
                                                 <a class="waves-effect waves-red btn-flat m-b-xs"><font color="red">Reject</font></a>
                                                  
              <?php } else { ?>
                                                 <a class="waves-effect waves-red btn-flat m-b-xs"><font color="red">Pending</font></a>
                                                    
</h3></font>
             
                                                 
                                                 <?php  }?>
</h5>
                                             </td>
       </tr>
                                         <?php ++$cnt; }
}?>
                                    </tbody>
                                </table>
                              </div>
                           
</body>
</html>