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

SELECT
    UPPER(last_name) AS NAME,
    first_name,
    subscription.price
FROM
    ((user_card
INNER JOIN member ON
    user_card.id_user = member.id_member)
INNER JOIN subscription ON
    member.id_sub = subscription.id_sub)
WHERE subscription.price > 42
ORDER BY
    last_name ASC,
    first_name ASC;
