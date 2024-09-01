<?php
require('connectdb.php');

// Проверяем, передан ли параметр id через URL
if (isset($_GET['id'])) {
    $recipeId = $_GET['id'];
    echo "ID рецепта: " . $recipeId . "<br>";

    // Запрос для получения информации о рецепте по его id
    $sql = "SELECT Recipes.idRecipe, Recipes.nameRecipes, Recipes.descriptionRecipes, Recipes.caloriesRecipes, Recipes.imageRecipes, Categories.nameCategory
            FROM Recipes
            INNER JOIN Categories ON Recipes.categoryRecipes = Categories.iDCategory
            WHERE Recipes.idRecipe = $recipeId";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $recipeName = $row['nameRecipes'];
        $recipeDescription = $row['descriptionRecipes'];
        $recipeCalories = $row['caloriesRecipes'];
        $recipeImage = $row['imageRecipes'];
        $recipeCategory = $row['nameCategory'];
    } else {
        echo "<script>
            alert('Рецепт не найден');
            location.href = 'mainMenu.php'; // перенаправляем на главное меню или другую страницу
        </script>";
        exit;
    }
} else {
    echo "<script>
        alert('Ошибка: ID рецепта не передан');
        location.href = 'mainMenu.php'; // перенаправляем на главное меню или другую страницу
    </script>";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подробнее о рецепте</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #6bdfa8;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .recipe-details {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }

        .recipe-details img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .recipe-details h2 {
            margin-top: 0;
            color: #333;
        }

        .recipe-details p {
            margin-bottom: 10px;
        }

        .recipe-details .calories {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<header>
    <h1>Подробнее о рецепте</h1>
</header>
<div class="recipe-details">
    <h2><?php echo $recipeName; ?></h2>
    <img src="<?php echo $recipeImage; ?>" alt="<?php echo $recipeName; ?>" class="imgSettings">
    <p><?php echo $recipeDescription; ?></p>
    <p class="calories"><?php echo $recipeCalories; ?> ккал</p>
    <p><strong>Категория: </strong><?php echo $recipeCategory; ?></p>
</div>
</body>
</html>
