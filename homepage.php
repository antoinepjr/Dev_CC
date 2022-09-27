<!doctype html>
<html>
    <head>
        <meta name="viewport" content="" width=device-width, inital-scale="1.0">
        <link rel="stylesheet" href="v2StyleSheet.css">
        <script src="script.js"></script>

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
            
           try{
                $sql = "CALL retrievePlatformInfo()";
                $platforms = mysqli_query($conn, $sql);

                mysqli_next_result($conn);

                $totalTidalCount = 0;
                $totalSoundCloudCount = 0;
                $totalAppleMusicCount = 0;
                $totalSpotifyCount = 0;
                $totalAudiomackCount = 0;
                $totalBandcampCount = 0;
                $totalAmazonmusicCount = 0;

                
                $sql = "CALL retrievePlaylistCountPerPlatform()";
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

                mysqli_next_result($conn);

                $totalTidalCuratorCount = 0;
                $totalSpotifyCuratorCount = 0;
                $totalAppleMusicCuratorCount = 0;
                $totalSoundCloudCuratorCount = 0;
                $totalAudiomackCuratorCount = 0;
                $totalBandcampCuratorCount = 0;
                $totalAmazonmusicCuratorCount = 0;

                $sql = "CALL retrieveCuratorCountPerPlatform()";
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
                
                mysqli_next_result($conn);

                $subCount = 0; 

                $sql = "CALL retrieveSubmissionCount()";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){
                    $subCount = $row['subCount'];
                }

                mysqli_next_result($conn);

            } catch(Exception $e){
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
        ?>
        <title>Culture Curations</title>
    </head>
    <header>
    <div class="topnav3">
		<a class = "active" href="homepage.php">CULTURE CURATIONS</a>
		<?php echo("<a style=\"float:right\" href=\"About.php?id=".null."&name=".null."&platform=".null."&grouping=".null."\">ABOUT</a>");?>
		<?php echo("<a style=\"float:right\" href=\"Contact.php?id=".null."&name=".null."&platform=".null."&grouping=".null."\">CONTACT US</a>");?>
		<a style="float:right" href="Submit.php">SUBMIT</a>
	</div>    
    </header>
    <body>
        <div class="grid-container">
            <?php 
                while($row = mysqli_fetch_assoc($platforms)){
                    $trimmed = str_replace(' ', '', $row["platform"]);
                    echo("<a class=\"grid-item ".$trimmed."\" href=\"curators.php?id=".$row["plat_id"]."\" target=\"window_1\">");
                    echo($row["platform"]."<br> <p># of Curators: ");
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
                    echo("<br> # of Playlists: ");
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
                    echo("</p></a>");
                }
            ?>
        </div>
        <div>
            <p>Pending Submissions: <?php echo($subCount);?></p>
        </div>
        <div>
            <iframe style="height:700px; width:100%; border:none;" title="Platform Select" name="window_1" src="/_contentHere.html">        
            </iframe>
        </div>
    </body>
    <footer>
        Version: 1.00 <br> Pegasus Collective, LLC <br>  E-Mail: <a href="mailto:admin1@CultureCurations.com"> Contact </a>
    </footer>        
</html>