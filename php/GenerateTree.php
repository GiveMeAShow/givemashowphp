
<?php
	$dirname = 'videos';
	visitFolder($dirname, 1);
?>

<?php
	function visitFolder($folder, $indentLevel)
	{
		// Pixels by indent level
		$indentation = 10 * $indentLevel;
	    $path = $folder;
	    $folder = opendir($folder);
	    while($file = readdir($folder)) {
	            if($file != '.' && $file != '..')
	            {
	                $fullPath = "$path/$file";
	                if (is_dir($fullPath))
	                {
	                	echo "<div id='$file' style='margin-left: "."$indentation"."px;' onClick=\"revealFiles('content_$file', '$file')\">
	                		$file</br>
	                		</div>";
	                	echo "<div class='file_content' id='content_$file'>";
	                	visitFolder($fullPath, $indentLevel + 1);
	                	echo "</div>";
	                }
	                else if(pathinfo($fullPath, PATHINFO_EXTENSION) == "webm")
	                {
	                	$dIndent = 10 * ($indentLevel + 1);
	                	echo "<div style='margin-left: ".$dIndent."px;'>$file</br></div>";
	                }
	            }    
	    }
	    closedir($folder);
	}
?>