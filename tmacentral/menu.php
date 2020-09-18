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

<ul id="sidenav-left" class="sidenav sidenav-fixed" style="transform:translateX(0%)">
    <li>
        <a href="#" class="logo-container"><?= $_SESSION['user']?><i class="material-icons left">person</i></a>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion row">
            <li class="bold waves-effect col s12 l12">
                <a class="collapsible-header" tabindex="0">EMPLOYEES
                    <i class="material-icons chevron right">chevron_left</i>
                </a>
                <div class="collapsible-body" style="display:block">
                    <ul>
                        <li>
                            <a href="#" class="waves-effect">RGN</a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect">HCA</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="bold waves-effect col s12 l12">
                <a href="#" class="collapsible-header" tabindex="0">SHAREHOLDERS</a>
            </li>
        </ul>
    </li>
</ul>

<?php include('templates/footer.php') ?>
</body>
</html>