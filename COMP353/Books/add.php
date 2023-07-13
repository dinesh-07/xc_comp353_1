<?php require_once '../DBconnection.php';
if(isset($_POST["book_title"]) && isset($_POST["publish_date"]) &&isset($_POST["price"]))
{
    $book =$conn->prepare('INSERT INTO xcc353_1.books (book_title, publish_date,price) VALUES 
    (:book_title,:publish_date,:price)');
    $book->bindParam(':book_title', $_POST["book_title"]);
    $book->bindParam(':publish_date', $_POST["publish_date"]);
    $book->bindParam(':price', $_POST["price"]);
    if ($book->execute()) 
         header("Location: .");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add book</title>
</head>
<body>
<h1> Add Book </h1>
    <form action="./add.php" method ="post">
    <label for ="book_title"> Title </label> <br>
    <input type ="text" name="book_title" id ="book_title"> <br>
    <label for ="publish_date"> Publish Date </label> <br>
    <input type ="date" name="publish_date" id ="publish_date"> <br>
    <label for ="price"> Price </label> <br>
    <input type ="number" name="price" id ="price"> <br>
    <button type ="submit"> Add </button>
    </form>
    <a href = "./">Back to BookStore</a>
</body>
</html>