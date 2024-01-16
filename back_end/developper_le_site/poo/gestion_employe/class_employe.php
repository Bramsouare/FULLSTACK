<?php

    // création de la class
    class employe
    {
        // déclarations des propriétés en privée
        private $nom;
        private $prenom;
        private $dateEmbauche;
        private $poste;
        private $salaire;
        private $service;

        // création de l'objet
        public function __construct ($nom, $prenom, $dateEmbauche, $poste, $salaire, $service)
        {
            // affectation des valeurs dans chaque propriétés
            $this -> _nom = $nom;
            $this -> _prenom = $prenom;
            $this -> _dateEmbauche = $dateEmbauche;
            $this -> _poste = $poste;
            $this -> _salaire = $salaire;
            $this -> _service = $service;
        }

        // methode de calcule
        public function dureeEntreprise ($dateEmbauche)
        {     
            $dateE = new DateTime ($this -> _dateEmbauche);
            $aujourdhui = new DateTime('now');
            $difference = $aujourdhui -> diff($dateE);
            return $difference -> y;
        }

        // methode d'affichage
        public function afficheInfos ()
        {   
            $aujourdhui = new DateTime ('2024-01-16');    
            $dureeAnciennete = $this -> dureeEntreprise ($this -> _dateEmbauche);       
            $prime = $this -> _salaire / 100 * ( 5 + $dureeAnciennete * 2);


            echo "<h1> Fiche de renseignements </h1>";
            echo "<strong> Nom : </strong>  " . $this -> _nom . "<br><br>";
            echo "<strong> Prenom : </strong>  " . $this -> _prenom . "<br><br>";
            echo "<strong> Date d'embauche : </strong>  " . $this -> _dateEmbauche . "<br><br>";
            echo "<strong> Fonction dans l'entreprise : </strong>  " . $this -> _poste . "<br><br>";
            echo "<strong> Salaire : </strong>  " . $this ->_salaire . "<br><br>";
            echo "<strong> Service où se situe l'employé : </strong>  " . $this -> _service . "<br><br>";
            echo "<strong> Années de services dans l'entreprise : </strong>  " . $dureeAnciennete . " ans";
            echo "<br><br><strong> Prime : </strong>" . $prime . " euros <br><br>";

            // alert pour la banque
            if ($aujourdhui -> format ('m-d') === '01-16')
            {
                echo "Virement banquier de la prime de {$prime} euros le 30 novembre.<br>";
            }
            else
            {
                echo "La prime n'est pas encore due, le virement de {$prime} euros sera effectué le 30 novembre.<br>";
            }
        }

    }

    // les different employer
    $employe = new employe ("Souare", "Ibrahima", "1994-11-30", "Employeur", "50.000", "Direction");
    $employe -> afficheInfos ();

    $employe1 = new employe ("Lemsatef", "Sara", "2000-09-24", "Employer", "40.000", "associe");
    $employe1 -> afficheInfos ();

    $employe2 = new employe ("Souare", "Fatoumata", "1965-01-01", "Employeur", "41.000", "Direction");
    $employe2 -> afficheInfos ();

    $employe3 = new employe ("Souare", "Naminata", "2012-07-28", "Employeur", "30.000", "Direction");
    $employe3 -> afficheInfos ();

    $employe3 = new employe ("Souare", "Mouamad-Lamine", "1955-01-01", "Employeur", "50.000", "Direction");
    $employe3 -> afficheInfos ();

?>  