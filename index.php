<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <title>Give me a show !</title>
        <link href="http://vjs.zencdn.net/4.1/video-js.css" rel="stylesheet">
        <script src="http://vjs.zencdn.net/4.1/video.js"></script>
        <script src="javascript/javascript.js"></script>
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

        <div id="footer">
            <div id="footer_content_area">
                <a href="http://givemeasong.net/">Go to : Give me a song!</a>
            </div>
        </div>

        <script type="text/javascript" language="javascript">
            var videoPlayer = videojs("videoClip");
            var path = new Array();
            videoPlayer.on("ended", changeVideo);
            changeVideo();
            console.log("path:", path);
        </script>
    </body>
</html>