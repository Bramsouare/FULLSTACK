<div id="visuel">

    <div class="col-12 d-flex justify-content-center">
        <h1><strong>Les categories proposer</strong></h1>
    </div>

    <!-- AFFICHAGE CATEGORIES SUR ACCEUIL  -->
    <div class="row col-12 col-md-7 d-flex justify-content-center mx-auto">

        <?php

            foreach ($categories as $categorie)
            {
                if ($categorie -> active == 'Disponible')
                {
                    $nombre ++ ;
        ?>
            
            <div class="card custom-border bg zoom ck col-12 col-md-2 bg my-4 mx-5">
                <img class="card-img-top border-1 mt-3 img-fluid cards-img imgs" src="asset/images_the_district/categorie/<?=$categorie->image?>" alt="<?=$categorie->libelle?>">
                <div class="card-body text-center">
                    <h2 value="<?= $categorie -> id ?>" class="card-text"><?= $categorie -> libelle ?></h2>
                    <span class="alert text-danger"><?= $categorie -> active ?></span>
                </div>
            </div>

        <?php

            if ($nombre == 6)
            {
                $nombre = 0;
                break;
            }
            }};

        ?>

    </div>

    <div class="col-12 d-flex justify-content-center mt-5">
        <h1><strong>Best-sellers gustatives</strong></h1>
    </div>

    <!-- AFFICHAGE DES BEST-SELLERS SUR INDEX -->
    <div class="row col-12 d-flex justify-content-center">

        <?php

            foreach ($meilleur as $plat)
            {
                $nombres ++;

        ?>

        <div class="card custom-border bg zoom col-12 col-md-2 mb-2 my-2 mx-3">

            <img src="asset/images_the_district/food/<?= $plat -> image ?>" class="card-img-top border-1 mt-3 img-fluid card-img timg" alt="<?= $plat -> libelle ?>">
            <div class="card-body text-center">
                <h3 class="card-title"><?= $plat -> libelle ?></h3>
                <p class="card-text"><?= $plat -> description ?><br>
                    Menu: <?= $plat -> prix ?> €</p>       
                <a type="submit" href="index.php?page=commande&id=<?= $plat -> id_plat ?>" value="<?= $plat -> id ?>" class="btn btn-light
                d-flex justify-content-center idd">Commander</a>
            </div>
            
        </div>

        <?php

            if ($nombres == 3)
            {
                $nombre = 0;
                break;
            }
            };
        ?>

        <div class="d-flex justify-content-center"> <!--bouton-->      
            <a type="submit" href="index.php?page=categorie" class="btn btn-light btn-lg zoom col-5 col-md-1 btns">Suivant</a>
        </div>

    </div>

</div>