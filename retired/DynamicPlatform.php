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
//mySQL Connection String 
//Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

//Check connection 
if (!$conn){
    die("mySQL: Connection failed: ". mysqli_connect_error());
}
//echo "mySQL: Connected successfully";
//echo "\n";

$sql = "SELECT plat_id, platform
		FROM platform";

$platforms = mysqli_query($conn, $sql);

//TODO: Create counting logic that uses either a 2 dim array to contain the plat name 
// or a dynamically created count 

$totalTidalCount = 0;
$totalSoundCloudCount = 0;
$totalAppleMusicCount = 0;
$totalSpotifyCount = 0;
$totalAudiomackCount = 0;
$totalBandcampCount = 0;
$totalAmazonmusicCount = 0;

$sql = "SELECT B.platform, COUNT(A.play_id) AS pCount
		FROM playlist A
		INNER JOIN platform B ON B.plat_id = A.plat_id
		GROUP BY B.platform";
		
$playlistCount = mysqli_query($conn, $sql);

while($row3 = mysqli_fetch_assoc($playlistCount)){
	switch ($row3["platform"]){
		case "TIDAL":
			$totalTidalCount = $row3["pCount"];
		break;
		case "SOUNDCLOUD":
			$totalSoundCloudCount = $row3["pCount"];			
		break;
		case "APPLE MUSIC":
			$totalAppleMusicCount = $row3["pCount"];
		break;
		case "SPOTIFY":
			$totalSpotifyCount = $row3["pCount"];
		break;
		case "AUDIOMACK":
			$totalAudiomackCount = $row3["pCount"];
		break;
		case "BANDCAMP":
			$totalBandcampCount = $row3["pCount"];
		break;
		case "AMAZON MUSIC":
			$totalAmazonmusicCount = $row3["pCount"];
		break;
	}
}

$totalTidalCuratorCount = 0;
$totalSpotifyCuratorCount = 0;
$totalAppleMusicCuratorCount = 0;
$totalSoundCloudCuratorCount = 0;
$totalAudiomackCuratorCount = 0;
$totalBandcampCuratorCount = 0;
$totalAmazonmusicCuratorCount = 0;

$sql = "SELECT C.platform, COUNT(DISTINCT B.cur_id) AS cCount
		FROM playlist A 
		INNER JOIN curator B on B.cur_id = A.cur_id
		INNER JOIN platform C on C.plat_id = A.plat_id
		GROUP BY C.platform";

$curatorCount = mysqli_query($conn, $sql);

while($row2 = mysqli_fetch_assoc($curatorCount)){
	switch ($row2["platform"]){
		case "TIDAL":
			$totalTidalCuratorCount = $row2["cCount"];
		break;
		case "SOUNDCLOUD":
			$totalSoundCloudCuratorCount = $row2["cCount"];
		break;
		case "APPLE MUSIC":
			$totalAppleMusicCuratorCount = $row2["cCount"];			
		break;
		case "SPOTIFY":
			$totalSpotifyCuratorCount = $row2["cCount"];
		break;
		case "AUDIOMACK":
			$totalAudiomackCuratorCount = $row2["cCount"];
		break;
		case "BANDCAMP":
			$totalBandcampCuratorCount = $row2["cCount"];
		break;
		case "AMAZON MUSIC":
			$totalAmazonmusicCuratorCount = $row2["cCount"];
		break;
	}
}

$subCount = 0;

$sql = "SELECT COUNT(*) AS subCount
		FROM submission";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
	$subCount = $row['subCount'];
}
} catch(Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
<title>Platforms</title>
</head>
<header>
	<div class="topnav">
		<a class = "active" href="DynamicPlatform.php">PLATFORMS</a>
		<?php echo("<a style=\"float:right\" href=\"About.php?id=".null."&name=".null."&platform=".null."&grouping=".null."\">ABOUT</a>");?>
		<?php echo("<a style=\"float:right\" href=\"Contact.php?id=".null."&name=".null."&platform=".null."&grouping=".null."\">CONTACT US</a>");?>
		<a style="float:right" href="Submit.php">SUBMIT</a>
	</div>
</header>
<body class = "body">
<div class="container">

	<div class="cell">
		<p>Choose Your Platform</p>
	</div>
	
	<?php
		$i = 0; 
		$x = 0; 
		$firstPass = false; 
		$count = mysqli_num_rows($platforms);
		while($row = mysqli_fetch_assoc($platforms)){
			$trimmed = str_replace(' ', '', $row["platform"]);
			//logic used to print table cells in a 3x3 grid
			echo("<div class=\"cell cell-".$trimmed."\">\n");
			echo("<br>".$row["platform"]."\n");
			echo("<div>\n");
			echo("Number of Curators: ");

			switch ($row["platform"]){
				case "TIDAL":
					echo($totalTidalCuratorCount);
				break;
				case "SOUNDCLOUD":
					echo($totalSoundCloudCuratorCount);
				break;
				case "APPLE MUSIC":
					echo($totalAppleMusicCuratorCount);
				break;
				case "SPOTIFY":
					echo($totalSpotifyCuratorCount);
				break;
				case "AUDIOMACK":
					echo($totalAudiomackCuratorCount);
				break;
				case "BANDCAMP":
					echo($totalBandcampCuratorCount);
				break;
				case "AMAZON MUSIC":
					echo($totalAmazonmusicCuratorCount);
				break;
			}			
			echo("<br>\n");

			echo("Number of Playlists: ");
			switch ($row["platform"]){
				case "TIDAL":
					echo($totalTidalCount);
				break;
				case "SOUNDCLOUD":
					echo($totalSoundCloudCount);
				break;
				case "APPLE MUSIC":
					echo($totalAppleMusicCount);
				break;
				case "SPOTIFY":
					echo($totalSpotifyCount);
				break;
				case "AUDIOMACK":
					echo($totalAudiomackCount);
				break;
				case "BANDCAMP":
					echo($totalBandcampCount);
				break;
				case "AMAZON MUSIC":
					echo($totalAmazonmusicCount);
				break;
			}

			echo("</div>\n");
			echo("<button class=\"btn btn_".$trimmed."\" onclick=\"sendToPlatform(".$row["plat_id"].")\">ENTER</button>\n");
			echo("</div>\n");
		}
	?>
	
	<div class="cell">
		<p>Pending Submissions: <?php echo($subCount); ?></p>
	</div>

	<div>
		<footer>
			Version: 0.01 <br> Pegasus Collective, LLC <br> E-Mail: <a href="mailto:cultureCurations@gmail.com"> Contact </a>
		</footer>
	</div>
	<footer>
	<script>
	</script>
</div>
</body>
</html>
