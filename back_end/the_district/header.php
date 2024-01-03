<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
    <style>
        body {
            background-image: url("asset/images_the_district/fondecran.png");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body>

    <div class="container-fluid ">
<header class="col-12 d-flex justify-content-between"> <!--le logo et la barre de navigation sont sur la même ligne-->

    <div class="col-4 col-md-2 mt-2 "> <!--le logo-->
        <img src="asset/images_the_district/the_district_brand/linkedin_banner_image_1.png"
            class="img-fluid mb-1 logo rounded-3" alt="the district logo">
    </div>

    <nav class="navbar navbar-expand-sm navbar-light col-md-9 ml-auto "> <!--la barre de navigation-->

        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ecrt" id="collapsibleNavbar">
            <ul class="navbar-nav rotate"> <!-- items de la barre de navigation-->
                <li class="nav-item ecrt ">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                </li>
                <li class="nav-item ecrt">
                    <a class="nav-link active" aria-current="page" href="categorie.php">Categorie</a>
                 </li>
                <li class="nav-item ecrt">
                    <a class="nav-link active" aria-current="page" href="touslesplats.php">Plats</a>
                </li>
                <li class="nav-item ecrt">
                    <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>

    </nav>
</header>

<div class=" my-2"> <!--élement pour version mobile-->     

<div class="d-none d-lg-block position-relative"> <!--barre de recherche sur le centre de la video-->

    <video autoplay loop muted playsinline poster="asset/images_the_district/burgervideo.mp4" class="video rounded-3"> <!--video--> 
        <source src="asset/images_the_district/burgervideo.mp4" type="video/mp4">
    </video>

    <div class="search-bar position-absolute" id="searchb"> <!--barre de recherche sur le centre de la video-->

        <nav class="navbar navbar-light bg-transparent "> <!--barre de recherche-->

            <form class="form-inline justify-content-between input-group">
                <input class="form-control " type="search" id="input" placeholder="rechercher...">
                <button class="btn btn-outline-warning ml-auto" id="cc" type="button">go!</button>
            </form>

        </nav>
    </div>
</div>

<div class="image-container d-none  d-md-none"> 

    <img src="asset/images_the_district/borderau.png" alt="image de remplacement" class="img-fluid rounded-3"> <!--image-->
</div>




<div id="b" class="row d-flex justify-content-center mx-auto"></div>

<div id="a" class="row d-flex justify-content-center mx-auto"></div> 

<div id="commande" class="row d-flex justify-content-center mx-auto"></div>

<div class="row smplat "></div>



<div class="form col-12">

    <form action="formulaire.php" method="POST"> <!--formulaire-->
            
        <div class="form-group mt-5">
            <label for="nomPrenom">Nom et prénom</label> <!--nom et prenom-->
            <input type="text" class="form-control" id="nomPrenom">
            <div id="n_manquant" style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ce champ est obligatoire !</strong> 
            </div><br>
            
        </div>
        <div class="row mt-5"> <!--les deux élément aligner sur une ligne-->

            <div class="form-group col-12 col-md-6 ">
                <label for="emails">Email</label> <!--email-->
                <input type="emails" class="form-control" id="emails">
                <div id="email_manquant" style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ce champ est obligatoire !</strong></div>                 
            </div><br>
            
            <div class="form-group col-12 col-md-6  ">
                <label for="telephones">Téléphone</label> <!--telephone-->
                <input type="text" class="form-control" id="telephones">
                <div id="telephone_manquant" style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ce champ est obligatoire !</strong></div> 
            </div><br>
            
        </div>
        <div class="form-group mt-5 mb-3">
            <label for="adresses">Votre adresse :</label> <!--adresse-->
            <textarea class="form-control" id="adresses" name="adresses"></textarea>
            <div id="adresse_manquant" style="display: none;" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ce champ est obligatoire !</strong> 
            </div><br>
        </div>
        <div class="form-group mt-5 mb-3">
            <button type="submit" href="#" id="envoie" class="btn btn-light btns">Envoyer</button> <!--bouton-->
        </div>

    </form>

</div>

