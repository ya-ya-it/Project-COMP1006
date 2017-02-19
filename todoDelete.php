<?php
include_once('database.php');
$gameID = $_GET["gameID"]; // assigns the gameID from the URL
if($gameID != false) {
    $query = "DELETE FROM todos WHERE todo_id = :todo_id ";
    $statement = $db->prepare($query);
    $statement->bindValue(":game_id", $gameID);
    $success = $statement->execute(); // execute the prepared query
    $statement->closeCursor(); // close off database
}
// redirect to index page
header('Location: index.php');
?>