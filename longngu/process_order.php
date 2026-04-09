<?php
session_start();
include 'includes/databaseconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    
    // 1. Tính tổng tiền lại một lần nữa cho chắc chắn
    $stmt = $pdo->prepare("SELECT SUM(p.price * c.quantity) FROM cart c JOIN products p ON c.product_id = p.product_id WHERE c.user_id = ?");
    $stmt->execute([$user_id]);
    $total_amount = $stmt->fetchColumn();

    if ($total_amount > 0) {
        // 2. Lưu vào bảng orders (Giả sử bạn có bảng này, nếu chưa có hãy tạo nhé)
        // Lưu ý: Bạn cần kiểm tra tên cột trong bảng orders của bạn
        $sql_order = "INSERT INTO orders (user_id, full_name, phone, address, total_amount, payment_method, status) 
                      VALUES (?, ?, ?, ?, ?, ?, 'Pending')";
        $stmt_order = $pdo->prepare($sql_order);
        $stmt_order->execute([$user_id, $full_name, $phone, $address, $total_amount, $payment_method]);
        $order_id = $pdo->lastInsertId();

        // 3. Chuyển sản phẩm từ Giỏ hàng sang Chi tiết đơn hàng
        // (Bước này giúp bạn lưu lại lịch sử dù sau này giỏ hàng bị xóa)
        
        // 4. Xóa giỏ hàng sau khi đặt xong
        $stmt_clear = $pdo->prepare("DELETE FROM cart WHERE user_id = ?");
        $stmt_clear->execute([$user_id]);

        echo "<script>alert('Đặt hàng thành công! Mã đơn hàng của bạn là: #$order_id'); window.location.href='index.php';</script>";
    } else {
        header('Location: checkout.php');
    }
}
