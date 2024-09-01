<?php
require "connecting.php";

$login = trim($_POST['login']);
$password = trim($_POST['password']);

if(!empty($login) && !empty($password)){
    $querry = mysqli_query($conn, "SELECT * FROM users WHERE loginUser='$login' AND passwordUser='$password'");
    $users = mysqli_fetch_array($querry);
    $usersId = $users['idUser'];

    if(!empty($users)){
        
        if($users['statusUser'] == 'активный'){
            if($users['idRole'] == 1){
                setcookie("idUser", $users['idUser'],time()+(86400*30),"/");
            echo"<script>
            location.href='adminForm.php';
            </script>";
            }
            else if($users['idRole'] == 2){
                setcookie("idUser", $users['idUser'],time()+(86400*30),"/");
            echo"<script>
            location.href='blogForm.php';
            </script>";
            }
            
        }
        else{
            echo"<script>
            alert(\"Пользователь не найден\");
            location.href='autForm.php';
            </script>";
        }
    }
    else{
        echo"<script>
        alert(\"Неверный логин или пароль\");
        location.href='autForm.php';
        </script>";
    }
}
else{
    echo"<script>
            alert(\"Заполните все поля\");
            location.href='autForm.php';
            </script>";
}
?>