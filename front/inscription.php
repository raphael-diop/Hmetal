<?php
session_start();
require ("../back/utilisateurs.php");
$message = '';
if(isset($_POST['submit'])){
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['addresse']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $addresse = htmlspecialchars($_POST['addresse']);
        $ville = htmlspecialchars($_POST['ville']);
        $tel = htmlspecialchars($_POST['tel']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        //Si le password et le password_retype identiques alors je crypte le mdp et j'appel la fonction d'inscription 
        if($password == $password_retype){
            $password = password_hash($password, PASSWORD_BCRYPT);
            $user = new Utilisateurs();
            $user->Inscription($nom, $prenom,$addresse,$ville,$tel,$email,$password);
            //var_dump($user);
        }
        else{
            $message = 'Passwords non-identiques';
        }
    
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
    <form class="formContainer" action="inscription.php" method="post">
            <h1>INSCRIPTION</h1>
            <p class="msgError"><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];}?></p>
            <p class="msgError"><?php if(isset($_SESSION['messageErrConnexion'])){echo $_SESSION['messageErrConnexion'];}?></p>
            <p><input type="text" name="nom" class="zonetext" id="nom" placeholder="Nom..."></p>
            <p><input type="text" name="prenom" id="prenom" class="zonetext"  placeholder="Prenom ..."></p>
            <p><input type="text" name="addresse" id="addresse" class="zonetext"  placeholder="Addresse ..."></p>
            <p><input type="text" name="ville" id="ville" class="zonetext"  placeholder="Ville ..."></p>
            <p><input type="text" name="tel" id="tel" class="zonetext"  placeholder="Téléphone ..."></p>
            <p><input type="text" name="email" id="email" class="zonetext"  placeholder="E-Mail ..."></p>
            <p><input type="password" name="password" id="password" class="zonetext"  placeholder="Password ..."></p>
            <p><input type="password" name="password_retype" id="password-retype" class="zonetext"  placeholder="Password retype ..."></p>
            <p><input type="submit" id="#button" class="boutonvalidation" name="submit" value="Envoyer"></p> 
            <a id="lienCo" href="connexion.php">Vous avez déjà un compte? Cliquez ici !</a>
    </form>
</main>

<?php require "footer.php"; ?>
</body>
</html>