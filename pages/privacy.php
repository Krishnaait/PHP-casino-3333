<?php
$page_title = "Privacy Policy - Casino Ventures";
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
        <h1><i class="fas fa-lock"></i> Privacy Policy</h1>
        <p>How we protect your privacy and data</p>
    </div>

    <!-- Content -->
    <div class="legal-content">
        <div class="legal-section">
            <h2>1. Introduction</h2>
            <p>Casino Ventures ("we," "us," "our," or "Company") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our services.</p>
        </div>

        <div class="legal-section">
            <h2>2. Information We Collect</h2>
            
            <h3>Session-Based Information</h3>
            <p>Since we do not require registration, we collect minimal information:</p>
            <ul>
                <li>Session ID (temporary, session-based)</li>
                <li>Age verification status</li>
                <li>Virtual currency balance</li>
                <li>Game play history (current session only)</li>
            </ul>

            <h3>Technical Information</h3>
            <p>We may collect:</p>
            <ul>
                <li>IP address</li>
                <li>Browser type and version</li>
                <li>Device information</li>
                <li>Operating system</li>
                <li>Referring URL</li>
                <li>Pages visited and time spent</li>
            </ul>

            <h3>Contact Information</h3>
            <p>If you contact us, we may collect:</p>
            <ul>
                <li>Name</li>
                <li>Email address</li>
                <li>Message content</li>
                <li>Contact preferences</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>3. How We Use Your Information</h2>
            <p>We use collected information for:</p>
            <ul>
                <li>Providing and maintaining our services</li>
                <li>Processing your requests and inquiries</li>
                <li>Improving our platform and user experience</li>
                <li>Preventing fraud and ensuring security</li>
                <li>Complying with legal obligations</li>
                <li>Analyzing usage patterns and trends</li>
                <li>Sending service-related announcements</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>4. Data Storage & Retention</h2>
            <p>Session-based data is stored temporarily:</p>
            <ul>
                <li>Session data expires after inactivity</li>
                <li>No permanent user accounts are created</li>
                <li>Data is not retained after session ends</li>
                <li>Contact form submissions are retained for support purposes</li>
                <li>Technical logs are retained for security purposes</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>5. Data Security</h2>
            <div class="highlight-box">
                <p><strong>We implement industry-standard security measures:</strong></p>
            </div>
            <ul>
                <li>SSL/TLS encryption for data transmission</li>
                <li>Secure server infrastructure</li>
                <li>Regular security audits</li>
                <li>Firewalls and intrusion detection</li>
                <li>Limited access to sensitive data</li>
            </ul>
            <p>However, no method of transmission over the internet is 100% secure. We cannot guarantee absolute security.</p>
        </div>

        <div class="legal-section">
            <h2>6. Cookies & Tracking</h2>
            <p>We use minimal cookies and tracking:</p>
            <ul>
                <li>Session cookies for functionality</li>
                <li>No persistent tracking cookies</li>
                <li>No third-party cookies for advertising</li>
                <li>You can disable cookies in your browser</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>7. Third-Party Services</h2>
            <p>We may use third-party services for:</p>
            <ul>
                <li>Website hosting</li>
                <li>Analytics (privacy-focused)</li>
                <li>Payment processing (if applicable)</li>
                <li>Customer support</li>
            </ul>
            <p>These services are bound by confidentiality agreements and are not permitted to use your information for other purposes.</p>
        </div>

        <div class="legal-section">
            <h2>8. Your Rights</h2>
            <p>You have the right to:</p>
            <ul>
                <li>Access information we hold about you</li>
                <li>Request correction of inaccurate data</li>
                <li>Request deletion of your data</li>
                <li>Opt-out of communications</li>
                <li>File a complaint with relevant authorities</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>9. Children's Privacy</h2>
            <p>Casino Ventures is not intended for children under 18. We do not knowingly collect information from children. If we become aware that a child has provided us with personal information, we will delete such information immediately.</p>
        </div>

        <div class="legal-section">
            <h2>10. GDPR Compliance</h2>
            <p>For users in the European Union:</p>
            <ul>
                <li>We process data based on your consent</li>
                <li>You have the right to access your data</li>
                <li>You have the right to be forgotten</li>
                <li>You have the right to data portability</li>
                <li>You have the right to object to processing</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>11. CCPA Compliance</h2>
            <p>For California residents:</p>
            <ul>
                <li>You have the right to know what data is collected</li>
                <li>You have the right to delete collected data</li>
                <li>You have the right to opt-out of data sales</li>
                <li>You have the right to non-discrimination</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2>12. Changes to Privacy Policy</h2>
            <p>We may update this Privacy Policy at any time. Changes are effective immediately upon posting. Your continued use of Casino Ventures constitutes acceptance of the updated policy.</p>
        </div>

        <div class="legal-section">
            <h2>13. Contact Us</h2>
            <p>If you have questions about this Privacy Policy or our privacy practices, please contact us:</p>
            <ul>
                <li><strong>Email:</strong> contact@casinoventures.com</li>
                <li><strong>Address:</strong> Gaming District, Digital City, DC 12345</li>
            </ul>
        </div>

        <div class="last-updated">
            <p>Last Updated: January 2026</p>
            <p>This Privacy Policy is effective as of the date above and applies to all users of Casino Ventures.</p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
