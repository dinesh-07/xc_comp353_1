<?php
include('config/db_connection.php');

if (isset($_POST['submit'])) {
    $nn = $_POST['nn'];
    $sn = $_POST['sn'];
    $em = $_POST['em'];
    $pn = $_POST['pn'];
    $pr = $_POST['pr'];
    if (empty($nn) || empty($sn) || empty($em) || empty($pn) || empty($pr)) {
        echo 'Please fill in all fields';
    } else {
        $sql = "INSERT INTO student(name, student_number, email, phone_number, program) VALUES('$nn', '$sn', '$em', '$pn', '$pr')";
        if (mysqli_query($conn, $sql)) {
 mail('dinesh.skini@gmail.com', 'PHP Test', "Hello from PHP");
            header('Location: index.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a Student</h4>
    <form action="add.php" method="POST">
        <input type="text" name="nn">Your Name:</input>
        <input type="number" name="sn">Student Number:</input>
        <input type="text" name="em">Email:</input>
        <input type="number" name="pn">Phone Number:</input>
        <input type="text" name="pr">Program:</input>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>
<?php include('templates/footer.php'); ?>

</html>
