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

function moveVideo(nextFunction)
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
        nextFunction();
}

function showAboutText()
{
    $("#videoMenu").attr('onClick', 'showVideo()');
    $("#aboutContent").show(400);
}

function showVideo()
{
    $(".textContent").hide(400);
    $(".video_playlist_side").hide("fade", 300, function(){
        $("#videoClip").css("width", "640");
        $("#videoClip").css("height", "360");
        $(".mainContent_side").switchClass("mainContent_side", "mainContent");
    });
    $(".video_playlist_side").switchClass("video_playlist_side", "video_playlist").show("fade", 400);
    $("#showChooser").show("fade", 400);
}