<?php
/**
 * API Endpoint - Age Verification
 * Verifies user is 18+ before accessing platform
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
    
    if (!isset($input['verified']) || $input['verified'] !== true) {
        throw new Exception('Age verification failed');
    }
    
    // Set age verification in session
    verifyAge();
    
    echo json_encode([
        'success' => true,
        'message' => 'Age verified successfully',
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
