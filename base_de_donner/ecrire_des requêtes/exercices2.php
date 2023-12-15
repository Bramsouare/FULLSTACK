1. Rechercher le prénom des employés et le numéro de la région de leur
département.

SELECT 
    ensemble.prenom,
    ensemble.noregion
FROM
(SELECT
    employe.prenom ,
    dept.noregion
FROM
employe INNER JOIN dept
ON employe.nodep = dept.nodept) AS ensemble;

__________________________________________________________________________________________

2. Rechercher le numéro du département, le nom du département, le
nom des employés classés par numéro de département (renommer les
tables utilisées).

SELECT

    // la sous-requête et sélectionne les colonne nécessaires de la jointure 
	unire.numerodep ,
	unire.nomdep ,
    unire.nomemploye

FROM(SELECT	


    employe.nodep AS numerodep,
    dept.nom AS nomdep,
    employe.nom AS nomemploye


FROM


    employe INNER JOIN dept
    ON employe.nodep = dept.nodept

ORDER BY 

employe.nodep, employe.nom) AS unire;

_____________________________________________________________________________________________

3. Rechercher le nom des employés du département Distribution.

SELECT 

    // la colonne qu'on récupère et changement de titre
    employe.nom AS nomemploye

FROM 

    // l'endroit de récupération de données
    employe
    // jointure avec la table employe et dept en utilisant les colonnes nodep et nodept
    INNER JOIN dept ON employe.nodep = dept.nodept

WHERE

// filtre et affiche uniquement les nom = a Distribution
dept.nom = 'Distribution';

________________________________________________________________________________________________


4. Rechercher le nom et le salaire des employés qui gagnent plus que
leur patron, et le nom et le salaire de leur patron.


5. Rechercher le nom et le titre des employés qui ont le même titre que
Amartakaldire.


6. Rechercher le nom, le salaire et le numéro de département des
employés qui gagnent plus qu'un seul employé du département 31,
classés par numéro de département et salaire.


7. Rechercher le nom, le salaire et le numéro de département des
employés qui gagnent plus que tous les employés du département 31,
classés par numéro de département et salaire


8. Rechercher le nom et le titre des employés du service 31 qui ont un
titre que l'on trouve dans le département 32.


9. Rechercher le nom et le titre des employés du service 31 qui ont un
titre l'on ne trouve pas dans le département 32.


10. Rechercher le nom, le titre et le salaire des employés qui ont le même
titre et le même salaire que Fairant.


11. Rechercher le numéro de département, le nom du département, le
nom des employés, en affichant aussi les départements dans lesquels
il n'y a personne, classés par numéro de département.


__________________________________________________________________________________________________________________________


1. Calculer le nombre d'employés de chaque titre.



2. Calculer la moyenne des salaires et leur somme, par région.



3. Afficher les numéros des départements ayant au moins 3 employés.



4. Afficher les lettres qui sont l'initiale d'au moins trois employés.



5. Rechercher le salaire maximum et le salaire minimum parmi tous les
salariés et l'écart entre les deux.



6. Rechercher le nombre de titres différents.



7. Pour chaque titre, compter le nombre d'employés possédant ce titre.



8. Pour chaque nom de département, afficher le nom du département et
le nombre d'employés.



9. Rechercher les titres et la moyenne des salaires par titre dont la
moyenne est supérieure à la moyenne des salaires des Représentants.



10.Rechercher le nombre de salaires renseignés et le nombre de taux de
commission renseignés.