<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <title>Give me a show !</title>
        <script type="text/javascript" src="javascript/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <link href="http://vjs.zencdn.net/4.1/video-js.css" rel="stylesheet">
        <script src="http://vjs.zencdn.net/4.1/video.js"></script>
        <script type="text/javascript" src="javascript/javascript.js"></script>
        <script type="text/javascript" src="javascript/keyListener.js"></script>
        <script type="text/javascript" src="javascript/annyang.js"></script>

        <script type="text/javascript">
            var next = function(){
                changeVideo();
            }

            var prev = function(){
                changeToPreviousVideo();
            }

            if (annyang)
            {
                console.log("Annyang successfully started");
                var commands = {
                    'next': next,
                    'bazinga' : prev,
                };
                annyang.debug();
                annyang.init(commands);
                annyang.setLanguage('en');
                annyang.start();
            }
        </script>
    </head>
    <body>
        <div id="header">
            <div id="header_top">
            </div>
            <div id="header_title_page">
                Give me a show !
            </div>
        </div>
        <div id="mainContent">
            <table>
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
            <div id="footer_content_area">
                <a href="http://givemeasong.net/">Go to : Give me a song!</a>
                <img id="footer_up_arrow" src="images/uparrow.png" onClick="expandFooter();" />
            </div>
        </div>
        <script type="text/javascript" language="javascript">
            document.onkeydown = changeOnKeyDown;
            var videoPlayer = videojs("videoClip");
            var videosHystory = null;;
            var path = new Array();
            videoPlayer.on("ended", changeVideo);
            //videoPlayer.on("error", changeVideo);
            changeVideo();
        </script>
    </body>
</html>