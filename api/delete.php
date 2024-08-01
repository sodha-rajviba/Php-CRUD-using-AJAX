<?php 

$id=$_POST['id'];

require "../includes/connection.php";

$query="DELETE FROM `User` WHERE Id = ?";
$params = [$id];

$statement = $connection->prepare($query);
$row = $statement->execute($params);

if($row>0)
    return header('Location:../index.php');
else
    echo "Error in data deletion.";


?>