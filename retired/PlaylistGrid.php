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
	//Retrieve 'id' from post page to list out curators playlists
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
	
	$grouping = $_GET["grouping"];

	//mySQL Connection String 
	//Create Connection
	$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

	//Check connection 
	if (!$conn){
		die("mySQL: Connection failed: ". mysqli_connect_error());
	}
	//echo "mySQL: Connected successfully";
	//echo "\n";

	//$cursor = $manager->executeQuery("v4_Prototype.curator", $query);
	$sql = "SELECT DISTINCT A.playlistGrouping, A.playlistName, A.embedLink 
	        FROM playlist A 
			INNER JOIN curator B ON B.cur_id = A.cur_id 
			INNER JOIN platform C ON C.plat_id = A.plat_id 
			WHERE A.playlistGrouping = '".$grouping."' 
			AND B.userName = '".$name."' 
			AND C.platform = '".$platform."'";
			
	$result = mysqli_query($conn, $sql);
	
	//Retrieve same playlist from different platforms for link use
	//$cursor2 = $manager->executeQuery("v4_Prototype.curator", $query);
	$sql = "SELECT COUNT(*), A.playlistGrouping, C.platform, C.plat_id
			FROM playlist A 
			INNER JOIN curator B ON B.cur_id = A.cur_id
			INNER JOIN platform C ON C.plat_id = A.plat_id
			WHERE B.userName = '".$name."'
			AND C.plat_id <> '".$id."'
			AND A.playlistGrouping = '".$grouping."'
			GROUP BY A.playlistGrouping, C.platform, C.plat_id";

	$result2 = mysqli_query($conn, $sql);
} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>

<title><?php echo($grouping) ?></title>
</head>
<header>
	<div class="topnav a">
		<a href="DynamicPlatform.php">PLATFORMS</a>
		<?php echo("<a href=\"Curators.php?id=".$id."\">".$platform."</a>");?>
		<?php echo("<a href=\"PlaylistList.php?id=".$id."&name=".$name."&platform=".$platform."\">".$name."</a>");?>
		<?php echo("<a class=\"active\" href=\"PlaylistGrid.php?id=".$id."&name=".$name."&platform=".$platform."&grouping=".$grouping."\">".$grouping."</a>");?>
		<?php echo("<a style=\"float:right\" href=\"About.php?id=".$id."&name=".$name."&platform=".$platform."&grouping=".$grouping."\">ABOUT</a>");?>
		<?php echo("<a style=\"float:right\" href=\"Contact.php?id=".$id."&name=".$name."&platform=".$platform."&grouping=".$grouping."\">CONTACT US</a>");?>
	</div>
</header>
<body>
	<div class="container">
		<div class="cell cell-1">
			<table height="625" width="400">
				<tr>
					<th colspan="2">Select a Playlist</th>
				</tr>
				<?php
					$i = 0;
					$x = 0;
					$firstPass = false;
					// Test output for looping through href
					echo("<tr>\n");
					$count = mysqli_num_rows($result);
					while($row = mysqli_fetch_assoc($result)){		
							//logic used to sort through grouping
							if ($grouping == $row["playlistGrouping"]) {
                          	  //logic used to print table cells in a 2x2 grid
								if ($x == 2 AND $firstPass == true) {
									echo("</tr>\n");
									echo("<tr>\n");
								} 
								elseif ($x == 2 AND $firstPass == false){
									echo("</tr>\n");
									echo("<tr>\n");
                	            };
                 	           //Displays playlist grid-cell source
								echo("<td>\n<a href=\"");
								echo($row["embedLink"]);
     	            		    echo("\"");
                          	  //Embeds html link to button
								echo(" target=\"BCRFrame\"><button class=\"btn \">");						
								echo($row["playlistName"]);
								echo("</button></a>\n</td>");
								echo("\n");
								if ($x == 2 AND $firstPass == true){
									$x = 0;
								}
								elseif ($x == 2 AND $firstPass == false){
									$firstPass = true;
									$x = 0;
								};
								$x += 1;
							}
							$i += 1;					
					}
					echo("\n</tr>");
				?>
			</table>
        </div>	
		<div class="cell cell-2">
				<iframe 
				height="625"
				width="400"
				style="border: 1px;"
				name="BCRFrame"
				src="">				
				</iframe>
		</div>
		<div class="cell cell-3">
			<table height="625" width="400">
				<tr>
					<th colspan="2">Also Available On:</th>
				</tr>
				<?php 
					$i = 0;
					$x = 0; 
					$firstPass2 = false; 
					echo("<tr>\n");
					$count = mysqli_num_rows($result2);
					while($row = mysqli_fetch_assoc($result2)){
						if ($x == 2 AND $firstPass2 == true){
							echo("</tr>\n");
							echo("<tr>\n");
						}
						elseif ($x == 2 AND $firstPass2 == false){
							echo("</tr>\n");
							echo("<tr>\n");
						};
						echo("<td>\n");
						echo("<button class=\"btn \" onclick =goToPlaylistGrid(\"".$row["plat_id"]."\",\"".$row["playlistGrouping"]."\",\"".$name."\",\"".str_replace(' ','',$row["platform"])."\")>");
						echo($row["platform"]);
						echo("\n</td>");
						if ($x == 2 AND $firstPass == true){
							$x = 0;
						}
						elseif ($x == 2 AND $firstPass == false){
							$firstPass = true;
							$x = 0;
						};
						$x += 1; 
						$i += 1;
					}
					echo("\n</tr>");
				?> 
			</table>
		</div>
	</div>	
</body>
</html>