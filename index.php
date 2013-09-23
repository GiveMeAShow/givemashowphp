<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <title>Give me a show !</title>
        <link href="http://vjs.zencdn.net/4.1/video-js.css" rel="stylesheet">
        <script src="http://vjs.zencdn.net/4.1/video.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="javascript/javascript.js"></script>
        <script type="text/javascript" src="javascript/keyListener.js"></script>
        <script type="text/javascript" src="javascript/annyang.min.js"></script>
    </head>

    <body>
        <div id="header">
            <div id="titleContainer">
                Give me a show !
            </div>
            <table id="menuContainer">
                <tr>
                    <td class="menuItem" id="videoMenu">
                        Video
                    </td>
                    <td class="menuItem" id="playlistMenu">
                        Playlist
                    </td>
                    <td class="menuItem" id="aboutMenu">
                        About
                    </td>
                    <td class="menuItem" id="controlsMenu">
                        Controls
                    </td>
                </tr>
            </table>
        </div>
        <div id="mainContent">
            <table id="video_playlist">
                <tr>
                    <td>
                        <div id="showChooser">
                            Choose your show.
                            <?php 
                                include("php/GenerateThumbs.php");
                            ?>
                        </div>
                    </td>
                    <td>
                        <div id="videoTitle">
                            </div>
                            <video id="videoClip" class="video-js vjs-default-skin"
                                   controls preload="auto" width="640" height="360">
                            </video>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <table id="tabs">
                <tr>
                    <td class="footer_tab_element" id="about_help_button" onClick="expandFooter(showAbout);">About</td>
                    <td class="footer_tab_element" id="playlist_button" onClick="expandFooter(showPlayList);">PlayList</td>
                    <td class="footer_tab_element" id="control_button" onClick="expandFooter(showControls);">Controls</td>
                </tr>
                <div id="shadow_hidder"></div>
            </table>

            <div id="footer_content">
                <div class="tab_content" id="about_text">
                    <table class="footer_text_area" id="about_area">
                        <tr>
                            <td class="footer_speechpart">
                                <h2>About</h2>
                                <p>"Give Me A Show !" was not developed to make you less lazy but happier.</br>
                                    See the "Controls" section to see what you can do without moving your sweet ass.
                                </p>
                            </td>
                            <td class="footer_speechpart">
                                <h2>Contact</h2>
                                <ul>
                                    <li>Developped by Ogdabou</li>
                                    <li>Contact us.</li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="tab_content" id="playlistMaker">
                    <div id="pathFinder">
                        <?php 
                            include("php/GenerateTree.php");
                        ?>
                    </div>
                </div>

                <div class="tab_content" id="controls_text">
                    <table class="footer_text_area" id="controls_area">
                        <tr>
                            <td class="footer_speechpart">
                                <h2>Keyboard</h2>
                            </td>
                            <td class="footer_speechpart">
                                <h2>Voice</h2>
                            </td> 
                        </tr>
                        <tr>
                            <td class="footer_speechpart">
                                <ul>
                                    <li>Left Arrow : randomly change the video</li>
                                    <li>Right Arrow : previous video</li>
                                </ul>
                            </td>
                            <td class="footer_speechpart">
                                <p>The technology is recent and only supported by Chrome.</br>
                                    Allow the site to access to your microphone.</p>
                                <ul>
                                    <li>Next video: say "Next"</li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <script type="text/javascript" language="javascript">
            $(".tab_content").hide();
            $(".file_content").hide();
            document.onkeydown = changeOnKeyDown;
            var videoPlayer = videojs("videoClip");
            var videosHystory = null;;
            var path = new Array();
            videoPlayer.on("ended", changeVideo);
            videoPlayer.on("error", changeVideo);
            changeVideo();
            console.log("path:", path);
        </script>
    </body>
</html>