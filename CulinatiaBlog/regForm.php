<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="st.css"/>
    <title>Регистрация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #34e9cb;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            margin: 0;
            color: #555;
        }
        input[type="text"], textarea, select, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        button, .button {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            background-color: #5a0070;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover, .button:hover {
            background-color: #0056b3;
        }
        .button {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
        form a.button {
            background-color: #6c757d;
        }
        form a.button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
<form action="regUser.php" method="post">
    <h1>Регистрация</h1>
        <div class="container">

            <p>Введите Имя:</p>
            <input type="text" name="name" placeholder="Иванов Иван" title="Пожалуйста, введите своё имя">   
        
            <p>Введите Пол:</p>
            <input type="text" name="gender" placeholder="пол" title="Пожалуйста, введите свой пол">
        
            <p>Введите email:</p>
            <input style="width: 390px; margin-top:10px; margin-bottom:20px;" type="email" name="email" placeholder="***@mail.ru" title="Пожалуйста, введите свой email">   
            
            <p>Введите телефон:</p>
            <input style="width: 390px; margin-top:10px;margin-bottom:20px;" type="tel" name="number" placeholder="+7 919 999 99 99" title="Пожалуйста, введите свой номер телефона">
        
            <p>Введите дату рождения:</p>
            <input type="text" name="date" placeholder="0000-00-00" title="Пожалуйста, введите свою дату рождения">   
        
            <p>Введите логин:</p>
            <input type="text" name="login" placeholder="Логин" title="Пожалуйста, введите свой логин">
        
            <p>Введите пароль:</p>
            <input type="text" name="password" placeholder="Пароль" title="Пожалуйста, введите свой пароль">   
            
            <p><button type="submit">Зарегистрироваться</button><button style="margin-left:170px;" type="reset">Сброс</button></p><br>
            <div>
                <p>Уже есть аккаунт? <a href="autForm.php" style="margin-left:30px;">Авторизация</a></p>
            </div>
            <a href="index.php" class="button">Выход</a>
        <div>
<form>
</body>
</html>