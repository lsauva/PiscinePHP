INSERT INTO db_lsauvage.ft_table (login, groupe, date_de_creation)
SELECT nom, 'other', date_de_creation
FROM fiche_personne
WHERE nom LIKE '%a%' AND LENGTH(nom) < 9
ORDER BY nom ASC 
LIMIT 10;
