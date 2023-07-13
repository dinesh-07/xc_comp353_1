<?php require_once '../DBconnection.php';
$statement = $conn->prepare("SELECT * FROM xcc353_1.books AS book where book.book_id = :book_id");
$statement->bindParam(":book_id", $_GET["book_id"]);
$statement->execute();
$book = $statement->fetch(PDO::FETCH_ASSOC);
if(isset($_POST["book_title"])
 && isset($_POST["publish_date"]) 
 &&isset($_POST["price"]) 
 && isset($_POST["book_id"]))
{
    $book =$conn->prepare("UPDATE xcc353_1.books SET 
                      book_title=:book_title,
                      publish_date=:publish_date,
                      price=:price
                      WHERE book_id = :book_id ;");
    $book->bindParam(':book_title', $_POST["book_title"]);
    $book->bindParam(':publish_date', $_POST["publish_date"]);
    $book->bindParam(':price', $_POST["price"]);
    $book->bindParam(':book_id', $_POST["book_id"]);
    if ($book->execute()) {
         header("Location: .");
    }else {
    header("Location: ./update.php?book_id=".$_POST["book_id"]);
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit book</title>
</head>
<body>
<h1> Edit Book </h1>
    <form action="./update.php" method ="post">
    <label for ="book_title"> Title </label> <br>
    <input type ="text" name="book_title" id ="book_title" value="<?= $book['book_title'] ?? 'default'?>"> <br>
    <label for ="publish_date"> Publish Date </label> <br>
    <input type ="date" name="publish_date" id ="publish_date" value="<?= $book["publish_date"]?>"> <br>
    <label for ="price"> Price </label> <br>
    <input type ="number" name="price" id ="price" value="<?= $book["price"]?>"> <br>
    <input type ="hidden" name="book_id" id ="book_id" value="<?= $book["book_id"]?>"> <br>
    <button type ="submit"> Update </button>
    </form>
    <a href = "./">Back to BookStore</a>
</body>
</html>