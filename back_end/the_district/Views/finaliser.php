<?php
   
    require_once 'vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer (true);

    $mail -> Host = '127.0.0.1';

    $mail -> SMTPAuth = false;

    $mail -> Port = 1025;

    $mail -> setFrom ("the_district@contact.com");

    $mail -> addAddress ($_SESSION['emails']);

    $mail -> isHTML (true);

    $mail -> Subject = 'Votre commande est en cours de préparations';

    $mail -> Body = "Bonjour " . $_SESSION["nomPrenom"] . "<br><br> 

        Une fois votre commande prête, le livreur vous contactera sur le numéro: " . $_SESSION["telephones"] . 

        "<br><br>et vous l'ivrera à l'adresse: " .$_SESSION["adresses"] . 

        "<br><br> merci de votre confiance."
    ;

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

    </div><br><br>


    <div class="d-flex justify-content-around text-center"> <!--l'espacement autour du texte et identique-->

        <p>La commande est en cours...<br><br> Une fois la préparation terminée, le livreur vous contactera. <br><br>Merci et à bientôt.</p>

    </div>

</div>