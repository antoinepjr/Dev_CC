<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="v1StyleSheet.css">
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
	<script src="script.js"></script>
<?php
$servername = "127.0.0.1";
$username = "admin";
$password = "password";
$dbname = "v1_cc";
try {

//mySQL Connection String 
//Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check connection 
if (!$conn){
    die("mySQL: Connection failed: ". mysqli_connect_error());
}
//echo "mySQL: Connected successfully";
//echo "\n";

//TODO: CREATE QUERY THAT WILL COUNT THE DIFFERENT
//	    PLAYLISTS SORTED BY PLATFORM & COUNT LOGIC
$totalTidalCount = 0;
$totalSoundCloudCount = 0;
$totalAppleMusicCount = 0;
$totalSpotifyCount = 0;

$sql = "SELECT B.platform, COUNT(A.play_id) AS pCount
		FROM playlist A
		INNER JOIN platform B ON B.plat_id = A.plat_id
		GROUP BY B.platform";
		
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
	switch ($row["platform"]){
		case "TIDAL":
			$totalTidalCount = $row["pCount"];
		break;
		case "SOUNDCLOUD":
			$totalSoundCloudCount = $row["pCount"];
		break;
		case "APPLEMUSIC":
			$totalAppleMusicCount = $row["pCount"];
		break;
		case "SPOTIFY":
			$totalSpotifyCount = $row["pCount"];
		break;
	}
}
	
$totalTidalCuratorCount = 0;
$totalSpotifyCuratorCount = 0;
$totalAppleMusicCuratorCount = 0;
$totalSoundCloudCuratorCount = 0;

$sql = "SELECT C.platform, COUNT(DISTINCT B.cur_id) AS cCount
		FROM playlist A 
		INNER JOIN curator B on B.cur_id = A.cur_id
		INNER JOIN platform C on C.plat_id = A.plat_id
		GROUP BY C.platform";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
	switch ($row["platform"]){
		case "TIDAL":
			$totalTidalCuratorCount = $row["cCount"];
		break;
		case "SOUNDCLOUD":
			$totalSoundCloudCuratorCount = $row["cCount"];
		break;
		case "APPLEMUSIC":
			$totalAppleMusicCuratorCount = $row["cCount"];
		break;
		case "SPOTIFY":
			$totalSpotifyCuratorCount = $row["cCount"];
		break;
	}
}

$i = 0;

$sql = "SELECT COUNT(*) AS subCount
		FROM submission";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
	$i = $row['subCount'];
}
} catch(Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
<title>Platforms</title>
</head>
<header>
	<div class="topnav">
		<a class = "active" href="Platform.php">PLATFORMS</a>
		<a style="float:right" href="About.php">ABOUT</a>
		<a style="float:right" href="Submit.php">SUBMIT</a>
	</div>
</header>
<body class = "body">
<div class="container">
	
	<div class="cell">
	</div>
	
	<div class="cell cell-spotify">
		<!--<img src="spotify-logo-transparent.jpg" alt="image" width="256" height="256">-->
		<br>Spotify
	    <div>
			<?php
				echo("Number of Curators: "); 
				echo($totalSpotifyCuratorCount);
				echo("<br>"); 
				echo("Number of Playlists: ");
				echo($totalSpotifyCount);				
			?>
		</div>
		<button class="btn btn_sp" onclick = "sendToSpotify()">ENTER</button>		  
	</div>
	
	<div class="cell">
	<p>Pending Submissions: <?php echo($i); ?></p>
	</div>

	<div class="cell cell-tidal">
		<!--<img src="tidal-logo-black-6.jpg" alt = "image" width="256" height="256">-->
		<br>TIDAL
	    <div>
			<?php 
				echo("Number of Curators: ");
				echo($totalTidalCuratorCount);
				echo("<br>");
				echo("Number of Playlists: ");
				echo($totalTidalCount);
			?>
		</div>
		<button class="btn btn_td" onclick = "sendToTidal()">ENTER</button>
	</div>

	<div class="cell">
	<p>Choose Your Platform</p>
	</div>

	<div class = "cell cell-appleMusic">
		<!--<img src="apple-music.jpg" alt = "image" width="256" height="256">-->
		<br>Apple Music
	    <div>
			<?php
				echo("Number of Curators: ");
				echo($totalAppleMusicCuratorCount);
				echo("<br>");
				echo("Number of Playlists: ");
				echo($totalAppleMusicCount);
			?>
		</div>
		<button class="btn btn_am" onclick = "sendToAppleMusic()">ENTER</button>
	</div>

	<div class="cell">
	</div>

	<div class = "cell cell-soundCloud">
		<!--<img src="soundcloud.jpg" alt = "image" width="256" height="256">-->
		<br>SoundCloud
		<div>
			<?php 
				echo("Number of Curators: ");
				echo($totalSoundCloudCuratorCount);
				echo("<br>");
				echo("Number of Playlists: ");
				echo($totalSoundCloudCount);
			?>
		</div>
		<button class="btn btn_sc" onclick = "sendtoSoundCloud()">ENTER</button>
	</div>

	<div class="cell">
	</div>

	<script>
	</script>
</div>
</body>
	<footer>
		Version: 0.01 <br> Pegasus Collective, LLC <br> E-Mail: <a href="mailto:theplugvinyl@gmail.com"> Contact </a>
	</footer>
</html>