<?php
// DB credentials.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'phpcrudpdo');
define('DB_PORT', '3306');

/* set true to create db first time default false */
$createDB = false;

/* create data base  */
if ($createDB) {
    createDB();
    createTblUsers();
    exit("<br> Database create successfully $ createDB  to false");
} else {
    setGlobalPHP();
}

// setting the $PDO on global
function setGlobalPHP()
{
    try {
        $GLOBALS["PDO"] = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        // set the PDO error mode to exception
        $GLOBALS["PDO"]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit("Error: connection " . $e->getMessage());
    } catch (Error $e) {
        exit("Error: " . $e->getMessage());
    }
    return null;
}

/* create dataBase phpcrudpdo */
function createDB()
{
    try {
        $PDO = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
        // set the PDO error mode to exception
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $createDB = "CREATE DATABASE phpcrudpdo";
        // use exec() because no results are returned

        $PDO->exec($createDB);
        echo "Database created successfully. <br>";
    } catch (PDOException $e) {
        if ($e->getCode() === 'HY000') {
            echo "phpcrudpdo already exist. <br>";
        } else {
            exit("Error: creating data base " . $e->getMessage());
        }
    } catch (Error $e) {
        exit("Error: " . $e->getMessage());
    }
    $PDO = null;
}

/* create table tblusers */
function createTblUsers()
{
    try {
        $PDO = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE TABLE IF NOT EXISTS  tblusers (
        id int(11) NOT NULL,
        FirstName varchar(150) NOT NULL,
        LastName varchar(150) NOT NULL,
        EmailId varchar(120) NOT NULL,
        ContactNumber char(11) NOT NULL,
        Address varchar(255) NOT NULL,
        PostingDate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    )";

        // use exec() because no results are returned
        $PDO->exec($sql);
        echo "Table tblusers created successfully. <br>";

        $sqlAlter =  "ALTER TABLE `tblusers` ADD PRIMARY KEY (`id`)";
        $PDO->exec($sqlAlter);
        echo "Table tblusers ALTER successfully. <br>";

        $sqlModify =  "ALTER TABLE `tblusers` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";
        echo "Table tblusers MODIFY successfully. <br>";
        $PDO->exec($sqlModify);
    } catch (PDOException $e) {
        if ($e->getCode() === '42S01') {
            echo "tblusers table already exist<br>";
        } else {
            exit("Error: creating table " . $e->getMessage());
        }
    } catch (Error $e) {
        exit("Error: " . $e->getMessage());
    }
    $PDO = null;
}
