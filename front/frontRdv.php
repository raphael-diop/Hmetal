<?php
session_start();
    require "../back/backRdv.php";
    $_SESSION['messageErrConnexion'] = "";
    $_SESSION['messageValidRdv'] = "";

    $date = new Rdv();
    $dates = $date->dateDispo();

    $dateBlock = $date->dateBlock();
   
    if(!isset($_SESSION['user'])){
        header("Location: inscription.php");
        $_SESSION['messageErrConnexion'] = "Vous devez vous connecter ou vous inscrire pour prendre un RDV.";
    }

    if(isset($_POST['submit'])){
        if(isset($_POST['descriptif']) && isset($_POST['date'])){
            $descriptif = htmlspecialchars($_POST['descriptif']);
            $dateselect = htmlspecialchars($_POST['date']);

            $verif = $date -> verifValidDate($descriptif, $dateselect);

        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Prise de rendez-vous</title>
</head>
<body>
<?php require "header.php"?>
    <main class="mainRdv">
        <section class="formRdv">
        <h1>Prendre mon rendez-vous: </h1>
       <p class = msgValid><?php if(isset($_SESSION['messageValidRdv'])){ echo $_SESSION['messageValidRdv'];}?></p>
            <form action="frontRdv.php" method="post">
                <div>
                    <p><input type="text" name="descriptif" id="descriptif" class="zonetext"  placeholder="Faite nous une petite description de votre projet ..."></p>
                </div>
                <div>
                    <h4>Les dates disponibles: </h4>
                    <div class="datedispo">
                        <?php foreach ($dates as $date) {?>
                            <strong><p><?php if($date['dispo'] == 2){}else{echo $date['date'];}?></p></strong>
                        <?php } ?>
                    </div>
                </div>
                <div>
                    <h4>Selectionner votre date parmis celles disponibles: </h4>
                    <p><input name="date" type="text" Placeholder="Ex: 17-02-2022 à 16:30"></p>
                    <p>Pensez à respecter le format indiqué dans l'exemple</p>
                    <p><input type="submit" name="submit" value="Valider"></p>
                </div>
            </form>
        </section>
    </main>

    <?php require "footer.php" ?>

</body>
</html>