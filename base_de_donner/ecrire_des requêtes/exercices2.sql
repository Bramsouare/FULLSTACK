1. Rechercher le prénom des employés et le numéro de la région de leur
département.

SELECT 
    ensemble.prenom,
    ensemble.noregion
    FROM
    (
        SELECT
            employe.prenom ,
            dept.noregion
        FROM
            employe INNER JOIN dept
            ON employe.nodep = dept.nodept
    ) 
    AS ensemble
;
__________________________________________________________________________________________

2. Rechercher le numéro du département, le nom du département, le
nom des employés classés par numéro de département (renommer les
tables utilisées).

SELECT
    // la sous-requête et sélectionne les colonne nécessaires de la jointure 
	unire.numerodep ,
	unire.nomdep ,
    unire.nomemploye
    FROM
    (
        SELECT	
            employe.nodep AS numerodep,
            dept.nom AS nomdep,
            employe.nom AS nomemploye
        FROM
            employe INNER JOIN dept
            ON employe.nodep = dept.nodept
        ORDER BY 
        employe.nodep , employe.nom
    ) 
    AS unire
;
__________________________________________________________________________________________

3. Rechercher le nom des employés du département Distribution.

SELECT 
    // la colonne qu''on récupère et changement de titre
    employe.nom AS nomemploye
    FROM 
        // l''endroit de récupération de données
        employe
        // jointure avec la table employe et dept en utilisant les colonnes nodep et nodept
        INNER JOIN dept ON employe.nodep = dept.nodept
    WHERE
    // filtre et affiche uniquement les nom = a Distribution
    dept.nom = 'Distribution'
;
__________________________________________________________________________________________

4. Rechercher le nom et le salaire des employés qui gagnent plus que
leur patron, et le nom et le salaire de leur patron.

SELECT 
	plus.nom_employe ,
    plus.salaire_employe ,
    plus.nom_patron ,
    plus.salaire_patron 
    FROM
    (
        SELECT
            employe.nom AS nom_employe ,
            employe.salaire AS salaire_employe ,
            patron.nom AS nom_patron ,
            patron.salaire AS salaire_patron
        FROM
            employe
        JOIN
            employe AS patron 
            ON employe.nosup = patron.noemp
        WHERE
        employe.salaire > patron.salaire
    ) 
    AS plus
;
__________________________________________________________________________________________

5. Rechercher le nom et le titre des employés qui ont le même titre que
Amartakaldire.

SELECT
	employe.nom AS nom_employe ,
    employe.titre AS titre_employe
    FROM
	    employe
    WHERE
	employe.titre =
    (
        SELECT
     	    titre 
        FROM
     	    employe 
        WHERE 
     	nom ='Amartakaldire'
    )
;
__________________________________________________________________________________________

6. Rechercher le nom, le salaire et le numéro de département des
employés qui gagnent plus qu''un seul employé du département 31,
classés par numéro de département et salaire.

SELECT
    nom AS nom_employe ,
    salaire AS salaire_employe ,
    nodep AS numero_dep
        FROM 
            employe 
        WHERE 
            salaire > ANY
            ( 
                SELECT
                    salaire
                FROM 
                    employe 
                WHERE 
                nodep = '31'
            ) 
        ORDER BY 
    nodep ASC , salaire ASC
; 
__________________________________________________________________________________________

7. Rechercher le nom, le salaire et le numéro de département des
employés qui gagnent plus que tous les employés du département 31,
classés par numéro de département et salaire

SELECT
    nom AS nom_employe,
    salaire AS salaire_employe,
    nodep AS numero_dep
        FROM 
            employe 
        WHERE 
            salaire > ALL
            ( 
                SELECT
                    salaire
                FROM 
                    employe 
                WHERE 
                nodep = '31'
            ) 
        ORDER BY 
    nodep ASC, salaire ASC
;
__________________________________________________________________________________________

8. Rechercher le nom et le titre des employés du service 31 qui ont un
titre que l''on trouve dans le département 32.

SELECT
    nom AS nom_employe,
    titre AS titre_employe
    FROM
        employe
    WHERE
    nodep = '31'
    AND titre IN 
    (
        SELECT
            DISTINCT titre
        FROM
            employe
        WHERE
        nodep = '32'
    )
;
__________________________________________________________________________________________

9. Rechercher le nom et le titre des employés du service 31 qui ont un
titre l''on ne trouve pas dans le département 32.

SELECT
    nom AS nom_employe,
    titre AS titre_employe
    FROM
        employe
    WHERE
    nodep = '31'
    AND titre NOT IN 
    (
        SELECT
            DISTINCT titre
        FROM
            employe
        WHERE
        nodep = '32'
    )
;
__________________________________________________________________________________________

10. Rechercher le nom, le titre et le salaire des employés qui ont le même
titre et le même salaire que Fairant.

SELECT
    nom AS nom_employe,
    titre AS titre_employe,
    salaire AS salaire_employe
    FROM
        employe
    WHERE
    (titre, salaire) = 
    (
        SELECT
            titre,
            salaire
        FROM
            employe
        WHERE
        nom = 'Fairent'
    )
;
__________________________________________________________________________________________

11. Rechercher le numéro de département, le nom du département, le
nom des employés, en affichant aussi les départements dans lesquels
il n''y a personne, classés par numéro de département.

SELECT
    dept.nodept ,
        dept.nom AS nom_departement ,
        COALESCE(employe.nom, 'Aucun employé') AS nom_employe
        FROM
            dept LEFT JOIN employe 
            ON dept.nodept = employe.nodep
        ORDER BY
    dept.nodept ASC
;
____________________________________________________________________________________________________________________________________________________________________________________________________

1. Calculer le nombre d''employés de chaque titre.

SELECT
    titre,
        COUNT(*) AS nombre_employes
        FROM
            employe
        GROUP BY
    titre
;
_______________________________________________________________________________________________

2. Calculer la moyenne des salaires et leur somme, par région.

SELECT
    nodep , AVG(salaire)
        FROM
            employe 
        GROUP by 
    nodep 
;
________________________________________________________________________________________________

3. Afficher les numéros des départements ayant au moins 3 employés.

SELECT
    titre , COUNT(*)
    FROM
        employe
    GROUP BY
        titre
    HAVING COUNT(*) > 2
;
________________________________________________________________________________________________

4. Afficher les lettres qui sont l''initiale d''au moins trois employés.

SELECT
    LEFT(nom, 1) AS initiale,           // extrait la première lettre du nom de chaque employé.
    COUNT(*) AS nombre_employes         // compte le nombre d''employés pour chaque initiale.
    FROM
        employe                         
    GROUP BY                            // regroupe les résultats par initiale.
        LEFT(nom, 1)
    HAVING                              // filtre les résultats pour inclure uniquement les initiales avec au moins trois employés.
    COUNT(*) >= 3
;
________________________________________________________________________________________________

5. Rechercher le salaire maximum et le salaire minimum parmi tous les
salariés et l''écart entre les deux.

SELECT
    MAX(salaire) AS salaire_maximum,
    MIN(salaire) AS salaire_minimum,
    MAX(salaire) - MIN(salaire) AS ecart_salaire
    FROM
    employe
;
________________________________________________________________________________________________

6. Rechercher le nombre de titres différents.

SELECT
    COUNT(DISTINCT titre) AS nombre_de_titres
    FROM
    employe
;
________________________________________________________________________________________________

7. Pour chaque titre, compter le nombre d''employés possédant ce titre.

SELECT
    titre,
        COUNT(*) AS nombre_employes
        FROM
            employe
        GROUP BY
    titre
;
________________________________________________________________________________________________

8. Pour chaque nom de département, afficher le nom du département et
le nombre d''employés.

SELECT
    dept.nom AS nom_dep ,
        COUNT(*) AS nombre_employe
        FROM
            employe INNER JOIN dept
            ON employe.nodep = dept.nodept
        GROUP BY
    dept.nom
;
________________________________________________________________________________________________

9. Rechercher les titres et la moyenne des salaires par titre dont la
moyenne est supérieure à la moyenne des salaires des Représentants.

SELECT
    titre, AVG(salaire) AS moyenne_salaire
    FROM
        employe
    GROUP BY
        titre
    HAVING
        AVG(salaire) > 
    (
        SELECT 
            AVG(salaire)
        FROM
            employe
        WHERE
        titre = 'représentant'
    )   
;
________________________________________________________________________________________________

10.Rechercher le nombre de salaires renseignés et le nombre de taux de
commission renseignés.

SELECT
    COUNT(*) AS nombre_salaire ,
    COUNT(*) AS nombre_taux_com
    FROM
    employe
;
    