<?php
    $dirname = './videos';

    $dir = opendir($dirname);
    while($file = readdir($dir)) {
        if($file != '.' && $file != '..' && is_dir($dirname."/".$file))
        {    
            echo "<div id=\"showBox\">";
            echo "<img src=\"http://ogdabou.com/videos/$file/front.jpg\" onClick=\"managePath('$file');\" />";
        }
    }
    closedir($dir);
?>
