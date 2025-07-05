<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MY Store</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    :root {
      --primary: #6c5ce7;
      --dark: #2d3436;
      --success: #00b894;
      --danger: #d63031;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }
    
    .card {
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      border: none;
    }
    
    .btn-primary {
      background-color: var(--primary);
      border: none;
      border-radius: 8px;
    }
    
    .table thead {
      background-color: var(--primary);
      color: white;
    }
    
    .badge-stock {
      padding: 5px 10px;
      border-radius: 12px;
      font-weight: 500;
    }
    
    .floating-btn {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 12px rgba(108, 92, 231, 0.3);
    }
    
    .price-tag {
      font-weight: 600;
      color: var(--primary);
    }
  </style>
</head>
<body>
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="fw-bold mb-0 text-primary">
        <i class="bi bi-box-seam"></i> MY Store
      </h4>
      <a href="tambah.php" class="btn btn-primary btn-sm p-2">
        <i class="bi bi-plus fs-5"></i>
      </a>
    </div>
    
    <div class="card p-3">
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM produk ORDER BY id_produk DESC";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $stock_class = $row['stok'] > 0 ? 'bg-success' : 'bg-danger';
                echo "<tr>
                        <td class='fw-bold'>#{$row['id_produk']}</td>
                        <td>{$row['nama_produk']}</td>
                        <td class='price-tag'>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                        <td><span class='badge $stock_class badge-stock'>{$row['stok']}</span></td>
                        <td>
                          <div class='d-flex gap-2'>
                            <a href='edit.php?id={$row['id_produk']}' class='btn btn-sm btn-outline-primary'>
                              <i class='bi bi-pencil'></i>
                            </a>
                            <a href='hapus.php?id={$row['id_produk']}' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Hapus produk ini?\")'>
                              <i class='bi bi-trash'></i>
                            </a>
                          </div>
                        </td>
                      </tr>";
              }
            } else {
              echo "<tr>
                      <td colspan='5' class='text-center py-4'>
                        <i class='bi bi-box text-muted mb-2' style='font-size: 2rem;'></i>
                        <p class='text-muted mb-0'>Belum ada produk</p>
                      </td>
                    </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>