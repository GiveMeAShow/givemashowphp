<?php
    $dirname = '../videos';

    $videoList = array();

    $dir = opendir($dirname);
    //echo count($_GET);
    if (count($_GET) > 0)
    {
        $folders = explode(";", $_GET['folders']);
        foreach ($folders as $videoFolder) {
            if ($videoFolder != "")
            {
                $fullPath = $dirname."/".$videoFolder;
                $videoList = fillVideoList($fullPath, $videoList);    
            }
        }
    }
    else
    {
        $videoList = fillVideoList($dirname, $videoList);
    }
    //use join to get the paths.

    closedir($dir);
    $choosenOne = $videoList[rand(0, count($videoList) - 1)];
    $choosenOne = str_replace("../videos/","", $choosenOne);
    $choosenOne = str_replace(" ","", $choosenOne);
    echo "http://ogdabou.com/videos/".$choosenOne;
?>

<?php
    // Fill the videoList with the given folder. Also visit subdirectories.

    function fillVideoList($folder, $videoList)
    {
        
        $path = $folder;
        $folder = opendir($folder);
        while($file = readdir($folder)) { 
                if($file != '.' && $file != '..')
                {
                        $fullPath = "$path/$file";
                        if (is_dir($fullPath))
                        {
                                $videoList = fillVideoList($fullPath, $videoList);
                        }
                        else if(pathinfo($fullPath, PATHINFO_EXTENSION) == "webm")
                        {
                                $videoList[] = $fullPath;
                        }
                }    
        }
        closedir($folder);
        return $videoList;  
    }
?>
