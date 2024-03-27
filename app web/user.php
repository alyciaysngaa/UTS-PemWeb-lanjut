<?php

// Mengimpor kelas Database
require_once 'db.php';


// Inisialisasi variabel untuk menyimpan pesan feedback
$message = '';

// Jika tombol "Tambah User" diklik
if(isset($_POST['submit'])) {
    // Mengambil data dari formulir HTML
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_name = $_POST['user_name'];
    $user_address = $_POST['user_address'];
    $user_hp = $_POST['user_hp'];
    $user_pos = $_POST['user_pos'];
    $user_role = $_POST['user_role'];
    $user_active = $_POST['user_active'];

    // Memanggil fungsi addUser() untuk menambahkan user baru
    $user->addUser($user_email, $user_password, $user_name, $user_address, $user_hp, $user_pos, $user_role, $user_active);
    
    // Menetapkan pesan feedback
    $message = 'User berhasil ditambahkan.';
}

// Jika tombol "Update User" diklik
if(isset($_POST['update'])) {
    // Mengambil data dari formulir HTML
    $user_id = $_POST['user_id'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_name = $_POST['user_name'];
    $user_address = $_POST['user_address'];
    $user_hp = $_POST['user_hp'];
    $user_pos = $_POST['user_pos'];
    $user_role = $_POST['user_role'];
    $user_active = $_POST['user_active'];

    // Memanggil fungsi updateUser() untuk mengupdate user
    $user->updateUser($user_id, $user_email, $user_password, $user_name, $user_address, $user_hp, $user_pos, $user_role, $user_active);
    
    // Menetapkan pesan feedback
    $message = 'User berhasil diperbarui.';
}

// Jika tombol "Hapus User" diklik
if(isset($_POST['delete'])) {
    // Mengambil data dari formulir HTML
    $user_id = $_POST['user_id'];

    // Memanggil fungsi deleteUser() untuk menghapus user
    $user->deleteUser($user_id);
    
    // Menetapkan pesan feedback
    $message = 'User berhasil dihapus.';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Satria</title>
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
        <h2 class="text-center">User Management Satria</h2>

        <!-- Formulir untuk menambah, mengupdate, dan menghapus user -->
        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <label for="user_id">User ID:</label>
                    <input type="email" class="form-control" id="user_id" name="user_id">
                </div>
                <div class="form-group">
                    <label for="user_email">User Email:</label>
                    <input type="email" class="form-control" id="user_email" name="user_email">
                </div>
                <div class="form-group">
                    <label for="user_password">User Password:</label>
                    <input type="password" class="form-control" id="user_password" name="user_password">
                </div>
                <div class="form-group">
                    <label for="user_name">User Name:</label>
                    <input type="text" class="form-control" id="user_name" name="user_name">
                </div>
                <div class="form-group">
                    <label for="user_address">User Address:</label>
                    <input type="text" class="form-control" id="user_address" name="user_address">
                </div>
                <div class="form-group">
                    <label for="user_hp">User HP:</label>
                    <input type="text" class="form-control" id="user_hp" name="user_hp">
                </div>
                <div class="form-group">
                    <label for="user_pos">User POS:</label>
                    <input type="text" class="form-control" id="user_pos" name="user_pos">
                </div>
                <div class="form-group">
                    <label for="user_role">User Role:</label>
                    <input type="text" class="form-control" id="user_role" name="user_role">
                </div>
                <div class="form-group">
                    <label for="user_active">User Active:</label>
                    <input type="text" class="form-control" id="user_active" name="user_active">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Tambah User</button>
                <button type="submit" class="btn btn-warning" name="update">Update User</button>
                <button type="submit" class="btn btn-danger" name="delete">Hapus User</button>
            </form>
        </div>

        <!-- Menampilkan pesan feedback -->
        <p class="text-center mt-3"><?php echo $message; ?></p>
    </div>
</body>
</html>
