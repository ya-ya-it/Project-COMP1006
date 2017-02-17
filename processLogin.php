<?php ob_start();

include_once('database.php');

$username = $_POST['usernameTextField'];
$password = $_POST['password'];

$query = "SELECT user_id, password FROM users WHERE username = :username";

$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$statement->execute();
$user = $statement->fetch();

if ($password == $user['password']){
    //if user is found
    session_start();
    $_SESSION['user_id'] = $user['user_id'];
    header('Location:table.php');
}
else {
    //if user isn't found
    header('Location:login.php?invalid=true');
    exit();
}

$statement->closeCursor();


ob_flush(); ?>