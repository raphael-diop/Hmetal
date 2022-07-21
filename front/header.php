<?php

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="containerHeader">
            <div class="logo">
                <a href="index.php"><img src="./images/logo.png" alt="Logo" /></a>
            </div>
            <ul class="navbar">
                <li><a href="presentation.php">Qui sommes nous ?</a></li>
                <li><a href="frontRdv.php">Prise de rendez-vous</a></li>
                <li><a href='profil.php'>Mon Profil</a></li>
                <?php if (isset($_SESSION['admin'])){
                    echo "<li><a href='frontAdmin.php'>Admin</a></li>";
                } ?>
                <?php if (isset($_SESSION['user'])){
                    echo "<li><a href='deconnexion.php'>Deconnexion</a></li>";
                } ?>    
            </ul>
    </header>
</body>
</html>