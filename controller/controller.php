<?php
session_start();

include '../model/model.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
$role = $_SESSION['role']; 

$model = new Model();

$kepanitiaan = $model->getKepanitiaan();

function admin($role) {
    return $role === 'BPH';
}
?>
