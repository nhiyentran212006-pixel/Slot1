<?php
session_start();
include 'includes/databaseconnection.php';

if (!isset($_SESSION['user_id']) || !isset($_POST['action'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$cart_id = $_POST['cart_id'];
$action = $_POST['action'];

if ($action == 'update') {
    $new_qty = $_POST['quantity'];
    if ($new_qty > 0) {
        $stmt = $pdo->prepare("UPDATE cart SET quantity = ? WHERE cart_id = ? AND user_id = ?");
        $stmt->execute([$new_qty, $cart_id, $user_id]);
    }
} elseif ($action == 'delete') {
    $stmt = $pdo->prepare("DELETE FROM cart WHERE cart_id = ? AND user_id = ?");
    $stmt->execute([$cart_id, $user_id]);
}

header('Location: checkout.php');
exit();
