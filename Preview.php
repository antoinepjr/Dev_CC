<!doctype html>
<html>
    <head>
        <meta name="viewport" content="" width=device-width, inital-scale="1.0">
        <link rel="stylesheet" href="v2StyleSheet.css">
        <script src="script.js"></script>
        
        <?php 
            try {
                $name = $_POST["name"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $email = $_POST["email"];

                $platform0 = $_POST["platform0"];
                $pgrouping0 = $_POST["PGrouping0"];
                $pname0 = $_POST["PName0"];
                $plink0 = $_POST["PLink0"];

                $platform1 = $_POST["platform1"];
                $pgrouping1 = $_POST["PGrouping1"];
                $pname1 = $_POST["PName1"];
                $plink1 = $_POST["PLink1"];
                
                $platform2 = $_POST["platform2"];
                $pgrouping2 = $_POST["PGrouping2"];
                $pname2 = $_POST["PName2"];
                $plink2 = $_POST["PLink2"];

                $platform3 = $_POST["platform3"];
                $pgrouping3 = $_POST["PGrouping3"];
                $pname3 = $_POST["PName3"];
                $plink3 = $_POST["PLink3"];

            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
        ?>
    </head>
    <header>
        <div class="topnav">
            <a href="homepage.php">HOME</a>
            <a style="float:right" href="About.php">ABOUT</a>
            <a style="float:right" href="Contact.php">CONTACT US</a>
            <a style="float:right" href="Submit.php">SUBMIT</a>
            <a class="active" style="float:right" href="Preview.php">PREVIEW</a>
        </div>
    </header>
    <body>
        <div class="container">
            <div class="cell cell-1">
                    <?php
                        echo($platform0);
                        echo("<br>");
                        echo($pgrouping0);
                        echo("<br>");
                        echo($pname0);
                        echo("<br>");
                        echo($plink0);	                                                
                    ?>
            </div>	
            <div class="cell cell-2">
                    <?php
                        echo($platform1);
                        echo("<br>");
                        echo($pgrouping1);                        
                        echo("<br>");
                        echo($pname1);
                        echo("<br>");
                        echo($plink1);
                    ?>
            </div>
            <div class="cell cell-3">
                    <?php
                        echo($platform2);
                        echo("<br>");
                        echo($pgrouping2);                    
                        echo("<br>");
                        echo($pname2);
                        echo("<br>");
                        echo($plink2);
                    ?>
            </div>
            <div class="cell cell-4">
                    <?php
                        echo($platform3);
                        echo("<br>");
                        echo($pgrouping3);
                        echo("<br>");
                        echo($pname3);
                        echo("<br>");
                        echo($plink3); 
                    ?>
            </div>
            <div class="cell cell-5">
                    <?php
                        echo($name);
                        echo("<br>");
                        echo($fname);
                        echo("<br>");
                        echo($lname);
                        echo("<br>");
                        echo($email);
                        
                    ?>
            </div>
            <!-- 
                Look into mongoDB connection that will allow adds 
                 of this format. 
                 This will allow submissons be saved somewhere to be retrieved 
                 weekly.
             -->
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
                                    
                    //Using binding statement for SQL statements
                    $statement = $conn->prepare("INSERT INTO submission (userName, fname, lname, email, platform, playlistGrouping, playlistName, embedLink)
                                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    
                    $groupingTest = empty($pgrouping0);
                    $nameTest = empty($pname0);
                    $linkTest = empty($plink0);

                    if (!$groupingTest || !$nameTest || !$linkTest) {
                        $statement->bind_param("ssssssss", $name, $fname, $lname, $email, $platform0, $pgrouping0, $pname0, $plink0);                           
                        $statement->execute();    
                    }

                    $groupingTest = empty($pgrouping1);
                    $nameTest = empty($pname1);
                    $linkTest = empty($plink1);

                    if (!$groupingTest || !$nameTest || !$linkTest) {
                        $statement->bind_param("ssssssss", $name, $fname, $lname, $email, $platform1, $pgrouping1, $pname1, $plink1);
                        $statement->execute();    
                    }
                    
                    $groupingTest = empty($pgrouping2);
                    $nameTest = empty($pname2);
                    $linkTest = empty($plink2);

                    if (!$groupingTest || !$nameTest || !$linkTest) {
                        $statement->bind_param("ssssssss", $name, $fname, $lname, $email, $platform2, $pgrouping2, $pname2, $plink2);
                        $statement->execute();    
                    }

                    $groupingTest = empty($pgrouping3);
                    $nameTest = empty($pname3);
                    $linkTest = empty($plink3);

                    if (!$groupingTest || !$nameTest || !$linkTest) {
                        $statement->bind_param("ssssssss", $name, $fname, $lname, $email, $platform3, $pgrouping3, $pname3, $plink3);
                        $statement->execute();    
                    }

                    $statement->close();
                    $conn->close();                

                } catch(Exception $e) {
                        echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
            ?>
        </div>
    </body>
</html>
