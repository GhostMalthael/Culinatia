<?php
require "connecting.php";


$idRecipes = isset($_GET['idRecipes']) ? intval($_GET['idRecipes']) : 0;

if ($idRecipes == 0) {
    die("Invalid recipe ID.");
}


$delete_query = "DELETE FROM recipes WHERE idRecipes = $idRecipes";
$result = mysqli_query($conn, $delete_query);

if ($result === false) {
    die("Ошибка выполнения запроса: " . mysqli_error($conn));
}


header("Location: blogForm.php");
exit;
?>