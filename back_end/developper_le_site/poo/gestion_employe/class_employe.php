<?php
 
    class employe
    {
        // création d'objets
        private $nom;
        private $prenom;
        private $dateEmbauche;
        private $poste;
        private $salaire;
        private $service;
        public  $lieux;

        // construction des objects
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

        // fonction pour connaître la durer d'ancienneté de chaque employer
        public function combienAnnee ($dateEmbauche)
        {
            $aujourdhui = new DateTime ("now");
            $ancien = new DateTime ($this -> _dateEmbauche);
            $difference = $aujourdhui -> diff ($ancien);
            return $difference -> y;

        }

        // fonction pour afficher les differentes informations 
        public function afficheInfos ()
        {
            // calcule pour avoir le montant de la prime
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
            
            // conditions d'envois de virement annuel pour la banque
            if ($aujourdhui -> format ('m-d') === '11-30')
            {
                echo "<strong>Virement annuel : </strong>Virement banquier de la prime de {$prime} euros le 30 novembre.<br>";
            }
            else
            {
                echo "<strong>Virement annuel : </strong>La prime n'est pas encore due, le virement de {$prime} euros sera effectué le 30 novembre.<br>";
            }

            // conditions droit chèques-vacances
            if ($dureeEntreprise >= 1 )
            {
                echo "<br><strong>Chèques-vanacances : </strong>Félicitations vous bénéficier d'un chèques-vacances merci pour votre loyauté<br><br>";
            }
            else
            {
                echo "<br><strong>Chèques-vanacances : </strong>Vous devez faire partie de l'entreprise minimum 1 ans pour bénéficier du chèques-vacances<br><br>";
            }

        }

        // fonction chèques-vacances par enfants
        public function enfant($_age)
        {
            // tableau avec montants
            $cheques = array 
            (
                "20€" => 0,
                "30€" => 0,
                "50€" => 0
            );

            // parcourir la tableau avec les conditions
            foreach ($_age as $age)
            {
                if ($age >= 0 && $age <= 10)
                {
                    $cheques ["20€"] ++;
                }
                else if ($age >= 11 && $age <= 15)
                {
                    $cheques ["30€"] ++;
                }
                else if ($age >= 16 && $age <= 18)
                {
                    $cheques ["50€"] ++;
                }
            };
        
            // compter le nombres d'enfants
            $nombreEnfant = count($_age);
  
            // alert
            echo "<strong>Droit au chèques de noêl : </strong>";
            echo $nombreEnfant ? "OUI, " : "NON, ";

            // parcourir les resultats plus alert avec les droits
            foreach ($cheques as $euros => $nombreE)
            {
                if ($nombreE > 0) 
                {
                    echo "L'employer à le droit à $nombreE chèques de $euros pour Noël.  <br>";
                }
            }

            echo "<br><strong>________________________________________________________________________________________________________</strong><br><br>"; 

        }

    }

    class magasins
    {
        // création d'objets
        private $nomMagasin;
        private $adresse;
        private $codePostal;
        private $ville;

        // construction d'objets
        public function __construct ($nomMagasin, $adresse, $codePostal, $ville)
        {
            $this -> _nomMagasins = $nomMagasin;
            $this -> _adresse = $adresse;
            $this -> _codePostal = $codePostal;
            $this -> _ville = $ville;
        }

        // fonction d'affichage
        public function afficheMag ()
        {

            echo "<br><strong>___________________________________________MAGASIN______________________________________________________</strong><br><br><br>"; 

            echo "<strong>Nom du magasins : </strong>" . $this -> _nomMagasins . "<br><br>";
            echo "<strong>Adresse du magasins : </strong>" . $this -> _adresse . "<br><br>";
            echo "<strong>Code postal : </strong>" . $this -> _codePostal . "<br><br>";
            echo "<strong>Ville : </strong>" . $this -> _ville . "<br><br>";

            if ($this -> _ville === "marseille" || $this -> _ville ==="orgemont")
            {
                echo "<strong>Tikets restaurant : </strong>Vous bénéficier d'un carnet de tikets de restaurations car votre entreprise ne dispose pas d'une cantine.<br><br>";
            }
            else
            {
                echo "<strong>Tikets restaurant : </strong>Vous bénéficier pas d'un carnet de tikets de restaurations car votre entreprise dispose d'une cantine.<br><br>";
            }

        }

    }


    // informations des magasins
    $magasin1 = new magasins ("Bramsouare Master Mind", "01 boulevard de la reussite", "75016", "paris");
    $magasin1 -> afficheMag ();

    $magasin2 = new magasins ("Dosana Marketing Compagny", "10 boulevard du succès", "13008", "marseille");
    $magasin2 -> afficheMag ();

    $magasin3 = new magasins ("Cooking Souare", "20 boulevard du progrès", "93800", "epinay sur seine");
    $magasin3 -> afficheMag ();

    $magasin4 = new magasins ("Dance here", "30 boulevard de la prospérité", "93800", "orgemont");
    $magasin4 -> afficheMag ();

    $magasin5 = new magasins ("Reston Humains", "40 boulevard de la longévité", "75018", "porte de clignancourt");
    $magasin5 -> afficheMag (); 


    // informations des employers
    $employe1 = new employe ("Souare", "Ibrahima", "1994-06-15", "Direction", "50.000", "Employeur", $magasin1 -> _ville);
    $employe1 -> afficheInfos ();  
    $employe1 -> enfant(array(1, 9, 17));
  
    $employe2 = new employe ("Lemsatef", "Sara", "2000-09-24", "Employer", "40.000", "associe", $magasin2 -> _ville);
    $employe2 -> afficheInfos ();
    $employe2 -> enfant (array(10, 19));

    $employe3 = new employe ("Souare", "Fatoumata", "1965-01-01", "Employeur", "41.000", "Direction", $magasin3 -> _ville);
    $employe3 -> afficheInfos (); 
    $employe3 -> enfant (array(6));

    $employe4 = new employe ("Souare", "Naminata", "2012-07-28", "Employeur", "30.000", "Direction", $magasin4 -> _ville);
    $employe4 -> afficheInfos ();
    $employe4 -> enfant (array(11, 13, 17));

    $employe5 = new employe ("Souare", "Mouamad-Lamine", "1955-01-01", "Employeur", "50.000", "Direction", $magasin5 -> _ville);
    $employe5 -> afficheInfos ();
    $employe5 -> enfant (array(5, 8, 10, 12));
    
?>   
