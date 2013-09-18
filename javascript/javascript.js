function changeVideo() 
{
    console.log("changeVideo path:", path);
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
    videoPlayer.play();
    processTitle(xhr_object.responseText);
    //document.getElementById("videoTitle").innerHTML = xhr_object.responseText;
    return false;
};

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