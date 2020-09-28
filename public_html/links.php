<?php

$targetFolder = str_replace('/public_html', '', $_SERVER['DOCUMENT_ROOT']) . '/storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';

if(!file_exists($targetFolder)){
    echo $targetFolder .' => папки не существует';
}

if(file_exists($linkFolder)){
    echo $linkFolder .' => надо удалить папку';
}

symlink($targetFolder, $linkFolder);
echo 'Symlink process successfully completed';
