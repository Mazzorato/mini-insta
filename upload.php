<?php

if (isset($_POST['author']) && isset($_FILES['photo'])) { //Données récupérées.
    $author = $_POST['author']; //nom de l'utilisateur.
    $file= $_FILES['photo']; //tableau associatif donnant toutes les infos du fichier.

    if ($file['error'] === 0) {  //traite le fichier
        $timestamp = date ('YmdHis');
        $filename = $file['name'];
        $cleanAuthor = strtolower(trim($author));
        $newname = "$timestamp-$cleanAuthor-$filename";
        
        move_uploaded_file($file['tmp_name'], "uploads/" . $newname);
        header("Location: index.php");
        exit;
    }
}



?>