<!doctype html>
<html>
<head>
<meta name="viewport" content="" width=device-width, inital-scale="1.0">
	<link rel="stylesheet" href="v2StyleSheet.css">
	<script src="script.js"></script></head>
<header>
	<div class="topnav">
		<a href="homepage.php">HOME</a>
		<a style="float:right" href="About.php">ABOUT</a>
		<?php echo("<a style=\"float:right\" href=\"Contact.php?id=".null."&name=".null."&platform=".null."&grouping=".null."\">CONTACT US</a>");?>
		<a class = "active" style="float:right" href="Submit.php">SUBMIT</a>
	</div>

	<div class="topnav2"> 
		<a class="hts">HOW TO SUBMIT:</a>
		<a class="tidal" href="Submit_HowTo.php?id=1">TIDAL</a>
		<a class="appleMusic" href="Submit_HowTo.php?id=2">APPLE MUSIC</a>
		<a class="soundcloud" href="Submit_HowTo.php?id=3">SOUNDCLOUD</a>
		<a class="spotify" href="Submit_HowTo.php?id=4">SPOTIFY</a>
		<a class="audiomack" href="Submit_HowTo.php?id=5">AUDIOMACK</a>
		<a class="bandcamp" href="Submit_HowTo.php?id=6">BANDCAMP</a>
	</div>
</header>

<body>
		<div class="container-submit">
			<form role="form" action="Preview.php" method="post">
				<div class="container-submit">
					<label for="name">User Name:</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
				</div>
				<div class="container-submit">
					<label for="fname">First Name:</label>
					<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
				</div>
				<div class="container-submit">
					<label for="name">Last Name:</label>
					<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Name">
				</div>
				<div class="container-submit">
					<label for="email">Email:</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Enter E-Mail">
				</div>
				<?php $i = 0 ?>
				<fieldset>
					<legend>Playlist Information</legend>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"TIDAL\" checked> TIDAL<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Spotify\"> Spotify<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"AppleMusic\"> Apple Music<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"SoundCloud\"> SoundCloud<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Audiomack\"> Audiomack<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Bandcamp\"> Bandcamp<br>"); ?>
				<div class="container-submit">
					<label for="PGrouping">Playlist Grouping:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PGrouping".$i."\" name=\"PGrouping".$i."\" placeholder=\"Enter Playlist Grouping\">"); ?>
				</div>
				<div class="container-submit">
					<label for="PName">Playlist Name:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PName".$i."\" name=\"PName".$i."\" placeholder=\"Enter Playlist Name\">"); ?>
				</div>
				<div class="container-submit">
					<label for="PLink">Playlist Link:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PLink".$i."\" name=\"PLink".$i."\" placeholder=\"Enter Playlist Link\">"); ?>					
				</div>
				</fieldset>
				<?php $i += 1 ?>
				<fieldset>
					<legend>Playlist information</legend>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"TIDAL\" checked> TIDAL<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Spotify\"> Spotify<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"AppleMusic\"> Apple Music<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"SoundCloud\"> SoundCloud<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Audiomack\"> Audiomack<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Bandcamp\"> Bandcamp<br>"); ?>
				<div class="container-submit">
					<label for="PGrouping">Playlist Grouping:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PGrouping".$i."\" name=\"PGrouping".$i."\" placeholder=\"Enter Playlist Grouping\">"); ?>
				</div>
				<div class="container-submit">
					<label for="PName">Playlist Name:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PName".$i."\" name=\"PName".$i."\" placeholder=\"Enter Playlist Name\">"); ?>
				</div>
				<div class="container-submit">
					<label for="PLink">Playlist Link:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PLink".$i."\" name=\"PLink".$i."\" placeholder=\"Enter Playlist Link\">"); ?>
				</div>
				</fieldset>
				<?php $i += 1 ?>
				<fieldset>
					<legend>Playlist information</legend>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"TIDAL\" checked> TIDAL<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Spotify\"> Spotify<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"AppleMusic\"> Apple Music<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"SoundCloud\"> SoundCloud<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Audiomack\"> Audiomack<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Bandcamp\"> Bandcamp<br>"); ?>
				<div class="container-submit">
					<label for="PGrouping">Playlist Grouping:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PGrouping".$i."\" name=\"PGrouping".$i."\" placeholder=\"Enter Playlist Grouping\">"); ?>
				</div>
				<div class="container-submit">
					<label for="PName">Playlist Name:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PName".$i."\" name=\"PName".$i."\" placeholder=\"Enter Playlist Name\">"); ?>
				</div>
				<div class="container-submit">
					<label for="PLink">Playlist Link:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PLink".$i."\" name=\"PLink".$i."\" placeholder=\"Enter Playlist Link\">"); ?>
				</div>
				</fieldset>
				<?php $i += 1 ?>
				<fieldset>
					<legend>Playlist information</legend>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"TIDAL\" checked> TIDAL<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Spotify\"> Spotify<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"AppleMusic\"> Apple Music<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"SoundCloud\"> SoundCloud<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Audiomack\"> Audiomack<br>"); ?>
					<?php echo("<input type=\"radio\" name=\"platform".$i."\" value=\"Bandcamp\"> Bandcamp<br>"); ?>
				<div class="container-submit">
					<label for="PGrouping">Playlist Grouping:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PGrouping".$i."\" name=\"PGrouping".$i."\" placeholder=\"Enter Playlist Grouping\">"); ?>
				</div>
				<div class="container-submit">
					<label for="PName">Playlist Name:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PName".$i."\" name=\"PName".$i."\" placeholder=\"Enter Playlist Name\">"); ?>
				</div>
				<div class="container-submit">
					<label for="PLink">Playlist Link:</label>
					<?php echo("<input type=\"text\" class=\"form-control\" id=\"PLink".$i."\" name=\"PLink".$i."\" placeholder=\"Enter Playlist Link\">"); ?>
				</div>
				</fieldset>
				<input class ="btn btn_glow" type="submit" value="Submit">
			</form>
		</div>
</body>
</html>