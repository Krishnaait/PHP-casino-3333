<?php
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
    }

    .hero-content h1 {
        font-size: 3.5rem;
        line-height: 1.2;
        margin-bottom: var(--spacing-lg);
        color: var(--text-primary);
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

    .hero-icon {
        font-size: 200px;
        animation: float 3s infinite;
        filter: drop-shadow(0 0 30px rgba(0, 255, 0, 0.3));
    }

    .floating-coins {
        position: absolute;
        font-size: 2rem;
        animation: float 4s infinite;
    }

    .coin-1 { top: 10%; left: 10%; animation-delay: 0s; }
    .coin-2 { top: 20%; right: 15%; animation-delay: 1s; }
    .coin-3 { bottom: 20%; left: 20%; animation-delay: 2s; }
    .coin-4 { bottom: 15%; right: 10%; animation-delay: 1.5s; }

    /* Latest Winners Section */
    .winners-section {
        margin: var(--spacing-2xl) 0;
        padding: var(--spacing-xl);
        background: rgba(0, 255, 0, 0.05);
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-lg);
    }

    .winners-section h2 {
        text-align: center;
        color: var(--accent-green);
        margin-bottom: var(--spacing-xl);
        text-shadow: 0 0 15px rgba(0, 255, 0, 0.3);
    }

    .winners-carousel {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: var(--spacing-lg);
        overflow-x: auto;
        padding-bottom: var(--spacing-md);
    }

    .winner-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--accent-gold);
        border-radius: var(--radius-lg);
        padding: var(--spacing-lg);
        text-align: center;
        transition: all var(--transition-normal);
    }

    .winner-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
    }

    .winner-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent-gold), var(--accent-pink));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto var(--spacing-md);
    }

    .winner-name {
        color: var(--accent-gold);
        font-weight: 700;
        margin-bottom: var(--spacing-sm);
    }

    .winner-amount {
        color: var(--success);
        font-size: 1.3rem;
        font-weight: 700;
    }

    /* Games Grid */
    .games-section {
        margin: var(--spacing-2xl) 0;
    }

    .games-section h2 {
        text-align: center;
        color: var(--accent-gold);
        margin-bottom: var(--spacing-xl);
        text-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
    }

    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: var(--spacing-lg);
        margin-bottom: var(--spacing-xl);
    }

    .game-card {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-lg);
        padding: var(--spacing-lg);
        text-align: center;
        transition: all var(--transition-normal);
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .game-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 255, 0, 0.1), transparent);
        transition: left 0.5s;
    }

    .game-card:hover {
        border-color: var(--accent-green);
        box-shadow: 0 0 20px rgba(0, 255, 0, 0.2);
        transform: translateY(-10px);
    }

    .game-card:hover::before {
        left: 100%;
    }

    .game-icon {
        font-size: 3rem;
        margin-bottom: var(--spacing-md);
        animation: bounce 2s infinite;
    }

    .game-name {
        color: var(--accent-gold);
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: var(--spacing-sm);
    }

    .game-description {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-bottom: var(--spacing-md);
    }

    .game-play-btn {
        background: linear-gradient(135deg, var(--accent-green), var(--accent-cyan));
        color: var(--primary-dark);
        padding: var(--spacing-md) var(--spacing-lg);
        border: none;
        border-radius: var(--radius-md);
        font-weight: 700;
        cursor: pointer;
        transition: all var(--transition-fast);
    }

    .game-play-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(0, 255, 0, 0.4);
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* Features Section */
    .features-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: var(--spacing-lg);
        margin: var(--spacing-2xl) 0;
    }

    .feature-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-lg);
        padding: var(--spacing-lg);
        text-align: center;
    }

    .feature-icon {
        font-size: 2.5rem;
        color: var(--accent-green);
        margin-bottom: var(--spacing-md);
    }

    .feature-title {
        color: var(--accent-gold);
        font-weight: 700;
        margin-bottom: var(--spacing-sm);
    }

    .feature-text {
        color: var(--text-secondary);
        font-size: 0.9rem;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.1), rgba(255, 215, 0, 0.1));
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-lg);
        padding: var(--spacing-2xl);
        text-align: center;
        margin: var(--spacing-2xl) 0;
    }

    .cta-section h2 {
        color: var(--accent-green);
        margin-bottom: var(--spacing-lg);
    }

    .cta-section p {
        font-size: 1.1rem;
        margin-bottom: var(--spacing-lg);
    }

    @media (max-width: 768px) {
        .hero {
            grid-template-columns: 1fr;
        }

        .hero-content h1 {
            font-size: 2rem;
        }

        .hero-visual {
            min-height: 300px;
        }

        .hero-icon {
            font-size: 100px;
        }

        .games-grid {
            grid-template-columns: 1fr;
        }

        .hero-cta {
            flex-direction: column;
        }

        .hero-cta .btn {
            width: 100%;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Experience Premium Casino Gaming</h1>
        <p>100% Free-to-Play Social Gaming Platform. No Real Money. Pure Entertainment.</p>
        <div class="hero-cta">
            <a href="pages/games.php" class="btn btn-primary">
                <i class="fas fa-play"></i> Play Now
            </a>
            <a href="pages/about.php" class="btn btn-secondary">
                <i class="fas fa-info-circle"></i> Learn More
            </a>
        </div>
        <div style="background: rgba(0, 255, 0, 0.1); padding: var(--spacing-md); border-radius: var(--radius-md); border-left: 3px solid var(--accent-green);">
            <p style="margin: 0; color: var(--accent-green); font-weight: 600;">
                <i class="fas fa-shield-alt"></i> Google Ads Compliant • 18+ Only • Virtual Currency
            </p>
        </div>
    </div>
    <div class="hero-visual">
        <div class="hero-icon">🎰</div>
        <div class="floating-coins coin-1">💰</div>
        <div class="floating-coins coin-2">💎</div>
        <div class="floating-coins coin-3">🎲</div>
        <div class="floating-coins coin-4">⭐</div>
    </div>
</section>

<!-- Latest Winners Section -->
<section class="winners-section">
    <h2><i class="fas fa-trophy"></i> Latest Winners</h2>
    <div class="winners-carousel">
        <div class="winner-card">
            <div class="winner-avatar">👤</div>
            <div class="winner-name">Player Alpha</div>
            <div class="winner-amount">+₹2,450</div>
        </div>
        <div class="winner-card">
            <div class="winner-avatar">👥</div>
            <div class="winner-name">Player Beta</div>
            <div class="winner-amount">+₹1,850</div>
        </div>
        <div class="winner-card">
            <div class="winner-avatar">🎯</div>
            <div class="winner-name">Player Gamma</div>
            <div class="winner-amount">+₹3,200</div>
        </div>
        <div class="winner-card">
            <div class="winner-avatar">🏆</div>
            <div class="winner-name">Player Delta</div>
            <div class="winner-amount">+₹5,500</div>
        </div>
        <div class="winner-card">
            <div class="winner-avatar">⚡</div>
            <div class="winner-name">Player Epsilon</div>
            <div class="winner-amount">+₹2,100</div>
        </div>
    </div>
</section>

<!-- Games Section -->
<section class="games-section">
    <h2><i class="fas fa-gamepad"></i> Featured Games</h2>
    <div class="games-grid">
        <div class="game-card">
            <div class="game-icon">🎲</div>
            <div class="game-name">Dice Game</div>
            <div class="game-description">Predict HIGH or LOW on two dice rolls</div>
            <a href="games/dice.php" class="game-play-btn">Play Now</a>
        </div>
        <div class="game-card">
            <div class="game-icon">🐔</div>
            <div class="game-name">Chicken Adventure</div>
            <div class="game-description">Navigate the chicken to victory</div>
            <a href="games/chicken.php" class="game-play-btn">Play Now</a>
        </div>
        <div class="game-card">
            <div class="game-icon">💣</div>
            <div class="game-name">Mines</div>
            <div class="game-description">Reveal tiles without hitting mines</div>
            <a href="games/mines.php" class="game-play-btn">Play Now</a>
        </div>
        <div class="game-card">
            <div class="game-icon">⚪</div>
            <div class="game-name">Plinko</div>
            <div class="game-description">Drop balls through pegs to win</div>
            <a href="games/plinko.php" class="game-play-btn">Play Now</a>
        </div>
        <div class="game-card">
            <div class="game-icon">🎰</div>
            <div class="game-name">Slot Machine</div>
            <div class="game-description">Classic slots with big wins</div>
            <a href="games/slots.php" class="game-play-btn">Play Now</a>
        </div>
        <div class="game-card">
            <div class="game-icon">🎡</div>
            <div class="game-name">Roulette</div>
            <div class="game-description">Spin the wheel and win big</div>
            <a href="games/roulette.php" class="game-play-btn">Play Now</a>
        </div>
        <div class="game-card">
            <div class="game-icon">🃏</div>
            <div class="game-name">Blackjack</div>
            <div class="game-description">Beat the dealer with 21</div>
            <a href="games/blackjack.php" class="game-play-btn">Play Now</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-gift"></i></div>
        <div class="feature-title">100% Free</div>
        <div class="feature-text">No deposits, no withdrawals. Pure entertainment with virtual currency.</div>
    </div>
    <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-lock"></i></div>
        <div class="feature-title">Secure & Safe</div>
        <div class="feature-text">Google Ads compliant with strict age verification and responsible gaming.</div>
    </div>
    <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-zap"></i></div>
        <div class="feature-title">Instant Play</div>
        <div class="feature-text">No login required. Start playing immediately with ₹10,000 virtual balance.</div>
    </div>
    <div class="feature-card">
        <div class="feature-icon"><i class="fas fa-star"></i></div>
        <div class="feature-title">Premium Games</div>
        <div class="feature-text">7+ carefully crafted casino games with unique mechanics and audio.</div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <h2>Ready to Play?</h2>
    <p>Join thousands of players enjoying premium casino games. Start with ₹10,000 virtual currency!</p>
    <a href="pages/games.php" class="btn btn-primary" style="font-size: 1.1rem; padding: var(--spacing-lg) var(--spacing-2xl);">
        <i class="fas fa-play"></i> Start Playing Now
    </a>
</section>

<?php include 'includes/footer.php'; ?>
