<?php
$page_title = "Disclaimer - Casino Ventures";
$page_description = "Read the official Disclaimer for Casino Ventures. Our platform is for entertainment purposes only and involves no real money.";
$page_keywords = "disclaimer, legal, casino ventures, entertainment only";
include_once __DIR__ . 
'/../includes/header.php';
?>

<div class="container-fluid bg-dark-gradient">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center mb-5">
                    <i class="fas fa-exclamation-triangle fa-2x text-primary mb-3"></i>
                    <h1>Disclaimer</h1>
                    <p class="lead text-white-50">Important information about our platform</p>
                </div>

                <div class="card bg-dark-2 text-white shadow-lg">
                    <div class="card-body p-5">
                        <h4 class="text-primary mt-4">1. Entertainment Purposes Only</h4>
                        <p class="text-white-75">Casino Ventures is a social gaming platform intended for entertainment purposes only. The games offered on our platform are for amusement and do not involve real money gambling. No real money can be won or lost on our platform.</p>

                        <h4 class="text-primary mt-4">2. No Real Money Value</h4>
                        <p class="text-white-75">The virtual currency used on our platform has no real-world value and cannot be exchanged for real money, prizes, or any other items of monetary value. The virtual currency is provided for free and is intended solely for use within our games.</p>

                        <h4 class="text-primary mt-4">3. Age Requirement (18+)</h4>
                        <p class="text-white-75">You must be at least 18 years of age to use our services. By using our platform, you confirm that you meet this age requirement. We are not responsible for any use of our platform by individuals under the age of 18.</p>

                        <h4 class="text-primary mt-4">4. No Guarantee of Winnings</h4>
                        <p class="text-white-75">The outcomes of our games are determined by a random number generator (RNG). There is no guarantee of winning, and past performance is not an indicator of future results. The games are based on chance and should be played for fun, not with the expectation of winning.</p>

                        <h4 class="text-primary mt-4">5. Risk Acknowledgment</h4>
                        <p class="text-white-75">You acknowledge that playing our games involves a risk of losing virtual currency. You are responsible for managing your virtual currency and playing responsibly. We are not liable for any losses of virtual currency.</p>

                        <h4 class="text-primary mt-4">6. Third-Party Links</h4>
                        <p class="text-white-75">Our platform may contain links to third-party websites. We are not responsible for the content or privacy practices of these websites. We encourage you to review the terms and privacy policies of any third-party websites you visit.</p>

                        <h4 class="text-primary mt-4">7. Changes to Disclaimer</h4>
                        <p class="text-white-75">We reserve the right to modify this Disclaimer at any time. Any changes will be effective immediately upon posting on this page. Your continued use of our platform constitutes your acceptance of the modified Disclaimer.</p>

                        <h4 class="text-primary mt-4">8. Contact Us</h4>
                        <p class="text-white-75">If you have any questions about this Disclaimer, please contact us at <a href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a>.</p>
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
