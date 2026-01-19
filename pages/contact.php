<?php
$page_title = "Contact Us - Casino Ventures";
include '../includes/header.php';

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

<style>
    .contact-container {
        padding: var(--spacing-xl) 0;
    }

    .contact-header {
        text-align: center;
        margin-bottom: var(--spacing-2xl);
    }

    .contact-header h1 {
        color: var(--accent-green);
        text-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
        margin-bottom: var(--spacing-md);
    }

    .contact-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--spacing-2xl);
    }

    .contact-form {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-lg);
        padding: var(--spacing-xl);
    }

    .contact-form h2 {
        color: var(--accent-gold);
        margin-bottom: var(--spacing-lg);
    }

    .form-group {
        margin-bottom: var(--spacing-lg);
    }

    .form-label {
        display: block;
        color: var(--text-secondary);
        margin-bottom: var(--spacing-sm);
        font-weight: 600;
    }

    .form-input,
    .form-textarea {
        width: 100%;
        padding: var(--spacing-md);
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--accent-green);
        border-radius: var(--radius-md);
        color: var(--text-primary);
        font-family: 'Poppins', sans-serif;
        transition: all var(--transition-fast);
    }

    .form-input:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--accent-gold);
        box-shadow: 0 0 15px rgba(255, 215, 0, 0.2);
        background: rgba(255, 215, 0, 0.05);
    }

    .form-textarea {
        resize: vertical;
        min-height: 150px;
    }

    .submit-btn {
        width: 100%;
        padding: var(--spacing-lg);
        background: linear-gradient(135deg, var(--accent-gold) 0%, var(--accent-pink) 100%);
        border: none;
        color: var(--primary-dark);
        font-weight: 700;
        border-radius: var(--radius-md);
        cursor: pointer;
        font-size: 1.1rem;
        transition: all var(--transition-fast);
        text-transform: uppercase;
    }

    .submit-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(255, 215, 0, 0.4);
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-lg);
    }

    .info-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-lg);
        padding: var(--spacing-lg);
        transition: all var(--transition-normal);
    }

    .info-card:hover {
        border-color: var(--accent-green);
        box-shadow: 0 0 20px rgba(0, 255, 0, 0.2);
    }

    .info-icon {
        font-size: 2rem;
        color: var(--accent-green);
        margin-bottom: var(--spacing-md);
    }

    .info-title {
        color: var(--accent-gold);
        font-weight: 700;
        margin-bottom: var(--spacing-sm);
    }

    .info-content {
        color: var(--text-secondary);
    }

    .info-content a {
        color: var(--accent-gold);
        text-decoration: none;
        transition: all var(--transition-fast);
    }

    .info-content a:hover {
        color: var(--accent-green);
    }

    .success-message {
        background: rgba(0, 255, 0, 0.1);
        border: 2px solid var(--accent-green);
        color: var(--accent-green);
        padding: var(--spacing-lg);
        border-radius: var(--radius-md);
        margin-bottom: var(--spacing-lg);
        text-align: center;
    }

    @media (max-width: 768px) {
        .contact-content {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="contact-container">
    <!-- Header -->
    <div class="contact-header">
        <h1><i class="fas fa-envelope"></i> Contact Us</h1>
        <p>We'd love to hear from you. Get in touch with our team.</p>
    </div>

    <!-- Content -->
    <div class="contact-content">
        <!-- Form -->
        <div class="contact-form">
            <?php if (isset($success) && $success): ?>
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                <p>Thank you! Your message has been sent successfully. We'll get back to you soon.</p>
            </div>
            <?php endif; ?>

            <h2>Send us a Message</h2>
            <form method="POST">
                <div class="form-group">
                    <label class="form-label">Your Name</label>
                    <input type="text" name="name" class="form-input" placeholder="John Doe" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input" placeholder="john@example.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-input" placeholder="How can we help?" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-textarea" placeholder="Your message here..." required></textarea>
                </div>

                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>

        <!-- Info -->
        <div class="contact-info">
            <div class="info-card">
                <div class="info-icon"><i class="fas fa-envelope"></i></div>
                <div class="info-title">Email</div>
                <div class="info-content">
                    <a href="mailto:contact@casinoventures.com">contact@casinoventures.com</a>
                </div>
            </div>

            <div class="info-card">
                <div class="info-icon"><i class="fas fa-phone"></i></div>
                <div class="info-title">Phone</div>
                <div class="info-content">
                    <a href="tel:+18008888888">+1-800-CASINO-1</a>
                </div>
            </div>

                <div class="info-title">Address</div>
                <div class="info-content">
                    Gaming District<br>
                    Digital City, DC 12345<br>
                    United States
                </div>
            </div>

            <div class="info-card">
                <div class="info-icon"><i class="fas fa-clock"></i></div>
                <div class="info-title">Business Hours</div>
                <div class="info-content">
                    Monday - Friday: 9:00 AM - 6:00 PM<br>
                    Saturday - Sunday: 10:00 AM - 4:00 PM<br>
                    (GMT-5)
                </div>
            </div>

            <div class="info-card">
                <div class="info-icon"><i class="fas fa-comments"></i></div>
                <div class="info-title">Support</div>
                <div class="info-content">
                    For technical support, please email us or use the contact form above. We typically respond within 24 hours.
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div style="margin-top: var(--spacing-2xl); background: rgba(0, 255, 0, 0.05); border: 2px solid var(--accent-green); border-radius: var(--radius-lg); padding: var(--spacing-xl);">
        <h2 style="color: var(--accent-green); text-align: center; margin-bottom: var(--spacing-xl);">Frequently Asked Questions</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--spacing-lg);">
            <div>
                <strong style="color: var(--accent-gold);">Is Casino Ventures really free?</strong>
                <p style="color: var(--text-secondary); margin-top: var(--spacing-sm);">Yes! 100% free. No deposits, no payments, no real money involved.</p>
            </div>
            <div>
                <strong style="color: var(--accent-gold);">How do I reset my balance?</strong>
                <p style="color: var(--text-secondary); margin-top: var(--spacing-sm);">Click the reset button in the top navigation. Your balance will be reset to ₹10,000.</p>
            </div>
            <div>
                <strong style="color: var(--accent-gold);">Are the games fair?</strong>
                <p style="color: var(--text-secondary); margin-top: var(--spacing-sm);">Absolutely. All games use certified random number generators with published RTP percentages.</p>
            </div>
            <div>
                <strong style="color: var(--accent-gold);">Do I need to register?</strong>
                <p style="color: var(--text-secondary); margin-top: var(--spacing-sm);">No registration required! Just verify your age and start playing immediately.</p>
            </div>
            <div>
                <strong style="color: var(--accent-gold);">Is my data safe?</strong>
                <p style="color: var(--text-secondary); margin-top: var(--spacing-sm);">Yes. We use bank-level encryption and strict privacy policies to protect your information.</p>
            </div>
            <div>
                <strong style="color: var(--accent-gold);">Can I play on mobile?</strong>
                <p style="color: var(--text-secondary); margin-top: var(--spacing-sm);">Yes! Our platform is fully responsive and works on all devices.</p>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
