<?php

/**
 * File name: database.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: Todos
 * http://gc200335788.computerstudi.es/Project/
 *
 * This is a php file with all settings about connection to a MySQL server
 */

// connection string
// FileZilla access
$dsn = 'mysql:host=sql.computerstudi.es;dbname=gc200335788';
$dbUserName = 'gc200335788';
$dbPassword = 'qds77GN4';

// exception handling - use a try / catch
try {
// instantiates a new pdo - an db object
    $db = new PDO($dsn, $dbUserName, $dbPassword);
} catch (PDOException $e) {
    $message = $e->getMessage();
    echo "An error occurred: " . $message;
}
?>