CREATE TABLE db_lsauvage.ft_table (
    `id` INT(10) AUTO_INCREMENT NOT NULL,
    `login` VARCHAR(8) DEFAULT "toto" NOT NULL,
    `group` ENUM ('staff', 'student', 'other') NOT NULL,
    `creation_date` DATE NOT NULL,
    PRIMARY KEY (id)
);
