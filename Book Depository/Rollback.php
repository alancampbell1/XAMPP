<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "Assignment3";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//mysqli_autocommit($conn, FALSE);

mysqli_rollback($conn);

//mysqli_rollback($conn);

header('Location: http://' . $_SERVER['HTTP_HOST'] . '/Assignment4/homepage.php?viewData=View+Table');
exit;

?>