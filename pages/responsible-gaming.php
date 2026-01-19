<?php
$page_title = "Responsible Gaming - Casino Ventures";
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
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.1), rgba(0, 255, 255, 0.1));
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-lg);
    }

    .legal-header h1 {
        color: var(--accent-green);
        text-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
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

    .warning-box {
        background: rgba(255, 170, 0, 0.1);
        border-left: 4px solid var(--warning);
        padding: var(--spacing-lg);
        margin: var(--spacing-lg) 0;
        border-radius: var(--radius-md);
    }

    .resource-box {
        background: rgba(0, 170, 255, 0.1);
        border-left: 4px solid var(--info);
        padding: var(--spacing-lg);
        margin: var(--spacing-lg) 0;
        border-radius: var(--radius-md);
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
        <h1><i class="fas fa-heart"></i> Responsible Gaming</h1>
        <p>Our Commitment to Player Wellbeing</p>
    </div>

    <!-- Content -->
    <div class="legal-content">
        <div class="legal-section">
            <h2>Our Commitment</h2>
            <p>Casino Ventures is committed to promoting responsible gaming and player wellbeing. While our platform is 100% free-to-play with no real money involved, we believe it's important to encourage healthy gaming habits.</p>
            <div class="highlight-box">
                <p><strong>Remember:</strong> Casino Ventures is designed for entertainment purposes only. Gaming should be fun, not a source of stress or financial concern.</p>
            </div>
        </div>

        <div class="legal-section">
            <h2>Understanding Gaming</h2>
            <p>Before you play, understand these important facts:</p>
            <ul>
                <li>Games are based on chance, not skill (except strategy games)</li>
                <li>The house always has a mathematical edge</li>
                <li>No one can predict game outcomes</li>
                <li>Losing streaks are normal and expected</li>
                <li>Gaming should never be a way to make money</li>
                <li>Virtual currency has no real value</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>Tips for Responsible Gaming</h2>
            
            <h3>1. Set Time Limits</h3>
            <p>Decide how long you'll play before you start. Take regular breaks and stick to your time limit. Gaming should be one of many activities in your life.</p>

            <h3>2. Don't Chase Losses</h3>
            <p>If you're losing, stop playing. Don't try to win back losses by playing more. This is one of the most important rules of responsible gaming.</p>

            <h3>3. Play for Fun, Not Profit</h3>
            <p>Treat any wins as a bonus, not income. Never gamble with money you need for essentials like rent, food, or utilities.</p>

            <h3>4. Never Borrow to Play</h3>
            <p>Don't borrow money to fund gaming. Only play with money you can afford to lose.</p>

            <h3>5. Keep Perspective</h3>
            <p>Remember that gaming is entertainment, like movies or sports. It should enhance your life, not dominate it.</p>

            <h3>6. Avoid Gaming When Stressed</h3>
            <p>Don't use gaming to escape problems or cope with negative emotions. Find healthier ways to manage stress.</p>

            <h3>7. Balance Your Activities</h3>
            <p>Maintain a healthy balance with work, family, friends, exercise, and other hobbies.</p>

            <h3>8. Know the Odds</h3>
            <p>Understand that you're more likely to lose than win. All our games have published RTP percentages.</p>
        </div>

        <div class="legal-section">
            <h2>Warning Signs</h2>
            <p>If you experience any of these warning signs, it may be time to seek help:</p>
            <ul>
                <li>Thinking about gaming constantly</li>
                <li>Needing to spend more time gaming to get the same excitement</li>
                <li>Unsuccessful attempts to cut back on gaming</li>
                <li>Feeling restless or irritable when not gaming</li>
                <li>Gaming to escape problems or negative emotions</li>
                <li>Lying to family or friends about gaming</li>
                <li>Jeopardizing relationships or opportunities because of gaming</li>
                <li>Returning to gaming to try to win back losses</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>If You Need Help</h2>
            <div class="resource-box">
                <strong><i class="fas fa-phone"></i> National Council on Problem Gambling (NCPG)</strong><br>
                <strong>Helpline:</strong> 1-800-522-4700<br>
                <strong>Website:</strong> www.ncpg.org<br>
                <strong>Available:</strong> 24 hours, 7 days a week<br>
                <strong>Free & Confidential</strong>
            </div>

            <p>Other resources:</p>
            <ul>
                <li><strong>Gamblers Anonymous:</strong> www.gamblersanonymous.org</li>
                <li><strong>National Problem Gambling Helpline:</strong> 1-800-GAMBLER</li>
                <li><strong>Substance Abuse and Mental Health Services Administration (SAMHSA):</strong> 1-800-662-4357</li>
                <li><strong>International Gambling Helpline:</strong> www.gamcare.org.uk</li>
            </ul>

            <p>Don't hesitate to reach out. Help is available, free, and confidential.</p>
        </div>

        <div class="legal-section">
            <h2>For Family & Friends</h2>
            <p>If you're concerned about someone's gaming habits:</p>
            <ul>
                <li>Talk to them in a caring, non-judgmental way</li>
                <li>Listen without criticizing</li>
                <li>Encourage them to seek professional help</li>
                <li>Support them in their recovery</li>
                <li>Set boundaries if necessary</li>
                <li>Seek support for yourself as well</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>Our Platform Features</h2>
            <p>To support responsible gaming, Casino Ventures provides:</p>
            <ul>
                <li>Clear age verification (18+ only)</li>
                <li>Transparent game information and RTP percentages</li>
                <li>Easy balance reset functionality</li>
                <li>Session-based gameplay (no persistent accounts)</li>
                <li>No real money transactions</li>
                <li>Links to responsible gaming resources</li>
                <li>Compliance with all relevant regulations</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>Virtual Currency Disclaimer</h2>
            <div class="warning-box">
                <strong>Important:</strong> All currency on Casino Ventures is virtual and has no real-world value. It cannot be converted to real money, withdrawn, or used outside of our platform. This is a free entertainment service only.
            </div>
        </div>

        <div class="legal-section">
            <h2>Contact Us</h2>
            <p>If you have questions about responsible gaming or need support, please contact us:</p>
            <ul>
                <li><strong>Email:</strong> contact@casinoventures.com</li>
                <li><strong>Address:</strong> Gaming District, Digital City, DC 12345</li>
            </ul>
        </div>

        <div class="last-updated">
            <p>Last Updated: January 2026</p>
            <p>This Responsible Gaming policy is effective as of the date above and applies to all users of Casino Ventures.</p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
