<div class="visuel">

    <?php

        if (isset($_GET["id"]))
        {
            foreach ($plats as $individuel)
            {
                if ($_GET["id"] == $individuel -> id)
                { 
    ?>

    <div class="card custom-border bg zoom col-12 col-md-2 mb-2 my-2 mx-auto d-flex justify-content-center">
        <img src="asset/images_the_district/food/<?= $individuel -> image ?>" class="card-img-top border-1 mt-3 img-fluid card-img timg" alt="<?= $individuel -> libelle ?>">
        <div class="card-body text-center">
            <h2 class="card-title"><?= $individuel -> libelle ?></h2>
            <p class="card-text" value="<?= $individuel -> prix ?>"><?= $individuel -> description ?> <br>
            Total : <?= $individuel -> prix ?>  €</p>
            <button class="btn btn-light d-flex justify-content-center">Quantité</button>
        </div>
    </div>

    <div class="col-12 d-flex justify-content-center">
        <h1><strong>Votre commande</strong></h1>
    </div>

    <form action="formulaire.php" method="POST"> <!--formulaire-->
                
        <div class="form-group mt-4">

            <label for="nomPrenom">Nom et prénom</label> <!--nom et prenom-->
            <input type="text" class="form-control" id="nomPrenom" name="nomPrenom">
            <div id="n_manquant" style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ce champ est obligatoire !</strong> 
            </div>

        </div>

        <div class="row mt-4"> <!--les deux élément aligner sur une ligne-->

            <div class="form-group col-12 col-md-6 mt-4">

                <label for="emails">Email</label> <!--email-->
                <input type="emails" class="form-control" id="emails" name="emails">
                <div id="email_manquant" style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ce champ est obligatoire !</strong>
                </div>  

            </div><br>
            
            <div class="form-group col-12 col-md-6 mt-4">

                <label for="telephones">Téléphone</label> <!--telephone-->
                <input type="text" class="form-control" id="telephones" name="telephones">
                <div id="telephone_manquant" style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ce champ est obligatoire !</strong>
                </div> 

            </div>
            
        </div>

        <div class="form-group mt-5 mb-3">

            <label for="adresses">Votre adresse :</label> <!--adresse-->
            <textarea class="form-control" id="adresses" name="adresses"></textarea>
            <div id="adresse_manquant" style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ce champ est obligatoire !</strong> 
            </div><br>
            
        </div>

        <div class="form-group mt-5 mb-3">
            <button type="submit" href="#" id="envoie" name="envoie" class="btn btn-light btns">Envoyer</button> 
        </div>

    </form>

    <?php 
                };
            };
        };
    ?>
    
    
</div>
