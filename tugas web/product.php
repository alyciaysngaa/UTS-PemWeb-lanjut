<?php

// Mengimpor kelas Database dan Product
require_once 'db.php';


// Inisialisasi variabel untuk menyimpan pesan feedback
$message = '';

// Jika tombol "Tambah Produk" diklik
if(isset($_POST['submit'])) {
    // Mengambil data dari formulir HTML
    $category_id = $_POST['category_id'];
    $user_id = $_POST['user_id'];
    $product_code = $_POST['product_code'];
    $product_price = $_POST['product_price'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_stock = $_POST['product_stock'];
    $product_photo = $_POST['product_photo'];

    // Memanggil fungsi addProduct() untuk menambahkan produk baru
    $product->addProduct($category_id, $user_id, $product_code, $product_price, $product_name, $product_desc, $product_stock, $product_photo);
    
    // Menetapkan pesan feedback
    $message = 'Produk berhasil ditambahkan.';
}

// Jika tombol "Update Produk" diklik
if(isset($_POST['update'])) {
    // Mengambil data dari formulir HTML
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $user_id = $_POST['user_id'];
    $product_code = $_POST['product_code'];
    $product_price = $_POST['product_price'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_stock = $_POST['product_stock'];
    $product_photo = $_POST['product_photo'];

    // Memanggil fungsi updateProduct() untuk mengupdate produk
    $product->updateProduct($product_id, $category_id, $user_id, $product_code, $product_price, $product_name, $product_desc, $product_stock, $product_photo);
    
    // Menetapkan pesan feedback
    $message = 'Produk berhasil diperbarui.';
}

// Jika tombol "Hapus Produk" diklik
if(isset($_POST['delete'])) {
    // Mengambil data dari formulir HTML
    $product_id = $_POST['product_id'];

    // Memanggil fungsi deleteProduct() untuk menghapus produk
    $product->deleteProduct($product_id);
    
    // Menetapkan pesan feedback
    $message = 'Produk berhasil dihapus.';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management Satria</title>
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
        <h2 class="text-center">Product Management Satria</h2>

        <!-- Formulir untuk menambah, mengupdate, dan menghapus produk -->
        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <label for="product_id">Product ID:</label>
                    <input type="text" class="form-control" id="product_id" name="product_id">
                </div>
                <div class="form-group">
                    <label for="category_id">Category ID:</label>
                    <input type="text" class="form-control" id="category_id" name="category_id">
                </div>
                <div class="form-group">
                    <label for="user_id">User ID:</label>
                    <input type="text" class="form-control" id="user_id" name="user_id">
                </div>
                <div class="form-group">
                    <label for="product_code">Product Code:</label>
                    <input type="text" class="form-control" id="product_code" name="product_code">
                </div>
                <div class="form-group">
                    <label for="product_price">Product Price:</label>
                    <input type="text" class="form-control" id="product_price" name="product_price">
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name">
                </div>
                <div class="form-group">
                    <label for="product_desc">Product Description:</label>
                    <input type="text" class="form-control" id="product_desc" name="product_desc">
                </div>
                <div class="form-group">
                    <label for="product_stock">Product Stock:</label>
                    <input type="text" class="form-control" id="product_stock" name="product_stock">
                </div>
                <div class="form-group">
                    <label for="product_photo">Product Photo:</label>
                    <input type="text" class="form-control" id="product_photo" name="product_photo">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Tambah Produk</button>
                <button type="submit" class="btn btn-warning" name="update">Update Produk</button>
                <button type="submit" class="btn btn-danger" name="delete">Hapus Produk</button>
            </form>
        </div>

        <!-- Menampilkan pesan feedback -->
        <p class="text-center mt-3"><?php echo $message; ?></p>
    </div>
</body>
</html>
