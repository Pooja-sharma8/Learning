 <?php
 $conn = new mysqli('localhost', 'root', '', 'project');
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select title,icon,message,url FROM notification";
$sql1 = "select total_click,total_notification FROM total where 1";
$result = $conn->query($sql);
 $result1 = $conn->query($sql1);
 $row = $result1->fetch_assoc();
 ?>
 
 <doctype html>
    <html>
        <head>
            <title>
                dashboard
            </title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="CSS/dashboard.css" rel="stylesheet" type="text/css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <style>
			body{
			padding:50px;
			height:600px;
			width:1100px;
			}
		</style>
        </head>
                <body>
                    <!--NAVIGATION MENU-->
						<div id="nav_menu">
								<a href="home.php"><button class="btn home">Logout</button></a>
								
						
						</div>
                     <table align="top" class="table-bordered table-striped table-condensed" id="tables">
                         <tr>
                        <th>TOTAL NOTIFICATION</th>
                        <th>TOTAL CLICK</th>
                        
                     <?php
					
                     echo "<tr><td>{$row['total_notification']}</td><td>{$row['total_click']}</td></tr>\n";
					  ?>
					  
                                
                        </table>
                    <br><br><br><br><br>
                        
                        <table align="bottom" class="table-bordered table-striped table-condensed" id="table3">
                        <tr><th>RECORD NOTIFICATIONS TABLE:</th></tr>
                     
                      <tr>
                        <th>Notification title</th>
                        <th>Message</th>
                        <th>Url of Image</th>
                        <th>Website</th>
                      </tr>
					  <?php
					  if (mysqli_num_rows($result) > 0) {
    
					while($row = mysqli_fetch_assoc($result)) {
					
                     echo "<tr><td>{$row['title']}</td><td>{$row['message']}</td><td>{$row['icon']}</td><td>{$row['url']}</td></tr>\n";
					  }
					  }?>
                    </table>
                </body>
    </html>
	<?php
	mysqli_close($conn);
	?>