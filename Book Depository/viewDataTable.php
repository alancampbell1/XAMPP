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

mysqli_select_db($conn,'myDB');

$query = "SELECT * FROM Assignment4"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['ID'] . "</td><td>" . $row['Assignment1'] ."</td><td>" . $row['Average'] ."</td></tr>";
}

echo "</table>"; //Close the table in HTML

mysqli_close($conn); //Make sure to close out the database connection

?>