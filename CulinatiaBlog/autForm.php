<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="st.css"/>
    <title>Авторизация</title>
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
            max-width: 300px;
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
            background-color: #7b069e;
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
    <div class="container">
        <form action="autUser.php" method="post">
            <h1>Авторизация</h1>
            
            <div class="form-group">
                <label for="login">Введите логин:</label>
                <input type="text" id="login" name="login" class="form-control" placeholder="Логин" title="Пожалуйста, введите свой логин" required>
            </div>
            
            <div class="form-group">
                <label for="password">Введите пароль:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" title="Пожалуйста, введите свой пароль" required>
            </div>
            <p><input type="checkbox" onchange="togglePasswordVisibility()">Показать пароль</p>
            <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
            <button type="submit" class="btn">Войти</button>
            
            <div>
            <a href="resetPasswordForm.php" class="button">Восстановить пароль</a>

            </div>
            <button type="reset" class="btn reset-button">Сброс</button>
        </form>

        <button type="reset" class="btn reset-button" onclick="buttonExit()">Выход</button>

        <script>
            function buttonExit() {
                window.location.href = 'index.php'; 
            }
        </script>

        <div >
        <p style="margin-top:20px;">Нет аккаунта? <a href="regForm.php" class="register-button" style="margin-left:20px;">Регистрация</a></p>
        </div>
    </div>
</div>
</body>
</html>
