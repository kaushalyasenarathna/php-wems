<?php
ob_start();
session_start();
    // First we execute our common code to connection to the database and start the session
    require 'common.php';

    // This variable will be used to re-display the user's username to them in the
    // login form if they fail to enter the correct password.  It is initialized here
    // to an empty value, which will be shown if the user has not submitted the form.
    $submitted_username = '';

    // This if statement checks to determine whether the login form has been submitted
    // If it has, then the login code is run, otherwise the form is displayed
    if (!empty($_POST)) {
        // This query retreives the user's information from the database using
        // their username.
        $query = ' 
            SELECT 
                id, 
                username, 
                password, 
                salt, 
                email,
                branchid
				
            FROM vhusers 
            WHERE 
                username = :username 
        ';

        // The parameter values
        $query_params = [
            ':username' => $_POST['username'],
        ];

        try {
            // Execute the query against the database
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        } catch (PDOException $ex) {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code.
            die('Failed to run query: '.$ex->getMessage());
        }

        // This variable tells us whether the user has successfully logged in or not.
        // We initialize it to false, assuming they have not.
        // If we determine that they have entered the right details, then we switch it to true.
        $login_ok = false;

        // Retrieve the user data from the database.  If $row is false, then the username
        // they entered is not registered.
        $row = $stmt->fetch();
        if ($row) {
            // Using the password submitted by the user and the salt stored in the database,
            // we now check to see whether the passwords match by hashing the submitted password
            // and comparing it to the hashed version already stored in the database.
            $check_password = hash('sha256', $_POST['password'].$row['salt']);
            for ($round = 0; $round < 65536; ++$round) {
                $check_password = hash('sha256', $check_password.$row['salt']);
            }

            if ($check_password === $row['password']) {
                // If they do, then we flip this to true
                $login_ok = true;
                // $branchid = $row['branchid'];
                $id = $row['id'];
            }
        }

        // If the user logged in successfully, then we send them to the private members-only page
        // Otherwise, we display a login failed message and show the login form again
        if ($login_ok) {
            // Here I am preparing to store the $row array into the $_SESSION by
            // removing the salt and password values from it.  Although $_SESSION is
            // stored on the server-side, there is no reason to store sensitive values
            // in it unless you have to.  Thus, it is best practice to remove these
            // sensitive values first.
            // unset($row['salt']);
            // unset($row['password']);

            // This stores the user's data into the session at the index 'user'.
            // We will check this index on the private members-only page to determine whether
            // or not the user is logged in.  We can also use it to retrieve
            // the user's details.
            $_SESSION['user'] = $id;
            $_SESSION['branchid'] = $branchid;

            // Redirect the user to the private members-only page.
            header('Location: userregistration.php');
            die('Redirecting to:index.php');
        } else {
            // Tell the user they failed
            echo 'Login Failed.';

            // Show them their username again so all they have to do is enter a new
            // password.  The use of htmlentities prevents XSS attacks.  You should
            // always use htmlentities on user submitted values before displaying them
            // to any users (including the user that submitted them).  For more information:
            // http://en.wikipedia.org/wiki/XSS_attack
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
        }
    }
     ?> 

<!DOCTYPE html>
<head>
	<title>ජාතික තරුණසේවා සභාව </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	   <style type="text/css">
    *{
  margin: 0px;
  padding: 0px;
}

.center {
  position: absolute;
  left: 0;
  top: 10%;
  width: 100%;
  text-align: center;
  font-size: 18px;
color:#FFFFF0  ;
}
.header3{
    position: absolute;
  left: 0;
  top: 30%;
  width: 100%;
  text-align: center;
  font-size: 18px;
  color: darkblue ;

}
 .column{
  width: 500px;
  height: 500px;
  padding: 45px;
  float: right;
  margin-top: 10px;
  font-size: 21px;
  font-weight: bold;
  text-align:center;
  text-align:center; ;
  border-style: outset;
  background-color:#A9A9A9;
  margin: 10px;
  color: #00008B;
  margin-right: 50px;
  
}
header{
  background-image:linear-gradient(rgba(0,0,0,0),rgba(0,0,0,9)), url(bg.jpg);
  background-size: cover;
  background-position: center;
  height: 100vh;
}
h1 {
  font-size: 38px;
  line-height: 40px;
}
#myIMG {
  vertical-align: 50px;
  animation: mymove 5s infinite;
}

@keyframes mymove {
  50% {vertical-align: 100px;}
}.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 30%;
  
   color: white;
   text-align: center;
}
  </style>
</head>
<body>



     <header>
 
<H1> 
    </H1>

 <div class="center">
 
<h1>   <span class="login100-form-title p-b-34">
                        NATIONAL YOUTH  SERVICES COUNSIL<br>
                        WEEKEND EMPLOYEE MANAGEMENT SYSTEM
                    </span></h1> 
</p>
</div>
 
 

 </div>
      <div class="header3"> 
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form name="myform" method="POST" class="login100-form validate-form" action="<?php

         echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <span class="login100-form-title p-b-34">
                    <img src="acc.png">
                    </span>
                  
                    
                    <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
                        <input id="first-name" class="input100" type="text" name="username" placeholder="User name">
                        <span class="focus-input100"></span>
                    </div>
                    <p></p>
                    <p></p>
                    <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>
                    <p>
                    </p>
                    <div class="container-login100-form-btn">
                        <input type="submit" name="mybutton" class="btn btn-primary">
                            
                        </button>
                    </div>
                   
                        
                    
                </form>


                <div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
            </div>
        </div>
    </div>
    
    </div>

     </header>
     
 
 
	

</body>
</html>