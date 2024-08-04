<?php 

 header("Content-type:application/json");

$username=$_POST['username'];
$password=$_POST['password'];

require "../includes/connection.php";

$query="INSERT INTO `User`(`Username`,`Password`) VALUES (?,?)";
$params = [$username, $password];

$statement = $connection->prepare($query);
$row = $statement->execute($params);

if($row>0)
    echo json_encode(['success'=>true]);
else
    echo json_encode(['success'=>false]);


?>
