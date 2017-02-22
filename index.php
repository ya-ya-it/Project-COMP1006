<?php ob_start();
/**
 * File name: index.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: Todos
 * http://gc200335788.computerstudi.es/Project/
 *
 * This is a landing page. From here user can login to the main table. Here there is a Welcome message too.
 */
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Todos</title>

        <!-- CSS Section -->
        <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="./Scripts/lib/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="./Content/app.css">
        <!-- End CSS Section -->
    </head>
    <body>
    <!-- Navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Todos</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
            </ul>

            <!--If the user is not login there is a login button. If the user is login there is a Table button -->

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
    <!-- End Navbar -->

    <!-- Welcome message -->
    <article class="intro">
        <h1>Hello world!</h1>
        <p>This is my Todos. You need just to Log in and after you will be able to use the most comfortable tool for
            time
            management in the world! You will discover that the interface is easy to understand.</p>
        <p>You will love it!</p>
    </article>

    <!-- JavaScript Section -->
    <script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
    <script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./Scripts/app.js"></script>
    <!-- End JavaScript Section -->

    </body>
    </html>

<?php ob_flush(); ?>