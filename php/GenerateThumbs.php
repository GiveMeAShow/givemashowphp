<?php
    $dirname = './videos';

    $dir = opendir($dirname);
    $number = 0;
    while($file = readdir($dir)) {
        if($file != '.' && $file != '..' && is_dir($dirname."/".$file))
        {    
            echo "<div class=\"showBox_hidden\" id=\"showBox_$number\">";
            echo "<img src=\"videos/$file/front.jpg\" onClick=\"managePath('$file', 'showBox_$number');\" />";
            echo "</div>";
            $number = $number + 1;
        }
    }
    closedir($dir);
?>
