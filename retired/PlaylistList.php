<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="v1StyleSheet.css">
	<script src="script.js"></script>
<?php
$servername = "localhost";
$username = "root";
$password = "sqlrootPASS!";
$dbname = "v3_cc";
$port = "3306";
try {
    //Retrieve 'name' from curator page
	$id = $_GET["id"];
	$name = $_GET["name"];
	$platform = $_GET["platform"];
	
	switch($platform){
		case "APPLEMUSIC":
			$platform = "APPLE MUSIC";
			break;
		case "AMAZONMUSIC":
			$platform = "AMAZON MUSIC";
			break;
	}


	//mySQL Connection String 
	//Create Connection
	$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

	//Check connection 
	if (!$conn){
		die("mySQL: Connection failed: ". mysqli_connect_error());
	}
	//echo "mySQL: Connected successfully";
	//echo "\n";

	$sql = "SELECT DISTINCT A.playlistGrouping, B.userName 
			FROM playlist A 
			INNER JOIN curator B ON B.cur_id = A.cur_id 
			INNER JOIN platform C ON C.plat_id = A.plat_id 
			WHERE B.userName ='".$name."' 
			AND C.platform = '".$platform."'";
			
	$result = mysqli_query($conn, $sql);
} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
<title>Playlist List</title>
</head>
<header>
	<div class="topnav a">
		<a href="DynamicPlatform.php">PLATFORMS</a>
		<?php echo("<a href=\"Curators.php?id=".$id."\">".$platform."</a>");?>
		<?php echo("<a class=\"active\" href=\"PlaylistList.php?id=".$id."&name=".$name."&platform=".$platform."\">".$name."</a>");?>
		<?php echo("<a style=\"float:right\" href=\"About.php?id=".$id."&name=".$name."&platform=".$platform."&grouping=".null."\">ABOUT</a>");?>
		<?php echo("<a style=\"float:right\" href=\"Contact.php?id=".$id."&name=".$name."&platform=".$platform."&grouping=".null."\">CONTACT US</a>");?>
	</div>
</header>
<body>
	<div class="container">
		<?php
            $y = 1;
            $i = 0; 
            $prevGroup = "";
			//Grab the name of each of curators playlists
			$count = mysqli_num_rows($result);
			while($row = mysqli_fetch_assoc($result)){
                do{
                    $currentGroup = $row["playlistGrouping"];
                    if ($prevGroup <> $currentGroup){
                        echo("<div class=\"cell cell-".$y."\">");
						echo("<button class=\"btn \" onclick =goToPlaylistGrid(\"".$id."\",\"".$currentGroup."\",\"".$name."\",\"".str_replace(' ', '',$platform)."\")>");
                        echo($row["playlistGrouping"]);
                        echo("</div>");
                        if ($y > 3) {
                            $y = 0;
                        }
                        $y += 1;  
                    }
                    $prevGroup = $row["playlistGrouping"];
                    $i += 1;  
                }while ($i < $count);				
			}
		?>			
	</div>	
</body>
</html>