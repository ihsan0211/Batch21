<?php 
include('../connection.php');

$id = $_POST['id'];
$name = $_POST['name'];


if(isset($_POST['submit'])) {
    //
    $query = "UPDATE categories SET name = '$name' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        //
        die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else {
        //
        echo "<script>alert('Berhasil edit categories'); window.location='categories.php';</script>";
    }

}
?>