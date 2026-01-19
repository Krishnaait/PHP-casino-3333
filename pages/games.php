<?php
$page_title = "Play Games - Casino Ventures";
include '../includes/header.php';
?>

<style>
    .games-container {
        padding: var(--spacing-xl) 0;
    }

    .games-header {
        text-align: center;
        margin-bottom: var(--spacing-2xl);
    }

    .games-header h1 {
        color: var(--accent-green);
        text-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
        margin-bottom: var(--spacing-md);
    }

    .games-header p {
        font-size: 1.1rem;
        color: var(--text-secondary);
    }

    .games-filter {
        display: flex;
        gap: var(--spacing-md);
        justify-content: center;
        margin-bottom: var(--spacing-xl);
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: var(--spacing-md) var(--spacing-lg);
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        color: var(--text-primary);
        border-radius: var(--radius-md);
        cursor: pointer;
        transition: all var(--transition-fast);
        font-weight: 600;
    }

    .filter-btn:hover,
    .filter-btn.active {
        border-color: var(--accent-green);
        background: rgba(0, 255, 0, 0.1);
        color: var(--accent-green);
    }

    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: var(--spacing-xl);
        margin-bottom: var(--spacing-2xl);
    }

    .game-card-large {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-lg);
        overflow: hidden;
        transition: all var(--transition-normal);
        cursor: pointer;
        position: relative;
    }

    .game-card-large:hover {
        border-color: var(--accent-green);
        box-shadow: 0 0 30px rgba(0, 255, 0, 0.2);
        transform: translateY(-15px);
    }

    .game-card-header {
        background: linear-gradient(135deg, rgba(0, 255, 0, 0.1), rgba(255, 215, 0, 0.1));
        padding: var(--spacing-xl);
        text-align: center;
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
    }

    .game-card-icon {
        font-size: 4rem;
        margin-bottom: var(--spacing-md);
        animation: bounce 2s infinite;
    }

    .game-card-title {
        font-size: 1.5rem;
        color: var(--accent-gold);
        font-weight: 700;
        margin-bottom: var(--spacing-sm);
    }

    .game-card-body {
        padding: var(--spacing-lg);
    }

    .game-card-description {
        color: var(--text-secondary);
        margin-bottom: var(--spacing-md);
        line-height: 1.6;
    }

    .game-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--spacing-md);
        margin-bottom: var(--spacing-lg);
        padding-bottom: var(--spacing-lg);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .stat-item {
        text-align: center;
    }

    .stat-label {
        color: var(--text-muted);
        font-size: 0.85rem;
        margin-bottom: var(--spacing-xs);
    }

    .stat-value {
        color: var(--accent-green);
        font-size: 1.3rem;
        font-weight: 700;
    }

    .game-features {
        margin-bottom: var(--spacing-lg);
    }

    .game-feature {
        display: flex;
        align-items: center;
        gap: var(--spacing-sm);
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-bottom: var(--spacing-sm);
    }

    .game-feature i {
        color: var(--accent-green);
    }

    .game-play-link {
        display: block;
        background: linear-gradient(135deg, var(--accent-gold) 0%, var(--accent-pink) 100%);
        color: var(--primary-dark);
        text-align: center;
        padding: var(--spacing-md) var(--spacing-lg);
        border-radius: var(--radius-md);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all var(--transition-fast);
        text-decoration: none;
    }

    .game-play-link:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.4);
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @media (max-width: 768px) {
        .games-grid {
            grid-template-columns: 1fr;
        }

        .game-card-icon {
            font-size: 2.5rem;
        }

        .games-filter {
            flex-direction: column;
        }

        .filter-btn {
            width: 100%;
        }
    }
</style>

<div class="games-container">
    <!-- Header -->
    <div class="games-header">
        <h1><i class="fas fa-gamepad"></i> All Games</h1>
        <p>Choose from our collection of premium casino games. All games are 100% free-to-play!</p>
    </div>

    <!-- Filter Buttons -->
    <div class="games-filter">
        <button class="filter-btn active" onclick="filterGames('all')">All Games</button>
        <button class="filter-btn" onclick="filterGames('classic')">Classic</button>
        <button class="filter-btn" onclick="filterGames('strategy')">Strategy</button>
        <button class="filter-btn" onclick="filterGames('luck')">Luck-Based</button>
    </div>

    <!-- Games Grid -->
    <div class="games-grid">
        <!-- Dice Game -->
        <div class="game-card-large" data-category="classic">
            <div class="game-card-header">
                <div class="game-card-icon">🎲</div>
                <div class="game-card-title">Dice Game</div>
            </div>
            <div class="game-card-body">
                <div class="game-card-description">
                    Predict whether two dice will roll HIGH (8-12) or LOW (2-7). Simple, fast, and thrilling!
                </div>
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Multiplier</div>
                        <div class="stat-value">2x</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">RTP</div>
                        <div class="stat-value">98%</div>
                    </div>
                </div>
                <div class="game-features">
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Instant Results</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Animated Dice</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Sound Effects</span>
                    </div>
                </div>
                <a href="games/dice.php" class="game-play-link">Play Dice</a>
            </div>
        </div>

        <!-- Chicken Adventure -->
        <div class="game-card-large" data-category="strategy">
            <div class="game-card-header">
                <div class="game-card-icon">🐔</div>
                <div class="game-card-title">Chicken Adventure</div>
            </div>
            <div class="game-card-body">
                <div class="game-card-description">
                    Navigate your chicken through obstacles to reach the finish line. Collect coins for bonus points!
                </div>
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Multiplier</div>
                        <div class="stat-value">Variable</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">RTP</div>
                        <div class="stat-value">95%</div>
                    </div>
                </div>
                <div class="game-features">
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Skill-Based</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Cashout Anytime</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Physics Engine</span>
                    </div>
                </div>
                <a href="games/chicken.php" class="game-play-link">Play Chicken</a>
            </div>
        </div>

        <!-- Mines -->
        <div class="game-card-large" data-category="strategy">
            <div class="game-card-header">
                <div class="game-card-icon">💣</div>
                <div class="game-card-title">Mines</div>
            </div>
            <div class="game-card-body">
                <div class="game-card-description">
                    Reveal tiles without hitting mines. Each safe tile increases your multiplier. Cash out anytime!
                </div>
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Multiplier</div>
                        <div class="stat-value">Variable</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">RTP</div>
                        <div class="stat-value">96%</div>
                    </div>
                </div>
                <div class="game-features">
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Strategic Gameplay</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Progressive Multiplier</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Strategic Gameplay</span>
                    </div>
                </div>
                <a href="games/mines.php" class="game-play-link">Play Mines</a>
            </div>
        </div>

        <!-- Plinko -->
        <div class="game-card-large" data-category="luck">
            <div class="game-card-header">
                <div class="game-card-icon">⚪</div>
                <div class="game-card-title">Plinko</div>
            </div>
            <div class="game-card-body">
                <div class="game-card-description">
                    Drop balls through pegs and watch them bounce to multiplier slots. Drop multiple balls at once!
                </div>
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Multiplier</div>
                        <div class="stat-value">1x - 5x</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">RTP</div>
                        <div class="stat-value">97%</div>
                    </div>
                </div>
                <div class="game-features">
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Physics Simulation</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Multiple Balls</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Smooth Animation</span>
                    </div>
                </div>
                <a href="games/plinko.php" class="game-play-link">Play Plinko</a>
            </div>
        </div>

        <!-- Slot Machine -->
        <div class="game-card-large" data-category="luck">
            <div class="game-card-header">
                <div class="game-card-icon">🎰</div>
                <div class="game-card-title">Slot Machine</div>
            </div>
            <div class="game-card-body">
                <div class="game-card-description">
                    Classic 4-row slot machine with exciting animations and big win popups. Spin and win!
                </div>
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Multiplier</div>
                        <div class="stat-value">Variable</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">RTP</div>
                        <div class="stat-value">96%</div>
                    </div>
                </div>
                <div class="game-features">
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>4-Row Reels</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Big Win Popups</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Unique Audio</span>
                    </div>
                </div>
                <a href="games/slots.php" class="game-play-link">Play Slots</a>
            </div>
        </div>

        <!-- Roulette -->
        <div class="game-card-large" data-category="classic">
            <div class="game-card-header">
                <div class="game-card-icon">🎡</div>
                <div class="game-card-title">Roulette</div>
            </div>
            <div class="game-card-body">
                <div class="game-card-description">
                    Spin the wheel and predict where it will land. Multiple betting options for every style!
                </div>
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Multiplier</div>
                        <div class="stat-value">Variable</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">RTP</div>
                        <div class="stat-value">97.3%</div>
                    </div>
                </div>
                <div class="game-features">
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Multiple Bets</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Smooth Wheel</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Real-Time Odds</span>
                    </div>
                </div>
                <a href="games/roulette.php" class="game-play-link">Play Roulette</a>
            </div>
        </div>

        <!-- Blackjack -->
        <div class="game-card-large" data-category="strategy">
            <div class="game-card-header">
                <div class="game-card-icon">🃏</div>
                <div class="game-card-title">Blackjack</div>
            </div>
            <div class="game-card-body">
                <div class="game-card-description">
                    Beat the dealer by getting 21 or less. Classic card game with strategic decisions!
                </div>
                <div class="game-stats">
                    <div class="stat-item">
                        <div class="stat-label">Multiplier</div>
                        <div class="stat-value">Variable</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">RTP</div>
                        <div class="stat-value">99.5%</div>
                    </div>
                </div>
                <div class="game-features">
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Hit/Stand/Double</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Smart Dealer AI</span>
                    </div>
                    <div class="game-feature">
                        <i class="fas fa-check"></i>
                        <span>Card Counting</span>
                    </div>
                </div>
                <a href="games/blackjack.php" class="game-play-link">Play Blackjack</a>
            </div>
        </div>
    </div>
</div>

<script>
    function filterGames(category) {
        const games = document.querySelectorAll('.game-card-large');
        const buttons = document.querySelectorAll('.filter-btn');
        
        // Update button states
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
        
        // Filter games
        games.forEach(game => {
            if (category === 'all' || game.dataset.category === category) {
                game.style.display = 'block';
                setTimeout(() => game.style.opacity = '1', 10);
            } else {
                game.style.opacity = '0';
                setTimeout(() => game.style.display = 'none', 300);
            }
        });
    }
</script>

<?php include '../includes/footer.php'; ?>
