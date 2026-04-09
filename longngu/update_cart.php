<?php
session_start();
include 'includes/databaseconnection.php';

if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$cart_id = (int) ($_POST['cart_id'] ?? 0);
$action = $_POST['action'] ?? '';

if ($cart_id > 0 && $action === 'update') {
    $new_qty = (int) ($_POST['quantity'] ?? 1);
    if ($new_qty > 0) {
        $stmt = $pdo->prepare("UPDATE cart SET quantity = ? WHERE cart_id = ? AND user_id = ?");
        $stmt->execute([$new_qty, $cart_id, $user_id]);
    }
} elseif ($cart_id > 0 && $action === 'delete') {
    $stmt = $pdo->prepare("DELETE FROM cart WHERE cart_id = ? AND user_id = ?");
    $stmt->execute([$cart_id, $user_id]);
}

header('Location: checkout.php');
exit();
