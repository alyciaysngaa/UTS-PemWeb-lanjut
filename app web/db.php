<?php

// Buat kelas Database
class Database {
    private $conn;

    // Konstruktor
    public function __construct($host, $username, $password, $database) {
        $this->conn = new mysqli($host, $username, $password, $database);

        // Cek koneksi
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    // Metode untuk mendapatkan koneksi
    public function getConnection() {
        return $this->conn;
    }
}

// Buat kelas Order
class Order {
    private $conn;

    // Konstruktor
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method untuk membuat pesanan baru
    public function createOrder($user_id, $order_to_timestamp, $order_code, $order_value, $order_desc, $order_quantity, $order_deadline, $order_cancelled) {
        // Query untuk memasukkan data ke database
        $stmt = $this->conn->prepare("INSERT INTO `order` (user_id, order_to_timestamp, order_code, order_value, order_desc, order_quantity, order_deadline, order_cancelled) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isdsisii", $user_id, $order_to_timestamp, $order_code, $order_value, $order_desc, $order_quantity, $order_deadline, $order_cancelled);
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk mengupdate pesanan
    public function updateOrder($order_id, $order_to_timestamp, $order_code, $order_value, $order_desc, $order_quantity, $order_deadline, $order_cancelled) {
        // Query untuk mengupdate data di database
        $stmt = $this->conn->prepare("UPDATE `order` SET order_to_timestamp=?, order_code=?, order_value=?, order_desc=?, order_quantity=?, order_deadline=?, order_cancelled=? WHERE order_id=?");
        $stmt->bind_param("sdsisiii", $order_to_timestamp, $order_code, $order_value, $order_desc, $order_quantity, $order_deadline, $order_cancelled, $order_id);
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk menghapus pesanan
    public function deleteOrder($order_id) {
        // Query untuk menghapus data di database
        $stmt = $this->conn->prepare("DELETE FROM `order` WHERE order_id=?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $stmt->close();
    }
}

// Buat kelas Product
class Product {
    private $conn;

    // Konstruktor
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method untuk menambahkan produk baru
    public function addProduct($category_id, $user_id, $product_code, $product_price, $product_name, $product_desc, $product_stock, $product_photo) {
        // Query untuk memasukkan data ke database
        $stmt = $this->conn->prepare("INSERT INTO `product` (category_id, user_id, product_code, product_price, product_name, product_desc, product_stock, product_photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisdsisi", $category_id, $user_id, $product_code, $product_price, $product_name, $product_desc, $product_stock, $product_photo);
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk mengupdate produk
    public function updateProduct($product_id, $category_id, $user_id, $product_code, $product_price, $product_name, $product_desc, $product_stock, $product_photo) {
        // Query untuk mengupdate data di database
        $stmt = $this->conn->prepare("UPDATE `product` SET category_id=?, user_id=?, product_code=?, product_price=?, product_name=?, product_desc=?, product_stock=?, product_photo=? WHERE product_id=?");
        $stmt->bind_param("iisdsisii", $category_id, $user_id, $product_code, $product_price, $product_name, $product_desc, $product_stock, $product_photo, $product_id);
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk menghapus produk
    public function deleteProduct($product_id) {
        // Query untuk menghapus data di database
        $stmt = $this->conn->prepare("DELETE FROM `product` WHERE product_id=?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $stmt->close();
    }
}

// Buat kelas OrderDetail
class OrderDetail {
    private $conn;

    // Konstruktor
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method untuk menambahkan detail pesanan baru
    public function addOrderDetail($order_id, $product_id, $detail_price, $detail_quantity, $product_size, $product_note, $product_stack, $product_photo) {
        // Query untuk memasukkan data ke database
        $stmt = $this->conn->prepare("INSERT INTO `order_detail` (order_id, product_id, detail_price, detail_quantity, product_size, product_note, product_stack, product_photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiddsisi", $order_id, $product_id, $detail_price, $detail_quantity, $product_size, $product_note, $product_stack, $product_photo);
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk mengupdate detail pesanan
    public function updateOrderDetail($detail_id, $order_id, $product_id, $detail_price, $detail_quantity, $product_size, $product_note, $product_stack, $product_photo) {
        // Query untuk mengupdate data di database
        $stmt = $this->conn->prepare("UPDATE `order_detail` SET order_id=?, product_id=?, detail_price=?, detail_quantity=?, product_size=?, product_note=?, product_stack=?, product_photo=? WHERE detail_id=?");
        $stmt->bind_param("iidddsisi", $order_id, $product_id, $detail_price, $detail_quantity, $product_size, $product_note, $product_stack, $product_photo, $detail_id);
        $stmt->execute();
        $stmt->close();
    }

// Method untuk menghapus detail pesanan
public function deleteOrderDetail($detail_id) {
    // Query untuk menghapus data di database
    $stmt = $this->conn->prepare("DELETE FROM `order_detail` WHERE detail_id=?");
    $stmt->bind_param("i", $detail_id); // Perbaikan sintaks
    $stmt->execute();
    $stmt->close();
}
}

// Buat kelas Category
class Category {
    private $conn;

    // Konstruktor
    public function __construct($conn) {
        $this->conn = $conn;
    }


    // Method untuk menambahkan kategori baru
    public function addCategory($category_name, $category_description) {
        // Query untuk memasukkan data ke database
        $stmt = $this->conn->prepare("INSERT INTO `category` (category_name, category_description) VALUES (?, ?)");
        $stmt->bind_param("ss", $category_name, $category_description);
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk mengupdate kategori
    public function updateCategory($category_id, $category_name, $category_description) {
        // Query untuk mengupdate data di database
        $stmt = $this->conn->prepare("UPDATE `category` SET category_name=?, category_description=? WHERE category_id=?");
        $stmt->bind_param("ssi", $category_name, $category_description, $category_id);
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk menghapus kategori
    public function deleteCategory($category_id) {
        // Query untuk menghapus data di database
        $stmt = $this->conn->prepare("DELETE FROM `category` WHERE category_id=?");
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $stmt->close();
    }
}

// Buat kelas User
class User {
    private $conn;

    // Konstruktor
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method untuk menambahkan user baru
    public function addUser($user_email, $user_password, $user_name, $user_address, $user_hp, $user_pos, $user_role, $user_active) {
        // Query untuk memasukkan data ke database
        $stmt = $this->conn->prepare("INSERT INTO `user` (user_email, user_password, user_name, user_address, user_hp, user_pos, user_role, user_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssii", $user_email, $user_password, $user_name, $user_address, $user_hp, $user_pos, $user_role, $user_active);
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk mengupdate data user
    public function updateUser($user_id, $user_email, $user_password, $user_name, $user_address, $user_hp, $user_pos, $user_role, $user_active) {
        // Query untuk mengupdate data di database
        $stmt = $this->conn->prepare("UPDATE `user` SET user_email=?, user_password=?, user_name=?, user_address=?, user_hp=?, user_pos=?, user_role=?, user_active=? WHERE user_id=?");
        $stmt->bind_param("ssssssiii", $user_email, $user_password, $user_name, $user_address, $user_hp, $user_pos, $user_role, $user_active, $user_id);
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk menghapus user
    public function deleteUser($user_id) {
        // Query untuk menghapus data di database
        $stmt = $this->conn->prepare("DELETE FROM `user` WHERE user_id=?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
    }
}


class Keranjang {
    private $conn;

    // Konstruktor
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method untuk menambahkan item ke keranjang
    public function tambahItemKeranjang($ker_id_user, $ker_id_produk, $ker_harga, $ker_jml) {
        // Query untuk memasukkan data ke dalam tabel keranjang
        $stmt = $this->conn->prepare("INSERT INTO tb_keranjang (ker_id_user, ker_id_produk, ker_harga, ker_jml) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiid", $ker_id_user, $ker_id_produk, $ker_harga, $ker_jml);
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk mengupdate item di keranjang
    public function updateItemKeranjang($ker_id, $ker_id_user, $ker_id_produk, $ker_harga, $ker_jml) {
        // Query untuk mengupdate data di dalam tabel keranjang
        $stmt = $this->conn->prepare("UPDATE tb_keranjang SET ker_id_user=?, ker_id_produk=?, ker_harga=?, ker_jml=? WHERE ker_id=?");
        $stmt->bind_param("iiidi", $ker_id_user, $ker_id_produk, $ker_harga, $ker_jml, $ker_id);
        $stmt->execute();
        $stmt->close();
    }

    // Method untuk menghapus item dari keranjang
    public function hapusItemKeranjang($ker_id) {
        // Query untuk menghapus data dari tabel keranjang
        $stmt = $this->conn->prepare("DELETE FROM tb_keranjang WHERE ker_id=?");
        $stmt->bind_param("i", $ker_id);
        $stmt->execute();
        $stmt->close();
    }
}




// Contoh penggunaan
$host = 'localhost';
$username = 'root'; // Sesuaikan dengan username MySQL Anda
$password = ''; // Sesuaikan dengan password MySQL Anda
$database = 'db_tugasmysql'; // Sesuaikan dengan nama database Anda

// Buat objek database
$db = new Database($host, $username, $password, $database);
$conn = $db->getConnection();

// Buat objek untuk setiap tabel
$order = new Order($conn);
$product = new Product($conn);
$orderDetail = new OrderDetail($conn);
$category = new Category($conn);
$user = new User($conn);
$keranjang = new Keranjang($conn);

// Sekarang Anda bisa menggunakan metode pada setiap objek untuk berinteraksi dengan tabel yang sesuai
