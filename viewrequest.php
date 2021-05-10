 <?php
 include_once 'config.php';
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
         top: 180px;
         right: 600px;
         font-size: 30px;
         color: black;
     }
     td {
         font-size: 1rem;
     }
     </style>
 </head>
 <body>
     <?php include 'nav.php'; ?>
     <div class="container">
         </h3>
         <br>
         <table class="table table-bordered table-wrap" cellpadding="3">
             <tr>
                 <th class="text-dark">
                     <h2>
                         <p align="center">#</p>
                     </h2>
                 <th class="text-dark">
                     <h2>
                         <p align="center">Requestid</p>
                     </h2>
                 <th class="text-dark">
                     <h2>
                         <p align="center">Reason
                     </h2>
                     </p>
                 </th>
                 <th class="text-dark">
                     <h2> Date</p>
                     </h2>
                 </th>
                 </h4>
             </tr>
             <?php
    $sql = 'SELECT * FROM request';
    $query = $dbh->prepare($sql);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        ?>
             <tr>
                 <td class="text-dark"><?php echo $result->id; ?></font>
                 </td>
                 <td class="text-dark"><?php echo $result->requestid; ?></font>
                 </td>
                 <td class="text-dark"><?php echo $result->reason; ?></font>
                 </td>
                 <td class="text-dark"><?php echo $result->datetime; ?></font>
                 </td>
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
     </div>
 </body>
 </html>>