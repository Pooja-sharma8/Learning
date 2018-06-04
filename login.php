<!Doctype html>
<html>
    <head>
        <title>
            creating notification
        </title>
         <link href="CSS/dashboard.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheeet" type="text/css" href="css/bootstrap.css">
        <style>
             body{
                    padding:50px;
                     height:600px;
                    width:1100px;
                }
        </style>
        <style>
      body{
      padding:50px;
       background-image:url("images/landscape_68-wallpaper-1366x768.jpg");
       height:600px;
      width:1100px;
      }
	  
	  
	  
	  form{
				 width: 500px;
				 margin: 0 auto;
			}
			
			
			h1{
				color : #000000;
				text-align : center;
				font-family: "SIMPSON";
				}
				
			
    </style>
    </head>
    <body>
        <!--NAVIGATION MENU-->
            <div id="nav_menu">
                <a href="home.php"><button class="btn home">home</button></a>
                <a href="signup.php"><button class="btn success">signUp</button></a>
                <a href="login.php"><button class="btn info">logIn</button></a>    
                
                <a href="notificationcreate.php"><button class="btn danger">notification</button></a>  
                      
            
            </div>
			<h1> LOGIN </h1>
       <form method="POST" role="form" class="form-horizontal">
  <div class="form-group" >
    <label for="username" class="col-sm-2 control-label">Username:</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" required />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="submit" value="submit" />
      
    </div>
  </div>
</form>
    </body>
</html>






<?php
 
   if(isset($_POST['submit']))
   {
   $e=   $_POST["email"];
   $p =  $_POST["password"];
   
   
   $conn = new mysqli('localhost', 'root', '', 'project');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "SELECT * FROM signup WHERE email='$e' and password='$p'";



 $result = $conn->query($query);
      if($result -> num_rows == 1)
      {
        echo "<script> alert('Login succesfully');
		 window.location='dashboard.php'</script>";
      }
     else
     {
    echo "invalid username and password";
    }


   
   
$conn->close();
   }
?>