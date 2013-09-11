<?php
    $dirname = '../videos';

    $files = array();

    $dir = opendir($dirname);

    while($file = readdir($dir)) {
        if($file != '.' && $file != '..' && !is_dir($dirname.$file))
        {
                $files[] = $file;
        }
    }

    closedir($dir);

    echo "http://127.0.0.1/testSite/videos/".$files[rand(0, count($files) - 1)];
?>