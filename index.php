<?php
// Force redeploy - Fix Play Now buttons
$page_title = "Home - Casino Ventures";
include 'includes/header.php';
?>

<style>
    /* Hero Section */
    .hero {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--spacing-2xl);
        align-items: center;
        padding: var(--spacing-2xl) 0;
        margin-bottom: var(--spacing-2xl);
        position: relative;
        overflow: hidden;
    }

    .hero-content h1 {
        font-size: 3.5rem;
        line-height: 1.2;
        margin-bottom: var(--spacing-lg);
        color: var(--text-primary);
        font-weight: 800;
    }

    .hero-content p {
        font-size: 1.2rem;
        color: var(--text-secondary);
        margin-bottom: var(--spacing-lg);
    }

    .hero-cta {
        display: flex;
        gap: var(--spacing-md);
        margin-bottom: var(--spacing-lg);
    }

    .hero-visual {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 500px;
    }

    .hero-image {
        max-width: 100%;
        height: auto;
        animation: float 3s ease-in-out infinite;
        filter: drop-shadow(0 0 30px rgba(255, 215, 0, 0.4));
    }

    .floating-element {
        position: absolute;
        animation: float 4s ease-in-out infinite;
        opacity: 0.9;
    }

    .floating-coin-1 {
        top: 10%;
        left: 5%;
        width: 60px;
        animation-delay: 0s;
    }

    .floating-coin-2 {
        top: 20%;
        right: 10%;
        width: 50px;
        animation-delay: 1s;
    }

    .floating-coin-3 {
        bottom: 25%;
        left: 15%;
        width: 55px;
        animation-delay: 2s;
    }

    .floating-coin-4 {
        bottom: 15%;
        right: 5%;
        width: 45px;
        animation-delay: 1.5s;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        50% {
            transform: translateY(-20px) rotate(5deg);
        }
    }

    /* Compliance Badge */
    .hero-badges {
        display: flex;
        gap: var(--spacing-md);
        flex-wrap: wrap;
        margin-top: var(--spacing-lg);
    }

    .badge {
        background: rgba(0, 255, 0, 0.1);
        border: 1px solid var(--accent-green);
        padding: var(--spacing-sm) var(--spacing-md);
        border-radius: var(--radius-md);
        font-size: 0.85rem;
        color: var(--accent-green);
        font-weight: 600;
    }

    /* Featured Games Section */
    .games-section {
        margin: var(--spacing-2xl) 0;
    }

    .games-section h2 {
        text-align: center;
        font-size: 2.5rem;
        color: var(--accent-gold);
        margin-bottom: var(--spacing-xl);
        text-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
    }

    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: var(--spacing-xl);
    }

    .game-card {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-lg);
        padding: var(--spacing-xl);
        text-align: center;
        transition: all var(--transition-normal);
        position: relative;
        overflow: hidden;
    }

    .game-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, transparent, rgba(0, 255, 0, 0.1));
        opacity: 0;
        transition: opacity var(--transition-normal);
        pointer-events: none;
    }

    .game-card:hover {
        transform: translateY(-10px);
        border-color: var(--accent-green);
        box-shadow: 0 10px 40px rgba(0, 255, 0, 0.2);
    }

    .game-card:hover::before {
        opacity: 1;
    }

    .game-icon {
        font-size: 4rem;
        margin-bottom: var(--spacing-md);
        display: block;
    }

    .game-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: var(--spacing-sm);
    }

    .game-description {
        color: var(--text-secondary);
        margin-bottom: var(--spacing-lg);
        font-size: 0.9rem;
    }

    .game-play-btn {
        display: inline-block;
        padding: var(--spacing-md) var(--spacing-xl);
        background: linear-gradient(135deg, var(--accent-gold), #ffed4e);
        color: var(--primary-dark);
        text-decoration: none;
        border-radius: var(--radius-md);
        font-weight: 700;
        transition: all var(--transition-fast);
    }

    .game-play-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
    }

    /* Features Section */
    .features-section {
        margin: var(--spacing-2xl) 0;
        padding: var(--spacing-2xl);
        background: rgba(255, 255, 255, 0.02);
        border-radius: var(--radius-lg);
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: var(--spacing-xl);
    }

    .feature-card {
        text-align: center;
        padding: var(--spacing-xl);
    }

    .feature-icon {
        font-size: 3rem;
        margin-bottom: var(--spacing-md);
        color: var(--accent-green);
    }

    .feature-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: var(--spacing-sm);
    }

    .feature-description {
        color: var(--text-secondary);
        font-size: 0.9rem;
    }

    /* CTA Section */
    .cta-section {
        text-align: center;
        padding: var(--spacing-2xl);
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.1), rgba(255, 215, 0, 0.1));
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-lg);
        margin: var(--spacing-2xl) 0;
    }

    .cta-section h2 {
        font-size: 2.5rem;
        color: var(--accent-gold);
        margin-bottom: var(--spacing-md);
    }

    .cta-section p {
        font-size: 1.2rem;
        color: var(--text-secondary);
        margin-bottom: var(--spacing-xl);
    }

    @media (max-width: 768px) {
        .hero {
            grid-template-columns: 1fr;
        }

        .hero-content h1 {
            font-size: 2.5rem;
        }

        .hero-visual {
            min-height: 300px;
        }

        .floating-element {
            width: 40px !important;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Experience Premium Casino Gaming</h1>
        <p>100% Free-to-Play Social Gaming Platform. No Real Money. Pure Entertainment.</p>
        
        <div class="hero-cta">
            <a href="/pages/games.php" class="btn btn-primary">
                <i class="fas fa-play"></i> Play Now
            </a>
            <a href="/pages/about.php" class="btn btn-secondary">
                <i class="fas fa-info-circle"></i> Learn More
            </a>
        </div>

        <div class="hero-badges">
            <span class="badge"><i class="fas fa-shield-alt"></i> 18+ Only</span>
            <span class="badge"><i class="fas fa-coins"></i> Virtual Currency</span>
        </div>
    </div>

    <div class="hero-visual">
        <img src="/assets/images/hero-casino.png" alt="Casino Gaming" class="hero-image">
        
        <!-- Floating Decorative Elements -->
        <img src="/assets/images/coin-stack.png" alt="Coin" class="floating-element floating-coin-1">
        <img src="/assets/images/coin-stack.png" alt="Coin" class="floating-element floating-coin-2">
        <img src="/assets/images/coin-stack.png" alt="Coin" class="floating-element floating-coin-3">
        <img src="/assets/images/coin-stack.png" alt="Coin" class="floating-element floating-coin-4">
    </div>
</section>

<!-- Featured Games Section -->
<section class="games-section">
    <h2><i class="fas fa-gamepad"></i> Featured Games</h2>
    <div class="games-grid">
        <div class="game-card">
            <span class="game-icon">🎲</span>
            <h3 class="game-title">Dice Game</h3>
            <p class="game-description">Predict HIGH or LOW on two dice rolls</p>
            <a href="/games/dice.php" class="game-play-btn">Play Now</a>
        </div>

        <div class="game-card">
            <span class="game-icon">🐔</span>
            <h3 class="game-title">Chicken Adventure</h3>
            <p class="game-description">Navigate the chicken to victory</p>
            <a href="/games/chicken.php" class="game-play-btn">Play Now</a>
        </div>

        <div class="game-card">
            <span class="game-icon">💣</span>
            <h3 class="game-title">Mines</h3>
            <p class="game-description">Reveal tiles without hitting mines</p>
            <a href="/games/mines.php" class="game-play-btn">Play Now</a>
        </div>

        <div class="game-card">
            <span class="game-icon">⚪</span>
            <h3 class="game-title">Plinko</h3>
            <p class="game-description">Drop balls through pegs to win</p>
            <a href="/games/plinko.php" class="game-play-btn">Play Now</a>
        </div>

        <div class="game-card">
            <span class="game-icon">🎰</span>
            <h3 class="game-title">Slot Machine</h3>
            <p class="game-description">Classic slots with big wins</p>
            <a href="/games/slots.php" class="game-play-btn">Play Now</a>
        </div>

        <div class="game-card">
            <span class="game-icon">🎡</span>
            <h3 class="game-title">Roulette</h3>
            <p class="game-description">Spin the wheel and win big</p>
            <a href="/games/roulette.php" class="game-play-btn">Play Now</a>
        </div>

        <div class="game-card">
            <span class="game-icon">🃏</span>
            <h3 class="game-title">Blackjack</h3>
            <p class="game-description">Beat the dealer with 21</p>
            <a href="/games/blackjack.php" class="game-play-btn">Play Now</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">💰</div>
            <h3 class="feature-title">100% Free</h3>
            <p class="feature-description">No deposits, no withdrawals. Pure entertainment with virtual currency.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">🔒</div>
            <h3 class="feature-title">Secure & Safe</h3>
        </div>

        <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3 class="feature-title">Instant Play</h3>
            <p class="feature-description">No login required. Start playing immediately with ₹10,000 virtual balance.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">🎮</div>
            <h3 class="feature-title">Premium Games</h3>
            <p class="feature-description">7+ carefully crafted casino games with unique mechanics and audio.</p>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <h2>Ready to Play?</h2>
    <p>Join thousands of players enjoying premium casino games. Start with ₹10,000 virtual currency!</p>
    <a href="/pages/games.php" class="btn btn-primary" style="font-size: 1.1rem; padding: var(--spacing-lg) var(--spacing-2xl);">
        <i class="fas fa-rocket"></i> Start Playing Now
    </a>
</section>

<?php include 'includes/footer.php'; ?>
