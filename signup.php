    <!doctype html>
    <html>
        <head>
            <title>
                sign up
            </title>
             <link href="CSS/dashboard.css" rel="stylesheet" type="text/css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <style>
                #check{
                    padding-left: 17%;
                }
                #buttons{
                    padding-left: 17%;
                    padding-top: 5%;
                }
                body{
                    padding:50px;
                     height:600px;
                    width:1100px;
                }
            
				h1{
				color : #000000;
				text-align : center;
				font-family: "SIMPSON";
				}
				
			body{
			padding:50px;
			 background-image:url("images/landscape_68-wallpaper-1366x768.jpg");
			 height:600px;
			width:1100px;
			}
			
			form
			{
				 width: 500px;
				 margin: 0 auto;
			}
		</style>
        </head>
                <body>
                     <!--NAVIGATION MENU-->
						<div id="nav_menu">
								<a href="home.php"><button class="btn home">home</button></a>
								<a href="signup.php"><button class="btn success">signUp</button></a>
								<a href="login.php"><button class="btn info">logIn</button></a>		
								
								
											
						
						</div>
						<h1> SIGN UP FORM </h1>
                <form role="form" class="form-horizontal" method="POST">
                       <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email id:</label>
                            <div class="col-sm-10">
                            <input type="email" id="email" name="email" class="form-control" required />
                           </div>
                        </div>
                        <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password:</label>
                            <div class="col-sm-10">
                            <input type="password" id="password" name="password" class="form-control" pattern=".{8,}" title=" at least 10 characters" required />
                            </div>
                        </div>
                    <div class="form-group">
                    <label for="confirm password" class="col-sm-2 control-label">Confirm Password:</label>
                        <div class="col-sm-10">
                        <input type="confirmpassword" id="confirmpassword" name="confirmpassword" class="form-control" required />
                        </div>
                    </div>
                     <div class="form-group">
                    <label for="url" class="col-sm-2 control-label">Website url:</label>
                        <div class="col-sm-10">
                        <input type="text" id="url" name="url" class="form-control" required/>
                        </div>
                    </div>
                    <div class="checkbox" id="check">
                    <label>
                    <input type="checkbox" value="1" />
                    agree to privacy
                      </label>
                    </div>
                    <div class="form-group" id="buttons">
                        <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" name="submit" value="submit" />
                        
                    </div>
                    </div>
            </form>
            </body>
    </html>
	<script>
	var myInput = document.getElementById("password");

    var length = document.getElementById("length");

	 if(myInput.value.length >= 10) {
    length.classList.remove("invalid");
    length.classList.add("valid");
	} else {
    length.classList.remove("valid");
    length.classList.add("invalid");
	}

	</script>
	
	<?php
 
 
   if(isset($_POST['submit']))
   {
		$e =  $_POST["email"];
		$p =  $_POST["password"];
		$w =  $_POST["url"];
   
   
   $conn = new mysqli('localhost', 'root', '', 'project');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `signup`(`email`, `password`, `website`) VALUES ('$e','$p','$w')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

   
   
$conn->close();
   }
?>