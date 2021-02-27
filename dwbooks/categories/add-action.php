<?php 
include('../connection.php');

$name = $_POST['name'];

if(isset($_POST['submit'])) {
    $query = "INSERT INTO categories (name) VALUES ('$name')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else {
        echo "<script>alert('Kategori Berhasil ditambah'); window.location='categories.php';</script>";
    }
}

?>