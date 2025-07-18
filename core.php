<?php

function getUploadedPhotos($path = "uploads/"){
    $files = [];

    if ($dir = opendir($path)) {
        while (($file = readdir($dir)) !== false) {
            if ($file !== '.' && $file !== '..') {
                $files[] = $file;
            }
        }

        closedir($dir);
    }

    rsort($files); // pour trier les fichiers récents en premier
    return $files;
}

?>