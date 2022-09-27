<!doctype html>
<html>
    <head>
        <meta name="viewport" content=""width=device-width, initial-scale="1.0">
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
            $id = $_GET["id"];
            $name = $_GET["name"];
            $platform = $_GET["platform"];
        
            switch($platform){
                case "APPLEMUSIC":
                    $platformD = "APPLE MUSIC";
                    break;
                case "AMAZONMUSIC":
                    $platformD = "AMAZON MUSIC";
                    break;
                default:
                    $platformD = $platform;
                    break;
            }

            $grouping = $_GET["grouping"];

            $sql = "CALL getPlaylist(\"".$grouping."\",\"".$name."\",\"".$platformD."\")";
            $result = mysqli_query($conn, $sql);

            mysqli_next_result($conn);
            //$sql = "CALL getMatchingPlaylist()";
            //$result2 = mysqli_query($conn, $sql);

            //mysqli_next_result($conn);
            } catch (Exception $e) {
                echo 'Caught exeception: ', $e->getMessage(), "\n";
            }

            $appleIframe = "allow=\"autoplay *; encrypted-media *;\" frameborder=\"0\" height=\"450\" style=\"width:100%\"; max-width:660px; overflow:hidden; background:transparent; \" sandbox=\"allow-forms allow-popups allow-same-origin allow-scripts allow-storage-access-by-user-activation allow-top-navigation-by-user-activation\"";
        ?>
        <title>Playlist Grid</title>
    </head>
        <header>
            <div class="topnav">
                <?php echo("<a>".$platformD."</a>"); ?>
                <?php echo("<a href=\"curators.php?id=".$id."\">CURATORS</a>");?>
                <?php echo("<a href=\"playlistList.php?id=".$id."&platform=".$platform."&name=".$name."\">".$name."</a>");?>
                <?php echo("<a class=\"active\" href=\"playlistGrid.php?id".$id."&platform=".$platform."&name=".$name."&grouping=".$grouping."\">".$grouping."</a>");?>
            </div>     
        </header>
        <body>
            <div class="grid-container2">
               <div class="grid-container playlistContainer">
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                            $trimmed = str_replace(' ', '', $platform);
                            echo("<a class=\"grid-item playlist\"href=\"".$row["embedLink"]."\" target=\"plEmbed\">");
                            echo($row["playlistName"]);
                            echo("</a>");
                        }
                    ?>               
                </div>
                <div class="grid-item playlistEmbed">
                    <iframe 
                        <?php 
                            switch($platform){
                                case "APPLEMUSIC":
                                    echo(" ".$appleIframe." ");
                                    break;
                                default:
                                    echo("height=\"625\" 
                                          width=\"400\" 
                                          style=\"height: 100%; width:100%; border:none;\"");
                            }
                        ?>
                        title="Playlist Name" 
                        name="plEmbed" 
                        src="/_contentHere.html">
                    </iframe>
                </div>
                <!--
                <div class="grid-item">
    
                </div>
                -->
            </div>
        </body>
</html>