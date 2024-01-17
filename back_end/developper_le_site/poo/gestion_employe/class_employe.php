<?php

    class employe
    {
        private $nom;
        private $prenom;
        private $dateEmbauche;
        private $poste;
        private $salaire;
        private $service;
        public  $lieux;

        public function __construct ($nom, $prenom, $dateEmbauche, $poste, $salaire, $service, $lieux)
        {
            $this -> _nom = $nom;
            $this -> _prenom = $prenom;
            $this -> _dateEmbauche = $dateEmbauche;
            $this -> _poste = $poste;
            $this -> _salaire = $salaire;
            $this -> _service = $service;
            $this -> _lieux = $lieux;
        }

        public function combienAnnee ($dateEmbauche)
        {
            $aujourdhui = new DateTime ("now");
            $ancien = new DateTime ($this -> _dateEmbauche);
            $difference = $aujourdhui -> diff ($ancien);
            return $difference -> y;
        }

        public function afficheInfos ()
        {
            $aujourdhui = new DateTime ('2024-11-17');
            $dureeEntreprise = $this -> combienAnnee ($this -> _dateEmbauche);
            $prime = $this -> _salaire / 100 * (5 + $dureeEntreprise * 2);

            echo "<h1>Liste de renseignements</h1>";
            echo "<strong>Nom : </strong>" . $this -> _nom . "<br><br>";
            echo "<strong>Prenom : </strong>" . $this -> _prenom . "<br><br>";
            echo "<strong>Lieux de l'entreprise : </strong>" . $this -> _lieux . "<br><br>";
            echo "<strong>Date d'enbauche : </strong>" . $this -> _dateEmbauche . "<br><br>";
            echo "<strong>Poste dans l'entreprise : </strong>" . $this -> _poste . "<br><br>";
            echo "<strong>Salaire : </strong>" . $this -> _salaire . " euros<br><br>";
            echo "<strong>Service occuper : </strong>" . $this -> _service . "<br><br>";
            echo "<strong>Années de service dans l'entreprise : </strong>" . $dureeEntreprise . "ans<br><br>";
            echo "<strong>Prime : </strong>" . $prime . " euros<br><br>"; 
            
            if ($aujourdhui -> format ('m-d') === '11-30')
            {
                echo "<strong>Virement annuel : </strong>Virement banquier de la prime de {$prime} euros le 30 novembre.<br>";
            }
            else
            {
                echo "<strong>Virement annuel : </strong>La prime n'est pas encore due, le virement de {$prime} euros sera effectué le 30 novembre.<br>";
            }
        }
    }

    class magasins
    {
        private $nomMagasin;
        private $adresse;
        private $codePostal;
        private $ville;

        public function __construct ($nomMagasin, $adresse, $codePostal, $ville)
        {
            $this -> _nomMagasins = $nomMagasin;
            $this -> _adresse = $adresse;
            $this -> _codePostal = $codePostal;
            $this -> _ville = $ville;
        }

        public function afficheMag ()
        {
            echo "<strong>Nom du magasins : </strong>" . $this -> _nomMagasins . "<br><br>";
            echo "<strong>Adresse du magasins : </strong>" . $this -> _adresse . "<br><br>";
            echo "<strong>Code postal : </strong>" . $this -> _codePostal . "<br><br>";
            echo "<strong>Ville : </strong>" . $this -> _ville . "<br><br><br>"; 
        }
    }

    $magasin1 = new magasins ("Bramsouare Master Mind", "01 boulevard de la reussite", "75008", "paris");
    $magasin1 -> afficheMag ();

    $magasin2 = new magasins ("Dosana Marketing Compagny", "10 boulevard du succès", "75009", "marseille");
    $magasin2 -> afficheMag ();

    $magasin3 = new magasins ("Cooking Souare", "20 boulevard du progrès", "75010", "epinay sur seine");
    $magasin3 -> afficheMag ();

    $magasin4 = new magasins ("Dance here", "30 boulevard de la prospérité", "75011", "orgemont");
    $magasin4 -> afficheMag ();

    $magasin5 = new magasins ("Reston Humains", "40 boulevard de la longévité", "75012", "guinée");
    $magasin5 -> afficheMag (); 


    $employer = new employe ("Souare", "Ibrahima", "1994-06-15", "Direction", "50.000", "Employeur", $magasin1 -> _ville);
    $employer -> afficheInfos (); 

    $employe1 = new employe ("Lemsatef", "Sara", "2000-09-24", "Employer", "40.000", "associe", $magasin2 -> _ville);
    $employe1 -> afficheInfos ();

    $employe2 = new employe ("Souare", "Fatoumata", "1965-01-01", "Employeur", "41.000", "Direction", $magasin3 -> _ville);
    $employe2 -> afficheInfos ();

    $employe3 = new employe ("Souare", "Naminata", "2012-07-28", "Employeur", "30.000", "Direction", $magasin4 -> _ville);
    $employe3 -> afficheInfos ();

    $employe3 = new employe ("Souare", "Mouamad-Lamine", "1955-01-01", "Employeur", "50.000", "Direction", $magasin5 -> _ville);
    $employe3 -> afficheInfos ();
?>   
