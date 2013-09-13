function changeVideo(paths) 
{
    var xhr_object = null;
    if (window.XMLHttpRequest) // Firefox 
        xhr_object = new XMLHttpRequest();
    else if (window.ActiveXObject) // Internet Explorer 
        xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
    var request = "http://127.0.0.1/testSite/php/GetAVideo.php";

    if (paths.lenght > 0)
    {
        request = request + "?folders=";
        for (var i = 0; i < paths.lenght; i++)
        {
            request = request + paths[i] + ";";
        }
    }
    xhr_object.open("GET", request, false);
    xhr_object.send();
    videoPlayer.src(xhr_object.responseText);
    videoPlayer.currentTime(0);
    videoPlayer.play();
    document.getElementById("videoTitle").innerHTML = xhr_object.responseText;
    return false;
};

function managePath(folderName) 
{
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
    document.getElementById("videoTitle").innerHTML = "path as changed to " + path;
};