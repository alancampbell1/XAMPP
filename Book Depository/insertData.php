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


$myCreator = $_POST["Creator"];
$myTitle = $_POST["Title"];
$myType = $_POST["Type"];
$myIdentifier = $_POST["Identifier"];
$myDate = $_POST["Date"];
$myLanguage = $_POST["Language"];
$myDescription = $_POST["Description"];


//echo $myName;
//echo $myEmail;

$sql = "INSERT INTO eBook_MetaData (Creator, Title, Type, Identifier, Date, Language, Description)
VALUES ('$myCreator', '$myTitle', '$myType', '$myIdentifier', '$myDate', '$myLanguage', '$myDescription')";

//.$name+

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header('Location: http://' . $_SERVER['HTTP_HOST'] . '/Assignment4/homepage.php?viewData=View+Table');
exit;

?> 
