<?php

    // déclaration de la class
    class personnage
    {
        // déclaration des propriétés en privée
        private $nom;
        private $prenom;
        private $age;
        private $sexe;    

        // création de l'objet 
        public function __construct ($nom, $prenom, $age, $sexe)
        {
            // affectation des valeurs pour chaque propriétés
            $this -> nom = $nom;
            $this -> prenom = $prenom;
            $this -> age = $age;
            $this -> sexe = $sexe;
        }

        // methode affichage
        public function afficherInfo ()
        {
            // affichage des informations du personnage
            echo "Non : " . $this -> nom ."<br>";
            echo "Prenom : " . $this -> prenom . "<br>";
            echo "Age : " . $this -> age . "<br>";
            echo "Sexe : " . $this -> sexe ."<br>";
        }
    }

    // instanciation d'un objet de la classe personnage avec les valeurs 
    $perso = new personnage ("Souare", "Ibrahima", "29", "Masculin");

    // appel de la method affichage
    $perso -> afficherInfo ();

?>