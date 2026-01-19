<?php
/**
 * API Endpoint - Reset User Balance
 * Resets balance to initial amount
 */

require_once '../includes/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'error' => 'Method not allowed'
    ]);
    exit;
}

try {
    $newBalance = resetBalance();
    
    echo json_encode([
        'success' => true,
        'new_balance' => $newBalance,
        'formatted' => formatCurrency($newBalance),
        'message' => 'Balance reset successfully',
        'timestamp' => time()
    ]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
