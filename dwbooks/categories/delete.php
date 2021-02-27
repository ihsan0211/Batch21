<?php
include '../connection.php';
$id = $_GET["id"];
    $query = "DELETE FROM categories WHERE id='$id' ";
    $result = mysqli_query($conn, $query);

    if(!$result) {
      die ("Delete data failed: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Categories terhapus.');window.location='categories.php';</script>";
    }
?>