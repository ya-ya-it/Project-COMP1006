<?php ob_start();

/**
 * File name: table.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: Todos
 * http://gc200335788.computerstudi.es/Project/
 *
 * This is a php file with a main table of all todos.
 * It has update and delete buttons inside the table.
 */

include_once('database.php');

//if user doesn't log in the page will automatically redirect to the Landing page
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location:index.php');
}

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

        <!-- CSS section -->
        <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="./Scripts/lib/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="./Content/app.css">
        <!-- End CSS Section -->
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="table.php"><span class="glyphicon glyphicon-user"></span> Todo </a></li>
            </ul>
        </div>
    </nav>
    <!-- END Navbar -->

    <!-- Main Section -->
    <div class="container">
        <!-- Table with all todos -->
        <table class="table table-bordered">
            <h1>Todos</h1>
            <a class=" button btn btn-primary col-lg-2 col-sm-offset-10" href="todoDetails.php?todoID=0"> + New
                todo </a>
            <tr>
                <th>Done</th>
                <th>To do</th>
                <th>Notes</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <!-- Foreach which fill a table with the items from MySQL database -->
            <?php foreach ($todos as $todo) : ?>
                <tr>
                    <td><input type="checkbox" name="completed" <?php if ($todo['completed'] == 1) {
                            echo 'checked="checked"';
                        } ?> onclick="return false;"></td>

                    <!-- If todos completed the name and note will be cross out -->

                    <td><?php
                        if ($todo['completed'] == 1) {
                            echo '<div class="completedTodo">' . $todo['name_todo'] . '</div>';
                        } else {
                            echo $todo['name_todo'];
                        }

                        ?></td>
                    <td><?php
                        if ($todo['completed'] == 1) {
                            echo '<div class="completedTodo">' . $todo['notes_todo'] . '</div>';
                        } else {
                            echo $todo['notes_todo'];
                        }

                        ?></td>

                    <td><a class="btn btn-primary" href="todoDetails.php?todoID=<?php echo $todo['todo_id'] ?>"><i
                                    class="fa fa-pencil-square-o"></i> Edit</a></td>

                    <td><a class="btn btn-danger confirm" href="todoDelete.php?todoID=<?php echo $todo['todo_id'] ?>"><i
                                    class="fa fa-trash-o"></i> Delete</a></td>
                </tr>
            <?php endforeach; ?>
            <!-- End Foreach -->
        </table>
        <!-- End Table -->
    </div>

    <!-- JavaScript Section -->
    <script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
    <script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./Scripts/app.js"></script>
    <!-- End JavaScript Section -->

    </body>
    </html>

<?php ob_flush(); ?>