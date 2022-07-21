<?php
require "../back/backAdmin.php";
session_start();
$_SESSION['messageADM'] = "";
$adm = new Admin();
if(isset($_POST['submit'])){
    if(isset($_POST['date'])){
        $date =htmlspecialchars($_POST['date']);
            $admin = $adm ->setDates($date);
        }    
}

$users = $adm ->getUsers();
$rdvs = $adm ->getRdvs();
$dates = $adm ->getDates();
$mesRdv = $adm ->mesRdv();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>
<body>
    <header>
        <?php 
            require "header.php";  
        ?> 
    </header>
    <main class="mainAdmin">
        <div>
            <section>
                <form class="formAjoutDate" action="frontAdmin.php" method="post">
                    <h1>Ajout dates de disponibilités</h1>
                    <p class="msgError"><?php echo $_SESSION['messageADM']; ?></p>
                    <input type="text" name="date" Placeholder="Ex: 17-05-2022 à 19:30">
                    <input type="submit" name="submit" Value="Ajouter cette date">
                </form>
            </section>
            <section>
                <h1>Gestion Dates</h1>
                <table>
                    <thead>
                        <tr>
                            <th>dates</th>
                            <th>dispo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i<count($dates); $i++) { ?>
                            <tr>
                                <td> <?= $dates[$i]['date'] ?> </td>
                                <td> <?= $dates[$i]['dispo'] ?> </td>
                                <td><a href="frontAdmin.php?modifdate=<?= $dates[$i]['id']; ?>">Select</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php  
                    if(isset($_GET['modifdate'])){
                        $id = $_GET['modifdate'];
                        $getOneDate = $adm->getOneDate($id);
                    }else{
                        $getOneDate['date'] = "";
                        $getOneDate['dispo'] = "";
                    }
                ?>
                <form method="post" class="formModif">
                    <input type="text" id="date" name="date" class="form-control"  value="<?php if($getOneDate == false){echo "";}else{ echo $getOneDate['date'];}?>">
                    <input type="text" id="dispo" name="dispo" class="form-control"  value="<?php if($getOneDate == false){echo "";}else{ echo $getOneDate['dispo'];}?>">

                    <input type="submit" name="modifierdate" value="Modifier">
                    <input  type="submit" name="supprimerdate" value="supprimer"> 
                </form>
                <?php  
                    if(isset($_POST['modifierdate'])){
                        $id = $_GET['modifdate'];
                        $date = $_POST['date'];
                        $dispo = $_POST['dispo'];

                        $modifUser = $adm -> modifDate($id,$date,$dispo);
                    }
                    else if(isset($_POST['supprimerdate'])){
                        $id = $_GET['modifdate'];
                        $suppUser = $adm -> deleteDate($id);
                    }
                ?>
            </section>
        </div>
        <div class="adminBlockDroite">
            <section>
                <h1>Gestion Utilisateurs</h1>
                <table>
                    <thead>
                        <tr>
                            <th>prenom</th>
                            <th>nom</th>
                            <th>addresse</th>
                            <th>ville</th>
                            <th>tel</th>
                            <th>email</th>
                            <th>id_droit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i<count($users); $i++) { ?>
                            <tr>
                                <td> <?= $users[$i]['prenom'] ?> </td>
                                <td> <?= $users[$i]['nom'] ?> </td>
                                <td> <?= $users[$i]['addresse'] ?> </td>
                                <td> <?= $users[$i]['ville'] ?> </td>
                                <td> <?= $users[$i]['tel'] ?> </td>
                                <td> <?= $users[$i]['email'] ?> </td>
                                <td> <?= $users[$i]['id_droit'] ?> </td>
                                <td><a href="frontAdmin.php?modifuser=<?= $users[$i]['id']; ?>">Select</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
            <!-- DISPLAY DU FORMULAIRE DE MODIFICATION DE USER -->
            <?php  
                if(isset($_GET['modifuser'])){
                    $id = $_GET['modifuser'];
                    $getOneUser = $adm->getOneUser($id);
                }else{
                    $getOneUser['prenom'] = "";
                    $getOneUser['nom'] = "";
                    $getOneUser['addresse'] = "";
                    $getOneUser['ville'] = "";
                    $getOneUser['tel'] = "";
                    $getOneUser['email'] = "";
                    $getOneUser['id_droit'] = "";
                }
            ?>
            <form method="post" class="formModif">
                <input type="text" id="prenom" name="prenom" class="form-control"  value="<?php if($getOneUser == false){echo "";}else{ echo$getOneUser['prenom'];}?>">
                <input type="text" id="nom" name="nom" class="form-control"  value="<?php if($getOneUser == false){echo "";}else{ echo $getOneUser['nom'];}?>">
                <input type="text" id="addresse" name="addresse" class="form-control"  value="<?php if($getOneUser == false){echo "";}else{echo $getOneUser['addresse'];}?>">
                <input type="text" id="ville" name="ville" class="form-control"  value="<?php if($getOneUser == false){echo "";}else{echo $getOneUser['ville'];}?>">
                <input type="text" id="tel" name="tel" class="form-control"  value="<?php if($getOneUser == false){echo "";}else{echo $getOneUser['tel'];}?>">
                <input type="text" id="email" name="email" class="form-control"  value="<?php if($getOneUser == false){echo "";}else{echo $getOneUser['email'];}?>">
                <input type="text" id="id_droit" name="id_droit" class="form-control" value="<?php if($getOneUser == false){echo "";}else{echo $getOneUser['id_droit'];}?>">

                <input type="submit" name="modifieruser" value="Modifier">
                <input  type="submit" name="supprimeruser" value="supprimer"> 
            </form>
            <?php  
                if(isset($_POST['modifieruser'])){
                    $id = $_GET['modifuser'];
                    $prenom = $_POST['prenom'];
                    $nom = $_POST['nom'];
                    $addresse = $_POST['addresse'];
                    $ville = $_POST['ville'];
                    $tel = $_POST['tel'];
                    $email = $_POST['email'];
                    $id_droit = $_POST['id_droit'];
                    $modifUser = $adm -> modifUser($id,$prenom,$nom,$addresse,$ville,$tel,$email,$id_droit);
                }
                else if(isset($_POST['supprimeruser'])){
                    $id = $_GET['modifuser'];
                    $suppUser = $adm -> deleteUser($id);
                }
            ?>
            <section>
                <h1>Gestion des Rdvs</h1>
                <table>
                    <thead>
                        <tr>
                            <th>date</th>
                            <th>descriptif</th>
                            <th>id_utilisateurs</th>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i<count($rdvs); $i++) { ?>
                            <tr>
                                <td> <?= $rdvs[$i]['date'] ?> </td>
                                <td> <?= $rdvs[$i]['descriptif'] ?> </td>
                                <td> <?= $rdvs[$i]['id_utilisateurs'] ?> </td>
                                <td><a href="frontAdmin.php?modifrdv=<?= $rdvs[$i]['id']; ?>">Select</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
            <?php  
                if(isset($_GET['modifrdv'])){
                    $id = $_GET['modifrdv'];
                    $getOneRdv = $adm->getOneRdv($id);
                }else{
                    $getOneRdv['date'] = "";
                    $getOneRdv['descriptif'] = "";
                    $getOneRdv['id_utilisateurs'] = "";
                }
            ?>
            <form method="post" class="formModif">
                <input type="text" id="date" name="date" class="form-control"  value="<?php if($getOneRdv == false){echo "";}else{echo $getOneRdv['date'];}?>">
                <input type="text" id="descriptif" name="descriptif" class="form-control"  value="<?php if($getOneRdv == false){echo "";}else{echo $getOneRdv['descriptif'];}?>">
                <input type="text" id="id_utilisateurs" name="id_utilisateurs" class="form-control"  value="<?php if($getOneRdv == false){echo "";}else{echo $getOneRdv['id_utilisateurs'];}?>">

                <input type="submit" name="modifierrdv" value="Modifier">
                <input  type="submit" name="supprimerrdv" value="supprimer"> 
            </form>
            <?php  
                if(isset($_POST['modifierrdv'])){
                    $id = $_GET['modifrdv'];
                    $date = $_POST['date'];
                    $descriptif = $_POST['descriptif'];
                    $id_utilisateurs = $_POST['id_utilisateurs'];

                    $modifRdv = $adm -> modifRdv($id,$date,$descriptif,$id_utilisateurs);
                }
                else if(isset($_POST['supprimerrdv'])){
                    $id = $_GET['modifrdv'];
                    $suppRdv = $adm -> deleteRdv($id);
                    unset($_GET);
                }
            ?>
            <section>
            <h1>Mes rdv</h1>
            <table>
                    <thead>
                        <tr>
                            <th>date</th>
                            <th>descriptif</th>
                            <th>nom du client</th>
                            <th>prenom du client</th>
                            <th>numero du client</th>
                            <th>adresse du client</th>
                            <th>ville du client</th>
                            <th>Email du client</th>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i<count($mesRdv); $i++) { ?>
                            <tr>
                                <td> <?= $mesRdv[$i]['date'] ?> </td>
                                <td> <?= $mesRdv[$i]['descriptif'] ?> </td>
                                <td> <?= $mesRdv[$i]['nom'] ?> </td>
                                <td> <?= $mesRdv[$i]['prenom'] ?> </td>
                                <td> <?= $mesRdv[$i]['tel'] ?> </td>
                                <td> <?= $mesRdv[$i]['addresse'] ?> </td>
                                <td> <?= $mesRdv[$i]['ville'] ?> </td>
                                <td> <?= $mesRdv[$i]['email'] ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
    <?php  require 'footer.php'; ?>
</body>
</html>