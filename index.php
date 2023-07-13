<?php
include('config/db_connection.php');

// write query for all students
$sql = 'SELECT name, student_number, email, phone_number, program FROM student ORDER BY name';

// make query & get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);




?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
<h4 class="center grey-text">All Students</h4>
<div class="container">

    <div class="row">
        <?php foreach ($students as $student) { ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo $student['name'] ?></h6>
                        <h6><?php echo $student['student_number'] ?></h6>
                        <h6><?php echo $student['email'] ?></h6>
                        <h6><?php echo $student['phone_number'] ?></h6>
                        <h6><?php echo $student['program'] ?></h6>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>

</div>

<?php include('templates/footer.php'); ?>

</html>
