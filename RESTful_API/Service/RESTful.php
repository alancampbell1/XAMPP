<?php

//Source: https://www.leaseweb.com/labs/2015/10/creating-a-simple-REST-API-in-php/

//This stores the way the data was sent, i.e. GET, PUT, POST, DELETE
$method = $_SERVER['REQUEST_METHOD'];

//Prints the transfer method to the screen
echo $method;

//It decodes the JSON data sent across
$input = json_decode(file_get_contents('php://input'), true);

//Prints the PHP object to the screen
print_r($input);

//Finds the ID
$key = $input["id"];
//Prints it
echo "The ID is ".$key;

//Finds the name
$nameValue = $input["userName"];
//Prints it
echo "The name here is ".$nameValue;

//Finds the type
$type = $input["type"];
//Prints it
echo $type;


// connect to the mysql database
$link = mysqli_connect('localhost', 'root', '', 'ReadingList');
mysqli_set_charset($link,'utf8');


// escape the columns and values from the input object
 $columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
 $values = array_map(function ($value) use ($link) {
     if ($value===null) return null;
     return mysqli_real_escape_string($link,(string)$value);
 },array_values($input));

 // build the SET part of the SQL command
 $set = '';
 for ($i=0;$i<count($columns);$i++) {
     $set.=($i>0?',':'').'`'.$columns[$i].'`=';
     $set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
 }

// create SQL based on HTTP method
switch ($method) {
    case 'PUT':
        $sql = "update Records set $set WHERE id=$key"; break;
    case 'POST':
        $sql = "insert into Records set $set"; break;
    case 'DELETE':
        $sql = "delete from Records WHERE id=$key"; break;
}

//If the type is GET and the nameValue is empty, 
//Carry out the SELECT Command extracting the ID where it equals key in the database

if($type == 'GET' && $nameValue == ""){
    $sql = "select * from Records WHERE ID=$key";
    echo $sql;
}

//If the type is GET and the key is empty, 
//Carry out the SELECT Command extracting the name where it equals nameValue in the database

if($type == 'GET' && $key == ""){
    $sql = "select * from Records WHERE name='$nameValue'";
    echo $sql;
}

// excecute SQL statement
$result = mysqli_query($link, $sql);


//If the type is GET, convert the object to an array
if($type == 'GET'){
    $array =  (array) $result;
    //print_r($array);
    if (!$key) echo '[';
    for ($i=0;$i<mysqli_num_rows($result);$i++) {
        //echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }

    //This while loop pulls the data from the mySQL database into $rows
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;

    }
    //Converts data query to json format
    $jsonfile = json_encode($rows);

    //Prints to the screen
    print_r($jsonfile);

    //saves it to a json file that is stored in the Data folder
    //This allows the transfer of data because the JS file can pull its data from data.json
    file_put_contents('../Data/data.json', $jsonfile);
}

// die if SQL statement failed
if (!$result) {
    http_response_code(404);
    die(mysqli_error());
}

// close mysql connection
mysqli_close($link);

?>