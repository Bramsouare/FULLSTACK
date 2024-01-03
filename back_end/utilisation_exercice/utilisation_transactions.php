<?php

    UTILISATION DE TRANSACTIONS

    1 : Voici un exemple de requête qui utilise une transaction pour ajouter une nouvelle catégorie à la table categorie et plusieurs nouveaux plats à la table plat :

    try
    {
        // $conn nous pemettra d'acceder au connecteur PDO beginTransaction demarre la transaction jusquà quelle soit validée ou annulée.
        $conn -> beginTransaction ();

        // ajouter une nouvelle catégorie
        $stmt = $conn -> prepare ("INSERT INTO categorie (libelle, image, active) VALUES (:libelle, :image, :active)");
        $stmt -> bindValue (':libelle', 'Cuisine française');
        $stmt -> bindValue (':image', 'new_cat_jpg');
        $stmt -> bindValue ('active', 'Yes');
        $stmt -> execute ();
        $id_categorie = $conn -> lastInsertId ();

        // Ajouter un premier nouveaux plat
        $stmt = $conn -> prepare ("INSERT INTO plat (libelle , description, prix, image, active, id_categorie)
        VALUES (:lebelle, :description, :prix, :image, :active, :id_categorie)");
        $stmt -> bindValue (':libelle', 'Gratin dauphinois');
        $stmt -> bindValue (':description', 'Un plat hivernal traditionnellement composé de pomme de terre cuites en rondelle , crème fraîche, lait et noix de muscade');
        $stmt -> bindValue (':prix', '13.50');
        $stmt -> bindValue (':image', 'plat1.jpg');
        $stmt -> bindValue (':active', 'Yes');
        $stmt -> bindValue(':id_categorie', '$id_categorie');
        $stmt -> execute ();
        $plat_id = $conn -> lastInsertId ();

        // ajouter un deuxième nouveaux plat
        $stmt = $conn -> prepare ("INSERT INTO plat (libelle , description, prix, image, active, id_categorie)
        VALUES (:lebelle, :description, :prix, :image, :active, :id_categorie)");
        $stmt -> bindValue (':libelle', 'Ratatouille');
        $stmt -> bindValue (':description', 'En véritable plat méditerranéen, la ratatouille est un ragoût mijoté de légumes du soleil et dhuile dolive. Tomate, courgette, aubergines, poivrons, oignons et ail composent la recette.');
        $stmt -> bindValue (':prix', '10.00');
        $stmt -> bindValue (':image', 'plat2.jpg');
        $stmt -> bindValue (':active', 'Yes');
        $stmt -> bindValue(':id_categorie', '$id_categorie');
        $stmt -> execute ();
        $plat_id = $conn -> lastInsertId ();

        // valider la transaction
        $conn -> commit ();
    }

    // si une erreur est rencontrer
    catch (PDOException $e)
    {

        // annuler la transaction
        $conn -> rollback ();

        // affichage du message d'érreur associé a l'execption
        echo "Erreur : " . $e -> getMessage (); 
    }
?>