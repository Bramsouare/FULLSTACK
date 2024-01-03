<?php
    
    GESTION DES ERREURS

    1 : Voici comment on peut utiliser try/catch, qui sont des constructions de contrôle dexception en PHP, pour gérer les erreurs PDO :

    try
    {
        $conn = new PDO ("mysql:host=localhost;dbname=the_district", "admin", "bramsouare");

        // ICI  opération de base de données
    }

    // si une erreur se produit catch la capture puis...
    catch (PDOException $e)
    {
        // affichage message d'erreur plus l'exeption
        echo "Erreur : " . $e -> getMessage ();
    }



    * TRY/CATCH : // facilite la résolution des erreurs et matient un code propre
    * PDO::ERRMuneODE_EXCEPTION : // on peut gérer de manière plus efficace les erreurs de connexion à la base de données.
    * [!NOTE] PDO::ATTR_ERRMODE : // est une constante de la classe PDO qui définit le mode d'erreur pour la connexion.
    // Il y a trois valeurs possibles pour cette constante: 
        * PDO::ERRMODE_SILENT : // mode d'erreur par défaut et ne génère aucune erreur ou avertissement, ce qui peut rendre difficile de détecter les erreurs.
        * PDO::ERRMODE_WARNING // génère un avertissement PHP pour chaque erreur, ce qui facilite la détection des erreurs.
        * PDO::ERRMODE_EXCEPTION // génère une exception pour chaque erreur, ce qui permet de gérer les erreurs de manière plus structurée dans le code.
?>