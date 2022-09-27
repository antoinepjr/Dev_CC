<!doctype html>
<html>
    <head>
        <meta name="viewport" content="" width=device-width, inital-scale="1.0">
        <link rel="stylesheet" href ="v1StyleSheet.css">
        <script src="script.js"></script>

        <?php 
            $id = $_GET["id"];
        ?>
    </head>
    <header> 
        <div class="topnav">
            <a href="homepage.php">HOME</a>
		    <a style="float:right" href="About.php">ABOUT</a>
		    <a style="float:right" href="Contact.php">CONTACT US</a>
		    <a style="float:right" href="Submit.php">SUBMIT</a>
        </div>

        <?php
            switch($id){
                case "1":		
                    echo("<div class=\"topnav2\">");
                    echo("<a class=\"hts\" href=\"Submit.php\">HOW TO SUBMIT:</a>");
                    echo("<a class=\"tidal active\" href=\"Submit_HowTo.php?id=1\">TIDAL</a>");
                    echo("<a class=\"appleMusic\" href=\"Submit_HowTo.php?id=2\">APPLE MUSIC</a>");
                    echo("<a class=\"soundcloud\" href=\"Submit_HowTo.php?id=3\">SOUNDCLOUD</a>");
                    echo("<a class=\"spotify\" href=\"Submit_HowTo.php?id=4\">SPOTIFY</a>");
                    echo("<a class=\"audiomack\" href=\"Submit_HowTo.php?id=5\">AUDIOMACK</a>");
                    echo("<a class=\"bandcamp\" href=\"Submit_HowTo.php?id=6\">BANDCAMP</a>");
                    echo("</div>");    
                    break;
                case "2":
                    echo("<div class=\"topnav2\">");
                    echo("<a class=\"hts\" href=\"Submit.php\">HOW TO SUBMIT:</a>");
                    echo("<a class=\"tidal\" href=\"Submit_HowTo.php?id=1\">TIDAL</a>");
                    echo("<a class=\"appleMusic active\" href=\"Submit_HowTo.php?id=2\">APPLE MUSIC</a>");
                    echo("<a class=\"soundcloud\" href=\"Submit_HowTo.php?id=3\">SOUNDCLOUD</a>");
                    echo("<a class=\"spotify\" href=\"Submit_HowTo.php?id=4\">SPOTIFY</a>");
                    echo("<a class=\"audiomack\" href=\"Submit_HowTo.php?id=5\">AUDIOMACK</a>");
                    echo("<a class=\"bandcamp\" href=\"Submit_HowTo.php?id=6\">BANDCAMP</a>");
                    echo("</div>");    
                    break;
                case "3":
                    echo("<div class=\"topnav2\">");
                    echo("<a class=\"hts\" href=\"Submit.php\">HOW TO SUBMIT:</a>");
                    echo("<a class=\"tidal\" href=\"Submit_HowTo.php?id=1\">TIDAL</a>");
                    echo("<a class=\"appleMusic\" href=\"Submit_HowTo.php?id=2\">APPLE MUSIC</a>");
                    echo("<a class=\"soundcloud active\" href=\"Submit_HowTo.php?id=3\">SOUNDCLOUD</a>");
                    echo("<a class=\"spotify\" href=\"Submit_HowTo.php?id=4\">SPOTIFY</a>");
                    echo("<a class=\"audiomack\" href=\"Submit_HowTo.php?id=5\">AUDIOMACK</a>");
                    echo("<a class=\"bandcamp\" href=\"Submit_HowTo.php?id=6\">BANDCAMP</a>");
                    echo("</div>");    
                    break;
                case "4":
                    echo("<div class=\"topnav2\">");
                    echo("<a class=\"hts\" href=\"Submit.php\">HOW TO SUBMIT:</a>");
                    echo("<a class=\"tidal\" href=\"Submit_HowTo.php?id=1\">TIDAL</a>");
                    echo("<a class=\"appleMusic\" href=\"Submit_HowTo.php?id=2\">APPLE MUSIC</a>");
                    echo("<a class=\"soundcloud\" href=\"Submit_HowTo.php?id=3\">SOUNDCLOUD</a>");
                    echo("<a class=\"spotify active\" href=\"Submit_HowTo.php?id=4\">SPOTIFY</a>");
                    echo("<a class=\"audiomack\" href=\"Submit_HowTo.php?id=5\">AUDIOMACK</a>");
                    echo("<a class=\"bandcamp\" href=\"Submit_HowTo.php?id=6\">BANDCAMP</a>");
                    echo("</div>");    
                    break;
                case "5":
                    echo("<div class=\"topnav2\">");
                    echo("<a class=\"hts\" href=\"Submit.php\">HOW TO SUBMIT:</a>");
                    echo("<a class=\"tidal\" href=\"Submit_HowTo.php?id=1\">TIDAL</a>");
                    echo("<a class=\"appleMusic\" href=\"Submit_HowTo.php?id=2\">APPLE MUSIC</a>");
                    echo("<a class=\"soundcloud\" href=\"Submit_HowTo.php?id=3\">SOUNDCLOUD</a>");
                    echo("<a class=\"spotify\" href=\"Submit_HowTo.php?id=4\">SPOTIFY</a>");
                    echo("<a class=\"audiomack active\" href=\"Submit_HowTo.php?id=5\">AUDIOMACK</a>");
                    echo("<a class=\"bandcamp\" href=\"Submit_HowTo.php?id=6\">BANDCAMP</a>");
                    echo("</div>");    
                    break;
                case "6":
                    echo("<div class=\"topnav2\">");
                    echo("<a class=\"hts\" href=\"Submit.php\">HOW TO SUBMIT:</a>");
                    echo("<a class=\"tidal\" href=\"Submit_HowTo.php?id=1\">TIDAL</a>");
                    echo("<a class=\"appleMusic\" href=\"Submit_HowTo.php?id=2\">APPLE MUSIC</a>");
                    echo("<a class=\"soundcloud\" href=\"Submit_HowTo.php?id=3\">SOUNDCLOUD</a>");
                    echo("<a class=\"spotify\" href=\"Submit_HowTo.php?id=4\">SPOTIFY</a>");
                    echo("<a class=\"audiomack\" href=\"Submit_HowTo.php?id=5\">AUDIOMACK</a>");
                    echo("<a class=\"bandcamp active\" href=\"Submit_HowTo.php?id=6\">BANDCAMP</a>");
                    echo("</div>");    
                    break;
            }
        ?>
    </header>
    <body>
        <?php
            switch($id){
                case "1":
                    echo("<table>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/T_Step1.png\">");
                    echo("</td>");
                    echo("<td>");
                    echo("Select the more option that is displayed on the playlist screen.");
                    echo("</td>");
                    echo("</tr>");

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/T_Step2.png\">");
                    echo("</td>");
                    echo("<td>");
                    echo("Select the share, then the copy embed code option.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr><td colspan=2>OR</td></tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/T_Step1_1.png\">");
                    echo("</td>");
                    echo("<td>");
                    echo("Select the share option that is diplayed on the playlist screen.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/T_Step2_1.png\">");
                    echo("</td>");
                    echo("<td>");
                    echo("Select the 'Copy Embed Code' option.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Submit_Insert.png\">");
                    echo("</td>");
                    echo("<td>");
                    echo("On the submission screen within CultureCurations, paste the copied link here.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Paste_Insert.png\">");
                    echo("</td>");
                    echo("<td>");
                    echo("In order to paste the playlist: select the box, right-click, then select the paste option.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("</table>");
                    break;
                case "2":
                    echo("<table>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/AM_Step1.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Within iTunes, select the playlist you want ot share and click on the (...) icon.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/AM_Step2.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Inside the menu select \"Share Playlist\", after that select the option to \"Copy Embed Code \".");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr><td colspan=2>OR</td></tr>");

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/AM_Step1_1.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Within Apple Music, select the playlist you want to share and press the (...) icon. Within that menu press the \"Share Playlist...\".");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/AM_Step2_1.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("After selecting \"Share Playlist\", Use the mail(e-mail) option.");
                    echo("</td>");
                    echo("</tr>");

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/AM_Step3_1.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Within the e-mail message address the e-mail to \"admin1@culturecurations.com\". Submit a user name, first name, last name and desired e-mail address for site updates.");
                    echo("</td>");
                    echo("</tr>");

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Submit_Insert.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("On the submission screen within CultureCurations, paste the copied link here.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Paste_Insert.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("In order to paste the playlist: select the box, right-click, then select the paste option.");
                    echo("</td>");
                    echo("</tr>");                                      
                    
                    echo("</table>");
                    break;
                case "3":
                    echo("<table>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/SC_Step1.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Find the playlist you want to submit and select the \"Share\" option");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/SC_Step2.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Within the \"Share\" menu, select the \"Embed\" option. Pick the player of your choice and copy the code displayed in the \"Code\" section.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Submit_Insert.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("On the submission screen within CultureCurations, paste the copied link here.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Paste_Insert.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("In order to paste the playlist: select the box, right-click, then select the paste option.");
                    echo("</td>");
                    echo("</tr>");                                      
                    
                    echo("</table>");
                    break;
                case "4":
                    echo("<table>");

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/S_Step1.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Find the playlist you want to submit and select the (...) option.");
                    echo("</td>");
                    echo("</tr>");                                      

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/S_Step2.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Within that menu select the \"Share\" option then the \"Embed Playlist\" option.");
                    echo("</td>");
                    echo("</tr>");                                      

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Submit_Insert.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("On the submission screen within CultureCurations, paste the copied link here.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Paste_Insert.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("In order to paste the playlist: select the box, right-click, then select the paste option.");
                    echo("</td>");
                    echo("</tr>");                                      
                    
                    echo("</table>");
                    break;
                case "5":
                    echo("<table>");

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/AuM_Step1.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("On the screen where the playlist is displayed select the (...) option.");
                    echo("</td>");
                    echo("</tr>");                                      

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/AuM_Step2.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Select the \"Embed\" option.");
                    echo("</td>");
                    echo("</tr>");                                      
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src = \"images/Aum_Step3.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Copy the information for the embed code.");
                    echo("</td>");
                    echo("</tr>");                                      
                                        
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Submit_Insert.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("On the submission screen within CultureCurations, paste the copied link here.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Paste_Insert.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("In order to paste the playlist: select the box, right-click, then select the paste option.");
                    echo("</td>");
                    echo("</tr>");                                      
                    
                    echo("</table>");

                    break;
                case "6":
                    echo("<table>");

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/BC_Step1.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("On the album/song selection, select the \"Share/Embed\" option.");
                    echo("</td>");
                    echo("</tr>");                                      

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/BC_Step2.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Select the option to \"Embed this album\".");
                    echo("</td>");
                    echo("</tr>");                                      

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/BC_Step3.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Select the style option of your choosing.");
                    echo("</td>");
                    echo("</tr>");                                      

                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/BC_Step4.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("Select the option to \"Show Tracklist\" and copy the embed code within the text box.");
                    echo("</td>");
                    echo("</tr>");                                      
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Submit_Insert.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("On the submission screen within CultureCurations, paste the copied link here.");
                    echo("</td>");
                    echo("</tr>");
                    
                    echo("<tr>");
                    echo("<td>");
                    echo("<img src= \"images/Paste_Insert.png\" >");
                    echo("</td>");
                    echo("<td>");
                    echo("In order to paste the playlist: select the box, right-click, then select the paste option.");
                    echo("</td>");
                    echo("</tr>");                                      
                    
                    echo("</table>");
                    break;
            }
        ?>
    </body>
</html>