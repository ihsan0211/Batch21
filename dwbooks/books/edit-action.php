<?php 
include('../connection.php');

$id = $_POST['id'];
$name = $_POST['name'];
$categories = $_POST['categories'];
$description = $_POST['description'];
$stock = $_POST['stock'];


if(isset($_POST['submit'])) {
        //
        $query = "UPDATE books SET name = '$name', category_id = '$categories', description = '$description',  stock = '$stock' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            //
            die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else {
            //
            echo "<script>alert('Edit Car succsessfull'); window.location='../index.php';</script>";
        }
    
}

?>