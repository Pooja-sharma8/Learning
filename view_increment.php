<?php


 $n =  $_GET["notification_id"];
  $conn = mysqli_connect('localhost', 'root', '', 'project');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE notification SET view=view+1 where notification_id=$n";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>