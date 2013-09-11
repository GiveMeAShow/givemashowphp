function changeVideo() {
    var xhr_object = null;
    if (window.XMLHttpRequest) // Firefox 
        xhr_object = new XMLHttpRequest();
    else if (window.ActiveXObject) // Internet Explorer 
        xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
    xhr_object.open("GET", "http://127.0.0.1/testSite/php/GetAVideo.php", false);
    xhr_object.send();
    videoPlayer.src(xhr_object.responseText);
    videoPlayer.currentTime(0);
    videoPlayer.play();
    document.getElementById("videoTitle").innerHTML = xhr_object.responseText;
    return false;
}
;