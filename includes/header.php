<?php
if (!defined('COMPANY_NAME')) {
    require_once __DIR__ . '/config.php';
}

// Check age verification
$ageVerified = isset($_SESSION['age_verified']) && $_SESSION['age_verified'] === true;
$currentBalance = getUserBalance();
$pageTitle = isset($page_title) ? $page_title : 'Casino Ventures';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Casino Ventures - Free-to-Play Social Gaming Platform. 100% Free, No Real Money, Entertainment Only.">
    <meta name="keywords" content="casino games, free to play, social gaming, dice, slots, roulette, blackjack">
    <meta name="author" content="Casino Ventures">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="<?php echo $pageTitle; ?> - Casino Ventures">
    <meta property="og:description" content="Free-to-Play Social Gaming Platform">
    <meta property="og:type" content="website">
    
    <title><?php echo $pageTitle; ?> - Casino Ventures</title>
    
    <!-- Global Styles -->
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Age Verification Modal -->
    <?php if (!$ageVerified): ?>
    <div id="age-modal" class="modal-overlay active">
        <div class="modal-content age-verification">
            <div class="modal-header">
                <h2>Age Verification</h2>
                <p class="disclaimer-text">You must be 18 years or older to access this platform</p>
            </div>
            <div class="modal-body">
                <p>This is a <strong>FREE-TO-PLAY</strong> social gaming platform for entertainment purposes only.</p>
                <p>No real money is involved. All currency is virtual and has no real-world value.</p>
                <div class="age-checkbox">
                    <input type="checkbox" id="age-confirm" name="age-confirm">
                    <label for="age-confirm">I confirm that I am 18 years or older and understand this is for entertainment only</label>
                </div>
            </div>
            <div class="modal-footer">
                <button id="age-verify-btn" class="btn btn-primary" disabled>Continue</button>
                <button id="age-decline-btn" class="btn btn-secondary">Decline</button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                <a href="/index.php" class="brand-logo">
                    <i class="fas fa-dice-five"></i>
                    <span>Casino Ventures</span>
                </a>
            </div>

            <div class="navbar-menu">
                <a href="/index.php" class="nav-link">Home</a>
                <a href="/pages/games.php" class="nav-link">Play Now</a>
                <a href="/pages/about.php" class="nav-link">About</a>
                <a href="/pages/contact.php" class="nav-link">Contact</a>
                <div class="nav-dropdown">
                    <button class="nav-link dropdown-toggle">Legal <i class="fas fa-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <a href="/pages/terms.php" class="dropdown-item">Terms & Conditions</a>
                        <a href="/pages/privacy.php" class="dropdown-item">Privacy Policy</a>
                        <a href="/pages/disclaimer.php" class="dropdown-item">Disclaimer</a>
                        <a href="/pages/responsible-gaming.php" class="dropdown-item">Responsible Gaming</a>
                    </div>
                </div>
            </div>

            <div class="navbar-right">
                <div class="balance-display">
                    <i class="fas fa-coins"></i>
                    <span id="balance-display"><?php echo formatCurrency($currentBalance); ?></span>
                </div>
                <button id="reset-balance-btn" class="btn btn-small" title="Reset Balance">
                    <i class="fas fa-redo"></i>
                </button>
            </div>

            <button class="navbar-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Compliance Banner -->
    <div class="compliance-banner">
        <div class="banner-content">
            <i class="fas fa-info-circle"></i>
            <span><strong>FREE-TO-PLAY:</strong> 100% free gaming with virtual currency. No real money involved. Entertainment purposes only. Must be 18+.</span>
        </div>
    </div>

    <!-- Main Content Container -->
    <main class="main-container">
