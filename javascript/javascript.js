function changeVideo() 
{
    addVideoToHistory(document.getElementById("videoClip_html5_api").getAttribute("src"));
    var xhr_object = null;
    if (window.XMLHttpRequest) // Firefox 
        xhr_object = new XMLHttpRequest();
    else if (window.ActiveXObject) // Internet Explorer 
        xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
    var request = "php/GetAVideo.php";

    if (path.length > 0)
    {
        console.log("Filters activated.");
        request = request + "?folders=";
        for (var i = 0; i < path.length ; i++)
        {
            request = request + path[i] + ";";
        }
    }
    console.log("request: ", request);
    xhr_object.open("GET", request, false);
    xhr_object.send();
    console.log("response: ", xhr_object.responseText);
    videoPlayer.src({type: "video/webm", src: xhr_object.responseText});
    videoPlayer.currentTime(0);
    videoPlayer.ready(function(){
        var vp = this;
        vp.play();
    })
    processTitle(xhr_object.responseText);
    return false;
};

function changeToPreviousVideo()
{
    if (videosHystory != null && videosHystory.length != 0)
    {
        var previousVideo = videosHystory.pop();
        videoPlayer.src({type: "video/webm", src:  previousVideo});
        videoPlayer.currentTime(0);
        videoPlayer.ready(function(){
            var vp = this;
            vp.play();
        })
        processTitle(previousVideo);
    }
    else
    {
        console.log("This is your first video.. maybe you should TRY THE NEXT ONE !");
    }
}

function addVideoToHistory(videoPath)
{
    if (videoPath != null)
    {
        if (videosHystory == null)
        {
            videosHystory = new Array();
            videosHystory.push(videoPath);
        }
        else
        {
            videosHystory.push(videoPath);
        }
        //console.log("History +1 : ", videoPath);
    }
}

function managePath(folderName, id) 
{
    //console.log("entering managePath");
    var index = path.indexOf(folderName);
    if (index != -1)
    {
        path.splice(index, 1);
        document.getElementById(id).setAttribute("class", "showBox_hidden");
    }
    else
    {
        path.push(folderName);
        document.getElementById(id).setAttribute("class", "showBox_visible");
    }
}

function processTitle(fullpath)
{
    var fullVideoName = fullpath.substring(fullpath.lastIndexOf("/") + 1);
    fullVideoName = fullVideoName.replace(".webm", "");
    fullVideoName = fullVideoName.split("_").join(" ");
    document.getElementById("videoTitle").innerHTML = fullVideoName;
}

function moveVideo()
{
    $(".video_playlist").hide("fade", 300, function()
        {
            $("#showChooser").hide();
            $("#videoClip").css("width", "320");
            $("#videoClip").css("height", "180");
            $(".mainContent").switchClass("mainContent", "mainContent_side");
        });
        $(".video_playlist").switchClass("video_playlist", "video_playlist_side");
        $(".video_playlist").show("fade", 400);
        $(".video_playlist_side").show("fade", 400);
}


/*
    TABS
*/
// function showAbout()
// {
//     $("#about_help_button").css("color", "lightgray");
//     $("#about_text").show("fade", 500);
//     $("#about_help_button").attr("onClick", "hideAbout();");
//     $("#control_button").attr("onClick", "hideAbout(showControls);");
//     $("#playlist_button").attr("onClick", "hideAbout(showPlayList);")
// }

// function hideAbout(nextFunction)
// {
//     $("#about_help_button").css("color", "black");
//     if (nextFunction == null)
//     {
//         resetToExpandFooter();
//         $("#about_text").hide("fade", 500, minimizeFooter);
//     }
//     else
//     {
//         $("#about_text").hide("fade", 500, nextFunction);
//     }
// }

// // When we minimize, we want all the tabs to expand on click.
// function resetToExpandFooter()
// {
//      $("#control_button").attr("onClick", "expandFooter(showControls);");
//      $("#about_help_button").attr("onClick", "expandFooter(showAbout);");
//      $("#playlist_button").attr("onClick", "expandFooter(showPlayList);");
// }

// function showControls()
// {
//     $("#control_button").css("color", "lightgray");
//     $("#controls_text").show("fade", 500);
//     $("#control_button").attr("onClick", "hideControls();");
//     $("#playlist_button").attr("onClick", "hideControls(showPlayList);")
//     $("#about_help_button").attr("onClick", "hideControls(showAbout);");
// }

// function showPlayList()
// {
//     $("#playlist_button").css("color", "lightgray");
//     $("#playlistMaker").show("fade", 500);
//     $("#pathFinder").show();
//     $("#playlist_button").attr("onClick", "hidePlaylist();");
//     $("#control_button").attr("onClick", "hidePlaylist(showControls);");
//     $("#about_help_button").attr("onClick", "hidePlaylist(showAbout);");
// }

// function hidePlaylist(nextFunction)
// {
//     $("#playlist_button").css("color", "black");
//     if (nextFunction == null)
//     {
//             resetToExpandFooter();
//             $("#playlistMaker").hide("fade", 500, minimizeFooter);
//     }
//     else
//     {
//             $("#playlistMaker").hide("fade", 500, nextFunction);
//     }
// }

// // When we minimize, we want all the tabs to expand on click.
// function resetToExpandFooter()
// {
//      $("#control_button").attr("onClick", "expandFooter(showControls);");
// }
//      $("#about_help_button").attr("onClick", "expandFooter(showAbout);");

// function showControls()
// {
//     $("#control_button").css("color", "lightgray");
//     $("#controls_text").show("fade", 500);
//     $("#control_button").attr("onClick", "hideControls();");
//     $("#about_help_button").attr("onClick", "hideControls(showAbout);");
// }

// function hideControls(nextFunction)
// {
//     $("#control_button").css("color", "black");
//     if (nextFunction == null)
//     {
//             resetToExpandFooter();
//             $("#controls_text").hide("fade", 500, minimizeFooter);
//     }
//     else
//     {
//             $("#controls_text").hide("fade", 500, nextFunction);
//     }

// }

// function expandFooter(showFunction)
// {
//     console.log("Expanding footer");
//     $(".footer").switchClass("footer", "footer_expanded", 700, showFunction);
// }

// function minimizeFooter()
// {
//     $(".footer_expanded").switchClass("footer_expanded", "footer", 700);
// }

// function revealFiles(content_id, parent_id)
// {
//     $("#" + content_id).show();
//     $("#" + parent_id).attr('onClick', "hideFiles('" + content_id + "', '" + parent_id + "');");
// }

// function hideFiles(content_id, parent_id)
// {
//     $("#" + content_id).hide();
//     $("#" + parent_id).attr('onClick', "revealFiles('" + content_id + "', '" + parent_id + "');");
// }

// function showAbout2()
// {
//     console.log("in showAbout2");
//     //$("#showChooser").hide("fade", 200);
// }