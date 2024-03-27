<?php

// Mengimpor kelas Database dan Category
require_once 'db.php';


// Inisialisasi variabel untuk menyimpan pesan feedback
$message = '';

// Jika tombol "Tambah Kategori" diklik
if(isset($_POST['submit'])) {
    // Mengambil data dari formulir HTML
    $category_name = $_POST['category_name'];
    $category_description = $_POST['category_description'];

    // Memanggil fungsi addCategory() untuk menambahkan kategori baru
    $category->addCategory($category_name, $category_description);
    
    // Menetapkan pesan feedback
    $message = 'Kategori berhasil ditambahkan.';
}

// Jika tombol "Update Kategori" diklik
if(isset($_POST['update'])) {
    // Mengambil data dari formulir HTML
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $category_description = $_POST['category_description'];

    // Memanggil fungsi updateCategory() untuk mengupdate kategori
    $category->updateCategory($category_id, $category_name, $category_description);
    
    // Menetapkan pesan feedback
    $message = 'Kategori berhasil diperbarui.';
}

// Jika tombol "Hapus Kategori" diklik
if(isset($_POST['delete'])) {
    // Mengambil data dari formulir HTML
    $category_id = $_POST['category_id'];

    // Memanggil fungsi deleteCategory() untuk menghapus kategori
    $category->deleteCategory($category_id);
    
    // Menetapkan pesan feedback
    $message = 'Kategori berhasil dihapus.';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management Satria</title>
    <!-- Mengimpor Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS untuk mengatur tata letak */
        .container { 
            margin-top: 50px;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Category Management Satria</h2>

        <!-- Formulir untuk menambah, mengupdate, dan menghapus kategori -->
        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <label for="category_id">Category ID:</label>
                    <input type="text" class="form-control" id="category_id" name="category_id">
                </div>
                <div class="form-group">
                    <label for="category_name">Category Name:</label>
                    <input type="text" class="form-control" id="category_name" name="category_name">
                </div>
                <div class="form-group">
                    <label for="category_description">Category Description:</label>
                    <input type="text" class="form-control" id="category_description" name="category_description">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Tambah Kategori</button>
                <button type="submit" class="btn btn-warning" name="update">Update Kategori</button>
                <button type="submit" class="btn btn-danger" name="delete">Hapus Kategori</button>
            </form>
        </div>

        <!-- Menampilkan pesan feedback -->
        <p class="text-center mt-3"><?php echo $message; ?></p>
    </div>
</body>
</html>
