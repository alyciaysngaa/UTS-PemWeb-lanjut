<?php
// Mengimpor kelas Keranjang
require_once 'db.php';


// Inisialisasi variabel untuk menyimpan pesan feedback
$message = '';

// Jika tombol "Tambah Item" diklik
if(isset($_POST['tambah'])) {
    // Mengambil data dari formulir HTML
    $ker_id_user = $_POST['ker_id_user'];
    $ker_id_produk = $_POST['ker_id_produk'];
    $ker_harga = $_POST['ker_harga'];
    $ker_jml = $_POST['ker_jml'];

    // Memanggil metode tambahItemKeranjang() untuk menambahkan item ke keranjang
    $keranjang->tambahItemKeranjang($ker_id_user, $ker_id_produk, $ker_harga, $ker_jml);

    // Menetapkan pesan feedback
    $message = 'Item berhasil ditambahkan ke keranjang.';
}

// Jika tombol "Update Item" diklik
if(isset($_POST['update'])) {
    // Mengambil data dari formulir HTML
    $ker_id = $_POST['ker_id'];
    $ker_id_user = $_POST['ker_id_user'];
    $ker_id_produk = $_POST['ker_id_produk'];
    $ker_harga = $_POST['ker_harga'];
    $ker_jml = $_POST['ker_jml'];

    // Memanggil metode updateItemKeranjang() untuk mengupdate item di keranjang
    $keranjang->updateItemKeranjang($ker_id, $ker_id_user, $ker_id_produk, $ker_harga, $ker_jml);

    // Menetapkan pesan feedback
    $message = 'Item keranjang berhasil diperbarui.';
}

// Jika tombol "Hapus Item" diklik
if(isset($_POST['hapus'])) {
    // Mengambil data dari formulir HTML
    $ker_id = $_POST['ker_id'];

    // Memanggil metode hapusItemKeranjang() untuk menghapus item dari keranjang
    $keranjang->hapusItemKeranjang($ker_id);

    // Menetapkan pesan feedback
    $message = 'Item keranjang berhasil dihapus.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Keranjang Satria</title>
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
        <h2 class="text-center">Kelola Keranjang Satria</h2>

        <!-- Formulir untuk menambah, mengupdate, dan menghapus item di keranjang -->
        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <label for="ker_id">ID Keranjang:</label>
                    <input type="text" class="form-control" id="ker_id" name="ker_id">
                </div>
                <div class="form-group">
                    <label for="ker_id_user">ID User:</label>
                    <input type="text" class="form-control" id="ker_id_user" name="ker_id_user">
                </div>
                <div class="form-group">
                    <label for="ker_id_produk">ID Produk:</label>
                    <input type="text" class="form-control" id="ker_id_produk" name="ker_id_produk">
                </div>
                <div class="form-group">
                    <label for="ker_harga">Harga:</label>
                    <input type="text" class="form-control" id="ker_harga" name="ker_harga">
                </div>
                <div class="form-group">
                    <label for="ker_jml">Jumlah:</label>
                    <input type="text" class="form-control" id="ker_jml" name="ker_jml">
                </div>

                <button type="submit" class="btn btn-primary" name="tambah">Tambah Item</button>
                <button type="submit" class="btn btn-warning" name="update">Update Item</button>
                <button type="submit" class="btn btn-danger" name="hapus">Hapus Item</button>
            </form>
        </div>

        <!-- Menampilkan pesan feedback -->
        <p class="text-center mt-3"><?php echo $message; ?></p>
    </div>
</body>
</html>
