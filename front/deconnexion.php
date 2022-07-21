<?php 
    session_start();
    session_destroy();
    //header('Refresh: 5; url=index.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Deconnexion</title>
</head>
<body>
    <main class="maindeco">
        <div>
            <h1>DECONNEXION REUSSIE</h1>
            <a href="index.php">Retour à l'accueil</a>
        </div>
    </main>
</body>
</html>