<?php ob_start();

/**
 * File name: updateDatabase.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: Todos
 * http://gc200335788.computerstudi.es/Project/
 *
 * This is a php file with all update settings.
 */

//received variables
$isAddition = $_POST['isAddition'];
$todoID = $_POST['IDTextField'];
$name_todo = $_POST['NameTextField'];
$notes_todo = $_POST['NotesTextField'];

//received info from checkbox
if (isset($_POST['CompletedCheckbox'])) {
    $checked = '1';
} else $checked = '0';

include_once('database.php');

//if the "Create new todos" pressed
if ($isAddition == "1") {
    $query = "INSERT INTO todos (name_todo, notes_todo, completed) VALUES (:name_todo, :notes_todo, :checked)";
    $statement = $db->prepare($query); // encapsulate the sql statement
} else {
    $query = "UPDATE todos SET name_todo = :name_todo, notes_todo = :notes_todo, completed = :checked WHERE todo_id = :todo_id "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':todo_id', $todoID);
}

$statement->bindValue(':name_todo', $name_todo);
$statement->bindValue(':notes_todo', $notes_todo);
$statement->bindValue(':checked', $checked);
$statement->execute(); // run on the db server
$statement->closeCursor(); // close the connection
// redirect to table page
header('Location: table.php');

ob_flush(); ?>