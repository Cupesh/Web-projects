<?php 
session_start();
if ($_SESSION['loggedIn'] == true) {
    echo 'Connected to the database!';
} else {
    header('Location: index.php');
}


?>




<!DOCTYPE html>
<html>
<body class="blue darken-2 has-fixed-navbar">

<?php include('templates/header.php') ?>

<div class="row">
    <div class="col s2 l3">
        <ul>
            <li class="center">
                <a href="#"><h4>PEOPLE</h4></a>
            </li>
        </ul>
    </div>
    <div class="col s10 l9">

    </div>
</div>

<?php include('templates/footer.php') ?>
</body>
</html>