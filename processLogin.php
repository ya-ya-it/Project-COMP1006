<?php ob_start();

/**
 * File name: processLogin.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: Todos
 * http://gc200335788.computerstudi.es/Project/
 *
 * This is a php file which check if the user is authorised on the website.
 */

include_once('database.php');

$username = $_POST['usernameTextField'];
$password = $_POST['password'];

//check if user is on the database
$query = "SELECT user_id, password FROM users WHERE username = :username";

$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$statement->execute();
$user = $statement->fetch();

//if the user is fount override to the table, if not - to the main page
if ($password == $user['password']) {
    //if user is found
    session_start();
    $_SESSION['user_id'] = $user['user_id'];
    header('Location:table.php');
} else {
    //if user isn't found
    header('Location:login.php?invalid=true');
    exit();
}

$statement->closeCursor();


ob_flush(); ?>