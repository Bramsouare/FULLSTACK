<?php
session_start ();
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta name="description" content="The district propose des plats de restauration rapide, de type fast-food à consommer sur place où à emporter, et bénéficie d'un service de livraison">
    <meta name="keywords" content="restauration, burgers, pizzas, pates, wraps, salade, veggie">
    <meta name="robots" content="index, follow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
    <style>
        body {
            background-image: url("asset/images_the_district/fondecran.png");
            background-size: cover;
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
                            <a class="nav-link active" aria-current="page" href="index.php"><strong>Accueil</strong></a>
                        </li>
                        <li class="nav-item ecrt">
                            <a class="nav-link active" aria-current="page" href="index.php?page=categorie"><strong>Categorie</strong></a>
                        </li>
                        <li class="nav-item ecrt">
                            <a class="nav-link active" aria-current="page" href="index.php?page=touslesplats"><strong>Plats</strong></a>
                        </li>
                        <li class="nav-item ecrt">
                            <a class="nav-link active" aria-current="page" href="index.php?page=contact"><strong>Contact</strong></a>
                        </li>
                    </ul>
                </div>

            </nav>

        </header>
        
        <?php require_once 'dao.php';?>

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

    </div>
    

