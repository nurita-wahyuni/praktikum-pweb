<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "DELETE FROM produk WHERE id_produk='$id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>