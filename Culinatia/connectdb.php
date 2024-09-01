<?php
    $conn = mysqli_connect("localhost", "root", "", "accountsbd", "3307");
    // ("сервер", "логин", "пароль", "название бд", "порт")

    if(!$conn)
    {
        die("Connection Fialed".mysqli_connect_error());
    }
    
?>