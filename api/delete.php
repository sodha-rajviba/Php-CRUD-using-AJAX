<?php 

header("Content-type:application/json");

$id=$_POST['id'];

require "../includes/connection.php";

$query="DELETE FROM `User` WHERE `Id`=(?);";
$params=[$id];

$statement=$connection->prepare($query);
$row=$statement->execute($params);

if($row>0)
    echo json_encode(['success'=>true]);
else
    echo json_encode(['success'=>false]);


?>