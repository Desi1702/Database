<?php

session_start();

$vars = array();
array_push($vars, 'Desi', 'Roubos', 21);

$_SESSION['user'] = 'Desi Roubos';
$_SESSION['userid'] = '21';

echo '<a href="show_session.php" target="_blank"><button>Laat me de sessie variabelen zien</button>';
?>