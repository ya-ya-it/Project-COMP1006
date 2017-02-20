<?php ob_start();
include_once('database.php'); // include the database connection file

//if user doesn't log in the page will automatically redirect to the Landing page
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location:index.php');
}

$todoID = $_GET['todoID'];
if($todoID == 0) {
    $todo = null;
    $isAddition = 1;
} else {
    $isAddition = 0;
    $query = "SELECT * FROM todos WHERE todo_id = :todo_id "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':todo_id', $todoID);
    $statement->execute(); // run on the db server
    $todo = $statement->fetch(); // returns only one record
    $statement->closeCursor(); // close the connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo Details</title>
    <!-- CSS Section -->
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
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="table.php"><span class="glyphicon glyphicon-user"></span> Todo </a></li>
        </ul>
    </div>
</nav>
<!-- END Navbar -->

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Todo Details</h1>
            <form action="updateDatabase.php" method="POST">
                <div class="form-group">
                    <label for="IDTextField" hidden>Todo ID</label>
                    <input type="hidden" class="form-control" id="IDTextField" name="IDTextField"
                           placeholder="Todo ID" value="<?php echo $todo['todo_id']; ?>">
                </div>
                <div class="form-group">
                    <label for="NameTextField">Todo Name</label>
                    <input type="text" class="form-control" id="NameTextField" name="NameTextField"
                           placeholder="Todo Name" required value="<?php echo $todo['name_todo']; ?>">
                </div>
                <div class="form-group">
                    <label for="NotesTextField">Todo Notes</label>
                    <input type="text" class="form-control" id="NotesTextField" name="NotesTextField"
                           placeholder="Todo Notes" required value="<?php echo $todo['notes_todo']; ?>">
                </div>
                <div class="form-group">
                    <label for="CompletedCheckbox">Completed</label>
                    <input type="checkbox" id="CompletedCheckbox" name="CompletedCheckbox" <?php if($todo['completed'] == 1){echo 'checked="checked"';} ?>">
                </div>
                <input type="hidden" name="isAddition" id="isAddition" value="<?php echo $isAddition; ?>" />
                <button type="submit" id="SubmitButton" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>


<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>
</body>
</html>

<?php ob_flush(); ?>
