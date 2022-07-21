<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Presentation</title>
</head>
<body>
    <?php  
        require "header.php";
    ?>

    <main class="mainPresentation">
        <section class="imgPresentation">
            <img src="./images/hughes.jpg" alt="photo hugues">
        </section>
        <section class="textDpresentation">
            <h1>HMetal un projet, une histoire</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis sit quaerat ipsum minus aut illum neque, 
                voluptatibus voluptate accusamus! Laudantium maiores expedita autem alias sunt quibusdam commodi, 
                perferendis amet incidunt.
            </p>
        </section>
    </main>
    <?php
        require "footer.php";  
    ?>
</body>