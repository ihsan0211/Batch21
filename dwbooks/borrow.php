<?php
include 'connection.php';
$id = $_GET["id"];
    $query = "UPDATE books SET stock = stock - 1 WHERE id='$id' ";
    $result = mysqli_query($conn, $query);

    if(!$result) {
      die ("Decrease data failed: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Buku dipinjam.');window.location='index.php';</script>";
    }
?>