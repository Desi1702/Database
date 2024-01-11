<?php
session_start();
session_unset();
session_destroy();

if ($_SESSION) {
    echo $_SESSION['user'] . "id=" . $_SESSION['userid'];
} else {
    echo "no session available";
}
?>