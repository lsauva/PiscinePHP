<?php
$servername = "localhost";
$username = "root";
$password = "root42";
$dbname = "rush00";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // create database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully <br />";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    if ($conn) {
        // use the created db
        $sql = "USE $dbname;";
        $conn->exec($sql);
        // sql to create table
        $sql = "CREATE TABLE user (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            prenom VARCHAR(30) NOT NULL,
            nom VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            admin BOOLEAN
        )";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table user created successfully <br />";
    }
}
catch(PDOException $e)
{
    echo $sql . "<br />" . $e->getMessage();
}

$conn = null;

?>
