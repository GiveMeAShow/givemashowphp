<?php
    $dirname = '../videos';

    $videoList = array();

    $dir = opendir($dirname);
    if (count($_GET) > 0)
    {
        $folders=explode(";", $_GET['folders']);
        foreach ($folders as $videoFolder) {
            fillVideoList($videoFolder, $videoList);
        }
    }
    else
    {
        while($file = readdir($dir)) {
            if($file != '.' && $file != '..' && (pathinfo($file, PATHINFO_EXTENSION) == "ogv"))
            {
                $videoList[] = $file;
            }
        }
    }
    //use join to get the paths.

    closedir($dir);

    echo "http://127.0.0.1/testSite/videos/".$videoList[rand(0, count($videoList) - 1)];
?>

<?php
    // Fill the videoList with the given folder. Also visit subdirectories.
    function fillVideoList($folder, $videoList)
    {
        while($file = readdir($folder)) {
            if($file != '.' && $file != '..' && (pathinfo($file, PATHINFO_EXTENSION) == "ogv"))
            {
                $videoList[] = $file;
            }
            else if (is_dir($file))
            {
                fillVideoList($file, $videoList)
            }
        }
    }
?>