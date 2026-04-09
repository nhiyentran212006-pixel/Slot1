<?php
session_start();
include 'includes/databaseconnection.php';
include 'navbar.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: authentication.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT c.cart_id, p.name, p.price, p.image_url, c.quantity, p.unit 
        FROM cart c 
        JOIN products p ON c.product_id = p.product_id 
        WHERE c.user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$cart_items = $stmt->fetchAll();
$total_bill = 0;
foreach($cart_items as $item) { $total_bill += $item['price'] * $item['quantity']; }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán đơn hàng - HapVN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .checkout-section { background: white; border-radius: 15px; padding: 25px; box-shadow: 0 0 15px rgba(0,0,0,0.05); }
        .payment-method-item { border: 1px solid #dee2e6; padding: 15px; border-radius: 10px; cursor: pointer; margin-bottom: 10px; transition: 0.3s; }
        .payment-method-item:hover { border-color: #198754; background: #f8fffb; }
        .payment-method-item input:checked + label { font-weight: bold; color: #198754; }
    </style>
</head>
<body style="background-color: #f4f7f6;">

<div class="container mt-5 mb-5">
    <form action="process_order.php" method="POST"> <div class="row">
        
        <div class="col-lg-7">
            <div class="checkout-section mb-4">
                <h5 class="fw-bold mb-4 text-success"><i class="fa-solid fa-location-dot me-2"></i>Thông tin giao hàng</h5>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Họ và tên người nhận</label>
                        <input type="text" name="full_name" class="form-control" placeholder="Nguyễn Văn A" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="tel" name="phone" class="form-control" placeholder="090xxxxxxx" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email (không bắt buộc)</label>
                        <input type="email" name="email" class="form-control" placeholder="vidu@gmail.com">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Địa chỉ nhận hàng</label>
                        <textarea name="address" class="form-control" rows="2" placeholder="Số nhà, tên đường, xã/phường..." required></textarea>
                    </div>
                </div>
            </div>

            <div class="checkout-section">
                <h5 class="fw-bold mb-4 text-success"><i class="fa-solid fa-credit-card me-2"></i>Phương thức thanh toán</h5>
                
                <div class="payment-method-item">
                    <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD" checked>
                    <label class="form-check-label ms-2" for="cod">
                        <i class="fa-solid fa-truck-fast me-2 text-muted"></i> Thanh toán khi nhận hàng (COD)
                    </label>
                </div>

                <div class="payment-method-item">
                    <input class="form-check