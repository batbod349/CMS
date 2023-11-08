<?php
require '../sql/ConnectionSQL.php';
include('../includes/header.php');
require '../sql/ConnectionSQL.php';
require '../composants/PageManager.php';
$sql = 'DELETE FROM `page` WHERE Id=:id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $_GET['p'], PDO::PARAM_INT);  
$result = $stmt->execute();

if($result)
{
    echo("supresion terminer!;");
}
else
{
    echo("erreur!;");
}

?>