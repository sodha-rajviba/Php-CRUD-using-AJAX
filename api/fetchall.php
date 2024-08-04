<?php 

header("Content-type:application/json");

require "../includes/connection.php";

$query="SELECT * FROM `User`;";

$statement = $connection->prepare($query);
$row = $statement->execute();
$users= $statement->fetchAll(PDO::FETCH_ASSOC);

if($row>0)
    echo json_encode(['success'=>true,'users'=>$users]);
else
    echo json_encode(['success'=>false]);


?>