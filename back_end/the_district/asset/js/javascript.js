$(document).ready(function () {

    $("#envoyer").click(function (e) {

        validation(e);
    });

    function validation(e) {
       
        var envoi = true;

        var nom = $("#nom").val();
        if (nom === "") {
            envoi = false;
            $("#n").show();
            e.preventDefault();
        
        }
        else {
           
            $("#n").hide();

        };
     
        var prenom = $("#prenom").val();
        if (prenom === "") {
            envoi = false;
            $("#p").show();
            e.preventDefault();
        }
        else {
            $("#p").hide();
        };


        var email = $("#email").val();
        if (email === "") {
            envoi = false;
            $("#e").show();
            e.preventDefault();
        }
        else {
            $("#e").hide();

        };


        var telephone = $("#telephone").val();
        if (telephone === "") {
            envoi = false;
            $("#t").show();
            e.preventDefault();
        }
        else {
            $("#t").hide();

        };


        var message = $("#message").val();
        if (message === "") {
            envoi = false;
            $("#m").show();
            e.preventDefault();
        }
        else {
            $("#m").hide();
    
        };
       
    };
    $("#envoie").click(function (e) {
        
        valide(e);

    });

    function valide(e) {

        var nomp = $("#nomPrenom").val();

        if (nomp === "") {
            envoi = false;
            $("#n_manquant").show();
            e.preventDefault();
        }
        else {
            $("#n_manquant").hide();

        }
        console.log(envoie);
        var emails = $("#emails").val();

        if (emails === "") {
            envoi = false;
            $("#email_manquant").show();
            e.preventDefault();
        }
        else {
            $("#email_manquant").hide();
        }

        var tel = $("#telephones").val();

        if (tel === "") {
            envoi = false;
            $("#telephone_manquant").show();
            e.preventDefault();
        }
        else {
            $("#telephone_manquant").hide();
        }

        var adresses = $("#adresses").val();

        if (adresses === "") {
            envoi = false;
            $("#adresse_manquant").show();
            e.preventDefault();
         alert("c");
        }
        else {
            $("#adresse_manquant").hide();
        }

    };

});
