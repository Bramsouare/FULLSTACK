<?php require_once 'header.php'; 
   

    if (!isset($_GET['page']) || empty ($_GET['page']) || $_GET['page'] == 'acceuil')
    {
        require_once ('acceuil.php');
    }

    else if ($_GET['page'] == 'categorie')
    {
        require_once ('categorie.php');
    }

    else if ($_GET['page'] == 'commande')
    {
        require_once ('commande.php');
    }

    else if ($_GET['page'] == 'touslesplats')
    {
        require_once ('touslesplats.php');
    }

    else if ($_GET['page'] == 'contact')
    {
        require_once ('contact.php');
    }

    else if ($_GET['page'] == 'finaliser')
    {
        require_once ('finaliser.php');
    }

    else if ($_GET['page'] == 'politique')
    {
        require_once ('politique_confidentialite.php');
    }

    else if ($_GET['page'] == 'mentions')
    {
        require_once ('mentions_legales.php');
    }


require_once 'footer.php'; 
    


