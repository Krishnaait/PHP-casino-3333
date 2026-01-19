<?php
$page_title = "Contact Us - Casino Ventures";
$page_description = "Get in touch with Casino Ventures. We welcome your feedback, questions, and suggestions. Contact us via email for support.";
$page_keywords = "contact us, casino ventures, support, feedback, help";
include_once __DIR__ . 
'/../includes/header.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    // Validate
    if ($name && $email && $subject && $message) {
        // In production, send email here
        // For now, just show success
        $success = true;
    }
}
?>

<div class="container-fluid bg-dark-gradient">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <div class="section-title mb-4">
                    <i class="fas fa-envelope fa-2x text-primary mb-3"></i>
                    <h1>Contact Us</h1>
                    <p class="lead text-white-50">We're here to help and answer any questions you might have.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card bg-dark-2 text-white shadow-lg mb-5">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="text-primary mb-4">Send Us a Message</h2>
                                <?php if (isset($success) && $success): ?>
                                <div class="alert alert-success">
                                    <i class="fas fa-check-circle"></i>
                                    Thank you! Your message has been sent successfully. We'll get back to you soon.
                                </div>
                                <?php endif; ?>
                                <form method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Your Name</label>
                                        <input type="text" name="name" class="form-control bg-dark-3 text-white" placeholder="John Doe" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" name="email" class="form-control bg-dark-3 text-white" placeholder="john@example.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Subject</label>
                                        <input type="text" name="subject" class="form-control bg-dark-3 text-white" placeholder="How can we help?" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Message</label>
                                        <textarea name="message" class="form-control bg-dark-3 text-white" rows="5" placeholder="Your message here..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Send Message</button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="text-primary mb-4">Contact Information</h2>
                                <div class="info-card bg-dark-3 p-4 rounded mb-4">
                                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                                    <div class="info-title">Email</div>
                                    <div class="info-content">
                                        <a href="mailto:contact@casinoventures.com">contact@casinoventures.com</a>
                                    </div>
                                </div>
                                <div class="info-card bg-dark-3 p-4 rounded mb-4">
                                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                                    <div class="info-title">Address</div>
                                    <div class="info-content">
                                        <?php echo COMPANY_ADDRESS; ?>
                                    </div>
                                </div>
                                <div class="info-card bg-dark-3 p-4 rounded mb-4">
                                    <div class="info-icon"><i class="fas fa-building"></i></div>
                                    <div class="info-title">Company Registration</div>
                                    <div class="info-content">
                                        <strong>CIN:</strong> <?php echo COMPANY_CIN; ?><br>
                                        <strong>GST:</strong> <?php echo COMPANY_GST; ?><br>
                                        <strong>PAN:</strong> <?php echo COMPANY_PAN; ?>
                                    </div>
                                </div>
                                <div class="info-card bg-dark-3 p-4 rounded">
                                    <div class="info-icon"><i class="fas fa-clock"></i></div>
                                    <div class="info-title">Business Hours</div>
                                    <div class="info-content">
                                        Monday - Friday: 9:00 AM - 6:00 PM<br>
                                        Saturday - Sunday: 10:00 AM - 4:00 PM<br>
                                        (GMT+5:30)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-10">
                <div class="card bg-dark-2 text-white shadow-lg">
                    <div class="card-body p-5">
                        <h2 class="text-primary text-center mb-4">Frequently Asked Questions</h2>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item bg-dark-3">
                                <h2 class="accordion-header" id="faqHeading1">
                                    <button class="accordion-button bg-dark-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                                        Is Casino Ventures really free?
                                    </button>
                                </h2>
                                <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes! 100% free. No deposits, no payments, no real money involved. Our platform is for entertainment purposes only.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-dark-3">
                                <h2 class="accordion-header" id="faqHeading2">
                                    <button class="accordion-button collapsed bg-dark-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
                                        How do I reset my balance?
                                    </button>
                                </h2>
                                <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Click the reset button in the top navigation. Your balance will be reset to ₹10,000.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-dark-3">
                                <h2 class="accordion-header" id="faqHeading3">
                                    <button class="accordion-button collapsed bg-dark-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                                        Are the games fair?
                                    </button>
                                </h2>
                                <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Absolutely. All games use certified random number generators with published RTP percentages. Please see our Fair Policy page for more details.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-dark-3">
                                <h2 class="accordion-header" id="faqHeading4">
                                    <button class="accordion-button collapsed bg-dark-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4">
                                        Do I need to register?
                                    </button>
                                </h2>
                                <div id="faqCollapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        No registration required! Just verify your age and start playing immediately.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-dark-3">
                                <h2 class="accordion-header" id="faqHeading5">
                                    <button class="accordion-button collapsed bg-dark-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse5">
                                        Is my data safe?
                                    </button>
                                </h2>
                                <div id="faqCollapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes. We use bank-level encryption and strict privacy policies to protect your information. Please see our Privacy Policy for more details.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-dark-3">
                                <h2 class="accordion-header" id="faqHeading6">
                                    <button class="accordion-button collapsed bg-dark-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse6">
                                        Can I play on mobile?
                                    </button>
                                </h2>
                                <div id="faqCollapse6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes! Our platform is fully responsive and works on all devices.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include_once __DIR__ . 
'/../includes/footer.php'; ?>
