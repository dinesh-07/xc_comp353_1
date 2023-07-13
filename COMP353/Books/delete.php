<?php require_once '../DBconnection.php';
$statement = $conn->prepare("DELETE FROM xcc353_1.books WHERE book_id = :book_id;");
$statement ->bindParam(':book_id', $_GET["book_id"]);
$statement->execute();
header("Location: .");
?>