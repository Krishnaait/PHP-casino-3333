<?php
$page_title = "Fair Policy - Casino Ventures";
$page_description = "Read our Fair Policy to understand how we ensure game fairness, transparency, and integrity at Casino Ventures.";
$page_keywords = "fair policy, rng, rtp, casino ventures, game fairness";
include_once __DIR__ . 
'/../includes/header.php';
?>

<div class="container-fluid bg-dark-gradient">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center mb-5">
                    <i class="fas fa-balance-scale fa-2x text-primary mb-3"></i>
                    <h1>Fair Policy</h1>
                    <p class="lead text-white-50">Our commitment to fairness, transparency, and integrity</p>
                </div>

                <div class="card bg-dark-2 text-white shadow-lg">
                    <div class="card-body p-5">
                        <p class="text-white-75">At Casino Ventures, we are committed to providing a fair and transparent gaming experience. This Fair Policy outlines our commitment to game fairness, the use of random number generators (RNGs), and the publication of return to player (RTP) percentages.</p>

                        <h4 class="text-primary mt-5">1. Random Number Generator (RNG)</h4>
                        <p class="text-white-75">All our games use a certified Random Number Generator (RNG) to ensure that game outcomes are random and unpredictable. Our RNG has been tested and certified by an independent third-party testing laboratory to ensure that it meets the highest standards of fairness and randomness.</p>

                        <h4 class="text-primary mt-5">2. Return to Player (RTP)</h4>
                        <p class="text-white-75">We believe in transparency, which is why we publish the theoretical Return to Player (RTP) percentages for all our games. The RTP is the percentage of wagered virtual currency that is paid back to players over time. You can find the RTP for each game on its respective page.</p>

                        <h4 class="text-primary mt-5">3. Game Fairness by Category</h4>
                        <ul>
                            <li class="text-white-75"><strong>Slot Games:</strong> Our slot games are governed by our RNG to ensure random outcomes on every spin.</li>
                            <li class="text-white-75"><strong>Card Games:</strong> Our card games use a virtual deck of cards that is shuffled before each hand to ensure fairness.</li>
                            <li class="text-white-75"><strong>Table Games:</strong> Our table games, such as Roulette, use our RNG to determine the outcome of each spin.</li>
                        </ul>

                        <h4 class="text-primary mt-5">4. No Manipulation</h4>
                        <p class="text-white-75">We guarantee that our games are not manipulated in any way. The outcomes are determined solely by our RNG, and we do not have the ability to influence the results of any game. Our commitment to fairness is unwavering.</p>

                        <h4 class="text-primary mt-5">5. Free-to-Play Model</h4>
                        <p class="text-white-75">Our free-to-play model ensures that all players have the same opportunity to enjoy our games without any financial risk. There are no hidden costs or advantages for paying players, as we do not accept any real money payments.</p>

                        <h4 class="text-primary mt-5">6. Dispute Resolution</h4>
                        <p class="text-white-75">If you believe that a game outcome is incorrect, please contact our support team with the details of the game in question. We will investigate the issue and provide you with a resolution. All decisions made by our support team are final.</p>

                        <h4 class="text-primary mt-5">7. Contact Us</h4>
                        <p class="text-white-75">If you have any questions about our Fair Policy, please contact us at <a href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a>.</p>
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
