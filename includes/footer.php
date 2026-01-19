<?php
if (!defined('COMPANY_NAME')) {
    require_once __DIR__ . '/config.php';
}
?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>About Us</h3>
                <p><?php echo COMPANY_NAME; ?> is a FREE-TO-PLAY social gaming platform offering premium casino-style games for entertainment purposes only.</p>
                <p class="compliance-text"><strong>100% Free • No Real Money • Virtual Currency Only • 18+ Only</strong></p>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="/pages/games.php">Games</a></li>
                    <li><a href="/pages/about.php">About</a></li>
                    <li><a href="/pages/contact.php">Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Legal</h3>
                <ul>
                    <li><a href="/pages/terms.php">Terms & Conditions</a></li>
                    <li><a href="/pages/privacy.php">Privacy Policy</a></li>
                    <li><a href="/pages/disclaimer.php">Disclaimer</a></li>
                    <li><a href="/pages/responsible-gaming.php">Responsible Gaming</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contact</h3>
                <p>Email: <a href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a></p>
                <p>Phone: <a href="tel:<?php echo COMPANY_PHONE; ?>"><?php echo COMPANY_PHONE; ?></a></p>
                <p><?php echo COMPANY_ADDRESS; ?></p>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-compliance">
                <p><i class="fas fa-shield-alt"></i> <strong>Google Ads Compliant</strong> - This platform is 100% free-to-play with virtual currency only. No real money transactions.</p>
            </div>
            <div class="footer-copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php echo COMPANY_NAME; ?>. All rights reserved. | <a href="/pages/privacy.php">Privacy</a> | <a href="/pages/terms.php">Terms</a></p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/check-balance.js"></script>
    
    <script>
        // Age verification
        document.addEventListener('DOMContentLoaded', function() {
            const ageModal = document.getElementById('age-modal');
            if (ageModal && ageModal.classList.contains('active')) {
                const ageConfirm = document.getElementById('age-confirm');
                const ageVerifyBtn = document.getElementById('age-verify-btn');
                const ageDeclineBtn = document.getElementById('age-decline-btn');

                ageConfirm.addEventListener('change', function() {
                    ageVerifyBtn.disabled = !this.checked;
                });

                ageVerifyBtn.addEventListener('click', function() {
                    fetch('/api/verify-age.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ verified: true })
                    }).then(response => response.json()).then(data => {
                        if (data.success) {
                            location.reload();
                        }
                    });
                });

                ageDeclineBtn.addEventListener('click', function() {
                    alert('You must be 18 years or older to access this platform.');
                    window.location.href = 'https://www.google.com';
                });
            }
        });
    </script>
</body>
</html>
