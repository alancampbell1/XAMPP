 <?php
$servername = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE TABLE Assignment3.eBook_MetaData(

	ID Serial not null,
	Creator Text not null,
	Title Text not null,
	Type Text not null,
	Identifier Text not null,
	Date date not null,
	Language Text not null,
	Description Text not null

	CONSTRAINT PK_ID PRIMARY KEY (ID);
)";

if(mysqli_query($conn, $sql)){
	echo "'Assignment 3' created successfully";
}
else {
	echo "\nError creating table 'Assignment3':" .mysqli_error($conn);
}
mysqli_close($conn);

?> 
