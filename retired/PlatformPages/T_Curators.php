<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="v1StyleSheet.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="script.js"></script><?php
	
try {
	//Connect to MongoDB Client 
	$manager = new MongoDB\Driver\Manager("mongodb://");
	//$manager = new MongoDB\Driver\Manager("mongodb+srv://%21@sandbox1-ppowj.azure.mongodb.net/test?retryWrites=true&w=majority");

	//Create filter for '_id' retrival
	$filter = [];

	//Create projection that only grabs '_id'
	$options = ['projection' => ['_id' => 1]];

	//Define query
	//$query = new MongoDB\Driver\Query($filter, $options);
	$query = new MongoDB\Driver\Query($filter);

	//Retrive result set from query
	$cursor = $manager->executeQuery("v4_Prototype.curator", $query);
} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
<title>Tidal Curators</title>
</head>
<header>
	<div class="topnav a">
		<a href="Platform.php">PLATFORMS</a>
		<a class = "active" href="T_Curators.php">TIDAL</a>
		<a style="float:right" href="About.php">ABOUT</a>
	</div>
</header>
<body>
	<div class="container">
		<?php
			$y = 1; 
			$firstPass = false;
			//Grab the count of the curators 
			foreach($cursor as $document){
				//Retrieve counts of playlist object 
				$count_tidal = $document->platform[0]->tidal[0]->playlist;
				$playlistCount = count($count_tidal);
				$name = $document->name;

				if ($playlistCount > 0){
					echo("<div class=\"cell cell-".$y."\">");
					echo("<button class=\"btn \" onclick =goToPlaylistList(\"".$name."\")>");
					echo($name);
					echo("</div>");
					if ($y > 3) {
						$y = 0;
					}
					$y += 1;
				}
			}
		?>			
	</div>	
	<script>
		function goToPlaylistList(name){
			window.location = "PlaylistList.php?name="+name+"&platform=tidal";
			//location.href = "PlaylistList.php?id="+id;
			}
	</script>
</body>
</html>
