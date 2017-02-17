<?php ob_start();
include_once('database.php');

session_start();
if (empty($_SESSION['user_id'])) {
    header('Location:index.php');
}
?>

$query = "SELECT * FROM todos"; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->execute(); // run on the db server
$todos = $statement->fetchAll(); // returns an array
$statement->closeCursor(); // close the connection

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todos</title>

    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./Content/app.css">
</head>
<body>

<!-- Navbar Section -->

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Todos</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="./Content/about_us.html">About us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="table.php"><span class="glyphicon glyphicon-user"></span> Todo </a></li>
        </ul>
    </div>
</nav>
<!-- END Navbar -->

<!-- Main Section -->

<table class="table table-bordered">
    <h1>Todos</h1>
    <a class="btn btn-primary" href="todo_details.php?todoID=0"> +   New todo </a>
    <tr>
        <th>Done</th>
        <th>To do</th>
        <th>Notes</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    foreach ($todos as $todo) {
        echo '<tr><td>' . $todo['completed'] . '</td>
        <td>' . $todo['name_todo'] . '</td>
        <td>' . $todo['notes_todo'] . '</td>
        <td>' . '<a class="btn btn-primary" href="todo_details.php?todoID=<?php echo $todo[\'Id\'] ?>">
        <i class="fa fa-pencil-square-o"></i> Edit</a>' . '</td>
        <td>' . '<a class="btn btn-danger" href="todo_details.php?todoID=<?php echo $todo[\'Id\'] ?>">
        <i class="fa fa-trash-o"></i> Delete</a>' . '</td></tr>';
    }
    ?>
</table>

<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>

</body>
</html>

<?php ob_flush(); ?>