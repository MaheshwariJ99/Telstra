<?php

#starts a new session
session_start();

#includes a database connection
	$serverName = "swanstransportation.database.windows.net";
	$connectionInfo = array("Database"=>"SwansTransportationDB","Uid"=>"SwansAdmin","PWD"=>"Swan@2019");
	$conn = sqlsrv_connect($serverName, $connectionInfo);
#catches user/password submitted by html form
$user = $_POST['username'];
$password = $_POST['password'];

#checks if the html form is filled
if(empty($_POST['username']) || empty($_POST['password']))
{
    echo "Fill all the fields!";
}else
{

#searches for user and password in the database
$query = "SELECT * FROM Customer WHERE username = '$user' AND 
         password = '$password'";
$result = sqlsrv_query($conn, $query);  //$conn is your connection in 'connection.php'

#checks if the search was made
if($result === false)
{
     die( print_r( sqlsrv_errors(), true));
}

#checks if the search brought some row and if it is one only row
if(sqlsrv_has_rows($result) != 1){
       echo "User/password not found";
}else{

#creates sessions
    while($row = sqlsrv_fetch_array($result)){
       $_SESSION['CID'] = $row['CID'];
       $_SESSION['username'] = $row['username'];
       $_SESSION['password'] = $row['password'];
    }
#redirects user
    header("Location: Dashboard.php");
}
}

?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | PHP Login Script using PDO</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                 
                <h3 align="">Customer Login</h3><br />  
                <form method="post">  
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  


 