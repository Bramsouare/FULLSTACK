1. Afficher toutes les informations concernant les employés

SELECT 
    *                        // c''est une clause pour récupérer des données à partir d''une ou plusieurs tables d''une base de données. * pour tout récupérer 
    FROM                            // spécifie la table ou extraire les données
        employe                     // la table ou les données sont extrait
;
________________________________________________________________________________________________________________________________________

2. Afficher toutes les informations concernant les départements

SELECT
    *
    FROM
        dept
;
________________________________________________________________________________________________________________________________________

3. Afficher le nom, la date d''embauche, le numéro du supérieur, le
numéro de département et le salaire de tous les employés.

SELECT
    nom ,
    dateemb ,
    nosup , 
    nodep , 
    salaire 
    FROM 
        employe
;
________________________________________________________________________________________________________________________________________

4. Afficher le titre de tous les employés.

SELECT
    titre
    FROM 
        employe
;
________________________________________________________________________________________________________________________________________

5. Afficher les différentes valeurs des titres des employés.

SELECT 
    DISTINCT 
        titre
    FROM 
        employe
;
________________________________________________________________________________________________________________________________________

6. Afficher le nom, le numéro d''employé et le numéro du
département des employés dont le titre est « Secrétaire ».
 
SELECT 
    nom , 
    noemp , 
    nodep
    FROM 
        employe 
    WHERE 
    titre = 'secretaire'
;
________________________________________________________________________________________________________________________________________

7. Afficher le nom et le numéro de département dont le numéro de
département est supérieur à 40.

SELECT 
    nom , 
    nodept
    FROM 
        dept
    WHERE 
    nodept > 40
;
________________________________________________________________________________________________________________________________________

8. Afficher le nom et le prénom des employés dont le nom est
alphabétiquement antérieur au prénom.

SELECT 
    nom , 
    prenom 
    FROM 
        employe
    WHERE 
    nom < prenom
;
________________________________________________________________________________________________________________________________________

9. Afficher le nom, le salaire et le numéro du département des employés
dont le titre est « Représentant », le numéro de département est 35 et
le salaire est supérieur à 20000.

SELECT 
    nom , 
    salaire , 
    nodep
    FROM 
        employe
    WHERE
        titre = 'representant'  
    AND nodep = '35'  
    AND salaire > 20000
;
________________________________________________________________________________________________________________________________________

10. Afficher le nom, le titre et le salaire des employés dont le titre est
« Représentant » ou dont le titre est « Président ».

SELECT 
    nom , 
    titre , 
    salaire 
    FROM 
        employe
    WHERE 
        titre = 'representant'  
    OR titre = 'president'
;
________________________________________________________________________________________________________________________________________

11. Afficher le nom, le titre, le numéro de département, le salaire des
employés du département 34, dont le titre est « Représentant » ou
« Secrétaire ».

SELECT 
    nom , 
    titre , 
    nodep , 
    salaire 
    FROM 
        employe
    WHERE 
        nodep = '34'
    AND titre IN ('representant','secretaire')
; 
________________________________________________________________________________________________________________________________________

12. Afficher le nom, le titre, le numéro de département, le salaire des
employés dont le titre est Représentant, ou dont le titre est Secrétaire
dans le département numéro 34.

SELECT 
    nom , 
    titre , 
    nodep , 
    salaire 
    FROM 
        employe
    WHERE 
        (titre = 'representant' OR titre = 'secretaire')
    AND nodep = 34
;
________________________________________________________________________________________________________________________________________

13. Afficher le nom, et le salaire des employés dont le salaire est compris
entre 20000 et 30000.

SELECT 
    nom , 
    salaire 
    FROM 
        employe
    WHERE 
        salaire > 20000 
    AND salaire < 30000
;
________________________________________________________________________________________________________________________________________

15. Afficher le nom des employés commençant par la lettre « H ».

SELECT 
    nom
    FROM 
        employe
    WHERE 
    nom LIKE 'H%'
;
________________________________________________________________________________________________________________________________________

16. Afficher le nom des employés se terminant par la lettre « n ».

SELECT 
    nom
    FROM 
        employe
    WHERE 
    nom LIKE '%n'
;
________________________________________________________________________________________________________________________________________  

17. Afficher le nom des employés contenant la lettre « u » en 3ème
position.

SELECT 
    nom
    FROM 
        employe
    WHERE 
    nom LIKE '__u%'
;
________________________________________________________________________________________________________________________________________

18. Afficher le salaire et le nom des employés du service 41 classés par
salaire croissant.

SELECT 
    nom, 
    salaire
    FROM 
        employe
    WHERE 
        nodep = 41
    ORDER BY salaire ASC
;
________________________________________________________________________________________________________________________________________   

19. Afficher le salaire et le nom des employés du service 41 classés par  
salaire décroissant.

SELECT 
    nom, 
    salaire
    FROM 
        employe
    WHERE 
        nodep = 41
    ORDER BY salaire DESC
;
________________________________________________________________________________________________________________________________________

20. Afficher le titre, le salaire et le nom des employés classés par titre
croissant et par salaire décroissant. 

SELECT 
    titre , 
    salaire , 
    nom
    FROM 
        employe
    ORDER BY titre ASC , salaire DESC
;
________________________________________________________________________________________________________________________________________

21. Afficher le taux de commission, le salaire et le nom des employés
classés par taux de commission croissante.

SELECT
    tauxcom , 
    salaire , 
    nom
    FROM 
        employe
    ORDER BY tauxcom ASC
;
________________________________________________________________________________________________________________________________________

22. Afficher le nom, le salaire, le taux de commission et le titre des
employés dont le taux de commission n''est pas renseigné.

SELECT 
    nom , 
    salaire , 
    tauxcom , 
    titre
    FROM 
        employe
    WHERE 
    tauxcom IS NULL
;
________________________________________________________________________________________________________________________________________

23. Afficher le nom, le salaire, le taux de commission et le titre des
employés dont le taux de commission est renseigné.

SELECT 
    nom , 
    salaire , 
    tauxcom , 
    titre
    FROM 
        employe
    WHERE 
    tauxcom IS NOT NULL
;
________________________________________________________________________________________________________________________________________

24. Afficher le nom, le salaire, le taux de commission, le titre des
employés dont le taux de commission est inférieur à 15.

SELECT 
    nom , 
    salaire , 
    tauxcom , 
    titre
    FROM 
        employe
    WHERE 
    tauxcom < 15
;
________________________________________________________________________________________________________________________________________

25. Afficher le nom, le salaire, le taux de commission, le titre des
employés dont le taux de commission est supérieur à 15.

SELECT 
    nom , 
    salaire , 
    tauxcom , 
    titre
    FROM 
        employe
    WHERE 
    tauxcom > 15
;
________________________________________________________________________________________________________________________________________

26. Afficher le nom, le salaire, le taux de commission et la commission des
employés dont le taux de commission n''est pas nul. (la commission
est calculée en multipliant le salaire par le taux de commission).

SELECT 
    nom, 
    salaire, 
    tauxcom, 
    (salaire * tauxcom) AS commission
    FROM 
        employe
    WHERE 
    tauxcom IS NOT NULL
;
________________________________________________________________________________________________________________________________________

27. Afficher le nom, le salaire, le taux de commission, la commission des
employés dont le taux de commission n''est pas nul, classé par taux de
commission croissant.

SELECT 
    nom, 
    salaire, 
    tauxcom, 
    (salaire * tauxcom) AS commission
    FROM 
        employe
    WHERE 
        tauxcom IS NOT NULL
    ORDER BY tauxcom ASC
;
________________________________________________________________________________________________________________________________________

28. Afficher le nom et le prénom (concaténés) des employés. Renommer
les colonnes.

SELECT 
    CONCAT(nom, ' ', prenom) AS nom_prenom
    FROM
    employe
;
________________________________________________________________________________________________________________________________________

29. Afficher les 5 premières lettres du nom des employés.

SELECT 
    LEFT(nom, 5) AS cinq_premieres_lettres
    FROM
    employe
;
________________________________________________________________________________________________________________________________________

30. Afficher le nom et le rang de la lettre « r » dans le nom des
employés.

SELECT 
    nom ,
    LOCATE('r', nom) AS rang_de_r
    FROM 
    employe
;
________________________________________________________________________________________________________________________________________

31. Afficher le nom, le nom en majuscule et le nom en minuscule de
l''employé dont le nom est Vrante.

SELECT 
    nom ,
    UPPER(nom) AS nom_majuscules,
    LOWER(nom) AS nom_minuscules
    FROM 
        employe
    WHERE 
    nom = 'vrante'
;
________________________________________________________________________________________________________________________________________

32. Afficher le nom et le nombre de caractères du nom des employés.

SELECT 
    nom , 
    LENGTH(nom) AS nombre_caracteres
    FROM 
    employe
;

