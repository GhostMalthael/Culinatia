
<?php
require "connecting.php";
$idUser=$_COOKIE['idUser'];
$querry = mysqli_query($conn, "UPDATE `users` SET `statusUser` = 'удален' WHERE idUser = $idUser");
echo"<script>
alert(\"Аккаунт удален\");
location.href='autForm.php';
</script>";
?>