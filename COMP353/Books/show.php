<?php require_once '../DBconnection.php';
$statement = $conn->prepare("SELECT * FROM xcc353_1.books AS book where book.book_id = :book_id");
$statement->bindParam(":book_id", $_GET["book_id"]);
$statement->execute();
$book = $statement->fetch(PDO::FETCH_LAZY);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $book["book_title"]?></title>
</head>
<body>
    <h1><?= $book["book_title"]?></h1>
    <h2> Publish Date: <?= $book["publish_date"]?></h2>
    <h2> Price: <?= $book["price"]?></h2>
</body>
</html>