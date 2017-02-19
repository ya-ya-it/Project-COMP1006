<?php ob_start();
include_once('database.php');

//if user doesn't log in the page will automatically redirect to the Landing page
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location:index.php');
}

$todoID = $_GET['todoID'];
if($todoID != false) {
    $query = "DELETE FROM todos WHERE todo_id = :todo_id ";
    $statement = $db->prepare($query);
    $statement->bindValue(":game_id", $todoID);
    $success = $statement->execute(); // execute the prepared query
    $statement->closeCursor(); // close off database
}
// redirect to index page
header('Location: index.php');
ob_flush(); ?>