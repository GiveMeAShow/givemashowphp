<?php
    $dirname = 'C:\Users\acouty\Desktop\Personnel\nimp\videos';

    $dir = opendir($dirname);
    while($file = readdir($dir)) {
        if($file != '.' && $file != '..' && is_dir($dirname."\\".$file))
        {
            //echo $dirname."\\".$file;
            echo "<div id=\"showBox\">";
            echo "miam!";
            echo "</div>";
        }
    }
    closedir($dir);
?>