<?php
  if(isset($_POST)){
	  
	  
	      $t=   $_POST["title"];
		  echo $t;
 $conn = mysqli_connect('localhost', 'root', '', 'project');
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());}


	$sql = "UPDATE total SET total_click=total_click+1" ;
	
	if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}

	mysqli_close($conn);
  }
?>