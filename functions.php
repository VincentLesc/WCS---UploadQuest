<?php

if (!empty($_GET['delete'])){
    if(file_exists('dossier/' . $_GET['delete'])){
        echo unlink('dossier/' . $_GET['delete']);
    }
}

if (isset($_FILES) && !empty($_FILES)) {
    $nbfile = count($_FILES['picture']['name']);
    for ($i=0; $i<$nbfile; $i++){
        controlfile($_FILES['picture'],$i);
        recordfile($_FILES['picture'],$i);
    }
}

$pictures = allfiles();

function controlfile($file, $i){
    $error = [];
    $filetype = mime_content_type($file['tmp_name'][$i]);
    if ($filetype != "image/png" && $filetype != "image/jpeg" && $filetype != "image/gif")
        $error[] = "Type de fichier invalide seules les images sont acceptées";
    if (filesize($file['tmp_name'][$i]) > 1048576)
        $error[] = "Le fichier est supérieur à 1Mo. Veuillez réduire sa taille et réessayer.";
    return $error;
}
function recordfile($file, $i) {
    $uploadDir = 'dossier/';
    $uploadExt = new SplFileInfo($file['name'][$i]);
    $uploadExt = $uploadExt->getExtension();
    $uploadFile = $uploadDir . uniqid('image') . "." . $uploadExt;
    return move_uploaded_file($file['tmp_name'][$i], $uploadFile);
}

function allfiles(){
    return scandir('dossier');
}