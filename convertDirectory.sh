#!/bin/bash

cd $1

IFS=$(echo -en "\n\b")
for showFile in `ls | grep .avi`
do
	newFileName=${showFile/.avi/.webm}
	echo "converting $showFile to $newFileName"
	ffmpeg -i "$showFile" -acodec libvorbis -ac 2 -ab 96k -ar 44100 -b 345k "$newFileName"
done
