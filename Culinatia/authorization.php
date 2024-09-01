<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Авторизация</title>
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
</head>
<body>
    <div class="logOrReg">
        <form action="auth.php" method="post">
        <h1>Авторизация</h1>
        <p><input type="text" placeholder="Введите логин" name="login"></p>
        <p><input type="password" placeholder="Введите пароль" id="password" name="password"></p>
        <p><input type="checkbox" onchange="togglePasswordVisibility()">Показать пароль</p>
        <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>