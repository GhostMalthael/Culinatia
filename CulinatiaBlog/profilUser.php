<?php
require "connecting.php";

$idUser=$_COOKIE['idUser'];
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$number = trim($_POST['number']);
$password = trim($_POST['password']);
if(!empty($name) && !empty($email) && !empty($number) && !empty($password)){
    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `emailUser` = '$email'");
    $users = mysqli_fetch_array($query);
    if(!empty($users))
    {
        echo"<script>
        alert(\"Ошибка\");
        location.href='profilForm.php'
        </script>";
    }
    else
    {
        $querry = mysqli_query($conn,"UPDATE `users` SET `nameUser`='$name',`emailUser`='$email',`numberUser`='$number',`passwordUser`='$password' WHERE idUser = $idUser");

        echo"<script>
        alert(\"Данные изменены\");
        location.href='blogForm.php';
        </script>";
    }

}
?>