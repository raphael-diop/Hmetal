<?php
session_start();
require ("../back/Utilisateurs.php");
if(isset($_POST['submit'])){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
        $user = new Utilisateurs();
        $user->connexion($email, $password);
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
    <title>Inscription</title>
</head>
<body>
<header>
       <?php
            require "header.php";
        ?>
</header>
<main class="main">
    <form class="formContainerCo" action="connexion.php" method="post">
            <h1>CONNEXION</h1>
            <?php if(isset($_SESSION['messageCo'])){echo $_SESSION['messageCo'];}?>
            <p><input type="text" name="email" id="email" class="zonetext"  placeholder="E-Mail ..."></p>
            <p><input type="password" name="password" id="password" class="zonetext"  placeholder="Password ..."></p>
            <p><input type="submit" id="#button" class="boutonvalidation" name="submit" value="Envoyer"></p> 
    </form>
</main>

<?php require "footer.php"; ?>
</body>
</html>