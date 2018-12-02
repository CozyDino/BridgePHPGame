<?php
session_start();
unset($_SESSION['jeu']);
header('Location: index.php');
?>
