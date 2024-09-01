<?php
$idUser = $_COOKIE['idUser'];
require "connecting.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $category = $_POST['category'];

    $insert_query = "INSERT INTO recipes (idUser, title, description, image, idCategory) 
                     VALUES ('$idUser', '$title', '$description', '$image', '$category')";
    mysqli_query($conn, $insert_query);

    header("Location: blogForm.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="st.css"/>
    <title>Создать рецепт</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1ca557;
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
            max-width: 500px;
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
            background-color: #007BFF;
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
    <div>
        <form action="createrecept.php" method="post">
            <h1>Создать рецепт</h1>
                
            <p>Название рецепта:</p>
            <input type="text" name="title" required>   

            <p>Описание:</p>
            <textarea name="description" required></textarea>

            <p>Ссылка на изображение:</p>   
            <input type="file" name="image" required>


            <p>Категория:</p>
            <select name="category" required>
                <?php
                $queryCategories = "SELECT idCategory, name FROM categories";
                $resultCategories = mysqli_query($conn, $queryCategories);
                while ($category = mysqli_fetch_assoc($resultCategories)) {
                    echo "<option value='{$category['idCategory']}'>{$category['name']}</option>";
                }
                ?>
            </select>

            <button type="submit">Создать</button>
            <a href="blogForm.php" class="button">Назад</a>
        </form>
    </div>
</body>
</html>