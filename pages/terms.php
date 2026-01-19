<?php
$page_title = "Terms & Conditions - Casino Ventures";
$page_description = "Read the official Terms & Conditions for using the Casino Ventures platform. By using our service, you agree to these terms.";
$page_keywords = "terms and conditions, legal, casino ventures, user agreement";
include_once __DIR__ . 
'/../includes/header.php';
?>

<div class="container-fluid bg-dark-gradient">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center mb-5">
                    <i class="fas fa-file-contract fa-2x text-primary mb-3"></i>
                    <h1>Terms & Conditions</h1>
                    <p class="lead text-white-50">Last Updated: <?php echo date("F j, Y"); ?></p>
                </div>

                <div class="card bg-dark-2 text-white shadow-lg">
                    <div class="card-body p-5">
                        <p class="text-white-75">Welcome to Casino Ventures. These Terms and Conditions ("Terms") govern your use of our website and services. By accessing or using our platform, you agree to be bound by these Terms. If you do not agree with any part of these Terms, you must not use our services.</p>

                        <h4 class="text-primary mt-5">1. Acceptance of Terms</h4>
                        <p class="text-white-75">By creating an account or using any of our services, you confirm that you have read, understood, and agree to be bound by these Terms. We reserve the right to modify these Terms at any time. We will notify you of any changes by posting the new Terms on this page. Your continued use of the service after any such changes constitutes your acceptance of the new Terms.</p>

                        <h4 class="text-primary mt-5">2. Age Requirement (18+)</h4>
                        <p class="text-white-75">You must be at least 18 years of age to use our services. By using our platform, you represent and warrant that you are at least 18 years old and have the legal capacity to enter into this agreement. We reserve the right to request proof of age at any time to verify your compliance with this requirement. Underage gaming is strictly prohibited.</p>

                        <h4 class="text-primary mt-5">3. Free-to-Play Model & Virtual Currency</h4>
                        <p class="text-white-75">Casino Ventures is a 100% free-to-play social gaming platform. We do not offer any real money gambling or an opportunity to win real money or prizes. The virtual currency used on our platform has no real-world value and cannot be redeemed for cash, prizes, or anything of monetary value. The virtual currency is for entertainment purposes only.</p>

                        <h4 class="text-primary mt-5">4. User Account</h4>
                        <p class="text-white-75">While registration is not required for instant play, some features may require an account. You are responsible for maintaining the confidentiality of your account information and for all activities that occur under your account. You agree to notify us immediately of any unauthorized use of your account. You are solely responsible for any and all activities that occur under your account.</p>

                        <h4 class="text-primary mt-5">5. User Conduct</h4>
                        <p class="text-white-75">You agree not to use the service for any unlawful purpose or in any way that could harm, disable, overburden, or impair the service. You agree not to engage in any fraudulent activity, including but not limited to, using bots, hacks, or any other unauthorized third-party software. Prohibited activities include, but are not limited to, attempting to manipulate game outcomes, exploiting bugs, or harassing other users.</p>

                        <h4 class="text-primary mt-5">6. Intellectual Property</h4>
                        <p class="text-white-75">All content on our platform, including but not limited to, text, graphics, logos, images, and software, is the property of Casino Ventures or its licensors and is protected by copyright and other intellectual property laws. You may not reproduce, distribute, or create derivative works from any content without our express written permission. All rights are reserved.</p>

                        <h4 class="text-primary mt-5">7. Limitation of Liability</h4>
                        <p class="text-white-75">To the fullest extent permitted by law, Casino Ventures shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, or any loss of data, use, goodwill, or other intangible losses, resulting from your access to or use of or inability to access or use the services. In no event shall our aggregate liability for all claims relating to the services exceed zero.</p>

                        <h4 class="text-primary mt-5">8. Disclaimer of Warranties</h4>
                        <p class="text-white-75">Our services are provided "as is" and "as available" without any warranties of any kind, either express or implied. We do not warrant that the services will be uninterrupted, error-free, or free of viruses or other harmful components. We do not warrant that the results of using the services will meet your requirements.</p>

                        <h4 class="text-primary mt-5">9. Governing Law</h4>
                        <p class="text-white-75">These Terms shall be governed and construed in accordance with the laws of India, without regard to its conflict of law provisions. Any dispute arising from these Terms shall be resolved in the courts of Gurgaon, Haryana. You agree to submit to the personal jurisdiction of the courts located in Gurgaon, Haryana.</p>

                        <h4 class="text-primary mt-5">10. Contact Information</h4>
                        <p class="text-white-75">If you have any questions about these Terms, please contact us at <a href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a>.</p>
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
