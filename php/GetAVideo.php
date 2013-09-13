<?php
    $dirname = '../videos';

    $files = array();

    $dir = opendir($dirname);

    //$id=$_GET['id'];
   // $niceuh=$_GET['niceuh'];

   // echo "id=$id and niceuh=$niceuh";
    while($file = readdir($dir)) {
        if($file != '.' && $file != '..' && !is_dir($dirname.$file))
        {
            console.log("ta maman");
            $files[] = $file;
        }
    }

    closedir($dir);

    echo "http://127.0.0.1/testSite/videos/".$files[rand(0, count($files) - 1)];
?>