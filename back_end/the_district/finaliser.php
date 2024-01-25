<?php

    var_dump($_SESSION);
    require_once 'vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer (true);

    $mail -> isSMTP ();

    $mail -> Host = 'localhost';

    $mail -> SMTPAuth = false;

    $mail -> Port = 1025;

    $mail -> setFrom ("the_district@contact.com");

    $mail -> addAddress ($_SESSION['email']);

    $mail -> isHTML (true);

    $mail -> Subject = 'Votre commande est en cours de préparations';

    $mail -> $body = "Bonjour" . $_SESSION["nomPrenom"] . "<br><br> Une fois votre commande prête, le livreur vous contactera très rapidement merci de votre confiance.";

    if ($mail) 
    {
        try
        {
            $mail -> send ();
            echo 'Email envoyé avec succès';
        }
        catch (Exception $e)
        {
            echo "L'envoi du mail a échoué.<br><br><strong> l'erreur suivante s'est produite : </strong>", $mail -> ErrorInfo;
        }
    }

?>

<div id ="visuel">

    <div class="col-12 d-flex justify-content-center">

        <h1><strong>Félicitations commande finalisée</strong></h1>

    </div>

    <div class="d-flex justify-content-around"> <!--l'espacement autour du texte et identique-->

        <p>La commande est en cours...<br> une fois la préparation terminée le livreur vous contactera. merci et à bientôt.</p>

    </div>

</div>