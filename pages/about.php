<?php
$page_title = "About Us - Casino Ventures";
include '../includes/header.php';
?>

<style>
    .about-container {
        padding: var(--spacing-xl) 0;
    }

    .about-header {
        text-align: center;
        margin-bottom: var(--spacing-2xl);
    }

    .about-header h1 {
        color: var(--accent-green);
        text-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
        margin-bottom: var(--spacing-md);
    }

    .about-hero {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--spacing-2xl);
        align-items: center;
        margin-bottom: var(--spacing-2xl);
        padding: var(--spacing-xl);
        background: rgba(0, 255, 0, 0.05);
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-lg);
    }

    .about-hero-text h2 {
        color: var(--accent-gold);
        margin-bottom: var(--spacing-lg);
    }

    .about-hero-text p {
        margin-bottom: var(--spacing-md);
        line-height: 1.8;
    }

    .about-hero-icon {
        font-size: 6rem;
        text-align: center;
        animation: float 3s infinite;
    }

    .mission-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: var(--spacing-lg);
        margin: var(--spacing-2xl) 0;
    }

    .mission-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-lg);
        padding: var(--spacing-lg);
        text-align: center;
    }

    .mission-card:hover {
        border-color: var(--accent-green);
        box-shadow: 0 0 20px rgba(0, 255, 0, 0.2);
    }

    .mission-icon {
        font-size: 3rem;
        margin-bottom: var(--spacing-md);
    }

    .mission-title {
        color: var(--accent-gold);
        font-weight: 700;
        margin-bottom: var(--spacing-md);
    }

    .mission-text {
        color: var(--text-secondary);
        font-size: 0.95rem;
    }

    .values-section {
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.1), rgba(255, 215, 0, 0.1));
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-lg);
        padding: var(--spacing-xl);
        margin: var(--spacing-2xl) 0;
    }

    .values-section h2 {
        color: var(--accent-green);
        text-align: center;
        margin-bottom: var(--spacing-xl);
        text-shadow: 0 0 15px rgba(0, 255, 0, 0.3);
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: var(--spacing-lg);
    }

    .value-item {
        text-align: center;
    }

    .value-item strong {
        color: var(--accent-gold);
        display: block;
        margin-bottom: var(--spacing-sm);
    }

    .compliance-section {
        background: rgba(255, 215, 0, 0.05);
        border: 2px solid var(--accent-gold);
        border-radius: var(--radius-lg);
        padding: var(--spacing-xl);
        margin: var(--spacing-2xl) 0;
    }

    .compliance-section h2 {
        color: var(--accent-gold);
        text-align: center;
        margin-bottom: var(--spacing-lg);
    }

    .compliance-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: var(--spacing-lg);
    }

    .compliance-item {
        display: flex;
        gap: var(--spacing-md);
    }

    .compliance-item i {
        color: var(--accent-green);
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .compliance-item-text {
        color: var(--text-secondary);
    }

    .compliance-item-text strong {
        color: var(--text-primary);
    }

    @media (max-width: 768px) {
        .about-hero {
            grid-template-columns: 1fr;
        }

        .about-hero-icon {
            font-size: 4rem;
        }

        .mission-section {
            grid-template-columns: 1fr;
        }

        .values-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="about-container">
    <!-- Header -->
    <div class="about-header">
        <h1><i class="fas fa-info-circle"></i> About Casino Ventures</h1>
        <p>Premium Free-to-Play Social Gaming Platform</p>
    </div>

    <!-- Hero Section -->
    <div class="about-hero">
        <div class="about-hero-text">
            <h2>Our Story</h2>
            <p>Casino Ventures was founded with a simple mission: to provide world-class casino gaming entertainment to everyone, completely free. We believe gaming should be accessible, fun, and responsible.</p>
            <p>Our platform combines cutting-edge technology with classic casino games, creating an immersive experience that rivals premium gaming platforms—all without any real money involved.</p>
            <p>We're committed to transparency, fairness, and responsible gaming practices. Every game is designed with integrity and tested for fairness.</p>
        </div>
        <div class="about-hero-icon">🎰</div>
    </div>

    <!-- Mission Section -->
    <div class="mission-section">
        <div class="mission-card">
            <div class="mission-icon">🎯</div>
            <div class="mission-title">Our Mission</div>
            <div class="mission-text">
                Provide premium casino gaming entertainment that is 100% free, safe, and accessible to everyone worldwide.
            </div>
        </div>
        <div class="mission-card">
            <div class="mission-icon">👥</div>
            <div class="mission-title">Our Community</div>
            <div class="mission-text">
                Build a thriving community of gaming enthusiasts who value entertainment, fairness, and responsible gaming.
            </div>
        </div>
        <div class="mission-card">
            <div class="mission-icon">🏆</div>
            <div class="mission-title">Our Excellence</div>
            <div class="mission-text">
                Deliver exceptional gaming experiences with innovative games, smooth gameplay, and outstanding customer support.
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="values-section">
        <h2><i class="fas fa-heart"></i> Our Core Values</h2>
        <div class="values-grid">
            <div class="value-item">
                <strong>Transparency</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Complete honesty about our platform, games, and policies.</p>
            </div>
            <div class="value-item">
                <strong>Fairness</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">All games use certified random number generators for true randomness.</p>
            </div>
            <div class="value-item">
                <strong>Responsibility</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Promoting healthy gaming habits and responsible entertainment.</p>
            </div>
            <div class="value-item">
                <strong>Innovation</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Continuously improving games and features based on player feedback.</p>
            </div>
            <div class="value-item">
                <strong>Security</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Protecting player data and maintaining the highest security standards.</p>
            </div>
            <div class="value-item">
                <strong>Community</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Building connections and fostering a positive gaming community.</p>
            </div>
        </div>
    </div>

    <!-- Compliance Section -->
    <div class="compliance-section">
        <h2><i class="fas fa-shield-alt"></i> Compliance & Safety</h2>
        <div class="compliance-list">
            <div class="compliance-item">
                <i class="fas fa-check-circle"></i>
                <div class="compliance-item-text">
                    <strong>Google Ads Compliant</strong><br>
                    Fully compliant with Google Ads policies and industry standards.
                </div>
            </div>
            <div class="compliance-item">
                <i class="fas fa-check-circle"></i>
                <div class="compliance-item-text">
                    <strong>18+ Age Verification</strong><br>
                    Strict age verification to ensure only adults access our platform.
                </div>
            </div>
            <div class="compliance-item">
                <i class="fas fa-check-circle"></i>
                <div class="compliance-item-text">
                    <strong>No Real Money</strong><br>
                    100% virtual currency with zero real-world value.
                </div>
            </div>
            <div class="compliance-item">
                <i class="fas fa-check-circle"></i>
                <div class="compliance-item-text">
                    <strong>Fair Gaming</strong><br>
                    All games certified with published RTP and house edge percentages.
                </div>
            </div>
            <div class="compliance-item">
                <i class="fas fa-check-circle"></i>
                <div class="compliance-item-text">
                    <strong>Data Privacy</strong><br>
                    Strict privacy policies protecting all player information.
                </div>
            </div>
            <div class="compliance-item">
                <i class="fas fa-check-circle"></i>
                <div class="compliance-item-text">
                    <strong>Responsible Gaming</strong><br>
                    Resources and tools for maintaining healthy gaming habits.
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div style="background: rgba(0, 255, 0, 0.05); border: 2px solid var(--accent-green); border-radius: var(--radius-lg); padding: var(--spacing-xl); margin: var(--spacing-2xl) 0; text-align: center;">
        <h2 style="color: var(--accent-green); margin-bottom: var(--spacing-lg);">Why Choose Casino Ventures?</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-lg);">
            <div>
                <div style="font-size: 2rem; margin-bottom: var(--spacing-md);">🎮</div>
                <strong style="color: var(--accent-gold);">7+ Games</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Diverse selection of premium casino games</p>
            </div>
            <div>
                <div style="font-size: 2rem; margin-bottom: var(--spacing-md);">💰</div>
                <strong style="color: var(--accent-gold);">100% Free</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">No deposits, no payments, pure entertainment</p>
            </div>
            <div>
                <div style="font-size: 2rem; margin-bottom: var(--spacing-md);">⚡</div>
                <strong style="color: var(--accent-gold);">Instant Play</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">No registration required, start playing immediately</p>
            </div>
            <div>
                <div style="font-size: 2rem; margin-bottom: var(--spacing-md);">🔒</div>
                <strong style="color: var(--accent-gold);">Secure</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Bank-level security and data protection</p>
            </div>
            <div>
                <div style="font-size: 2rem; margin-bottom: var(--spacing-md);">🎯</div>
                <strong style="color: var(--accent-gold);">Fair</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Certified random number generators</p>
            </div>
            <div>
                <div style="font-size: 2rem; margin-bottom: var(--spacing-md);">🌍</div>
                <strong style="color: var(--accent-gold);">Global</strong>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Available worldwide, 24/7</p>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
