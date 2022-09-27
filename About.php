<!doctype html>
<html>
<head>
<meta name="viewport" content="" width=device-width, inital-scale="1.0">
	<link rel="stylesheet" href="v1StyleSheet.css">
	<script src="script.js"></script>
</head>

<?php 
            include('config.php');

            try{
                //Try BlueHost Connection First
                $conn = mysqli_connect($BH_servername, $BH_username, $BH_password, $BH_dbname, $BH_port);
            } catch(Exception $e) {
                try{
                    //If Bluehost fails, Must be doing development work
                    $conn = mysqli_connect($DEV_servername, $DEV_username, $DEV_password, $DEV_dbname, $DEV_port);    
                } catch(Exception $e) {
                    echo 'Caught exception: ', $e->getMessage(), "\n";
                }
            }                  
            
try {
	//Retrieve 'id' from post page to list out curators playlists
		$aboutLink = 0;
		$contactLink = 0;
	
		$id = $_GET["id"];
		if ($id == null){
			$doesIdExist = False;
		} else {
			$doesIdExist = True;
			$aboutLink = 1; 
			$contactLink = 1;
		}
	
		$name = $_GET["name"];
		if ($name == null){
			$doesNameExist = False;
		} else {
			$doesNameExist = True;
			$aboutLink = 2; 
			$contactLink = 2;
		}

		$platform = $_GET["platform"];
		if ($platform == null){
			$doesPlatformExist = False;
		} else {
			$doesPlatformExist = True; 

			switch($platform){
				case "APPLEMUSIC":
					$platform = "APPLE MUSIC";
					break;
				case "AMAZONMUSIC":
					$platform = "AMAZON MUSIC";
					break;
				}	
			$aboutLink = 3; 
			$contactLink = 3;
		}

		$grouping = $_GET["grouping"];
		if ($grouping == null){
			$doesGroupingExist = False; 
		} else {
			$doesGroupingExist = True; 
			$aboutLink = 4;
			$contactLink = 4;
		}

	//Query to retieve the platform name when not supplied 
	if ($doesPlatformExist) {
		//Do Nothing 
	} else {
		$sql = "SELECT platform 
				FROM platform
				WHERE plat_id = '".$id."'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			$platform = $row["platform"];
		}
	}
} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}?>

<header>
	<div class="topnav">
		<a href="homepage.php">PLATFORMS</a>
		<?php if ($doesIdExist) {
			echo("<a href=\"curators.php?id=".$id."\">".$platform."</a>");
		}?>
		<?php if ($doesNameExist) {
			echo("<a href=\"playlistList.php?id=".$id."&name=".$name."&platform=".$platform."\">".$name."</a>");
		}?>
		<?php if ($doesGroupingExist) {
			echo("<a href=\"playlistGrid.php?id=".$id."&name=".$name."&platform=".$platform."&grouping=".$grouping."\">".$grouping."</a>");
		}?>
		<?php 
		switch ($aboutLink){
			case 0: 
				echo("<a class=\"active\" style=\"float:right\" href=\"About.php\">ABOUT</a>");
				break;
			case 1:
				echo("<a class=\"active\" style=\"float:right\" href=\"About.php?id=".$id."\">ABOUT</a>");
				break;
			case 2:
				echo("<a class=\"active\" style=\"float:right\" href=\"About.php?id=".$id."&name=".$name."\">ABOUT</a>");
				break;
			case 3:
				echo("<a class=\"active\" style=\"float:right\" href=\"About.php?id=".$id."&name=".$name."&platform=".$platform."\">ABOUT</a>");
				break;
			case 4:
				echo("<a class=\"active\" style=\"float:right\" href=\"About.php?id=".$id."&name=".$name."&platform=".$platform."&grouping=".$grouping."\">ABOUT</a>");
				break;
		}?>
		        <?php
        switch ($contactLink){
            case 0: 
                echo("<a style=\"float:right\" href=\"Contact.php?id=".null."&name=".null."&platform=".null."&grouping=".null."\">CONTACT US</a>");
                break;
            case 1: 
                echo("<a style=\"float:right\" href=\"Contact.php?id=".$id."\">CONTACT US</a>");
                break;
            case 2:
                echo("<a style=\"float:right\" href=\"Contact.php?id=".$id."&name=".$name."\">CONTACT US</a>");
                break;
            case 3:
                echo("<a style=\"float:right\" href=\"Contact.php?id=".$id."&name=".$name."&platform=".$platform."\">CONTACT US</a>");
                break;
            case 4:
                echo("<a style=\"float:right\" href=\"Contact.php?id=".$id."&name=".$name."&platform=".$platform."&grouping=".$grouping."\">CONTACT US</a>");
                break;
        }?>
	</div>
</header>
<body>
	<div> 
		<img src = "images/PCLLCLogo.png" alt = "LOGO" width = "450" height = "500">
	</div>

	<div> 
        Welcome to CultureCurations. The purpose of this website is to display user created playlists & artist submitted content. 
        Discovering music is eaiser than ever in the year 20XX, but it's always nice to have a guide.

        This is a space that allows that sharing.

        -Antoine P II {Creator and Operator} 
		On Behalf of Pegasus Collective, LLC
	</div>
</body>
</html>