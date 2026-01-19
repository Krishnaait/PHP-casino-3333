<?php
$page_title = "Slot Machine - Casino Ventures";
include '../includes/header.php';
?>

<style>
    .game-wrapper {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: var(--spacing-lg);
        padding: var(--spacing-xl) 0;
    }

    .game-area {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-lg);
        padding: var(--spacing-xl);
    }

    .game-title {
        font-size: 2rem;
        color: var(--accent-green);
        text-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
        text-align: center;
        margin-bottom: var(--spacing-lg);
    }

    .slot-machine {
        background: linear-gradient(135deg, #2a2a2a, #1a1a1a);
        border: 3px solid var(--accent-gold);
        border-radius: var(--radius-lg);
        padding: var(--spacing-xl);
        margin: var(--spacing-lg) 0;
        box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.5), 0 0 30px rgba(255, 215, 0, 0.2);
    }

    .reels-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--spacing-md);
        margin-bottom: var(--spacing-lg);
    }

    .reel {
        background: rgba(0, 0, 0, 0.5);
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-md);
        height: 280px;
        overflow: hidden;
        position: relative;
    }

    .reel-content {
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .reel-symbol {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .reel-symbol:last-child {
        border-bottom: none;
    }

    .reel.spinning .reel-content {
        animation: spinReel 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    @keyframes spinReel {
        0% { transform: translateY(0); }
        100% { transform: translateY(-800px); }
    }

    .betting-section {
        background: rgba(255, 255, 255, 0.05);
        padding: var(--spacing-lg);
        border-radius: var(--radius-md);
        margin: var(--spacing-lg) 0;
    }

    .bet-input-group {
        margin-bottom: var(--spacing-lg);
    }

    .bet-label {
        display: block;
        color: var(--text-secondary);
        margin-bottom: var(--spacing-sm);
        font-weight: 600;
    }

    .bet-input {
        width: 100%;
        padding: var(--spacing-md);
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--accent-green);
        border-radius: var(--radius-md);
        color: var(--text-primary);
        font-size: 1rem;
        text-align: center;
    }

    .spin-btn {
        width: 100%;
        padding: var(--spacing-lg);
        background: linear-gradient(135deg, var(--accent-gold) 0%, var(--accent-pink) 100%);
        border: none;
        color: var(--primary-dark);
        font-weight: 700;
        border-radius: var(--radius-md);
        cursor: pointer;
        font-size: 1.2rem;
        transition: all var(--transition-fast);
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .spin-btn:hover:not(:disabled) {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(255, 215, 0, 0.4);
    }

    .spin-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .result-display {
        text-align: center;
        padding: var(--spacing-lg);
        background: rgba(0, 255, 0, 0.05);
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-md);
        margin: var(--spacing-lg) 0;
        display: none;
    }

    .result-text {
        font-size: 1.3rem;
        color: var(--accent-gold);
        margin-bottom: var(--spacing-md);
    }

    .result-amount {
        font-size: 2rem;
        color: var(--success);
        font-weight: 700;
    }

    /* Big Win Popup */
    .big-win-popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        background: linear-gradient(135deg, var(--accent-gold), var(--accent-pink));
        border: 3px solid var(--accent-green);
        border-radius: var(--radius-xl);
        padding: var(--spacing-2xl);
        text-align: center;
        z-index: 2000;
        box-shadow: 0 0 50px rgba(255, 215, 0, 0.5);
        animation: popupAppear 0.5s ease;
    }

    @keyframes popupAppear {
        0% { transform: translate(-50%, -50%) scale(0) rotate(-10deg); }
        50% { transform: translate(-50%, -50%) scale(1.1) rotate(5deg); }
        100% { transform: translate(-50%, -50%) scale(1) rotate(0deg); }
    }

    .big-win-popup h2 {
        font-size: 3rem;
        color: var(--primary-dark);
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        margin-bottom: var(--spacing-lg);
        animation: bounce 0.6s infinite;
    }

    .big-win-amount {
        font-size: 2.5rem;
        color: var(--primary-dark);
        font-weight: 700;
        margin-bottom: var(--spacing-lg);
    }

    .big-win-stars {
        font-size: 2rem;
        animation: spin 2s linear infinite;
    }

    .sidebar {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-lg);
    }

    .stats-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-md);
        padding: var(--spacing-lg);
    }

    .stats-title {
        color: var(--accent-gold);
        font-weight: 700;
        margin-bottom: var(--spacing-md);
        text-align: center;
    }

    .stat-row {
        display: flex;
        justify-content: space-between;
        padding: var(--spacing-sm) 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        color: var(--text-secondary);
    }

    .stat-value {
        color: var(--accent-green);
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .game-wrapper {
            grid-template-columns: 1fr;
        }

        .reel {
            height: 180px;
        }

        .reel-symbol {
            font-size: 2rem;
        }

        .big-win-popup {
            padding: var(--spacing-lg);
            width: 90%;
        }

        .big-win-popup h2 {
            font-size: 2rem;
        }

        .big-win-amount {
            font-size: 1.8rem;
        }
    }
</style>

<div class="game-wrapper">
    <div class="game-area">
        <h1 class="game-title"><i class="fas fa-dice-five"></i> Slot Machine</h1>

        <div class="slot-machine">
            <div class="reels-container">
                <div class="reel" id="reel1">
                    <div class="reel-content">
                        <div class="reel-symbol">🍎</div>
                        <div class="reel-symbol">🍊</div>
                        <div class="reel-symbol">🍋</div>
                        <div class="reel-symbol">🍌</div>
                        <div class="reel-symbol">💎</div>
                        <div class="reel-symbol">🍒</div>
                        <div class="reel-symbol">🍉</div>
                        <div class="reel-symbol">⭐</div>
                    </div>
                </div>
                <div class="reel" id="reel2">
                    <div class="reel-content">
                        <div class="reel-symbol">🍎</div>
                        <div class="reel-symbol">🍊</div>
                        <div class="reel-symbol">🍋</div>
                        <div class="reel-symbol">🍌</div>
                        <div class="reel-symbol">💎</div>
                        <div class="reel-symbol">🍒</div>
                        <div class="reel-symbol">🍉</div>
                        <div class="reel-symbol">⭐</div>
                    </div>
                </div>
                <div class="reel" id="reel3">
                    <div class="reel-content">
                        <div class="reel-symbol">🍎</div>
                        <div class="reel-symbol">🍊</div>
                        <div class="reel-symbol">🍋</div>
                        <div class="reel-symbol">🍌</div>
                        <div class="reel-symbol">💎</div>
                        <div class="reel-symbol">🍒</div>
                        <div class="reel-symbol">🍉</div>
                        <div class="reel-symbol">⭐</div>
                    </div>
                </div>
            </div>

            <div class="result-display" id="resultDisplay">
                <div class="result-text" id="resultText"></div>
                <div class="result-amount" id="resultAmount"></div>
            </div>
        </div>

        <div class="betting-section">
            <div class="bet-input-group">
                <label class="bet-label">Bet Amount (₹200 - ₹5,500)</label>
                <input type="number" id="betAmount" class="bet-input" placeholder="Enter bet amount" min="200" max="5500" value="500">
            </div>

            <button class="spin-btn" onclick="spinReels()" id="spinBtn">SPIN</button>
        </div>
    </div>

    <div class="sidebar">
        <div class="stats-card">
            <div class="stats-title"><i class="fas fa-chart-bar"></i> Game Stats</div>
            <div class="stat-row">
                <span>Total Spins</span>
                <span class="stat-value" id="totalSpins">0</span>
            </div>
            <div class="stat-row">
                <span>Wins</span>
                <span class="stat-value" id="totalWins">0</span>
            </div>
            <div class="stat-row">
                <span>Losses</span>
                <span class="stat-value" id="totalLosses">0</span>
            </div>
            <div class="stat-row">
                <span>Win Rate</span>
                <span class="stat-value" id="winRate">0%</span>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-title"><i class="fas fa-star"></i> Multipliers</div>
            <div class="stat-row">
                <span>3 Match</span>
                <span class="stat-value">5x</span>
            </div>
            <div class="stat-row">
                <span>2 Match</span>
                <span class="stat-value">2x</span>
            </div>
            <div class="stat-row">
                <span>No Match</span>
                <span class="stat-value">0x</span>
            </div>
        </div>
    </div>
</div>

<!-- Big Win Popup -->
<div class="big-win-popup" id="bigWinPopup">
    <div class="big-win-stars">✨ ✨ ✨</div>
    <h2>BIG WIN!</h2>
    <div class="big-win-amount" id="bigWinAmount">₹2,500</div>
    <div class="big-win-stars">✨ ✨ ✨</div>
</div>

<script>
    const symbols = ['🍎', '🍊', '🍋', '🍌', '💎', '🍒', '🍉', '⭐'];
    let isSpinning = false;

    async function spinReels() {
        if (isSpinning) return;

        const betAmount = parseInt(document.getElementById('betAmount').value);
        const validation = balanceManager.validateBet(betAmount);

        if (!validation.valid) {
            showToast(validation.error, 'error');
            return;
        }

        isSpinning = true;
        document.getElementById('spinBtn').disabled = true;

        // Show bet placed message
        showToast(`You bet ${balanceManager.formatCurrency(betAmount)}`, 'info');

        // Deduct bet (without showing message)
        await balanceManager.updateAfterGame(-betAmount, false);

        // Play sound
        playSound('spin');

        // Spin reels
        const reel1 = document.getElementById('reel1');
        const reel2 = document.getElementById('reel2');
        const reel3 = document.getElementById('reel3');

        reel1.classList.add('spinning');
        reel2.classList.add('spinning');
        reel3.classList.add('spinning');

        // Generate random results
        const result1 = Math.floor(Math.random() * symbols.length);
        const result2 = Math.floor(Math.random() * symbols.length);
        const result3 = Math.floor(Math.random() * symbols.length);

        // Wait for spin animation
        await new Promise(resolve => setTimeout(resolve, 600));

        // Stop reels
        reel1.classList.remove('spinning');
        reel2.classList.remove('spinning');
        reel3.classList.remove('spinning');

        // Set final positions (70px per row for 4 rows = 280px total height)
        reel1.querySelector('.reel-content').style.transform = `translateY(-${result1 * 70}px)`;
        reel2.querySelector('.reel-content').style.transform = `translateY(-${result2 * 70}px)`;
        reel3.querySelector('.reel-content').style.transform = `translateY(-${result3 * 70}px)`;

        // Check for wins
        let multiplier = 0;
        if (result1 === result2 && result2 === result3) {
            multiplier = 5;
            playSound('jackpot');
            showBigWinPopup(betAmount * multiplier);
        } else if (result1 === result2 || result2 === result3 || result1 === result3) {
            multiplier = 2;
            playSound('win');
        } else {
            playSound('lose');
        }

        // Calculate winnings
        const winAmount = betAmount * multiplier;
        if (winAmount > 0) {
            await balanceManager.updateAfterGame(winAmount, false);
            showToast(`You won ${balanceManager.formatCurrency(winAmount)}! (${multiplier}x)`, 'success');
        } else {
            showToast(`You lost ${balanceManager.formatCurrency(betAmount)}!`, 'error');
        }

        // Show result
        const resultDisplay = document.getElementById('resultDisplay');
        const resultText = document.getElementById('resultText');
        const resultAmount = document.getElementById('resultAmount');

        resultText.textContent = multiplier > 0 ? `${multiplier}x WIN!` : 'No Match';
        resultAmount.textContent = winAmount > 0 ? `+${balanceManager.formatCurrency(winAmount)}` : `-${balanceManager.formatCurrency(betAmount)}`;
        resultAmount.style.color = winAmount > 0 ? 'var(--success)' : 'var(--error)';
        resultDisplay.style.display = 'block';

        // Update stats
        updateStats(multiplier > 0);

        isSpinning = false;
        document.getElementById('spinBtn').disabled = false;
    }

    function showBigWinPopup(amount) {
        const popup = document.getElementById('bigWinPopup');
        document.getElementById('bigWinAmount').textContent = balanceManager.formatCurrency(amount);
        popup.style.display = 'block';
        popup.style.transform = 'translate(-50%, -50%) scale(1)';

        setTimeout(() => {
            popup.style.transform = 'translate(-50%, -50%) scale(0)';
            setTimeout(() => {
                popup.style.display = 'none';
            }, 500);
        }, 3000);
    }

    function updateStats(won) {
        const totalSpins = parseInt(document.getElementById('totalSpins').textContent) + 1;
        const totalWins = parseInt(document.getElementById('totalWins').textContent) + (won ? 1 : 0);
        const totalLosses = totalSpins - totalWins;
        const winRate = ((totalWins / totalSpins) * 100).toFixed(1);

        document.getElementById('totalSpins').textContent = totalSpins;
        document.getElementById('totalWins').textContent = totalWins;
        document.getElementById('totalLosses').textContent = totalLosses;
        document.getElementById('winRate').textContent = winRate + '%';
    }
</script>

<?php include '../includes/footer.php'; ?>
