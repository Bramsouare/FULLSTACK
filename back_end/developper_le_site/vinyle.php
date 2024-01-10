
<?php 

    try 
    {
        // Connexion à la base de données avec PDO
        $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'bramsouare');

        // Indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Sélectionne la table disc entièrement
        $requete = $db->prepare (

            "SELECT
                * 
            FROM 
                disc
            "
            );
                
        $requete -> execute ();

        // Récupère le résultat et retourne un tableau uniquement d'objets
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    } 

    catch (Exception $e) 
    {
        // En cas d'exception, affiche le message d'erreur associé
        echo "Erreur : " . $e->getMessage() . "<br>";

        // Termine le script en cas d'erreur
        die("Fin du script");
    }

?>

<div class="d-flex justify-content-center">
    <h1>Liste des enregistrements de la table "disc"</h1>
</div>

<div class="row d-flex justify-content-end mx-auto">
    <a class="btn btn-primary lg mr-2" type="submit" href="index.php?page=add_form">Ajout</a>
</div>
    
<div class="row col-12 d-flex justify-content-center">
    
    <?php foreach ($tableau as $disc) { ?>
                
        <div class="card border-dark mb-3 mr-4 ml-4 mb-4" style="max-width: 18rem;">

            <img src="img/<?=$disc->disc_picture?>" class="card-img-top mt-3" alt="vinyle">

            <div class="card-body">

                <h5 class="card-title"><?=$disc->disc_title?></h5>
                <p class="card-text"> 
                    
                    <strong>Label:</strong> <?=$disc -> disc_label?><br>
                    <strong>Année:</strong> <?=$disc -> disc_year?><br>
                    <strong>Genre:</strong> <?=$disc -> disc_genre?>
                </p>
                <a href="index.php?page=details&id=<?= $disc -> disc_id ?>"type="submit" class="btn btn-primary">Détails</a>

            </div>

        </div>
                
    <?php } ?>
    
</div>
