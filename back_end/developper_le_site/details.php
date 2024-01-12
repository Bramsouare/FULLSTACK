<?php

    try
    {

        // HOST:adresse serveur heberge base données, DBNAME:nom base données, CHARSET=UTF-8:caractère utiliser, ROOT:utilisateur base données, (''): mdp
        $db = new PDO ('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'bramsouare');

        // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
        $db -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // $_GET["id"]="1"
        // $_GET["page"]="details"
        // var_dump($_GET);

        $discid = $_GET['id'];

        $requete = $db -> prepare (

            "SELECT
                *
            FROM
                disc INNER JOIN artist ON disc.artist_id = artist.artist_id
            WHERE
               disc_id = $discid 
            "
            );

        $requete -> execute ();
        $data = $requete -> fetchALL (PDO::FETCH_OBJ);
    }

    // en cas d'échec catch capture les erreurs
    catch (Exception $e)
    {
        // alert asocié a l'exception
        echo "Erreur: " . $e -> getMessage () . "<br>";

        // fin du script
        die ("Fin du script");
    }

?>

<div class="container-fluid">

    <div class="d-flex justify-content-center">
        <h1>La page de détail</h1>
    </div>

    <h3>Détails</h3><br>

    <form action="#" method="GET">

        <?php foreach($data as $disc) {

            if ($discid == $disc -> disc_id ){ ?>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="titres">Title</label>
                    <input class="form-control" type="text" value="<?= $disc -> disc_title ?>" name="titres">
                </div>
                <div class="form-group col-md-6">
                    <label for="artistes">Artist</label>
                    <input class="form-control" type="text" value="<?= $disc -> artist_name ?>" name="artistes">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="annees">Year</label>
                    <input class="form-control" type="text" value="<?= $disc -> disc_year ?>" name="annees">
                </div>
                <div class="form-group col-md-6">
                    <label for="genres">Genre</label>
                    <input class="form-control" type="text" value="<?= $disc -> disc_genre ?>" name="genres">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="labels">Label</label>
                    <input class="form-control" type="text" value="<?= $disc -> disc_label ?>" name="labels">
                </div>
                <div class="form-group col-md-6">
                    <label for="prixs">Price</label>
                    <input class="form-control" type="prixs" value="<?= $disc -> disc_price ?>" name="prixs">
                </div>
            </div>
          
            <label for="picture"><h5>Picture</h5></label>
            <div class="col-9 mb-4">
                <img src="img/<?= $disc -> disc_picture ?>" style="width: 250px; height: auto;">
            </div>

            <div class="row d-flex justify-content-start my-2 mx-auto">
                <a type="submit" class="btn btn-primary mr-2" href="index.php?page=update_form&id=<?= $disc -> disc_id ?>">Modifier</a>
                <a type="submit" class="btn btn-primary mr-2"href="index.php?page=delete_form&id=<?= $disc -> disc_id ?>">Supprimer</a>
                <a type="submit" class="btn btn-primary mr-2"href="index.php?page=vinyle&id=<?= $disc -> disc_id ?>">Retour</a>
            </div>  

        <?php } }; ?>

    </form>

</div>

