<?php require_once '../DBconnection.php';
$statement = $conn->prepare('SELECT * FROM xcc353_1.books AS books');
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of Books</title>
</head>
<body>
<h1> List of books</h1>
<a href = './add.php'> Add a new book </a>
<table>
<tr>
<td> ID </td>
<td> Title </td>
<td> Publish Date </td>
<td> Price </td>
<td> Actions </td>
</tr>
<tbody>
<?php while ($row = $statement -> fetch(PDO::FETCH_LAZY,PDO::FETCH_ORI_NEXT)) {?>
    <tr>
    <td> <?=$row["book_id"] ?></td>
    <td> <?=$row["book_title"] ?></td>
    <td> <?=$row["publish_date"] ?></td>
    <td> <?=$row["price"] ?></td>
    <td> 
    <a href ="./show.php?book_id=<?= $row["book_id"] ?>"> Show </a>
    <a href ="./update.php?book_id=<?= $row["book_id"] ?>"> Edit </a>
    <a href ="./delete.php?book_id=<?= $row["book_id"] ?>"> Delete </a>
    </td>
    </tr>
<?php } ?>
</tbody>
<thead>
</thead>
</table>
<a href = '../'> Back to homepage </a>
</body>
</html>