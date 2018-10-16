<?php

echo '<h1>This is Assignment 3</h1>';
// php populate html table from mysql database
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$databaseName = "Assignment3";


// connect to mysql
$conn = mysqli_connect($hostname, $username, $password, $databaseName);
// mysql select query
$query = "SELECT * FROM `eBook_MetaData";
// result for method one
$result1 = mysqli_query($conn, $query);
// result for method two 
$result2 = mysqli_query($conn, $query);

mysqli_autocommit($conn,FALSE);


echo '<p>Name: Alan Campbell</p>';
echo '<p>Student Number: 10346239</p>';

echo '<p>To insert data please fill in the blanks and press Submit: </p>';

//This is the old but it works
'<div class="container">
<form action="insertData.php" method="post">
            Creator: <input type = "text" name = "Creator">
            Title: <input type = "text" name = "Title">
            Type: <input type = "text" name = "Type">
            Identifier: <input type = "text" name = "Identifier">
            Date: <input type = "date" name = "Date">
            Language: <input type = "text" name = "Language">
            Description: <input type = "text" name = "Description">
            <input class="button1"type="submit">
        </form>
        </div>';

//This is the new one but has the drop down options
echo '<div class="container">
<form action="insertData.php" method="post">
            Creator: <input type = "text" name = "Creator">
            Title: <input type = "text" name = "Title">
            Type: <select id="Type" name="Type">
                            <option value="Please select an option">Please select an option</option>
                            <option value="Fiction">Fiction</option>
                            <option value="Non-Fiction">Non-Fiction</option>
                            <option value="Young Adult">Young Adult</option>
                            <option value="Fantasy">Fantasy</option>
                        </select>
            Identifier: <input type = "text" name = "Identifier">
            Date: <input type = "date" name = "Date">
            Language: <select id="Language" name="Language">
                            <option value="Please select a Language:">Please select an option</option>
                            <option value="en-GB">en-GB</option>
                            <option value="fr-FR">fr-FR</option>
                            <option value="es-ES">es-ES</option>
                            <option value="de-DE">de-DE</option>
                        </select>
            Description: <input type = "text" name = "Description">
            <input class="button1"type="submit">
        </form>
        </div>';


echo '<p>Press View Table to see the table contents:</p>';
//This button displays the table to the screen
echo '<form>
        <input type="submit" class="button1" name="viewData" value="View Table" />
      </form>';

//This block of code prints the table to the screen when View Table button is clicked
if(isset($_REQUEST['viewData'])){

//$sampleData = $_REQUEST['viewData'];
//echo $sampleData;

//Try creating an array
$dataRow = "";
while($row2 = mysqli_fetch_array($result2))
    {
        $dataRow = $dataRow."<tr><td>$row2[0]</td><td>$row2[1]</td><td>$row2[2]</td><td>$row2[3]</td><td>$row2[4]</td><td>$row2[5]</td><td>$row2[6]</td><td>$row2[7]</td></tr>";
    }
echo "<table>
            <tr>
                <th>ID</th>
                <th>Creator</th>
                <th>Title</th>
                <th>Type</th>
                <th>Identifier</th>
                <th>Date</th>
                <th>Language</th>
                <th>Description</th>
            </tr>
            <?php echo $dataRow 
</table>";
}

echo '<br>';
echo '<form action="deleteData.php" method="post">
            Please insert the ID number of the row you want to delete: <input type = "int" name = "deletedID">
            <input type="submit" class="button1">
        </form>';


echo '<br>';
echo '<p>Please insert the data and the row ID number you want to update: </p>';
echo '<div class="container">
<form action="updateData.php" method="post">
            Creator: <input type = "text" name = "Creator">
            Title: <input type = "text" name = "Title">
            Type: <select id="Type" name="Type">
                            <option value="Please select an option">Please select an option</option>
                            <option value="Fiction">Fiction</option>
                            <option value="Non-Fiction">Non-Fiction</option>
                            <option value="Young Adult">Young Adult</option>
                            <option value="Fantasy">Fantasy</option>
                        </select>
            Identifier: <input type = "text" name = "Identifier">
            Date: <input type = "date" name = "Date">
            Language: <select id="Language" name="Language">
                            <option value="Please select a Language:">Please select an option</option>
                            <option value="en-GB">en-GB</option>
                            <option value="fr-FR">fr-FR</option>
                            <option value="es-ES">es-ES</option>
                            <option value="de-DE">de-DE</option>
                        </select>
            Description: <input type = "text" name = "Description">
            Row ID Number: <input type = "int" name = "RowNumber">
            <input type="submit" class="button1">
        </form>
        </div>';


echo '<br>';
echo '<form action="Rollback.php" method="post">
            To un-do the previous command press the Submit button:
            <input type="submit" class="button1">
        </form>';


        //Maybe on a button click go back to the last page and undo the func

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Assignment3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    </body>
</html>