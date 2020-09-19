<?php 
session_start();
if ($_SESSION['loggedIn'] == true) {
    ;
} else {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<body class="blue darken-2 has-fixed-navbar">

    <?php include('templates/header.php') ?>
    <?php include('templates/sidenav.php') ?>

    <?php include('templates/footer.php') ?>

</body>
</html>