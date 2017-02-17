<?php
// connection string
// FileZilla access
$dsn = 'mysql:host=sql.computerstudi.es;dbname=gc200335788';
$dbUserName = 'gc200335788';
$dbPassword = 'qds77GN4';

// exception handling - use a try / catch
try {
// instantiates a new pdo - an db object
    $db = new PDO($dsn, $dbUserName, $dbPassword);
}
catch(PDOException $e) {
    $message = $e->getMessage();
    echo "An error occurred: " . $message;
}
?>