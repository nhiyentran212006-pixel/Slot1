<?php
session_start();
include 'includes/databaseconnection.php';

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
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_bill = 0;
foreach ($cart_items as $item) {
    $total_bill += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng & Thanh toán - HapVN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background-color: #f4f7f6;">
<?php include 'navbar.php'; ?>

<div class="container mt-4 mb-5">
    <h3 class="fw-bold text-success mb-4"><i class="fa-solid fa-cart-shopping me-2"></i>Giỏ hàng của bạn</h3>

    <?php if (empty($cart_items)): ?>
        <div class="alert alert-info">
            Giỏ hàng đang trống. <a href="index.php" class="alert-link">Tiếp tục mua sắm</a>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <?php foreach ($cart_items as $item): ?>
                            <div class="d-flex align-items-center border-bottom py-3 gap-3">
                                <img src="uploads/<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" width="80" height="80" class="rounded" style="object-fit: contain;">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><?php echo htmlspecialchars($item['name']); ?></h6>
                                    <div class="text-muted small">Đơn giá: <?php echo number_format($item['price'], 0, ',', '.'); ?>đ</div>
                                </div>

                                <form action="update_cart.php" method="POST" class="d-flex align-items-center gap-2">
                                    <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                                    <input type="hidden" name="action" value="update">
                                    <input type="number" name="quantity" min="1" value="<?php echo $item['quantity']; ?>" class="form-control" style="width: 90px;">
                                    <button type="submit" class="btn btn-outline-success btn-sm">Cập nhật</button>
                                </form>

                                <form action="update_cart.php" method="POST">
                                    <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Thông tin thanh toán</h5>
                        <p class="mb-2">Tạm tính: <strong><?php echo number_format($total_bill, 0, ',', '.'); ?>đ</strong></p>
                        <hr>

                        <form action="process_order.php" method="POST">
                            <div class="mb-2">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Số điện thoại</label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Địa chỉ nhận hàng</label>
                                <textarea name="address" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phương thức thanh toán</label>
                                <select name="payment_method" class="form-select" required>
                                    <option value="COD">Thanh toán khi nhận hàng (COD)</option>
                                    <option value="BANK">Chuyển khoản ngân hàng</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fa-solid fa-bag-shopping me-2"></i>Đặt hàng ngay
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
