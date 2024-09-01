<?php
if (isset($_COOKIE['idUser'])) {
    unset($_COOKIE['idUser']);
    setcookie('idUser', '', time() - 3600, '/'); 
}

header('Location: autForm.php');
exit;
?>