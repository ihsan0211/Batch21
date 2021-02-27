<?php
  include('../connection.php');
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM books WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if(!$result) {
            die("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
        }
        $data = mysqli_fetch_assoc($result);

        if(!count($data)) {
            echo "<script>alert('Data not found.');window.location='../index.php'</script>";
        }
    } else {
        echo "<script>alert('Error ID');window.location='../index.php';</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <title>Edit buku</title>
</head>
<body>
    <h1>Edit <?php echo $data['name']?></h1>
    <form action="edit-action.php" method="POST" enctype="multipart/form-data">
    
        <div class="mb-3">
            <label class="form-label"for="">Name</label>
            <input class="form-control"  type="text" name="name" value="<?php echo $data['name'] ?>" required>
            <input type="hidden" name="id" value="<?php echo $data['id'];?>" >
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Categories</label>
            <select class="form-control"  name="categories" id="" required>
            <option style="display:none">Pilih categories</option>
            <?php 
            $query = "SELECT * FROM categories";
            $sql = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($sql)) {
                echo "<option value='".$row['id']."'>".$row['name']."</option>";
            }
            ?>
        </select>
        </div>
        <div class="mb-3">
            <label class="form-label"for="">Image</label>
            <img src="../gambar/<?php echo $data['image'];?>"style="width: 200px; margin: 5px;"  >
            <input class="form-control"  type="file" name="image" value="<?php echo $data['image'];?>" style="display:none" >
        </div>
        <div class="mb-3">
            <label class="form-label"for="">Description</label>
            <input class="form-control"  type="text" name="description" value="<?php echo $data['description'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label"for="">stock</label>
            <input class="form-control"  type="number" name="stock" value="<?php echo $data['stock'] ?>" required>
        </div>
        <p style="color:red;">Cannot change image!!</p>
        
        <input class="btn btn-primary" type="submit" name="submit">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>