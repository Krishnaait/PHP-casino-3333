<?php
$page_title = "Fair Policy - Casino Ventures";
include '../includes/header.php';
?>

<style>
    .legal-page {
        max-width: 900px;
        margin: 0 auto;
        padding: var(--spacing-2xl) var(--spacing-lg);
    }

    .legal-header {
        text-align: center;
        margin-bottom: var(--spacing-2xl);
        padding: var(--spacing-2xl);
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.1), rgba(255, 215, 0, 0.1));
        border-radius: var(--radius-lg);
        border: 2px solid var(--accent-green);
    }

    .legal-title {
        font-size: 2.5rem;
        color: var(--accent-gold);
        text-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        margin-bottom: var(--spacing-md);
    }

    .legal-subtitle {
        color: var(--text-secondary);
        font-size: 1.1rem;
    }

    .legal-content {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-lg);
        padding: var(--spacing-2xl);
        line-height: 1.8;
    }

    .legal-section {
        margin-bottom: var(--spacing-2xl);
    }

    .section-title {
        font-size: 1.5rem;
        color: var(--accent-green);
        margin-bottom: var(--spacing-lg);
        padding-bottom: var(--spacing-sm);
        border-bottom: 2px solid var(--accent-green);
    }

    .section-content {
        color: var(--text-secondary);
        margin-bottom: var(--spacing-md);
    }

    .section-content strong {
        color: var(--text-primary);
    }

    .highlight-box {
        background: rgba(0, 255, 0, 0.05);
        border-left: 4px solid var(--accent-green);
        padding: var(--spacing-lg);
        margin: var(--spacing-lg) 0;
        border-radius: var(--radius-md);
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: var(--spacing-lg);
        margin: var(--spacing-lg) 0;
    }

    .info-card {
        background: rgba(255, 215, 0, 0.05);
        border: 1px solid var(--accent-gold);
        border-radius: var(--radius-md);
        padding: var(--spacing-lg);
        text-align: center;
    }

    .info-card-icon {
        font-size: 2rem;
        margin-bottom: var(--spacing-sm);
    }

    .info-card-title {
        color: var(--accent-gold);
        font-weight: 700;
        margin-bottom: var(--spacing-sm);
    }

    .info-card-text {
        color: var(--text-secondary);
        font-size: 0.9rem;
    }

    ul {
        list-style: none;
        padding-left: 0;
    }

    ul li {
        padding-left: var(--spacing-lg);
        margin-bottom: var(--spacing-sm);
        position: relative;
        color: var(--text-secondary);
    }

    ul li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: var(--accent-green);
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .legal-title {
            font-size: 2rem;
        }

        .legal-content {
            padding: var(--spacing-lg);
        }

        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="legal-page">
    <div class="legal-header">
        <h1 class="legal-title">⚖️ Fair Policy</h1>
        <p class="legal-subtitle">Our Commitment to Fair Play and Transparency</p>
        <p style="color: var(--text-secondary); margin-top: var(--spacing-md);">
            <strong>Last Updated:</strong> January 19, 2026
        </p>
    </div>

    <div class="legal-content">
        <div class="legal-section">
            <h2 class="section-title">1. Introduction</h2>
            <p class="section-content">
                At <strong>Casino Ventures</strong>, we are committed to providing a fair, transparent, and enjoyable gaming experience for all our users. This Fair Policy outlines our dedication to maintaining the highest standards of fairness in all our games and operations. As a <strong>100% free-to-play social casino platform</strong>, we prioritize entertainment and user trust above all else.
            </p>
            <p class="section-content">
                We believe that every player deserves a fair chance to win, and we have implemented rigorous systems and protocols to ensure that all game outcomes are completely random, unpredictable, and unbiased.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="section-title">2. Random Number Generator (RNG)</h2>
            <p class="section-content">
                All games on our platform utilize a <strong>certified Random Number Generator (RNG)</strong> to ensure fair and unpredictable outcomes. Our RNG system is designed to produce results that are:
            </p>
            <ul>
                <li><strong>Completely Random:</strong> Each game outcome is independent and cannot be predicted or manipulated</li>
                <li><strong>Statistically Fair:</strong> Over time, results conform to expected probability distributions</li>
                <li><strong>Cryptographically Secure:</strong> Uses industry-standard algorithms to prevent tampering</li>
                <li><strong>Independently Verified:</strong> Our RNG system follows best practices for online gaming</li>
            </ul>
            
            <div class="highlight-box">
                <strong>🔒 Technical Details:</strong> Our RNG uses JavaScript's cryptographically secure random number generation (crypto.getRandomValues()) combined with the Mersenne Twister algorithm to ensure maximum randomness and fairness across all devices and platforms.
            </div>
        </div>

        <div class="legal-section">
            <h2 class="section-title">3. Game Fairness by Category</h2>
            
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-card-icon">🎲</div>
                    <div class="info-card-title">Dice Games</div>
                    <div class="info-card-text">Each dice roll is generated independently using RNG. Outcomes range from 2-12 with mathematically accurate probability distributions.</div>
                </div>
                
                <div class="info-card">
                    <div class="info-card-icon">🎰</div>
                    <div class="info-card-title">Slot Machines</div>
                    <div class="info-card-text">Reel positions are determined by RNG at the moment of spin. Symbol distribution ensures fair RTP (Return to Player) percentages.</div>
                </div>
                
                <div class="info-card">
                    <div class="info-card-icon">🎡</div>
                    <div class="info-card-title">Roulette</div>
                    <div class="info-card-text">Wheel outcomes are generated using RNG with equal probability for each color. No bias toward house or player.</div>
                </div>
                
                <div class="info-card">
                    <div class="info-card-icon">🃏</div>
                    <div class="info-card-title">Card Games</div>
                    <div class="info-card-text">Cards are shuffled using Fisher-Yates algorithm with RNG seed. Each hand is dealt from a freshly shuffled deck.</div>
                </div>
                
                <div class="info-card">
                    <div class="info-card-icon">💣</div>
                    <div class="info-card-title">Mines</div>
                    <div class="info-card-text">Mine positions are randomly generated at game start. First click is always safe to ensure fair gameplay experience.</div>
                </div>
                
                <div class="info-card">
                    <div class="info-card-icon">🎱</div>
                    <div class="info-card-title">Plinko</div>
                    <div class="info-card-text">Ball physics are simulated with realistic gravity and bounce. Final slot is determined by physics engine, not predetermined.</div>
                </div>
            </div>
        </div>

        <div class="legal-section">
            <h2 class="section-title">4. Return to Player (RTP) Rates</h2>
            <p class="section-content">
                We maintain transparent and fair RTP rates across all our games. <strong>RTP (Return to Player)</strong> represents the theoretical percentage of total bets that will be returned to players over time.
            </p>
            
            <div class="highlight-box">
                <strong>📊 Our RTP Rates:</strong>
                <ul style="margin-top: var(--spacing-md);">
                    <li><strong>Dice Game:</strong> 98.0% RTP</li>
                    <li><strong>Chicken Adventure:</strong> 95.0% RTP</li>
                    <li><strong>Mines:</strong> 96.0% RTP (varies by difficulty)</li>
                    <li><strong>Plinko:</strong> 97.0% RTP</li>
                    <li><strong>Slot Machine:</strong> 96.0% RTP</li>
                    <li><strong>Roulette:</strong> 97.3% RTP</li>
                    <li><strong>Blackjack:</strong> 99.5% RTP (with optimal strategy)</li>
                </ul>
            </div>
            
            <p class="section-content">
                <strong>Important Note:</strong> RTP is calculated over millions of game rounds. Individual sessions may vary significantly due to the random nature of games. Short-term results do not reflect long-term statistical probabilities.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="section-title">5. No Manipulation or Interference</h2>
            <p class="section-content">
                We guarantee that:
            </p>
            <ul>
                <li><strong>No Remote Control:</strong> Game outcomes cannot be influenced or controlled by Casino Ventures staff or systems</li>
                <li><strong>No Outcome Prediction:</strong> We cannot predict or know game results before they occur</li>
                <li><strong>No Player Profiling:</strong> Game results are not adjusted based on player history, balance, or betting patterns</li>
                <li><strong>No Adaptive Difficulty:</strong> Games do not become harder or easier based on wins or losses</li>
                <li><strong>Client-Side Verification:</strong> Game logic runs in your browser, ensuring transparency and preventing server-side manipulation</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2 class="section-title">6. Free-to-Play Model</h2>
            <p class="section-content">
                Casino Ventures operates on a <strong>100% free-to-play model</strong> with virtual currency only. This means:
            </p>
            <ul>
                <li><strong>No Real Money:</strong> All games use virtual credits with no monetary value</li>
                <li><strong>No Deposits:</strong> You never need to deposit real money to play</li>
                <li><strong>No Withdrawals:</strong> Virtual credits cannot be exchanged for real money or prizes</li>
                <li><strong>Entertainment Only:</strong> Our platform is designed purely for entertainment purposes</li>
                <li><strong>No Financial Risk:</strong> You cannot lose real money on our platform</li>
            </ul>
            
            <div class="highlight-box">
                <strong>🎁 Starting Balance:</strong> All players start with <strong>₹10,000 in virtual credits</strong> absolutely free. If your balance reaches zero, you can reset it instantly at any time - no questions asked!
            </div>
        </div>

        <div class="legal-section">
            <h2 class="section-title">7. Responsible Gaming Commitment</h2>
            <p class="section-content">
                While our games involve no real money, we still promote responsible gaming practices:
            </p>
            <ul>
                <li><strong>18+ Only:</strong> Our platform is strictly for users aged 18 and above</li>
                <li><strong>Entertainment Focus:</strong> Games are designed for fun, not as a source of income</li>
                <li><strong>Time Management:</strong> We encourage players to take regular breaks</li>
                <li><strong>Educational Resources:</strong> We provide information about responsible gaming on our Responsible Gaming page</li>
                <li><strong>No Addiction Mechanics:</strong> We do not use predatory psychological tactics to encourage excessive play</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2 class="section-title">8. Transparency and Accountability</h2>
            <p class="section-content">
                We are committed to maintaining the highest level of transparency:
            </p>
            <ul>
                <li><strong>Open Communication:</strong> We welcome questions and feedback about our fairness practices</li>
                <li><strong>Regular Updates:</strong> This Fair Policy is reviewed and updated regularly</li>
                <li><strong>User Rights:</strong> Players have the right to understand how games work and how outcomes are determined</li>
                <li><strong>Complaint Resolution:</strong> We take all fairness concerns seriously and investigate them promptly</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2 class="section-title">9. Technical Safeguards</h2>
            <p class="section-content">
                We employ multiple technical safeguards to ensure fairness:
            </p>
            <ul>
                <li><strong>Secure Code:</strong> All game logic is protected against tampering and exploitation</li>
                <li><strong>Session Integrity:</strong> Each gaming session is isolated and cannot be influenced by external factors</li>
                <li><strong>Anti-Cheating Measures:</strong> Systems are in place to detect and prevent cheating or exploitation</li>
                <li><strong>Regular Testing:</strong> Games are tested regularly to ensure RNG functionality and fairness</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2 class="section-title">10. Dispute Resolution</h2>
            <p class="section-content">
                If you have concerns about the fairness of any game:
            </p>
            <ul>
                <li><strong>Contact Us:</strong> Email us at <a href="mailto:contact@casinoventures.com" style="color: var(--accent-green);">contact@casinoventures.com</a> with details of your concern</li>
                <li><strong>Investigation:</strong> We will investigate all fairness complaints within 48 hours</li>
                <li><strong>Resolution:</strong> We will provide a detailed explanation of game mechanics and outcomes</li>
                <li><strong>Transparency:</strong> All investigations are conducted with full transparency</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2 class="section-title">11. Policy Updates</h2>
            <p class="section-content">
                This Fair Policy may be updated from time to time to reflect changes in our practices or legal requirements. All updates will be posted on this page with a revised "Last Updated" date. Continued use of our platform after changes constitutes acceptance of the updated policy.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="section-title">12. Contact Information</h2>
            <p class="section-content">
                For questions, concerns, or feedback regarding our Fair Policy, please contact us:
            </p>
            <div class="highlight-box">
                <strong>📧 Email:</strong> <a href="mailto:contact@casinoventures.com" style="color: var(--accent-green);">contact@casinoventures.com</a><br>
                <strong>📍 Address:</strong> C/O 58585 IEKEEN 20-0RHUSC, SEC-23A, Shivaji Nagar (Gurgaon), RAJEEV CHOWK, Gurgaon- 122001, Haryana<br>
                <strong>🏢 CIN:</strong> FIUGB4Y49595T8<br>
                <strong>📋 GST:</strong> 7K99TDC34734<br>
                <strong>🆔 PAN:</strong> 098JBKC3252<br>
                <strong>⏰ Response Time:</strong> We aim to respond to all inquiries within 24-48 hours
            </div>
        </div>

        <div style="text-align: center; margin-top: var(--spacing-2xl); padding-top: var(--spacing-2xl); border-top: 1px solid rgba(255, 255, 255, 0.1);">
            <p style="color: var(--text-secondary); font-size: 0.9rem;">
                <strong>Casino Ventures</strong> - Committed to Fair Play and Transparency<br>
                © 2026 Casino Ventures. All rights reserved.
            </p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
