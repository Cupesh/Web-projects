<?php

if (isset($_GET['action']) && $_GET['action'] == 'callfunction'){
    logOut();
}

function logout(){
    session_destroy();
    header('Location: index.php');
}

?>


<ul id="sidenav-left" class="sidenav sidenav-fixed blue darken-3" style="transform:translateX(0%)">
    <li>
        <a href="#" class="logo-container yellow-text"><?= $_SESSION['user']?><i class="material-icons left">person</i></a>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion row">
            <li class="bold waves-effect col s12 l12">
                <a class="collapsible-header yellow-text" tabindex="0">EMPLOYEES
                    <i class="material-icons chevron right">chevron_left</i>
                </a>
                <div class="collapsible-body blue darken-4" style="display:block">
                    <ul>
                        <li>
                            <a href="rgn.php" class="waves-effect yellow-text">RGN</a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect yellow-text">HCA</a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect yellow-text">Office</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="bold waves-effect col s12 l12">
                <a href="#" class="collapsible-header yellow-text" tabindex="0">SHAREHOLDERS</a>
            </li>
        </ul>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <li>
        <a href="menu.php?action=callfunction" class="logo-container yellow-text">LOG OUT<i class="material-icons left">directions_run</i></a>
    </li>
</ul>
