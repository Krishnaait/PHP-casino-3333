<?php
$page_title = "Disclaimer - Casino Ventures";
include '../includes/header.php';
?>

<style>
    .legal-container {
        padding: var(--spacing-xl) 0;
        max-width: 900px;
        margin: 0 auto;
    }

    .legal-header {
        text-align: center;
        margin-bottom: var(--spacing-2xl);
        padding: var(--spacing-xl);
        background: linear-gradient(135deg, rgba(255, 215, 0, 0.1), rgba(255, 0, 110, 0.1));
        border: 2px solid var(--accent-gold);
        border-radius: var(--radius-lg);
    }

    .legal-header h1 {
        color: var(--accent-gold);
        text-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        margin-bottom: var(--spacing-md);
    }

    .legal-content {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-lg);
        padding: var(--spacing-xl);
    }

    .legal-section {
        margin-bottom: var(--spacing-xl);
    }

    .legal-section h2 {
        color: var(--accent-green);
        margin-bottom: var(--spacing-lg);
        padding-bottom: var(--spacing-md);
        border-bottom: 2px solid var(--accent-green);
        text-shadow: 0 0 10px rgba(0, 255, 0, 0.2);
    }

    .legal-section h3 {
        color: var(--accent-gold);
        margin-top: var(--spacing-lg);
        margin-bottom: var(--spacing-md);
    }

    .legal-section p {
        color: var(--text-secondary);
        line-height: 1.8;
        margin-bottom: var(--spacing-md);
    }

    .legal-section ul {
        color: var(--text-secondary);
        margin-left: var(--spacing-lg);
        margin-bottom: var(--spacing-lg);
        line-height: 1.8;
    }

    .legal-section li {
        margin-bottom: var(--spacing-sm);
    }

    .highlight-box {
        background: rgba(0, 255, 0, 0.1);
        border-left: 4px solid var(--accent-green);
        padding: var(--spacing-lg);
        margin: var(--spacing-lg) 0;
        border-radius: var(--radius-md);
    }

    .highlight-box strong {
        color: var(--accent-green);
    }

    .warning-box {
        background: rgba(255, 170, 0, 0.1);
        border-left: 4px solid var(--warning);
        padding: var(--spacing-lg);
        margin: var(--spacing-lg) 0;
        border-radius: var(--radius-md);
    }

    .warning-box strong {
        color: var(--warning);
    }

    .last-updated {
        text-align: center;
        color: var(--text-muted);
        font-size: 0.9rem;
        margin-top: var(--spacing-xl);
        padding-top: var(--spacing-xl);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
</style>

<div class="legal-container">
    <!-- Header -->
    <div class="legal-header">
        <h1><i class="fas fa-exclamation-triangle"></i> Disclaimer</h1>
        <p>Important Legal Information & Responsible Gaming Notice</p>
    </div>

    <!-- Content -->
    <div class="legal-content">
        <!-- Age & Responsible Gaming -->
        <div class="legal-section">
            <h2><i class="fas fa-age-restrict"></i> Age & Responsible Gaming Disclaimer</h2>
            
            <div class="highlight-box">
                <strong><i class="fas fa-exclamation-circle"></i> IMPORTANT - AGE RESTRICTION:</strong><br>
                Casino Ventures is strictly for individuals who are <strong>18 years of age or older</strong>. By accessing and using this platform, you confirm that you are at least 18 years old and meet all legal requirements in your jurisdiction.
            </div>

            <h3>Free-to-Play Entertainment Only</h3>
            <p>Casino Ventures is a <strong>100% FREE-TO-PLAY social gaming platform</strong> designed for entertainment purposes only. This is NOT gambling. No real money is involved, and no real money transactions are possible.</p>

            <h3>Virtual Currency</h3>
            <p>All currency on Casino Ventures is <strong>virtual and has no real-world value</strong>. Virtual currency cannot be:</p>
            <ul>
                <li>Converted to real money</li>
                <li>Withdrawn or cashed out</li>
                <li>Exchanged for goods or services</li>
                <li>Traded with other users</li>
                <li>Used outside of Casino Ventures</li>
            </ul>

            <h3>Responsible Gaming</h3>
            <p>While Casino Ventures is a free entertainment platform, we encourage responsible gaming habits:</p>
            <ul>
                <li>Play for entertainment, not as a way to make money</li>
                <li>Set time limits for your gaming sessions</li>
                <li>Take regular breaks</li>
                <li>Never chase losses</li>
                <li>Keep gaming in perspective as a form of entertainment</li>
                <li>If you feel gaming is affecting your life negatively, seek help</li>
            </ul>

            <div class="warning-box">
                <strong><i class="fas fa-phone"></i> If you need help with gaming habits:</strong><br>
                Contact the National Council on Problem Gambling (NCPG) at 1-800-522-4700 or visit www.ncpg.org for resources and support.
            </div>
        </div>

        <!-- No Real Money -->
        <div class="legal-section">
            <h2><i class="fas fa-ban"></i> No Real Money Transactions</h2>
            <p>Casino Ventures operates on a 100% free model. We explicitly state:</p>
            <ul>
                <li>No deposits are required or accepted</li>
                <li>No withdrawals or cash-outs are possible</li>
                <li>No real money is ever exchanged</li>
                <li>No payment methods are accepted</li>
                <li>All gameplay uses virtual currency only</li>
            </ul>
        </div>

        <!-- Game Fairness -->
        <div class="legal-section">
            <h2><i class="fas fa-dice"></i> Game Fairness & RTP</h2>
            <p>All games on Casino Ventures use certified random number generators (RNG) to ensure fair and unpredictable outcomes.</p>

            <h3>Return to Player (RTP) Rates</h3>
            <ul>
                <li><strong>Dice Game:</strong> 98% RTP</li>
                <li><strong>Blackjack:</strong> 99.5% RTP</li>
                <li><strong>Roulette:</strong> 97.3% RTP</li>
                <li><strong>Slot Machine:</strong> 96% RTP</li>
                <li><strong>Plinko:</strong> 97% RTP</li>
                <li><strong>Mines:</strong> 96% RTP</li>
                <li><strong>Chicken Adventure:</strong> 95% RTP</li>
            </ul>

            <p>RTP (Return to Player) is the theoretical percentage of wagered money that is returned to players over time. Higher RTP means better odds for players.</p>
        </div>

        <!-- Compliance -->
        <div class="legal-section">
            <h2><i class="fas fa-shield-alt"></i> Google Ads Policy Compliance</h2>
            <p>Casino Ventures is fully compliant with Google Ads policies:</p>
            <ul>
                <li>No real money gambling or betting</li>
                <li>No circumvention or cloaking techniques</li>
                <li>Clear disclosure of free-to-play nature</li>
                <li>Transparent terms and conditions</li>
                <li>Age verification (18+)</li>
                <li>No misleading claims or practices</li>
            </ul>
        </div>

        <!-- Limitation of Liability -->
        <div class="legal-section">
            <h2><i class="fas fa-gavel"></i> Limitation of Liability</h2>
            <p>To the fullest extent permitted by law, Casino Ventures and its operators shall not be liable for:</p>
            <ul>
                <li>Any indirect, incidental, special, or consequential damages</li>
                <li>Loss of data, revenue, or profits</li>
                <li>Service interruptions or technical issues</li>
                <li>Third-party actions or content</li>
                <li>Any damages arising from your use of the platform</li>
            </ul>
        </div>

        <!-- Modifications -->
        <div class="legal-section">
            <h2><i class="fas fa-edit"></i> Modifications to Terms</h2>
            <p>Casino Ventures reserves the right to modify this disclaimer and other terms at any time. Changes will be effective immediately upon posting. Your continued use of the platform constitutes acceptance of any modifications.</p>
        </div>

        <!-- Governing Law -->
        <div class="legal-section">
            <h2><i class="fas fa-book"></i> Governing Law</h2>
            <p>This disclaimer and all related terms are governed by and construed in accordance with the laws of the jurisdiction in which Casino Ventures operates, without regard to its conflict of law provisions.</p>
        </div>

        <!-- Contact -->
        <div class="legal-section">
            <h2><i class="fas fa-envelope"></i> Questions?</h2>
            <p>If you have any questions about this disclaimer or our platform, please contact us at:</p>
            <ul>
                <li><strong>Email:</strong> contact@casinoventures.com</li>
                <li><strong>Phone:</strong> +1-800-CASINO-1</li>
                <li><strong>Address:</strong> Gaming District, Digital City, DC 12345</li>
            </ul>
        </div>

        <div class="last-updated">
            <p>Last Updated: January 2026</p>
            <p>This disclaimer is effective as of the date above and applies to all users of Casino Ventures.</p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
