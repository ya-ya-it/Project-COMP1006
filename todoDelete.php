<?php ob_start();

/**
 * File name: todoDelete.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: Todos
 * http://gc200335788.computerstudi.es/Project/
 *
 * This is a php file which delete todo after button pressed.
 * After the item deleted it is override the user to the main table.
 */


include_once('database.php');

//if user doesn't log in the page will automatically redirect to the Landing page
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location:index.php');
}

$todoID = $_GET['todoID'];
if ($todoID != false) {
    $query = "DELETE FROM todos WHERE todo_id = :todo_id ";
    $statement = $db->prepare($query);
    $statement->bindValue(":todo_id", $todoID);
    $success = $statement->execute(); // execute the prepared query
    $statement->closeCursor(); // close off database
}
// redirect to index page
header('Location: table.php');
ob_flush(); ?>