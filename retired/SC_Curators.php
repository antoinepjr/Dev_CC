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
$sql = "SELECT DISTINCT A.userName
		FROM curator A
		INNER JOIN playlist B ON B.cur_id = A.cur_id 
		WHERE B.plat_id = '3'";
		
$result = mysqli_query($conn, $sql);} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
<title>SoundCloud Curators</title>
</head>
<header>
	<div class="topnav a">
		<a href="Platform.php">PLATFORMS</a>
		<a class = "active" href="SC_Curators.php">SOUNDCLOUD</a>
		<a style="float:right" href="About.php">ABOUT</a>
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
				echo("<button class=\"btn \" onclick =goToPlaylistList(\"".$row["userName"]."\")>");
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
		function goToPlaylistList(name){
			window.location = "PlaylistList.php?name="+name+"&platform=soundCloud";
			//location.href = "PlaylistList.php?id="+id;
			}
	</script>
</body>
</html>