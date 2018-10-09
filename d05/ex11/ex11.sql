-- ### Premiere version sans INNER JOIN
-- SELECT
--     UPPER(last_name) AS NAME,
--     first_name,
--     price
-- FROM
--     user_card,
--     member,
--     subscription
-- WHERE
--     user_card.id_user = member.id_user_card
-- AND member.id_sub = subscription.id_sub
-- AND subscription.price > 42
-- ORDER BY
--     last_name ASC,
--     first_name ASC;

-- Version 2 avec INNER JOIN sur `user_card`.`id_user` = `member`.`id_member`
-- 17 reponses

-- SELECT
--     UPPER(`user_card`.`last_name`) AS NAME,
--     `user_card`.`first_name`,
--     `subscription`.`price`
-- FROM
--     `user_card`
-- INNER JOIN `member` ON
--     `user_card`.`id_user` = `member`.`id_member`
-- INNER JOIN `subscription` ON
--     `member`.`id_sub` = `subscription`.`id_sub`
-- WHERE `subscription`.`price` > 42
-- ORDER BY
--     `last_name` ASC,
--     `first_name` ASC;

-- version finale, logique au niveau de la construction de la base, pas au niveau des resultats (2 reponses)

SELECT
    UPPER(`user_card`.`last_name`) AS NAME,
    `user_card`.`first_name`,
    `subscription`.`price`
FROM
    `user_card`
INNER JOIN `member` ON
    `user_card`.`id_user` = `member`.`id_user_card`
INNER JOIN `subscription` ON
    `member`.`id_sub` = `subscription`.`id_sub`
WHERE `subscription`.`price` > 42
ORDER BY
    `last_name` ASC,
    `first_name` ASC;
