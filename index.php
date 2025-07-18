<?php
$dirpath = "uploads/";
$files = [];

if ($dir = opendir($dirpath)) {
    while (($file = readdir($dir)) !== false) {
        if ($file !== '.' && $file !== '..') {
            $files[] = $file;
        }
    }
    closedir($dir);
}

rsort($files);
require_once 'core.php';

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mini-Insta - Accueil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Bungee&display=swap" rel="stylesheet">

<body>
    <h1>MiniInsta</h1>

    <nav class="nav">
        <a href="index.php" title="Accueil"><i class="fas fa-house"></i></a>
        <a href="profil.php" title="Profil"><i class="fas fa-user"></i></a>
        <a href="connexion.php" title="Connexion"><i class="fas fa-right-to-bracket"></i></a>
        <a href="parametre.php" title="Paramètres"><i class="fas fa-cog"></i></a>
    </nav>
    </div>



    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="author">Auteur :</label>
        <input type="text" name="author" id="author" required class="input-text">


        <div class="file-hidden">
            <input type="file" name="photo" id="photo" accept="image/*" required>
            <span class="filename-placeholder"></span>
            <input type="submit" value="Envoyer" class="submit-button">
        </div>

    </form>

    <main class="gallery">
        <?php foreach ($files as $file): ?>
            <?php
            // Sépare le nom du fichier en 3 parties : timestamp, auteur, nom du fichier
            $parts = explode('-', $file, 3); //Maximum 3 éléments
            $timestamp = $parts[0];
            $author = ucfirst($parts[1]);
            $filename = $parts[2];

            //Formater la date
            $date = DateTime::createFromFormat('YmdHis', $timestamp);
            $formattedDate = $date ? $date->format('d/m/Y à H:i:s') : 'Date inconnue';
            ?>
            <div class="photo-up">
                <p><strong><?= htmlspecialchars($author) ?></strong> a posté le <?= $formattedDate ?></p>
                <img src="<?= $dirpath . $file ?>" alt="<?= $file ?>">
                <button class="like-button">❤️ Like</button>
            </div>



        <?php endforeach; ?>
    </main>



    <a href="index.php" class="button">Retour à l'accueil</a>
</body>

</html>