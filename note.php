

 <?php
   if(isset($_POST)){
    $t=   $_POST["title"];
    $m =  $_POST["message"];
    $w =  $_POST["url"];
    $i =  $_POST["icon"];
   
    $conn = new mysqli('localhost', 'root', '', 'project');

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO `notification`(`title`, `message`, `url`, `icon`) VALUES ('$t','$m','$w', '$i')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
     }

   
   
      $conn->close();
     }
?>