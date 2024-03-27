<?php

// Mengimpor kelas Database dan OrderDetail
require_once 'db.php';


// Inisialisasi variabel untuk menyimpan pesan feedback
$message = '';

// Jika tombol "Tambah Detail Pesanan" diklik
if(isset($_POST['submit'])) {
    // Mengambil data dari formulir HTML
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $detail_price = $_POST['detail_price'];
    $detail_quantity = $_POST['detail_quantity'];
    $product_size = $_POST['product_size'];
    $product_note = $_POST['product_note'];
    $product_stack = $_POST['product_stack'];
    $product_photo = $_POST['product_photo'];

    // Memanggil fungsi addOrderDetail() untuk menambahkan detail pesanan baru
    $orderDetail->addOrderDetail($order_id, $product_id, $detail_price, $detail_quantity, $product_size, $product_note, $product_stack, $product_photo);
    
    // Menetapkan pesan feedback
    $message = 'Detail pesanan berhasil ditambahkan.';
}

// Jika tombol "Update Detail Pesanan" diklik
if(isset($_POST['update'])) {
    // Mengambil data dari formulir HTML
    $detail_id = $_POST['detail_id'];
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $detail_price = $_POST['detail_price'];
    $detail_quantity = $_POST['detail_quantity'];
    $product_size = $_POST['product_size'];
    $product_note = $_POST['product_note'];
    $product_stack = $_POST['product_stack'];
    $product_photo = $_POST['product_photo'];

    // Memanggil fungsi updateOrderDetail() untuk mengupdate detail pesanan
    $orderDetail->updateOrderDetail($detail_id, $order_id, $product_id, $detail_price, $detail_quantity, $product_size, $product_note, $product_stack, $product_photo);
    
    // Menetapkan pesan feedback
    $message = 'Detail pesanan berhasil diperbarui.';
}

// Jika tombol "Hapus Detail Pesanan" diklik
if(isset($_POST['delete'])) {
    // Mengambil data dari formulir HTML
    $detail_id = $_POST['detail_id'];

    // Memanggil fungsi deleteOrderDetail() untuk menghapus detail pesanan
    $orderDetail->deleteOrderDetail($detail_id);
    
    // Menetapkan pesan feedback
    $message = 'Detail pesanan berhasil dihapus.';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management Satria</title>
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
        <h2 class="text-center">Order Management Satria</h2>

        <!-- Formulir untuk menambah, mengupdate, dan menghapus pesanan -->
        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <label for="user_id">User ID:</label>
                    <input type="text" class="form-control" id="user_id" name="user_id">
                </div>
                <div class="form-group">
                    <label for="order_to_timestamp">Order To Timestamp:</label>
                    <input type="text" class="form-control" id="order_to_timestamp" name="order_to_timestamp">
                </div>
                <div class="form-group">
                    <label for="order_code">Order Code:</label>
                    <input type="text" class="form-control" id="order_code" name="order_code">
                </div>
                <div class="form-group">
                    <label for="order_value">Order Value:</label>
                    <input type="text" class="form-control" id="order_value" name="order_value">
                </div>
                <div class="form-group">
                    <label for="order_desc">Order Description:</label>
                    <input type="text" class="form-control" id="order_desc" name="order_desc">
                </div>
                <div class="form-group">
                    <label for="order_quantity">Order Quantity:</label>
                    <input type="text" class="form-control" id="order_quantity" name="order_quantity">
                </div>
                <div class="form-group">
                    <label for="order_deadline">Order Deadline:</label>
                    <input type="text" class="form-control" id="order_deadline" name="order_deadline">
                </div>
                <div class="form-group">
                    <label for="order_cancelled">Order Cancelled:</label>
                    <input type="text" class="form-control" id="order_cancelled" name="order_cancelled">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Tambah Pesanan</button>
                <button type="submit" class="btn btn-warning" name="update">Update Pesanan</button>
                <button type="submit" class="btn btn-danger" name="delete">Hapus Pesanan</button>
            </form>
        </div>

        <!-- Menampilkan pesan feedback -->
        <p class="text-center mt-3"><?php echo $message; ?></p>
    </div>
</body>
</html>
