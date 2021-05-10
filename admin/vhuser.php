 <?php
session_start();
error_reporting(0);
include 'config.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
     <!-- Boostrap Link ******************************************************************************************************************** -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
         integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <!-- Boostrap link ******************************************************************************************************************** -->
     <style type="text/css">
     </style>
 </head>
 <body>
     <div class="container">
         <?php if ($msg) {?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div>
         <?php }?>
         <table class="table table-bordered table-wrap" cellpadding="3">
             <thead>
                 <tr>
                     <th>
                         <h4>Branch ID</h4>
                     </th>
                     <th>
                         <h4>Request ID</h4>
                     </th>
                     <th>
                         <h4>Reason</h4>
                     </th>
                     <th>
                         <h4>Status</h4>
                     </th>
                     <th>
                         <h4>Action</h4>
                     </th>
                 </tr>
             </thead>
             <tbody>
                 <?php $sql = 'SELECT * from  vhusers ';
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $result) {               ?>
                 <tr>
                     <!--   <td> <?php echo htmlentities($cnt); ?></td> -->
                     <td><?php echo htmlentities($result->username); ?></td>
                     <td><?php echo htmlentities($result->passwor); ?></td>
                     <td><?php echo htmlentities($result->reason); ?></td>
                     <td><?php $stats = $result->state;
if ($stats == 2) {
    ?>
                         <a class="waves-effect waves-green btn-flat m-b-xs">Pending</a>
                         <?php
} elseif ($stats == 0) { ?>
                         <a class="waves-effect waves-red btn-flat m-b-xs">Reject</a>
                         <?php } else { ?>
                         <a class="waves-effect waves-red btn-flat m-b-xs">Accept</a>
                         d
                         <?php  }?>
                         </h5>
                     </td>
                     <td>
                         <!-- <a href="viewrequest.php?empid=<?php echo htmlentities($result->id); ?>"><i class="material-icons">mode_edit</i></a> -->
                         <?php if ($result->state == 1) {?>
                         <a href="viewrequest.php?inid=<?php echo htmlentities($result->id); ?>"
                             onclick="return confirm('Are you sure you want to Reject this Employe?');"" > <button type="
                             button" class="btn btn-danger">Reject</button>
                             <?php } else {?>
                             <a href="viewrequest.php?id=<?php echo htmlentities($result->id); ?>"
                                 onclick="return confirm('Are you sure you want to accept this employee?');"">
                                            <button type=" button" class="btn btn-danger">Accept</button>
                                 <?php } ?>
                     </td>
                 </tr>
                 <?php ++$cnt; }
}?>
             </tbody>
         </table>
     </div>
     </div>
     </div>
 </body>
 </html>