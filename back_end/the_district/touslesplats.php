<div id="visuel">

    <div class="col-12 d-flex justify-content-center">
        <h1><strong>Tout les plats</strong></h1>
    </div>

    <!-- AFFICHAGE PLATS -->
    <div class="row col-12 col-md-8 d-flex justify-content-center mx-auto">

        <?php

            foreach ($plats as $plat)
            {
                $nombres ++ ;
        ?>
            
        <div class="card custom-border bg zoom col-12 col-md-3 my-4 mx-5">
                <img src="asset/images_the_district/food/<?= $plat -> image ?>" class="card-img-top border-1 mt-3 img-fluid card-img timg" alt="<?= $plat -> libelle ?>">
                <div class="card-body text-center">
                    <h3 class="card-title"><?= $plat -> libelle ?></h3>
                    <p class="card-text"><?= $plat -> description ?><br>
                    Menu: <?= $plat -> prix ?> €</p>
                    <a type="submit" href="index.php?page=commande&id=<?= $plat -> id ?>" value="<?= $plat -> id ?>" class="btn btn-light
                    d-flex justify-content-center idd">Commander</a>
                </div>
        </div>

        <?php

                if ($nombres == 6)
                {
                    $nombres = 0;
                    break;
                }
            };

        ?>

    </div>

    <div class="d-flex justify-content-around row mt-3"> <!--bouton-->      
        <a type="submit" href="index.php?page=categorie" class="btn btn-light btn-lg zoom col-5 col-md-1 btns">Précédent</a>
        <a type="submit" href="index.php?page=contact" class="btn btn-light btn-lg zoom col-5 col-md-1 btns">Suivant</a>
    </div>

</div>



   
   