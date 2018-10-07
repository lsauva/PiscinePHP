CREATE TABLE db_lsauvage.ft_table (
    id INT(10) AUTO_INCREMENT NOT NULL,
    login VARCHAR(8) DEFAULT "toto" NOT NULL,
    groupe ENUM('staff', 'student', 'other') NOT NULL,
    date_de_creation DATE NOT NULL,
    PRIMARY KEY (id)
);
