<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="v1StyleSheet.css">
	<script src="script.js"></script>
<?php
$servername = "";
$username = "";
$password = "!";
$dbname = "";
$port = "";
try {
	//Retrieve 'id' from platform page to know 
	//which curators to display.
	$id = $_GET["id"];
	
	//mySQL Connection String 
	//Create Connection
	$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

	//Check connection 
	if (!$conn){
		die("mySQL: Connection failed: ". mysqli_connect_error());
	}
	//echo "mySQL: Connected successfully";
	//echo "\n";

	//TODO: CREATE QUERY THAT WILL COUNT THE DIFFERENT
	//	    PLAYLISTS SORTED BY PLATFORM & COUNT LOGIC
	$sql = "SELECT DISTINCT A.userName
			FROM curator A 
			INNER JOIN playlist B ON B.cur_id = A.cur_id 
			WHERE B.plat_id = '".$id."'";
			
	$result = mysqli_query($conn, $sql);

	//Query to retrieve which platform is being viewed
	$sql = "SELECT platform 
			FROM platform
			WHERE plat_id = '".$id."'";

	$result2 = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result2)){
		$platName = $row["platform"];
	}

	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	?>
<title>Curators</title>
</head>
<header>
	<div class="topnav a">
		<a href="DynamicPlatform.php">PLATFORMS</a>
		<?php echo("<a class=\"active\" href=\"Curators.php?id=".$id."\">".$platName."</a>");?>		
		<?php echo("<a style=\"float:right\" href=\"About.php?id=".$id."&name=".null."&platform=".null."&grouping=".null."\">ABOUT</a>");?>
		<?php echo("<a style=\"float:right\" href=\"Contact.php?id=".$id."&name=".null."&platform=".null."&grouping=".null."\">CONTACT US</a>");?>
	</div>
</header>
<body>
	<div class="container">
		<?php
			$y = 1; 
			$firstPass = false;
			//Grab the count of the curators 
			
			while($row = mysqli_fetch_assoc($result)) {
					echo("<div class=\"cell cell-".$y."\">");
					echo("<button class=\"btn \" onclick =goToPlaylistList(\"".$id."\",\"".str_replace(' ', '',$platName)."\",\"".$row["userName"]."\")>");
					echo $row["userName"];
					echo("</div>");
					if ($y > 3) {
						$y = 0;
					}
					$y += 1;
				}
		?>			
	</div>	
	<script>
	</script>
</body>
</html>
