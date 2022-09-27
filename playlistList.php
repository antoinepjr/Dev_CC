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

                $sql = "CALL retrievePlaylistGroupingPerUser(\"".$name."\",\"".$platformD."\")";
                $result = mysqli_query($conn, $sql);

                mysqli_next_result($conn);
            } catch (Exception $e){
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
        ?>
    <title>Playlist List</title>
    </head>
    <header>
        <div class="topnav">
            <?php echo("<a>".$platformD."</a>"); ?>
            <?php echo("<a href=\"curators.php?id=".$id."\">CURATORS</a>");?>
            <?php echo("<a class=\"active\" href=\"playlistList.php?id=".$id."&platform=".$platform."&name=".$name."\">".$name."</a>");?>
        </div>
    </header>    
    <body>
        <div class="grid-container">
            <?php 
                while($row = mysqli_fetch_assoc($result)){
                    echo("<a class=\"grid-item\" href=\"playlistGrid.php?id=".$id."&platform=".$platform."&name=".$name."&grouping=".$row["playlistGrouping"]."\")>");
                    echo($row["playlistGrouping"]);
                    echo("</a>");
                }
            ?>
        </div>
    </body>
</html>