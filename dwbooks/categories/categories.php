<?php 
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Categories</title>
</head>
<body>
    <?php 
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql);
    
    
    if(!$result) {
        die ("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
    }
    $no = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <ul>
            <li>No: <?php echo $no; ?></li>
            <li>Name: <?php echo $row['name']; ?></li>
            <a class="btn btn-secondary" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin mau menghapus buku ini?')">Delete</a>
        </ul>
        <?php $no++;
    } ?>
        
        <a class="btn btn-primary" href="add.php">Add Categories</a>
        <a class="btn btn-primary" href="../index.php">Halaman Utaman</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>