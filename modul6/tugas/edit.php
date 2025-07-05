<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM produk WHERE id_produk=$id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama  = $_POST['nama_produk'];
  $harga = $_POST['harga'];
  $stok  = $_POST['stok'];
  $conn->query("UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok' WHERE id_produk=$id");
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Produk | MY Store</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    :root {
      --primary: #6c5ce7;
      --secondary: #a29bfe;
      --dark: #2d3436;
      --light: #f5f6fa;
      --warning: #fdcb6e;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      color: var(--dark);
    }
    
    .form-container {
      max-width: 600px;
      margin: 2rem auto;
      background: white;
      border-radius: 16px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      border: 1px solid rgba(255, 255, 255, 0.18);
    }
    
    .form-title {
      color: var(--warning);
      font-weight: 600;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    
    .form-control, .form-select {
      border-radius: 12px;
      padding: 0.75rem 1rem;
      border: 1px solid #e0e0e0;
      transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: var(--warning);
      box-shadow: 0 0 0 0.25rem rgba(253, 203, 110, 0.2);
    }
    
    .btn-update {
      background-color: var(--warning);
      color: var(--dark);
      border-radius: 12px;
      padding: 0.75rem 1.5rem;
      font-weight: 500;
      transition: all 0.3s ease;
      border: none;
    }
    
    .btn-update:hover {
      background-color: #f7b731;
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(253, 203, 110, 0.2);
    }
    
    .btn-cancel {
      border-radius: 12px;
      padding: 0.75rem 1.5rem;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .floating-label {
      position: relative;
      margin-bottom: 1.5rem;
    }
    
    .floating-label label {
      position: absolute;
      top: -10px;
      left: 15px;
      background: white;
      padding: 0 5px;
      font-size: 0.85rem;
      color: var(--warning);
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="form-container">
      <h1 class="form-title">
        <i class="bi bi-pencil-square"></i> Edit Produk
      </h1>
      
      <form method="post">
        <div class="floating-label">
          <label for="nama_produk">Nama Produk</label>
          <input type="text" id="nama_produk" name="nama_produk" class="form-control" value="<?= $data['nama_produk'] ?>" required>
        </div>
        
        <div class="floating-label">
          <label for="harga">Harga</label>
          <input type="number" id="harga" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
        </div>
        
        <div class="floating-label">
          <label for="stok">Stok</label>
          <input type="number" id="stok" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
        </div>
        
        <div class="d-flex gap-2 mt-4">
          <button type="submit" class="btn btn-update flex-grow-1">
            <i class="bi bi-check-circle"></i> Update Produk
          </button>
          <a href="index.php" class="btn btn-cancel btn-outline-secondary">
            <i class="bi bi-x-circle"></i> Batal
          </a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>