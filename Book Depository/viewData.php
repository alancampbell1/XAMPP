 <?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Name, ID, Assignment1, Average FROM Assignment4";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["Name"]. " - ID: " . $row["ID"]. " - Assignment1" . $row["Assignment1"]. " - Average" . $row["Average"]."<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 