<?php
$page_title = "Privacy Policy - Casino Ventures";
$page_description = "Read the official Privacy Policy for Casino Ventures. We are committed to protecting your privacy and handling your data with care.";
$page_keywords = "privacy policy, legal, casino ventures, data protection";
include_once __DIR__ . 
'/../includes/header.php';
?>

<div class="container-fluid bg-dark-gradient">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center mb-5">
                    <i class="fas fa-user-secret fa-2x text-primary mb-3"></i>
                    <h1>Privacy Policy</h1>
                    <p class="lead text-white-50">Last Updated: <?php echo date("F j, Y"); ?></p>
                </div>

                <div class="card bg-dark-2 text-white shadow-lg">
                    <div class="card-body p-5">
                        <p class="text-white-75">Casino Ventures is committed to protecting your privacy. This Privacy Policy explains how we collect, use, and disclose your information when you use our services. By using our platform, you agree to the collection and use of information in accordance with this policy.</p>

                        <h4 class="text-primary mt-5">1. Information We Collect</h4>
                        <p class="text-white-75">We may collect the following types of information:</p>
                        <ul>
                            <li class="text-white-75"><strong>Personal Information:</strong> We may collect personal information such as your name and email address if you choose to create an account or contact us.</li>
                            <li class="text-white-75"><strong>Usage Data:</strong> We may collect information about your use of our services, such as your IP address, browser type, pages visited, and time spent on our platform.</li>
                            <li class="text-white-75"><strong>Cookies:</strong> We use cookies to enhance your experience on our platform. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent.</li>
                        </ul>

                        <h4 class="text-primary mt-5">2. How We Use Your Information</h4>
                        <p class="text-white-75">We use the information we collect for various purposes, including:</p>
                        <ul>
                            <li class="text-white-75">To provide and maintain our services</li>
                            <li class="text-white-75">To improve our services and develop new features</li>
                            <li class="text-white-75">To communicate with you and respond to your inquiries</li>
                            <li class="text-white-75">To monitor the usage of our services and prevent fraud</li>
                        </ul>

                        <h4 class="text-primary mt-5">3. Data Sharing and Disclosure</h4>
                        <p class="text-white-75">We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this Privacy Policy. We may share your information with trusted third-party service providers who assist us in operating our platform, conducting our business, or servicing you, so long as those parties agree to keep this information confidential.</p>

                        <h4 class="text-primary mt-5">4. Data Security</h4>
                        <p class="text-white-75">We take the security of your data seriously and use a variety of security measures to protect your information. However, no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your personal information, we cannot guarantee its absolute security.</p>

                        <h4 class="text-primary mt-5">5. Your Rights</h4>
                        <p class="text-white-75">You have the right to access, update, or delete your personal information at any time. If you have an account with us, you can update your information in your account settings. If you would like to delete your account or have any other questions about your rights, please contact us.</p>

                        <h4 class="text-primary mt-5">6. Children's Privacy</h4>
                        <p class="text-white-75">Our services are not intended for anyone under the age of 18. We do not knowingly collect personal information from children under 18. If we become aware that we have collected personal information from a child under 18, we will take steps to delete such information from our servers.</p>

                        <h4 class="text-primary mt-5">7. Changes to This Privacy Policy</h4>
                        <p class="text-white-75">We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page. You are advised to review this Privacy Policy periodically for any changes.</p>

                        <h4 class="text-primary mt-5">8. Contact Us</h4>
                        <p class="text-white-75">If you have any questions about this Privacy Policy, please contact us at <a href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a>.</p>
                        <p class="text-white-75"><strong>Address:</strong> <?php echo COMPANY_ADDRESS; ?></p>
                        <p class="text-white-75"><strong>CIN:</strong> <?php echo COMPANY_CIN; ?> | <strong>GST:</strong> <?php echo COMPANY_GST; ?> | <strong>PAN:</strong> <?php echo COMPANY_PAN; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . 
'/../includes/footer.php'; ?>
