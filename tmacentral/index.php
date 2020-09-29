<?php
if (isset($_POST['login'])){
    connectToDb();
}

function connectToDb() {
        session_start();
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $connection = mysqli_connect('localhost', $username, $password, 'tma_db');
        if (!$connection){
            echo 'Connection error: '.mysqli_connect_error();
            $_SESSION['loggedIn'] = false;
        } else {
            $_SESSION['user'] = $username;
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['loggedIn'] = true;
            mysqli_close($connection);
            header('Location: menu.php');
        }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>This is a title</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MySQL/PHP/HTML learning project">
    <meta name="author" content="Martin Cupak">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="blue darken-2">
<header>
    <nav class="nav-wrapper blue">
        <div class="row">
            <a href='#' class="brand-logo brand-text col s6 offset-s3 center-align" style="font-size: calc(60% + 1vw)">TMA HEALTHCARE CENTRAL</a>
        </div>
    </nav>
</header>

<section class="container black-text">
    <p></p>
    <form class="blue lighten-1 z-depth-1" action="index.php" method="POST">
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <select id="username" name="username">
                    <label>User</label>
                    <option value="" disabled selected>Select user</option>
                    <option value="admin">admin</option>
                    <option value="manager">manager</option>
                </select>

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