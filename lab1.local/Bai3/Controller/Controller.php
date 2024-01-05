<?php 
    include '../Model/MoDel.php';
    $email = $_POST['email'] ?? '';
    $user = get_user($email);
    
    include '../Views/views.php';
?>