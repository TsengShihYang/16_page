<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=s1100416";
$pdo=new PDO($dsn,'s1100416','s1100416');
echo $dsn;
$sql="SELECT * FROM `students` WHERE `id`='1'";
$students=$pdo->query($sql)->fetch();

echo "<pre>";
print_r($students);
echo "<pre>";

// echo "hi";
?>