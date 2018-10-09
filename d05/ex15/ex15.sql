SELECT
    REVERSE(RIGHT(`phone_number`, 9)) AS `rebmunenohp`
FROM
    `distrib`
WHERE
    `phone_number` LIKE '05%';
