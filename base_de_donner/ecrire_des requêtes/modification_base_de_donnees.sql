PARTIE 1  INSERT :


1 : Ajouter trois employés dans la base de données avec les données de votre choix.

INSERT INTO  employe  
	( noemp ,  nom ,  prenom ,  dateemb ,  nosup ,  titre ,  nodep ,  salaire ,  tauxcom ) 
    VALUES
        (26, 'souare', 'ibrahima', '20000325', NULL, 'président', '50', 50000, NULL),
        (27, 'lemsatef', 'sara', '20000326', NULL, 'président', '50', 50000, NULL),
    (28, 'souare', 'fatoumata', '20000327', NULL, 'président', '50', 50000, NULL)
; 
_________________________________________________________________________________________________________

2 : Ajouter un département.

INSERT INTO `dept`
	(`nodept`, `nom`, `noregion`) 
    VALUES
    (51,'finance',1)
;
_________________________________________________________________________________________________________

3 : Utilisez une requête select pour vérifier l''insertion.

SELECT
	nom AS nom_employe ,
    prenom AS prenom_employe ,
    titre AS titre_employe
    FROM
    	employe
    WHERE
    nodep = '50'
;
____________________________________________________________________________________________________________________________________________________________________________________

PARTIE 2 UPDATE :


1 : Augmenter de 10% le salaire de l''employé 17.

UPDATE employe
	SET
    	salaire = salaire * 1.10
    WHERE
    noemp = '17'
;
_________________________________________________________________________________________________________

2 : Changer le nom du département 45 en Logistique.

UPDATE dept
	SET
    	nom = 'logistique'
    WHERE
    nodept = 45
;
____________________________________________________________________________________________________________________________________________________________________________________

PARTIE 3 DELETE :


1 : Supprimer le dernier des employés que vous avez insérés précédemment.

DELETE
	FROM
    	employe
    WHERE
    noemp = '28'
;


