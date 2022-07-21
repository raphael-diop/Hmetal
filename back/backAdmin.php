<?php
require "Bdd.php";


Class Admin extends Bdd{
public $date;
public $heure;

    function __construct(){
        parent::__construct();
    }

    //function de gestion des utilisateurs

    //function ajout de dates
    public function setDates($date){

        $requetesql2 = "SELECT `date` FROM `dates` WHERE `date` = '$date'";
        $calcul2 = $this->Bdd->prepare($requetesql2);
        $calcul2 -> execute();
        
        $result2 = $calcul2->rowcount();

        if($result2 == 0){
            $request = "INSERT INTO `dates`(`date`, `dispo`) VALUES ('$date', 1)";
            $calcul = $this->Bdd->prepare($request);
            $calcul->execute();
            $result = $calcul-> fetchAll(PDO::FETCH_ASSOC);
        }else{
            $_SESSION['messageADM'] = "Cette dates existe déjà";
        }
     
    }   

    public function getUsers(){
        $getUser = $this->Bdd->prepare("SELECT * FROM `utilisateurs`");
        $getUser->execute();
        $getUsers = $getUser->fetchall(PDO::FETCH_ASSOC);
        return $getUsers;
    }

    public function getRdvs(){
        $getRdv = $this->Bdd->prepare("SELECT * FROM `rdv`");
        $getRdv->execute();
        $getRdv = $getRdv->fetchall(PDO::FETCH_ASSOC);
        return $getRdv;
    }

    public function getDates(){
        $getDates = $this->Bdd->prepare("SELECT * FROM `dates`");
        $getDates->execute();
        $getDates = $getDates->fetchall(PDO::FETCH_ASSOC);
        return $getDates;
    }

    public function getOneDate($id){
        $getDates = $this->Bdd->prepare("SELECT * FROM `dates` WHERE `id` = $id");
        $getDates->execute();
        $getDates = $getDates->fetch();
        return $getDates;
    }

    public function modifDate($id,$date,$dispo){
        $modifUser = $this->Bdd->prepare("UPDATE dates SET date = '$date', dispo = '$dispo' WHERE id = $id");
        $modifUser->execute();
    }

    public function deleteDate($id){
        $deleteUser = $this->Bdd->prepare("DELETE FROM dates WHERE id=$id");
        $deleteUser->execute();
    }






    public function getOneUser($id){
        $getOneUser = $this->Bdd->prepare("SELECT * FROM `utilisateurs` WHERE `id` = $id");
        $getOneUser->execute();
        $getUser = $getOneUser->fetch();
        //var_dump($getDoc);
        return $getUser;
    }

    public function modifUser($id,$prenom,$nom,$addresse,$ville,$tel,$email,$id_droit){
        $modifUser = $this->Bdd->prepare("UPDATE utilisateurs SET prenom = '$prenom', nom = '$nom', addresse = '$addresse', ville='$ville', tel='$tel', email='$email', id_droit='$id_droit' WHERE id = $id");
        $modifUser->execute();
    }

    public function deleteUser($id){
        $deleteUser = $this->Bdd->prepare("DELETE FROM utilisateurs WHERE id=$id");
        $deleteUser->execute();
    }





    public function getOneRdv($id){
        $getOneRdv = $this->Bdd->prepare("SELECT * FROM `rdv` WHERE `id` = $id");
        $getOneRdv->execute();
        $getRdv = $getOneRdv->fetch();
        //var_dump($getDoc);
        return $getRdv;
    }

    public function modifRdv($id,$dates,$descriptif,$id_utilisateurs){
        $modifRdv = $this->Bdd->prepare("UPDATE rdv SET dates = '$dates', descriptif = '$descriptif', id_utilisateurs = '$id_utilisateurs' WHERE id = $id");
        $modifRdv->execute();
    }

    public function deleteRdv($id){
        $deleteRdv = $this->Bdd->prepare("DELETE FROM rdv WHERE id=$id");
        $deleteRdv->execute();
    }


    public function mesRdv(){
        $mesRdv = $this->Bdd->prepare("SELECT*FROM `rdv` INNER JOIN `utilisateurs` WHERE id_utilisateurs = utilisateurs.id");
        $mesRdv->execute();
        $mesRdv = $mesRdv ->fetchAll(PDO::FETCH_ASSOC);
        return $mesRdv;
    }

}

?>


