<?php
/**
 * API Endpoint - Get User Balance
 * Returns current user balance in JSON format
 */

require_once '../includes/config.php';

header('Content-Type: application/json');

try {
    $balance = getUserBalance();
    
    echo json_encode([
        'success' => true,
        'balance' => $balance,
        'formatted' => formatCurrency($balance),
        'timestamp' => time()
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Failed to retrieve balance',
        'message' => $e->getMessage()
    ]);
}
?>
