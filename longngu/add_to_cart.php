<?php
session_start();
include 'includes/databaseconnection.php'; // Kết nối tới database của bạn

// 1. Kiểm tra xem khách đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');
            window.location.href = 'index.php'; // Điều hướng về trang chủ hoặc trang đăng nhập
          </script>";
    exit();
}

// 2. Xử lý khi có người bấm nút Mua hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = 1; // Mặc định mỗi lần bấm là thêm 1 sản phẩm

    // Kiểm tra xem sản phẩm này đã có trong giỏ hàng của user này chưa
    $sql_check = "SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute(['user_id' => $user_id, 'product_id' => $product_id]);
    $cart_item = $stmt_check->fetch();

    if ($cart_item) {
        // Nếu đã có rồi thì cộng dồn số lượng lên
        $sql_update = "UPDATE cart SET quantity = quantity + 1 WHERE cart_id = :cart_id";
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->execute(['cart_id' => $cart_item['cart_id']]);
    } else {
        // Nếu chưa có thì thêm mới vào bảng cart
        $sql_insert = "INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
        $stmt_insert = $pdo->prepare($sql_insert);
        $stmt_insert->execute([
            'user_id' => $user_id, 
            'product_id' => $product_id, 
            'quantity' => $quantity
        ]);
    }

    // Quay trở lại trang vừa đứng
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>