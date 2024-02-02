<div id="visuel">

    <div class="col-12 d-flex justify-content-center">
        <h1><strong>Les categories</strong></h1>
    </div>

    <!-- AFFICHAGE CATEGORIES -->
    <div class="row col-12 col-md-7 d-flex justify-content-center mx-auto">

        <?php

            foreach ($categories as $categorie)
            {
                if ($categorie -> active == 'Disponible')
                {
                    $nombres ++ ;
        ?>
            
                
            <div class="card custom-border bg zoom ck col-12 col-md-2 bg my-4 mx-5" >
                <img class="card-img-top border-1 mt-3 img-fluid cards-img imgs" src="asset/images_the_district/categorie/<?= $categorie -> image ?>" alt="<?= $categorie -> libelle ?>">
                <div class="card-body text-center">
                    <h2 class="card-title"><?= $categorie -> libelle ?></h2>
                    <span class="alert text-danger" data-id="<?= $categorie -> id ?>"><?= $categorie -> active ?></span>
                    <span data-id="<?= $categorie -> id ?>" class="alert gg"></span>
                </div>
            </div>

        <?php

                    if ($nombres == 6)
                    {
                        $nombres = 0;
                        break ;
                    }
                }
            };

        ?>

       
    </div>

    <div class="d-flex justify-content-around row mt-3"> <!--bouton-->      
        <a type="submit" href="index.php" class="btn btn-light btn-lg zoom col-5 col-md-1 btns">Précédent</a>
        <a type="submit" href="index.php?page=touslesplats" class="btn btn-light btn-lg zoom col-5 col-md-1 btns">Suivant</a>
    </div>

</div>