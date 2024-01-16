<?php

    // déclaration de la class
    class personnage
    {
        // déclaration des propriétés en privée
        private $nom;
        private $prenom;
        private $age;
        private $sexe;    

        // methode pour définire les propriéter
        public function setNom ($nom)
        {
            return $this -> _nom = $nom;
        }

        public function setPrenom ($prenom)
        {
            return $this -> _prenom = $prenom;
        }

        public function setAge ($age)
        {
            return $this -> _age = $age;
        }

        public function setSexe ($sexe)
        {
            return $this -> _sexe = $sexe;
        }

        // afficher les info du nouveaux personnage
        public function __toString ()
        {
            return 
            "Nom : " . $this -> _nom . "<br>" .
            "Prenom : " . $this -> _prenom . "<br>" .
            "Age : " . $this -> _age . "<br>" .
            "Sexe : " . $this -> _sexe . "<br>";

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
    $sara = new personnage ();
    $sara -> setNom ("Lemsatef");
    $sara -> setPrenom ("Sara");
    $sara -> setAge ("23");
    $sara -> setSexe ("Feminin");

    echo "<h1>Nouveau personnage : </h1>" . $sara;

?>