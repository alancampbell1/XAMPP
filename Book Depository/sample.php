<?php

// php populate html table from mysql database
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$databaseName = "myDB";

// connect to mysql
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
// mysql select query
$query = "SELECT * FROM `Assignment4";
// result for method one
$result1 = mysqli_query($connect, $query);
// result for method two 
$result2 = mysqli_query($connect, $query);

$dataRow = "";



while($row2 = mysqli_fetch_array($result2))
{
    $dataRow = $dataRow."<tr><td>$row2[0]</td><td>$row2[1]</td><td>$row2[2]</td><td>$row2[3]</td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP DATA ROW TABLE FROM DATABASE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table,th,tr,td
            {
                border: 0.1px solid black;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
            </tr>    
            <?php echo $dataRow;?>
        </table>
    </body>
</html>