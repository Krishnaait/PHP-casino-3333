<?php
$page_title = "Terms & Conditions - Casino Ventures";
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
        <h1><i class="fas fa-file-contract"></i> Terms & Conditions</h1>
        <p>Please read these terms carefully before using Casino Ventures</p>
    </div>

    <!-- Content -->
    <div class="legal-content">
        <div class="legal-section">
            <h2>1. Acceptance of Terms</h2>
            <p>By accessing and using Casino Ventures, you agree to be bound by these Terms & Conditions. If you do not agree to any part of these terms, you must not use this platform.</p>
        </div>

        <div class="legal-section">
            <h2>2. Platform Description</h2>
            <p>Casino Ventures is a free-to-play social gaming platform offering casino-style games for entertainment purposes only. All games use virtual currency with no real-world value.</p>
            <ul>
                <li>100% free to use</li>
                <li>No real money involved</li>
                <li>Virtual currency only</li>
                <li>Entertainment purposes only</li>
                <li>No gambling or betting</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>3. User Eligibility</h2>
            <p>To use Casino Ventures, you must:</p>
            <ul>
                <li>Be at least 18 years of age</li>
                <li>Have the legal capacity to enter into binding agreements</li>
                <li>Not be prohibited by law from using the platform</li>
                <li>Verify your age upon first access</li>
                <li>Provide accurate information</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>4. User Conduct</h2>
            <p>You agree not to:</p>
            <ul>
                <li>Use the platform for any illegal purposes</li>
                <li>Attempt to hack, cheat, or exploit the system</li>
                <li>Harass, abuse, or threaten other users</li>
                <li>Post offensive, defamatory, or inappropriate content</li>
                <li>Attempt to gain unauthorized access</li>
                <li>Use automated tools or bots</li>
                <li>Violate any applicable laws or regulations</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>5. Virtual Currency</h2>
            <p>All currency on Casino Ventures is virtual and has no real-world value:</p>
            <ul>
                <li>Cannot be converted to real money</li>
                <li>Cannot be withdrawn or cashed out</li>
                <li>Cannot be exchanged for goods or services</li>
                <li>Cannot be traded with other users</li>
                <li>Is reset when you reset your balance</li>
                <li>May be reset at any time by Casino Ventures</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>6. Game Rules & Fairness</h2>
            <p>All games are subject to the following:</p>
            <ul>
                <li>Games use certified random number generators</li>
                <li>Outcomes are unpredictable and fair</li>
                <li>Each game has published RTP percentages</li>
                <li>Casino Ventures reserves the right to modify game rules</li>
                <li>Disputes regarding game outcomes are final</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>7. Account & Session Management</h2>
            <p>Your use of Casino Ventures is session-based:</p>
            <ul>
                <li>No account registration is required</li>
                <li>Sessions expire after a period of inactivity</li>
                <li>Balance resets when you reset or session expires</li>
                <li>You can reset your balance at any time</li>
                <li>Casino Ventures may terminate sessions at any time</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>8. Intellectual Property</h2>
            <p>All content on Casino Ventures, including games, graphics, logos, and text, is the property of Casino Ventures or its licensors. You may not:</p>
            <ul>
                <li>Reproduce or distribute content</li>
                <li>Modify or create derivative works</li>
                <li>Use content for commercial purposes</li>
                <li>Reverse engineer or decompile games</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>9. Limitation of Liability</h2>
            <div class="highlight-box">
                <p><strong>TO THE FULLEST EXTENT PERMITTED BY LAW:</strong></p>
                <p>Casino Ventures and its operators shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of the platform, including but not limited to loss of data, revenue, or profits.</p>
            </div>
        </div>

        <div class="legal-section">
            <h2>10. Disclaimer of Warranties</h2>
            <p>Casino Ventures is provided "as is" without warranties of any kind, express or implied, including:</p>
            <ul>
                <li>Warranties of merchantability or fitness for a particular purpose</li>
                <li>Warranties of title or non-infringement</li>
                <li>Warranties of accuracy or completeness</li>
                <li>Warranties of uninterrupted service</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>11. Indemnification</h2>
            <p>You agree to indemnify and hold harmless Casino Ventures from any claims, damages, or losses arising from:</p>
            <ul>
                <li>Your use of the platform</li>
                <li>Your violation of these terms</li>
                <li>Your violation of any laws</li>
                <li>Your infringement of third-party rights</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>12. Termination</h2>
            <p>Casino Ventures reserves the right to:</p>
            <ul>
                <li>Terminate or suspend your access at any time</li>
                <li>Remove or disable any content</li>
                <li>Enforce these terms</li>
                <li>Refuse service to anyone for any reason</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>13. Modifications to Terms</h2>
            <p>Casino Ventures may modify these terms at any time. Changes are effective immediately upon posting. Your continued use constitutes acceptance of modifications.</p>
        </div>

        <div class="legal-section">
            <h2>14. Governing Law</h2>
            <p>These terms are governed by and construed in accordance with applicable laws, without regard to conflict of law provisions.</p>
        </div>

        <div class="legal-section">
            <h2>15. Severability</h2>
            <p>If any provision of these terms is found to be invalid or unenforceable, the remaining provisions shall continue in full force and effect.</p>
        </div>

        <div class="legal-section">
            <h2>16. Contact Information</h2>
            <p>For questions about these terms, please contact:</p>
            <ul>
                <li><strong>Email:</strong> contact@casinoventures.com</li>
                <li><strong>Address:</strong> C/O 58585 IEKEEN 20-0RHUSC, SEC-23A, Shivaji Nagar (Gurgaon), RAJEEV CHOWK, Gurgaon- 122001, Haryana</li>
                <li><strong>CIN:</strong> FIUGB4Y49595T8</li>
                <li><strong>GST:</strong> 7K99TDC34734</li>
                <li><strong>PAN:</strong> 098JBKC3252</li>
            </ul>
        </div>

        <div class="last-updated">
            <p>Last Updated: January 2026</p>
            <p>These Terms & Conditions are effective as of the date above and apply to all users of Casino Ventures.</p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
