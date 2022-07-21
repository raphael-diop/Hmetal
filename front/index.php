<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
<body>
    
    <?php require "header.php"?>

    <!-- Grande image avec photo -->
    <main>
        <div class="ImageAcc">
        </div>

        <div class="rdvAcceuil">
            <h1> Vous avez un projet pour votre logement ? N'hésitez pas à nous contacter !</h1>
            <h2><a href="frontRdv.php">PRENDRE RENDEZ-VOUS</a></h2>
        </div>

        <section class="containerPresentation">
            <article class="presentationHaut">
                <img src="https://i0.wp.com/lilm.co/wp-content/uploads/2018/01/Quentin-morisset-2-1.jpg?fit=960%2C960&ssl=1" alt="photo1">
                <div class="presHautText">
                    <h1>UN PETIT MOT SUR NOUS</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex enim cumque accusantium dolorem blanditiis perferendis unde impedit. Temporibus dolorem voluptates deserunt? Placeat aperiam tempore est hic accusantium vero quidem optio?</p>
                    <a href="presentation.php">En savoir plus</a>
                </div>
            </article>

            <article class="presentationBas">
                <img src="https://thumbs.dreamstime.com/b/shield-metal-arc-welding-joint-steel-structure-factory-73276226.jpg" alt="photo2">
                <div class="presBasText">
                    <h1>UN PETIT MOT SUR NOUS</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex enim cumque accusantium dolorem blanditiis perferendis unde impedit. Temporibus dolorem voluptates deserunt? Placeat aperiam tempore est hic accusantium vero quidem optio?</p>
                    <a href="presentation.php">En savoir plus</a>
                </div>
            </article>
        </section>

        <section class="containerContact">
           <img src="./images/logo2.png" alt="logo">
        </section>

        <div class="containerRéalisations">
            <h1>Nos Réalisations</h1>
            <div class="ImgRéal">
                <img src="https://www.book-a-flat.com/magazine/wp-content/uploads/2016/12/espace-optimise-appartement-meuble-paris.jpg" alt="Appart 1">
                <img src="https://www.vanupied.com/wp-content/uploads/68550354.jpg" alt="Appart 2">
                <img src="https://media.lesechos.com/api/v1/images/view/61b728368fe56f2a11726725/1280x720/070519160949-web-tete.jpg" alt="Appart 3">
            </div>
            
            <!---TEST JAVASCRIPT-->
                <span class= 'ImgRéal' style= 'display:none;' id="span_txt2">
                    <img src="https://media.odalys-vacances.com/imgResize-1099-701/output/information/lieu_hebergement/2043/location-hotel-aix-en-provence-appart-hotel-odalys-atrium-1.jpg" alt="Appart 4">
                    <img src="https://media.odalys-vacances.com/imgResize-1099-701/output/information/lieu_hebergement/2564/location-hotel-paris-appart-hotel-odalys-paris-montmartre-1.jpg" alt="Appart 5">
                    <img src="https://www.residence-nemea.com/upload/hotel_residence_universe/532/carousel/29820.png" alt="Appart 6">
                </span>

                <h3><button type="submit" onclick="label_text('span_txt2')" class="voirPlus" href="#">Voir plus</h3>
 
                <script type="text/javascript">
                    function label_text(id) {
                    var span = document.getElementById(id);
                    if(span.style.display == "none") {
                    span.style.display = "flex";
                    } else {
                    span.style.display = "none";
                    }
                    }
                </script> 
                <br>
            </div>
        </div>
        <!-- Avis clients -->
        <div class="avisClient">
            <h1><center>Un petit mot de nos clients</center></h1>
            <div class="comClient">
                <div class="avis">
                    <img src="https://st2.depositphotos.com/3994049/7791/v/600/depositphotos_77912838-stock-illustration-quote-marks-icon-with-shadow.jpg" alt="Image guillemet">
                    <p>"Un travail de qualité, rapide et soignée"</p>
                    <h4>Stephan</h4>
                </div>
                <div class="avis">
                <img src="https://st2.depositphotos.com/3994049/7791/v/600/depositphotos_77912838-stock-illustration-quote-marks-icon-with-shadow.jpg" alt="Image guillemet">
                    <p>Contant très amicale, et très didactique</p>
                    <h4>Paul</h4>
                </div>
                <div class="avis">
                <img src="https://st2.depositphotos.com/3994049/7791/v/600/depositphotos_77912838-stock-illustration-quote-marks-icon-with-shadow.jpg" alt="Image guillemet">
                    <p>Un travail efficace et une reponse diligente</p>
                    <h4>Bernard</h4>
                </div>
            </div>
        </div>
    </main>
    
    <?php require "footer.php"; ?>
    <!-- Petit d'escriptif / plein de liens vers la prise de rendez vous-->
</body>
</html>