<?php
    $dirname = '../videos';

    $files = array();

    $dir = opendir($dirname);
    if (count($_GET) > 0)
    {
        $folders=$_GET['folders'];

        echo "folders=$folders";
    }
    while($file = readdir($dir)) {
        if($file != '.' && $file != '..' && (pathinfo($file, PATHINFO_EXTENSION) == "ogv"))
        {
            $files[] = $file;
        }
    }

    closedir($dir);

    echo "http://127.0.0.1/testSite/videos/".$files[rand(0, count($files) - 1)];
?>