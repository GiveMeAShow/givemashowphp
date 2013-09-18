function changeVideo() 
{
    addVideoToHistory(document.getElementById("videoClip_html5_api").getAttribute("src"));
    //currentVideo = videoPlayer.src();
    var xhr_object = null;
    if (window.XMLHttpRequest) // Firefox 
        xhr_object = new XMLHttpRequest();
    else if (window.ActiveXObject) // Internet Explorer 
        xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
    var request = "/php/GetAVideo.php";

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
    //document.getElementById("videoTitle").innerHTML = xhr_object.responseText;
    return false;
};

function changeToPreviousVideo()
{
    if (videosHystory != null)
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
    if (videosHystory == null)
    {
        videosHystory = new Array();
        videosHystory.push(videoPath);
    }
    else
    {
        videosHystory.push(videoPath);
    }
    console.log("History +1 : ", videoPath);
}

function managePath(folderName, id) 
{
    console.log("entering managePath");
    var index = path.indexOf(folderName);
    if (index != -1)
    {
        // splice : Remove 1 element at <code>index</code>
        path.splice(index, 1);
        document.getElementById(id).setAttribute("class", "showBox_hidden");
    }
    else
    {
        path.push(folderName);
        document.getElementById(id).setAttribute("class", "showBox_visible");
    }
    console.log(path);

    document.getElementById("videoTitle").innerHTML = "path as changed to " + path;
    console.log("exiting managePath");
};

function processTitle(fullpath)
{
    var fullVideoName = fullpath.substring(fullpath.lastIndexOf("/") + 1);
    fullVideoName = fullVideoName.replace(".webm", "");
    fullVideoName = fullVideoName.split("_").join(" ");
    document.getElementById("videoTitle").innerHTML = fullVideoName;
}