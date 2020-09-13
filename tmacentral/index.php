<?php

if (isset($_POST['login'])){
    connectToDb();
}

function connectToDb() {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $connection = mysqli_connect('localhost', $username, $password, 'testdb');
        if (!$connection){
            echo 'Connection error: '.mysqli_connect_error();
            session_start();
            $_SESSION['loggedIn'] = false;
        } else {
            session_start();
            $_SESSION['loggedIn'] = true;
            header('Location: menu.php');
            exit();
        }
}

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php') ?>

<section class="container black-text">
    <p></p>
    <form class="blue lighten-1 z-depth-1" action="index.php" method="POST">
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <input id="username" type="text" placeholder="Username" name="username" class="validate">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <input id="password" type="password" placeholder="Password" name="password" class="validate">
            </div>
        </div>
        <div class="row">
            <div class="center input-field col s6 offset-s3">
                <input id="login" type="submit" name="login" value="login" class="btn brand">
            </div>
        </div>
    </form>
</section>

<?php include('templates/footer.php') ?>

</html>