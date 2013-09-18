function changeVideo() 
{
    console.log("changeVideo path:", path);
    console.log("pathLength")
    var xhr_object = null;
    if (window.XMLHttpRequest) // Firefox 
        xhr_object = new XMLHttpRequest();
    else if (window.ActiveXObject) // Internet Explorer 
        xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
    var request = "http://ogdabou.com/php/GetAVideo.php";

    if (path.length > 0)
    {
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
    videoPlayer.src(xhr_object.responseText);
    videoPlayer.currentTime(0);
    videoPlayer.play();
    document.getElementById("videoTitle").innerHTML = xhr_object.responseText;
    return false;
};

function managePath(folderName) 
{
    console.log("entering managePath");
    var index = path.indexOf(folderName);
    if (index != -1)
    {
        // splice : Remove 1 element at <code>index</code>
        path.splice(index, 1);
    }
    else
    {
        path.push(folderName);
    }
    console.log(path);
    document.getElementById("videoTitle").innerHTML = "path as changed to " + path;
    console.log("exiting managePath");
};