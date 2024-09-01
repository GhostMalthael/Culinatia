<?php
require('connectdb.php');
$login = $_POST['login'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];
$fullName = $_POST['fullName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$numberPhone = $_POST['numberPhone'];
$birthDate = $_POST['birthDate'];
if(empty($login) || empty($password) || empty($repeatPassword) || empty($fullName) || empty($gender) || empty($email) || empty($numberPhone) || empty($birthDate))
{
        echo "<script>
        alert('Заполните все поля');
        location.href = 'registration.php';
    </script>";
    
}
else
{

    if($password != $repeatPassword)
    {
            echo "<script>
            alert('Пароли не совпадают');
            location.href = 'registration.php';
       </script>";
    }
    else
    {
        $sql = "INSERT INTO `users` (Login,Password,FullName,Gender,Email,NumberPhone,DateBirth) VALUES ('$login', '$password', '$fullName', '$gender', '$email', '$numberPhone', '$birthDate')";
        if($conn -> query($sql) === TRUE)
        {
            echo "<script>
            alert('Успешная регистрация');
            location.href = 'authorization.php';
       </script>";
        }
    }

}
