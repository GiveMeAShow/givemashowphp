<?php
    $dirname = 'C:\Users\acouty\Desktop\Personnel\nimp\videos';

    $dir = opendir($dirname);
    while($file = readdir($dir)) {

        if($file != '.' && $file != '..' && is_dir($dirname."\\".$file))
        {

            echo "<div id=\"showBox\">";
            //echo "<a href=\" \">";
            echo "<img src=\"http://127.0.0.1/testSite/videos/$file/front.jpg\" onClick=\"managePath('$file');\" />";
            //echo "</a></div>";
        }
    }
    closedir($dir);
?>