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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Todos</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            session_start();
            if (empty($_SESSION['user_id'])) {
                echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Log in </a></li>';
            } else {
                echo '<li ><a href = "table.php" ><span class="glyphicon glyphicon-user" ></span > Todo </a ></li >';
            }
            ?>
        </ul>
    </div>
</nav>

<article class="intro">
    <h1>Hello world!</h1>
    <p>This is my Todos. You need just to Log in and after you will be able to use the most comfortable tool for time
        management in the world! You will discover that the interface is easy to understand.</p>
    <p>You will love it!</p>
</article>

<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>

</body>
</html>