<?php
/**
 * API Endpoint - Update User Balance
 * Updates balance after game play
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
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($input['amount'])) {
        throw new Exception('Amount not provided');
    }
    
    $amount = (float)$input['amount'];
    
    // Validate amount
    if (!is_numeric($amount)) {
        throw new Exception('Invalid amount');
    }
    
    // Update balance
    $newBalance = updateBalance($amount);
    
    // Log transaction
    logGameResult('game', abs($amount), $amount > 0 ? $amount : 0, $amount > 0 ? 1 : 0);
    
    echo json_encode([
        'success' => true,
        'new_balance' => $newBalance,
        'formatted' => formatCurrency($newBalance),
        'change' => $amount,
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
