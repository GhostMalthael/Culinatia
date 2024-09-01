<?php
require "connecting.php";

$idRecipes = isset($_GET['idRecipes']) ? intval($_GET['idRecipes']) : 0;

if ($idRecipes == 0) {
    die("Invalid recipe ID.");
}

$queryRecipe = "SELECT * FROM recipes WHERE idRecipes = $idRecipes";
$resultRecipe = mysqli_query($conn, $queryRecipe);

if ($resultRecipe === false) {
    die("Ошибка выполнения запроса: " . mysqli_error($conn));
}

$recipe = mysqli_fetch_assoc($resultRecipe);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $category = $_POST['category'];

    $update_query = "UPDATE recipes SET title='$title', description='$description', image='$image', idCategory='$category' WHERE idRecipes=$idRecipes";
    $result = mysqli_query($conn, $update_query);

    if ($result === false) {
        die("Ошибка выполнения запроса: " . mysqli_error($conn));
    }

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
    <title>Редактировать рецепт</title>
</head>
<body>
    <div>
        <form action="editrecept.php?idRecipes=<?php echo $idRecipes; ?>" method="post">
            <h1>Редактировать рецепт</h1>
                
            <p>Название рецепта:</p>
            <input type="text" name="title" value="<?php echo htmlspecialchars($recipe['title']); ?>" required>   

            <p>Описание:</p>
            <textarea name="description" required><?php echo htmlspecialchars($recipe['description']); ?></textarea>

            <p>Ссылка на изображение:</p>
            <input type="file" name="image" value="<?php echo htmlspecialchars($recipe['image']); ?>" required>

            <p>Категория:</p>
            <select name="category" required>
                <?php
                $queryCategories = "SELECT idCategory, name FROM categories";
                $resultCategories = mysqli_query($conn, $queryCategories);
                while ($category = mysqli_fetch_assoc($resultCategories)) {
                    $selected = $category['idCategory'] == $recipe['idCategory'] ? 'selected' : '';
                    echo "<option value='{$category['idCategory']}' $selected>{$category['name']}</option>";
                }
                ?>
            </select>
            
            <button type="submit">Сохранить</button>
            <a href="blogForm.php" class="button">Назад</a>
            
        </form>
    </div>
</body>
</html>
