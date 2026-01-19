<?php
/**
 * Global Configuration File
 * Casino Website - Free-to-Play Social Gaming Platform
 * Google Ads Compliant - No Real Money Transactions
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ============================================
// COMPANY INFORMATION
// ============================================
define('COMPANY_NAME', 'Casino Ventures');
define('COMPANY_EMAIL', 'contact@casinoventures.com');
define('COMPANY_ADDRESS', 'Gaming District, Digital City, DC 12345');

// ============================================
// GAME CONFIGURATION
// ============================================
define('INITIAL_BALANCE', 10000);  // Starting virtual currency
define('MIN_BET', 200);             // Minimum bet amount
define('MAX_BET', 5500);            // Maximum bet amount
define('CURRENCY_SYMBOL', '₹');     // Virtual currency symbol

// ============================================
// SESSION MANAGEMENT
// ============================================
define('SESSION_TIMEOUT', 3600);    // 1 hour session timeout
define('SESSION_NAME', 'casino_session');

// Initialize user session
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 'user_' . uniqid();
    $_SESSION['balance'] = INITIAL_BALANCE;
    $_SESSION['total_wins'] = 0;
    $_SESSION['total_losses'] = 0;
    $_SESSION['total_games'] = 0;
    $_SESSION['session_start'] = time();
}

// ============================================
// COMPLIANCE & LEGAL
// ============================================
define('LEGAL_AGE', 18);
define('FREE_TO_PLAY', true);
define('NO_REAL_MONEY', true);
define('GOOGLE_ADS_COMPLIANT', true);

// ============================================
// GAME DEFINITIONS
// ============================================
$GAMES = [
    'dice' => [
        'name' => 'Dice Game',
        'description' => 'Predict HIGH or LOW on two dice rolls',
        'icon' => '🎲',
        'multiplier' => 2.0,
        'house_edge' => 0.02,
        'rtp' => 0.98
    ],
    'chicken' => [
        'name' => 'Chicken Adventure',
        'description' => 'Navigate the chicken to reach the finish line',
        'icon' => '🐔',
        'multiplier' => 'variable',
        'house_edge' => 0.05,
        'rtp' => 0.95
    ],
    'mines' => [
        'name' => 'Mines',
        'description' => 'Reveal tiles without hitting mines',
        'icon' => '💣',
        'multiplier' => 'variable',
        'house_edge' => 0.04,
        'rtp' => 0.96
    ],
    'plinko' => [
        'name' => 'Plinko',
        'description' => 'Drop balls through pegs to win multipliers',
        'icon' => '⚪',
        'multiplier' => 'variable',
        'house_edge' => 0.03,
        'rtp' => 0.97
    ],
    'slots' => [
        'name' => 'Slot Machine',
        'description' => 'Classic 4-row slot machine with big wins',
        'icon' => '🎰',
        'multiplier' => 'variable',
        'house_edge' => 0.04,
        'rtp' => 0.96
    ],
    'roulette' => [
        'name' => 'Roulette',
        'description' => 'Spin the wheel and predict the outcome',
        'icon' => '🎡',
        'multiplier' => 'variable',
        'house_edge' => 0.027,
        'rtp' => 0.973
    ],
    'blackjack' => [
        'name' => 'Blackjack',
        'description' => 'Beat the dealer with 21 or less',
        'icon' => '🃏',
        'multiplier' => 'variable',
        'house_edge' => 0.005,
        'rtp' => 0.995
    ]
];

// ============================================
// HELPER FUNCTIONS
// ============================================

/**
 * Get current user balance
 */
function getUserBalance() {
    return isset($_SESSION['balance']) ? $_SESSION['balance'] : INITIAL_BALANCE;
}

/**
 * Update user balance
 */
function updateBalance($amount) {
    if (!isset($_SESSION['balance'])) {
        $_SESSION['balance'] = INITIAL_BALANCE;
    }
    $_SESSION['balance'] += $amount;
    if ($_SESSION['balance'] < 0) {
        $_SESSION['balance'] = 0;
    }
    return $_SESSION['balance'];
}

/**
 * Format currency
 */
function formatCurrency($amount) {
    return CURRENCY_SYMBOL . number_format($amount, 2);
}

/**
 * Validate bet amount
 */
function validateBet($amount) {
    $balance = getUserBalance();
    if ($amount < MIN_BET) {
        return ['valid' => false, 'error' => 'Minimum bet is ' . formatCurrency(MIN_BET)];
    }
    if ($amount > MAX_BET) {
        return ['valid' => false, 'error' => 'Maximum bet is ' . formatCurrency(MAX_BET)];
    }
    if ($amount > $balance) {
        return ['valid' => false, 'error' => 'Insufficient balance'];
    }
    return ['valid' => true];
}

/**
 * Log game result
 */
function logGameResult($game, $bet, $win, $multiplier = 1) {
    if (!isset($_SESSION['game_history'])) {
        $_SESSION['game_history'] = [];
    }
    
    $_SESSION['game_history'][] = [
        'game' => $game,
        'bet' => $bet,
        'win' => $win,
        'multiplier' => $multiplier,
        'timestamp' => time(),
        'balance_after' => getUserBalance()
    ];
    
    // Update statistics
    $_SESSION['total_games']++;
    if ($win > 0) {
        $_SESSION['total_wins']++;
    } else {
        $_SESSION['total_losses']++;
    }
}

/**
 * Get game statistics
 */
function getGameStats($game = null) {
    $stats = [
        'total_games' => $_SESSION['total_games'] ?? 0,
        'total_wins' => $_SESSION['total_wins'] ?? 0,
        'total_losses' => $_SESSION['total_losses'] ?? 0,
        'win_rate' => 0,
        'current_balance' => getUserBalance()
    ];
    
    if ($stats['total_games'] > 0) {
        $stats['win_rate'] = round(($stats['total_wins'] / $stats['total_games']) * 100, 2);
    }
    
    return $stats;
}

/**
 * Reset balance to initial amount
 */
function resetBalance() {
    $_SESSION['balance'] = INITIAL_BALANCE;
    return INITIAL_BALANCE;
}

/**
 * Check if user is of legal age (18+)
 */
function isLegalAge() {
    return isset($_SESSION['age_verified']) && $_SESSION['age_verified'] === true;
}

/**
 * Verify age
 */
function verifyAge() {
    $_SESSION['age_verified'] = true;
    $_SESSION['age_verified_time'] = time();
}

/**
 * Generate random result with house edge
 */
function applyHouseEdge($probability, $houseEdge) {
    $adjustedProbability = $probability * (1 - $houseEdge);
    return rand(1, 100) <= ($adjustedProbability * 100);
}

?>
