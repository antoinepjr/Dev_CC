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
                $id = $_GET["id"];
        
                $sql = "CALL retrieveUsersPerPlatForm(\"".$id."\")";
                $result = mysqli_query($conn, $sql);

                mysqli_next_result($conn);
                $sql = "CALL retrieveNameOfPlatform(\"".$id."\")";
                $result2 = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result2)){
                    $platName = $row["platform"];
                }

                mysqli_next_result($conn);

            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
        ?>
    <title>Curators</title>
    </head>
    <header>
        <div class="topnav">
            <?php echo("<a>".$platName."</a>"); ?>
            <?php echo("<a class=\"active\" href=\"curators.php?id=".$id."\">CURATORS</a>");?>            
        </div>
    </header>
    <body>
        <div class="grid-container">
            <?php 
                while($row = mysqli_fetch_assoc($result)) {
                    echo("<a class=\"grid-item\" href=\"playlistList.php?id=".$id."&platform=".str_replace(' ', '',$platName)."&name=".$row["userName"]."\")>");
                    echo($row["userName"]);
                    echo("</a>");
                }
            ?>
        </div>
    </body>
</html>