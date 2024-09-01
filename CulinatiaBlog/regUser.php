<?php

require "connecting.php";

$name = trim($_POST['name']);
$gender = trim($_POST['gender']);
$email = trim($_POST['email']);
$number = trim($_POST['number']);
$date = trim($_POST['date']);
$login = trim($_POST['login']);
$password = trim($_POST['password']);

if (!empty($name) && !empty($gender) && !empty($email) && !empty($number) && !empty($date) && !empty($login) && !empty($password)) {
    $checkLoginQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE `loginUser` = '$login'");
    $checkEmailQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE `emailUser` = '$email'");
    $checkNumberQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE `numberUser` = '$number'");

    if (mysqli_num_rows($checkLoginQuery) > 0) {
        echo "<script>
        alert('Пользователь с таким логином уже существует.');
        location.href='regForm.php';
        </script>";
        exit();
    } elseif (mysqli_num_rows($checkEmailQuery) > 0) {
        echo "<script>
        alert('Пользователь с таким email уже существует.');
        location.href='regForm.php';
        </script>";
        exit();
    } elseif (mysqli_num_rows($checkNumberQuery) > 0) {
        echo "<script>
        alert('Пользователь с таким номером телефона уже существует.');
        location.href='regForm.php';
        </script>";
        exit();
    } else {
        $querry = mysqli_query($conn, "INSERT INTO `users` (`nameUser`, `genderUser`, `emailUser`, `numberUser`, `gateUser`, `loginUser`, `passwordUser`, `idRole`, `statusUser`) 
        VALUES ('$name', '$gender', '$email', '$number', '$date', '$login', '$password', 2, 'активный')");
        
        if ($querry) {
            echo "<script>
            alert('Пользователь зарегистрирован');
            location.href='autForm.php';
            </script>";
        } else {
            echo "<script>
            alert('Ошибка при регистрации пользователя.');
            location.href='regForm.php';
            </script>";
        }
    }
} else {
    echo "<script>
    alert('Все поля должны быть заполнены.');
    location.href='regForm.php';
    </script>";
}

?>
