<?php 
include('../connection.php');

$name = $_POST['name'];
$categories = $_POST['categories'];
$img = $_FILES['image']['name'];
$description = $_POST['description'];
$stock = $_POST['stock'];


if(isset($_POST['submit'])) {
    //
    $allowed = array('png', 'jpg','jpeg');
    $x = explode('.', $img);
    $extention = strtolower(end($x));
    $file_tmp = $_FILES['image']['tmp_name'];
    $angka_acak = rand(1,999);
    $newImgName = $angka_acak.'-'.$img;
    
    if(in_array($extention, $allowed)){
        //
        move_uploaded_file($file_tmp, '../gambar/'.$newImgName);
        $query = "INSERT INTO books (name, image,  description, stock, category_id) VALUES ('$name', '$newImgName',  '$description', $stock, '$categories')";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            //
            die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else {
            //
            echo "<script>alert('Berhasil tambah buku'); window.location='../index.php';</script>";
        }
    } else {
        //
        echo "<script>alert('Only jpg or png'); window.location = 'add.php';</script>";
    }
}

?>