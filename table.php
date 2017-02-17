<?php
/**
 * Created by PhpStorm.
 * User: Dasha
 * Date: 2/14/2017
 * Time: 9:48 PM
 */
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
    <tr>
        <th>Done</th>
        <th>To do</th>
        <th>Notes</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <tr>
        <td>Jill</td>
        <td>Smith</td>
        <td>50</td>
    </tr>
</table>

<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>

</body>
</html>