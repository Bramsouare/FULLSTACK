<?php 

    session_start();

    if (isset($_POST["envoyer"])) // vérification si le formulaire a été soumis avec un champ vide ou pas via la méthode post 
    { 
        // les éléments du formulaire
        $nom = $_POST['nom'];

        $prenom = $_POST['prenom'];

        $email = $_POST['email'];

        $telephone = $_POST['telephone'];

        $message = $_POST['message'];


        function nom($nom) // ma fonction nom
        { 

            $verif = "/^[a-zA-Z0-9]+$/"; // vérification avec expression régulière 

            if (preg_match($verif, $nom)) // si le nom respecte la condition imposée alors...
            { 
                return true; // applique vrai
            } 
            else // sinon
            { 
                echo "<p>Le nom est invalide</p>"; // message d'alerte 
                return false; // et faux sera appliqué
            }
        }

        function prenom($prenom) // ma fonction prénom
        { 
            $verif = "/^[a-zA-Z0-9]+$/"; // vérification avec expression régulière

            if (preg_match($verif, $prenom)) // si prénom respecte la condition imposée alors...
            { 
                return true; // applique vrai
            } 
            else // sinon 
            { 
                echo "<p>Le prénom est invalide</p>"; // message d'alerte
                return false; // et faux sera appliqué
            }
        }

        function email($email) // ma fonction email
        { 

            $verif = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/"; // vérification avec expression régulière

            if (preg_match($verif, $email)) // si email respecte la condition alors...
            { 
                return true; // applique vrai
            } 
            else // sinon
            { 
                echo "<p>L'email est invalide</p>"; // message d'alerte
                return false; // et faux sera appliqué
            }
        }

        function telephone($telephone) // ma fonction téléphone
        { 

            $verif = "/^[0-9]{10,}$/"; // vérification par expression régulière

            if (preg_match($verif, $telephone)) // si téléphone respecte la condition alors...
            { 
                return true; // applique vrai
            } 
            else // sinon
            { 
                echo "<p>Le numéro est invalide</p>"; // message d'alerte
                return false; // et faux sera appliqué
            }
        }

        function message($message) // ma fonction message
        { 

            $verif = "/^[a-zA-Z0-9\s\S]+$/"; // vérification avec expression régulière

            if (preg_match($verif, $message)) // si message respecte la condition alors...
            { 
                return true; // applique vrai
            } 
            else // sinon
            { 
                echo "<p>Le message est invalide</p>"; // message d'alerte
                return false; // et faux sera appliqué
            }
        }

        // si toutes les conditions appliquent vrai alors...
        if (nom($nom) == true && prenom($prenom) == true && email($email) == true && telephone($telephone) == true && message($message) == true) 
        {

            // une session se crée avec les données récupérées
            $_SESSION['nom'] = $nom;

            $_SESSION['prenom'] = $prenom;

            $_SESSION['email'] = $email;

            $_SESSION['telephone'] = $telephone;

            $_SESSION['message'] = $message;

            // un fichier sera généré basé sur la date et l'heure 
            $nomfichier =  date("Y-m-d-H-i-s") . ".txt";

            // le contenu sera intégré
            $contenue = "nom : " . $_SESSION['nom'] . " \r\n
                        prenom : " . $_SESSION["prenom"] . "\r\n
                        email : " . $_SESSION["email"] . "\r\n 
                        telephone : " . $_SESSION["telephone"] . "\r\n 
                        message : " . $_SESSION["message"];


            // les données seront écrites dans le fichier
            file_put_contents($nomfichier, $contenue);

            // message d'alerte
            echo "Formulaire soumis avec succès. Les informations ont bien été enregistrées dans le fichier $nomfichier.";

            // redirection sur la page 
            header("Location: index.php?page=demande");
            exit();

        } 
        else // sinon
        { 
            unset($_SESSION["auth"]); // destruction de la session
            session_destroy(); // pour la detruire proprement

            header("Location:index.php?page=contact"); // redirection sur la page de contact
            exit();
        };

    };




 
    if (isset($_POST["envoie"])) // vérification si le formulaire a été soumis avec un champ vide ou pas via la méthode post 
    {   

      // les éléments du formulaire
        $nomPrenom = $_POST['nomPrenom'];

        $emails = $_POST['emails'];

        $telephones = $_POST['telephones'];

        $adresses = $_POST['adresses'];


        function nomPrenom($nomPrenom) // ma fonction nomPrenom
        { 

            $verif = "/^[a-zA-Z]+\s[a-zA-Z]+$/"; // vérification avec expression régulière 

            if (preg_match($verif, $nomPrenom)) // si le nom respecte la condition imposée alors...
            { 
                return true; // applique vrai
            } 
            else  // sinon
            { 
                echo "<p>Le Nom et Prenom invalide</p>"; // message d'alerte 
                return false; // et faux sera appliqué
            }
        }

        function emails($emails) // ma fonction email
        { 

            $verif = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/"; // vérification avec expression régulière

            if (preg_match($verif, $emails)) // si email respecte la condition alors...
            { 
                return true; // applique vrai
            } 
            else // sinon
            { 
                echo "<p>L'email est invalide</p>"; // message d'alerte
                return false; // et faux sera appliqué
            }
        }

        function telephones($telephones) // ma fonction téléphone

        { 
            $verif = "/^[0-9]{10,}$/"; // vérification par expression régulière

            if (preg_match($verif, $telephones)) // si téléphone respecte la condition alors...
            { 
                return true; // applique vrai
            } 
            else // sinon
            { 
                echo "<p>Le numéro est invalide</p>"; // message d'alerte
                return false; // et faux sera appliqué
            }
        }

        function adresses($adresses) // ma fonction message
        { 

            $verif = "/^[0-9]{1,5}\s[A-Za-z\s]+$/";
            // vérification avec expression régulière

            if (preg_match($verif, $adresses)) // si message respecte la condition alors...
            { 
                return true; // applique vrai
            } 
            else // sinon
            { 
                echo "<p>L'adresse est invalide</p>"; // message d'alerte
                return false; // et faux sera appliqué
            }
        }

        // si toutes les conditions appliquent vrai alors...
        if (nomPrenom($nomPrenom) == true && emails($emails) == true && telephones($telephones) == true && adresses($adresses) == true) 
        {

            $_SESSION['nomPrenom'] = $nomPrenom ;

            $_SESSION['emails'] = $emails;

            $_SESSION['telephones'] = $telephones;

            $_SESSION['adresses'] = $adresses;

            // un fichier sera généré basé sur la date et l'heure 
            $nomfichiers =  date("Y-m-d-H-i-s") . ".txt";

            // le contenu sera intégré
            $contenues = "nom et Prenom  : " . $_SESSION['nomPrenom'] . " \r\n
                        email : " . $_SESSION["emails"] . "\r\n 
                        telephone : " . $_SESSION["telephones"] . "\r\n 
                        adresse : " . $_SESSION["adresses"];


            // les données seront écrites dans le fichier
            file_put_contents($nomfichiers, $contenues);
            
            // message d'alerte
            echo "Formulaire soumis avec succès.";
            
            // redirection sur la page 
            header("Location: index.php?page=finaliser");
            exit();
   
        }
        else // sinon
        { 

            unset($_SESSION["auth"]);
            session_destroy();
            
        };

    }

?>
