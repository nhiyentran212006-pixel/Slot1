<?php
session_start();
include 'includes/databaseconnection.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');
            window.location.href = 'authentication.php';
          </script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = (int) $_POST['product_id'];

    $sql_check = "SELECT cart_id FROM cart WHERE user_id = :user_id AND product_id = :product_id";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute(['user_id' => $user_id, 'product_id' => $product_id]);
    $cart_item = $stmt_check->fetch(PDO::FETCH_ASSOC);

    if ($cart_item) {
        $sql_update = "UPDATE cart SET quantity = quantity + 1 WHERE cart_id = :cart_id";
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->execute(['cart_id' => $cart_item['cart_id']]);
    } else {
        $sql_insert = "INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, 1)";
        $stmt_insert = $pdo->prepare($sql_insert);
        $stmt_insert->execute([
            'user_id' => $user_id,
            'product_id' => $product_id,
        ]);
    }

    $redirect = $_SERVER['HTTP_REFERER'] ?? 'checkout.php';
    header('Location: ' . $redirect);
    exit();
}

header('Location: index.php');
exit();
