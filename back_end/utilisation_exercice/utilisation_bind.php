<?php

    UTILISATION DE  bindParam() ET bindValue()

    PDO::PARAM_BOOL : pour les valeurs booléennes
    PDO::PARAM_NULL : pour les valeurs nulles
    PDO::PARAM_INT : pour les valeurs entières
    PDO::PARAM_STR : pour les valeurs de chaîne de caractères
    PDO::PARAM_LOB : pour les données binaires (large objects) 

    

    
    1 : Par exemple, si nous voulons associer un paramètre de requête à une valeur entière, nous pouvons lécrire de cette manière :
    
    // Définissez la requête SQL avec un paramètre :qty
    $stmt = $pdo -> ("SELECT * FROM commande WHERE quantite > :qty");

    // Définissez la valeur du paramètre :qty (type INT (entier))
    $qty -> 2; 

    // Liez la variable $qty au paramètre :qty dans la requête
    $stmt -> bindParam (':cty', $cty, PDO::PARAM_INT); 

    // Exécutez la requête
    $stmt -> execute();



    2 : De même, si nous voulons associer un paramètre de requête à une valeur de chaîne de caractères, nous pouvons utiliser la méthode bindParam() comme suit :

    // Définissez la requête SQL avec un paramètre :libelle
    $stmt = $pdo -> prepare ("SELECT * FROM plat WHERE libelle = :libelle");

    // Définissez la valeur du paramètre :libelle (type string (chaine de caractère))
    $libelle = 'pizza'; 

    // Liez la variable $libelle au paramètre :libelle dans la requête
    $stmt -> bindParam (':libelle', $libelle, PDO::PARAM_STR);

    // Exécutez la requête 
    $stmt -> execute();



    3 : Pour les nombres à virgule flottante, vous pouvez utiliser le type de données PDO::PARAM_STR et convertir le nombre en chaîne de caractères avec la fonction strval().

    // Définissez la requête SQL pour l'insertion
    $stmt = $pdo -> prepare ("INSERT INTO produits (nom, prix) VALUES (:nom, :prix)");

    // Définissez les valeurs des paramètres :nom
    $nom = 'Mon produit'; 

    // Définissez les valeurs des paramètres :prix (convertir 10.50 en chaine de caractère (type string))
    $prix = strval(10.50); 

    // Liez la variables $nom aux paramètres :nom dans la requête
    $stmt -> bindParam (':nom', $nom, PDO::PARAM_STR);

    // Liez la variables $prix aux paramètres :prix dans la requête
    $stmt -> bindParam (':prix', $prix, PDO::PARAM_STR);

    // Exécutez la requête  
    $stmt -> execute();
    


    4 : Si vous ne souhaitez pas utiliser des paramètres nommés, vous pouvez utiliser des paramètres de position à la place. Les paramètres de position sont simplement des points 
    dinterrogation (?) qui représentent les valeurs que vous souhaitez lier à la requête préparée :

    // Définissez la requête SQL avec des paramètres de position
    $stmt = $pdo -> prepare ("SELECT * FROM plat WHERE libelle = ? AND prix > ?");
    
    // Exécutez la requête en fournissant les valeurs des paramètres
    $stmt -> execute ([$libelle, $prix]);

    


    
?>