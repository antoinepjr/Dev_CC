<?php

phpinfo();

$servername = "localhost";
$username = "cultuuh3_ADMIN";
$password = "~SomethingLikeThis1990*";
$dbname = "cultuuh3_v3_cc";
$port = "3306";
/*//PDO Connection String
try {
//Create Connection 
$connection = new PDO("mysql:host=$servername;dbname=v1_cc", $username, $password);
//Set the PDO error mode to exception
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "PDO: Connected successfully"; 
echo "\n";
} catch (PDOException $e) {
    echo "PDO: Connection failed: " . $e->getMessage(); 
    echo "\n";
}
$connection = null;
echo "PDO: Connection Ended";
*/

//mySQL Connection String 
//Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

//Check connection 
if (!$conn){
    die("mySQL: Connection failed: ". mysqli_connect_error());
}
echo "mySQL: Connected successfully";
echo "\n";

$sql = "SELECT A.*, B.*, C.*
        FROM playlist A
        INNER JOIN platform B ON B.plat_id = A.plat_id
        INNER JOIN curator C ON C.cur_id = A.cur_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    //Output 
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["fname"];
        echo "\n";
    }
} else {
    echo "empty-handed, sorry";
}

$sql = "CALL selectPlatform(\"TIDAL\")"; 
$result = mysqli_query($conn, $sql);

If (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo $row["plat_id"];
        echo "\n";
    }
} else {
    echo "Test #2 failed.";
}

mysqli_next_result($conn);

$sql = "CALL retrievePlatformInfo()";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    echo $row["platform"];
}

mysqli_close($conn);
?>