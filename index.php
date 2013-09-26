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
        <script type="text/javascript" src="javascript/annyang.js"></script>
    </head>

    <body>
        <div id="header">
            <div id="titleContainer">
                Give me a show !
            </div>
            <ul id="menuContainer">
                <li class="menuItem" id="videoMenu">
                    <a href="#" > Video</a>
                </li>
                <li class="menuItem" id="playlistMenu">
                    Playlist
                </li>
                <li class="menuItem" id="controlsMenu" onClick="moveVideo(controlsClickHandler);">
                    <a href="#" >Controls</a>
                </li>
                <li class="menuItem" id="aboutMenu" onClick="moveVideo(aboutClickHandler);">
                    <a href="#" > About</a>
                </li>
            </ul>
        </div>
        <div class="mainContent">
            <div class="video_playlist">
                <div id="showChooser">
                    Choose your show.
                    <?php
                        include("php/GenerateThumbs.php");
                    ?>
                </div>
                <div class="videoContainer">
                    <div id="videoTitle"></div>
                        <video id="videoClip" class="video-js vjs-default-skin"
                            controls preload="auto" width="640" height="360">
                        </video>
                </div>
                <div id="separator"></div>
                <div class="textContent" id="aboutContent">
                    <h2>About</h2>
                    <p>
                        "Give Me A Show !" was developped to let you be lazier and happier.</br>
                        You can find another "Give Me.." website, but about musics at : 
                        <a href="http://givemeasong.net">Give Me A Song</a> </br>
                        It is our very first webSite and we need your feedbacks !</br>
                        Dev by : Ogdabou </br>
                        Deployment by : Naixy</br>
                    </p>
                </div>
                <div class="textContent" id="controlsContent">
                    <h2>Controls</h2>
                    <h3>Keyboard</h3>
                    <ul>
                        <li>Left arrow : change to previous video.</li>
                        <li>Right arrow : random the next video.</li>
                    </ul>
                    <h3>Voice</h3>
                    <p>
                        We use a recent API which is only (for the moment) supported by Chrome. It cannot be used on Firefox. We will implement the thing on Firefox as soon as there is something available.</br>
                    </p>
                    <p>
                        We will work on a full voice-controlled website by the future.
                        Feel free to send us feedbacks and ideas.
                    </p>
                    <ul>
                        <li>"next" : random to the next video.</li>    
                    </ul>
                </div>
            </div>
        </div>
        <script type="text/javascript" language="javascript">
            $(".tab_content").hide();
            $(".file_content").hide();
            $(".textContent").hide();
            var aboutShown = "false";
            var controlsShown = "false";
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