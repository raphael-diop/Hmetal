<?php 
require "Bdd.php";
    class Rdv extends Bdd {
        function __construct(){
            parent::__construct();
        }

        function dateDispo(){
            $request = "SELECT*FROM dates";
            $calcul = $this->Bdd->prepare($request);
            $calcul->execute();
            $result = $calcul->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        function verifValidDate($descriptif, $dateselect){
            $id_utilisateurs = $_SESSION['user']['id'];

            $request = "SELECT `date` FROM `dates` WHERE `date` = :dateselect";
            $calcul = $this->Bdd->prepare($request);
            $calcul -> execute([':dateselect' => $dateselect]);
            $result = $calcul->rowcount();
            
 

            if($result == 1){
                $request = "INSERT INTO `rdv`(`date`, `descriptif`, `id_utilisateurs`) VALUES (:dateselect,:descriptif,:id_utilisateurs)";
                $calcul = $this->Bdd->prepare($request);
                $calcul -> execute([
                    ':dateselect' => $dateselect,
                    ':descriptif' => $descriptif,
                    ':id_utilisateurs' => $id_utilisateurs,
                ]);

                $request2 = "SELECT*FROM `rdv`";
                $calcul2 = $this->Bdd->prepare($request2);
                $calcul2 -> execute();
                $result2 = $calcul2->fetchAll(PDO::FETCH_ASSOC);

                $_SESSION['messageValidRdv'] = "votre RDV a été bien enregistré";

            }else{
                $message = "Dates invalide, pensez à suivre l'exemple ";
            }

        }

        function recupRdv(){
            $id_utilisateurs = $_SESSION['user']['id'];
            $request = "SELECT*FROM `rdv` WHERE `id_utilisateurs` = :id_utilisateurs";
            $calcul = $this->Bdd->prepare($request);
            $calcul -> execute([':id_utilisateurs' => $id_utilisateurs]);
            $result = $calcul->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        function dateBlock(){
            //recupératio des dates dispos
            $request2 = "SELECT date FROM `dates`";
            $calcul2 = $this->Bdd->prepare($request2);
            $calcul2 -> execute();
            $result2 = $calcul2->fetchAll(PDO::FETCH_ASSOC);

            //récupération des dates prises
            $request = "SELECT date FROM `rdv`";
            $calcul = $this->Bdd->prepare($request);
            $calcul -> execute();
            $result = $calcul->fetchAll(PDO::FETCH_ASSOC);

            for($i=0; $i<count($result2); $i++){
                foreach ($result as $date) { 
                    if($result2 = $date){
                        $date = implode($date);
                        $dispo = 2;
                        $blockdate = $this->Bdd->prepare("UPDATE `dates` SET `date`= :date ,`dispo`= :dispo WHERE date = :date");
                        $blockdate->execute([
                            ':date' => $date,
                            ':dispo' => $dispo,
                        ]);
                    }
                }
            }
        }
    }
?>