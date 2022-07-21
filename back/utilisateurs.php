<?php
require ('Bdd.php');

class Utilisateurs extends Bdd{
    private $id;
    protected $nom;
    protected $prenom; 
    protected $addresse; 
    protected$ville;
    protected $tel; 
    public $email;
    protected $password;


    function __construct(){
        parent::__construct();
    }

    public function Inscription($nom, $prenom ,$addresse ,$ville ,$tel,$email,$password){
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->addresse = $addresse;
            $this->ville = $ville;
            $this->tel = $tel;
            $this->email = $email;
            $this->password = $password;
        
            //connexion à la base de données pour verifier si le login existe deja 
            $requetesql2 = "SELECT `email` FROM `utilisateurs` WHERE `email` = '$this->email'";
            $calcul2 = $this->Bdd->prepare($requetesql2);
            $calcul2 -> execute();
            // rowCount permet de compter le nombre d'utilisateur avec ce login
            $result2 = $calcul2->rowcount();
            //var_dump($result2);

            // Si aucun utilisateur n'a ce login alors je le rentre ne base 
            if(($result2) == 0){
                $requetesql1 = "INSERT INTO `utilisateurs` (`nom`, `prenom`,`addresse`,`tel`,`ville`, `email`,`password`, `id_droit`) VALUES ('$this->nom','$this->prenom','$this->addresse','$this->tel','$this->ville', '$this->email', '$this->password', 1)";
                $calcul1 = $this->Bdd->prepare($requetesql1);
                $calcul1 -> execute();
                $_SESSION['message'] = '<div class="messageERR">'.'Inscription reussie'.'</div>';
                header('Refresh: 2; url=connexion.php');
            }else{$_SESSION['message'] = '<div class="messageERR">'."Cet Email déjà utilisé".'</div>';}

            $request = "SELECT*FROM  `utilisateurs`";
            $recup = $this->Bdd->prepare($request);
            $recup -> execute();
            $recuperation = $recup -> fetchAll();

            //var_dump($recuperation);

    }

    public function connexion($email, $password){
        $this->email = $email;
        $this->password = $password;

        //recupération du login dans BDD
        $request = "SELECT `email` FROM `utilisateurs` WHERE `email` = '$this->email'";
        $calcul = $this->Bdd->prepare($request);
        $calcul -> execute();
        $result = $calcul->rowCount();

         //recupération du password dans BDD
        $request2 = "SELECT password FROM `utilisateurs` WHERE `email` = '$this->email'";
        $calcul2 = $this->Bdd->prepare($request2);
        $calcul2 -> execute();
        // On utilise fetchColumn car la fonction password_verify a besoin d'un résultat sous forme de string
        $result2 = $calcul2-> fetchColumn();
       

        // Création variable récupération décryptage password
        $check_password = $result2;
        


        //Vérification que le login existe bien 
        if(($result) == 1){
            //vérification du password
            if(password_verify($password, $check_password)){
                // Si le password est vérifié alors on récupère toutes les infos user et on les met dans la session
                $request3 = "SELECT*FROM `utilisateurs` WHERE `email` = '$this->email'";
                $calcul3 = $this->Bdd->prepare($request3);
                $calcul3 -> execute();
                $result3 = $calcul3-> fetch(PDO::FETCH_ASSOC);

                // var_dump($result3);
                
                $_SESSION['user'] = $result3;
                $_SESSION['messageCo'] = '<div class="messageERR">'.'Connexion reussie'.'</div>';
                if($result3['id_droit'] == 2){
                    $_SESSION['user'] = $result3;
                    $_SESSION['admin'] = $result3['id_droit'];
                    header('Refresh: 2; url=frontAdmin.php');
                }else{
                    header('Refresh: 2; url=profil.php');
                }
                
            }else{$_SESSION['messageCo'] = '<div class="messageERR">'.'Password incorrect'.'</div>';}
        }else{$_SESSION['messageCo'] = '<div class="messageERR">'.'Email inexistant'.'</div>';}
    }

    // public function utilisateurInfos(){
    //     $user_email = $_SESSION['user']['email'];
    //     $request = "SELECT*FROM `utilisateurs` WHERE `email` = '$this->email'"
    // }

}

?>
