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

//Stops commitment from being permanent
//mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_ONLY);

//This function stops the table from autocommiting
mysqli_autocommit($conn,FALSE);

$myCreator = $_POST["Creator"];
$myTitle = $_POST["Title"];
$myType = $_POST["Type"];
$myIdentifier = $_POST["Identifier"];
$myDate = $_POST["Date"];
$myLanguage = $_POST["Language"];
$myDescription = $_POST["Description"];
$myRowNumber = $_POST["RowNumber"];


echo("<script>console.log('PHP: ".$myCreator."');</script>");
echo("<script>console.log('PHP: ".$myTitle."');</script>");
echo("<script>console.log('PHP: ".$myType."');</script>");
echo("<script>console.log('PHP: ".$myDate."');</script>");
echo("<script>console.log('PHP: ".$myIdentifier."');</script>");
echo("<script>console.log('PHP: ".$myLanguage."');</script>");
echo("<script>console.log('PHP: ".$myDescription."');</script>");
echo("<script>console.log('PHP: ".$myRowNumber."');</script>");

echo "Please state if you want to commit or rollback this command: ";


$sql = "UPDATE eBook_MetaData 
SET

 	Creator= '$myCreator',
 	Title= '$myTitle',
 	Type= '$myType',
 	Identifier= '$myIdentifier',
 	Date= '$myDate',
 	Language= '$myLanguage',
 	Description= '$myDescription'

 	WHERE ID='$myRowNumber'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

//mysqli_rollback($conn);


//This line commits the update act. Code won't work without it when autocommit is turned off
mysqli_commit($conn);

mysqli_close($conn);


header('Location: http://' . $_SERVER['HTTP_HOST'] . '/Assignment4/homepage.php?viewData=View+Table');
exit;

?> 
