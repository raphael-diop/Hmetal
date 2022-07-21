<?php
require "../back/backRdv.php";
session_start();
//session_destroy();
if (!isset($_SESSION['user'])){
    header("location: inscription.php ");
}

$rdv = new Rdv();
$rdv = $rdv->recupRdv();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <header>
        <?php
            require "header.php";
        ?>
    </header>
    <main class="mainProfil">
        <h1 id="profiltitre">Bienvenue <?= $_SESSION['user']['prenom']?> !</h1>
        <div class="infoProfil">
            <section class="mesInfos">
                <h1>Mes Informations: </h1>
                <h4>Nom:</h4>
                <p><?php echo $_SESSION['user']['nom'] ?></p>
                <h4>Prenom:</h4>
                <p><?php echo $_SESSION['user']['prenom'] ?></p>
                <h4>Addresse:</h4>
                <p><?php echo $_SESSION['user']['addresse'] ?></p>
                <h4>Téléphone:</h4>
                <p><?php echo $_SESSION['user']['tel'] ?></p>
                <h4>Ville:</h4>
                <p><?php echo $_SESSION['user']['ville'] ?></p>
                <h4>E-mail:</h4>
                <p><?php echo $_SESSION['user']['email'] ?></p>
                <!-- <form action="profil.php" method="post">
                    <input type="submit" name="modif" value="Modifier mes informations">
                </form> -->
                <?php
                    if(isset($_POST['submit'])){
                        
                    }
                ?>
            </section>

            <section class="mesRdvs">
                <h1>Mon Rendez-vous</h1>
                <h4>Date:</h4>
                <p><?php if(isset($rdv["date"])){echo $rdv['date'];}else{echo "Aucune date";}?></p>
                <h4>Descriptif: </h4>
                <p><?php if(isset($rdv["descriptif"])){echo $rdv['descriptif'];}else{echo "Aucun descriptif";}?></p>
            </section>
        </div>
    </main>

    <?php require "footer.php"; ?>

</body>
</html>