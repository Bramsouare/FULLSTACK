<?php include 'header.php'?>

    <?php
        
        // si la page n'est pas ouvert ou la page et vide ou la page et égal a vinyle alors...
        if (!isset($_GET['page']) || empty($_GET['page']) || $_GET['page'] == 'vinyle' )
        {
            // appel la page vinyle
            include_once 'vinyle.php';
        }
        
        // sinon si la page et égal à details alors...
        else if($_GET['page'] == 'details')
        {
            // appel la page details
            include 'details.php';
        }

        // sinon si la page et égal à add_form alors...
        else if($_GET['page'] == 'add_form')
        {
            // appel la page add_form
            include 'add_form.php';
        }

        // sinon si la page et égal à update_form alors...
        else if($_GET['page'] == 'update_form')
        {
            // appel la page update_form
            include 'update_form.php';
        }

        // sinon si la page et égal à delete_form alors...
        else if($_GET['page'] == 'delete_form')
        {
            // appel la page delete_form
            include 'delete_form.php';
        };
    ?>
  
<?php include 'footer.php'?>
