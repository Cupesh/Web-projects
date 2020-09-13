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

<?php include('templates/header.php') ?>
<?php include('templates/footer.php') ?>

</html>