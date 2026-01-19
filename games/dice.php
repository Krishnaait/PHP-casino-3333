<?php
$page_title = "Dice Game - Casino Ventures";
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

    .dice-display {
        display: flex;
        justify-content: center;
        gap: var(--spacing-xl);
        margin: var(--spacing-xl) 0;
    }

    .dice {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, var(--accent-gold), var(--accent-pink));
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        box-shadow: 0 8px 20px rgba(255, 215, 0, 0.3);
        animation: rollDice 0.6s ease-in-out;
    }

    @keyframes rollDice {
        0%, 100% { transform: rotateX(0) rotateY(0); }
        50% { transform: rotateX(360deg) rotateY(360deg); }
    }

    .dice.rolling {
        animation: rollDice 0.6s ease-in-out infinite;
    }

    .result-display {
        text-align: center;
        padding: var(--spacing-lg);
        background: rgba(0, 255, 0, 0.05);
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-md);
        margin: var(--spacing-lg) 0;
    }

    .result-text {
        font-size: 1.5rem;
        color: var(--accent-gold);
        margin-bottom: var(--spacing-md);
    }

    .result-amount {
        font-size: 2rem;
        color: var(--success);
        font-weight: 700;
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

    .prediction-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--spacing-md);
        margin: var(--spacing-lg) 0;
    }

    .prediction-btn {
        padding: var(--spacing-lg);
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        color: var(--text-primary);
        border-radius: var(--radius-md);
        cursor: pointer;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all var(--transition-fast);
    }

    .prediction-btn:hover {
        border-color: var(--accent-green);
        background: rgba(0, 255, 0, 0.1);
    }

    .prediction-btn.selected {
        border-color: var(--accent-gold);
        background: rgba(255, 215, 0, 0.1);
        color: var(--accent-gold);
    }

    .play-btn {
        width: 100%;
        padding: var(--spacing-lg);
        background: linear-gradient(135deg, var(--accent-green), var(--accent-cyan));
        border: none;
        color: var(--primary-dark);
        font-weight: 700;
        border-radius: var(--radius-md);
        cursor: pointer;
        font-size: 1.1rem;
        transition: all var(--transition-fast);
        text-transform: uppercase;
    }

    .play-btn:hover:not(:disabled) {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(0, 255, 0, 0.4);
    }

    .play-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
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

    .stat-row:last-child {
        border-bottom: none;
    }

    .stat-value {
        color: var(--accent-green);
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .game-wrapper {
            grid-template-columns: 1fr;
        }

        .dice {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }

        .prediction-buttons {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="game-wrapper">
    <div class="game-area">
        <h1 class="game-title"><i class="fas fa-dice"></i> Dice Game</h1>
        
        <div class="result-display" id="resultDisplay" style="display: none;">
            <div class="result-text" id="resultText"></div>
            <div class="result-amount" id="resultAmount"></div>
        </div>

        <div class="dice-display">
            <div class="dice" id="dice1">🎲</div>
            <div class="dice" id="dice2">🎲</div>
        </div>

        <div class="betting-section">
            <div class="bet-input-group">
                <label class="bet-label">Bet Amount (₹200 - ₹5,500)</label>
                <input type="number" id="betAmount" class="bet-input" placeholder="Enter bet amount" min="200" max="5500" value="500">
            </div>

            <div class="bet-input-group">
                <label class="bet-label">Predict the Result</label>
                <div class="prediction-buttons">
                    <button class="prediction-btn" onclick="selectPrediction('high')">
                        <i class="fas fa-arrow-up"></i> HIGH (8-12)
                    </button>
                    <button class="prediction-btn" onclick="selectPrediction('low')">
                        <i class="fas fa-arrow-down"></i> LOW (2-7)
                    </button>
                </div>
            </div>

            <button class="play-btn" onclick="playGame()" id="playBtn">Roll Dice</button>
        </div>
    </div>

    <div class="sidebar">
        <div class="stats-card">
            <div class="stats-title"><i class="fas fa-chart-bar"></i> Game Stats</div>
            <div class="stat-row">
                <span>Total Games</span>
                <span class="stat-value" id="totalGames">0</span>
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
            <div class="stats-title"><i class="fas fa-info-circle"></i> How to Play</div>
            <p style="font-size: 0.9rem; color: var(--text-secondary); margin: 0;">
                1. Enter your bet amount<br>
                2. Predict HIGH or LOW<br>
                3. Click Roll Dice<br>
                4. Win 2x your bet if correct!
            </p>
        </div>

        <div class="stats-card">
            <div class="stats-title"><i class="fas fa-star"></i> Features</div>
            <p style="font-size: 0.9rem; color: var(--text-secondary); margin: 0;">
                ✓ Instant Results<br>
                ✓ 2x Multiplier<br>
                ✓ Animated Dice<br>
                ✓ Sound Effects<br>
                ✓ 98% RTP
            </p>
        </div>
    </div>
</div>

<script>
    let selectedPrediction = null;
    let isPlaying = false;

    function selectPrediction(prediction) {
        selectedPrediction = prediction;
        document.querySelectorAll('.prediction-btn').forEach(btn => {
            btn.classList.remove('selected');
        });
        event.target.closest('.prediction-btn').classList.add('selected');
    }

    async function playGame() {
        if (!selectedPrediction) {
            showToast('Please select HIGH or LOW', 'warning');
            return;
        }

        const betAmount = parseInt(document.getElementById('betAmount').value);
        const validation = balanceManager.validateBet(betAmount);

        if (!validation.valid) {
            showToast(validation.error, 'error');
            return;
        }

        isPlaying = true;
        document.getElementById('playBtn').disabled = true;

        // Deduct bet from balance
        await balanceManager.updateAfterGame(-betAmount);

        // Animate dice rolling
        const dice1 = document.getElementById('dice1');
        const dice2 = document.getElementById('dice2');
        dice1.classList.add('rolling');
        dice2.classList.add('rolling');

        // Play sound
        playSound('spin');

        // Simulate rolling
        await new Promise(resolve => setTimeout(resolve, 1000));

        // Generate results
        const result1 = Math.floor(Math.random() * 6) + 1;
        const result2 = Math.floor(Math.random() * 6) + 1;
        const total = result1 + result2;

        // Update dice display
        dice1.classList.remove('rolling');
        dice2.classList.remove('rolling');
        dice1.textContent = result1;
        dice2.textContent = result2;

        // Determine win/loss
        const isHigh = total >= 8;
        const won = (selectedPrediction === 'high' && isHigh) || (selectedPrediction === 'low' && !isHigh);

        // Calculate winnings
        let winAmount = 0;
        if (won) {
            winAmount = betAmount * 2;
            await balanceManager.updateAfterGame(winAmount);
            playSound('win');
            showToast(`You won ${balanceManager.formatCurrency(winAmount)}!`, 'success');
        } else {
            playSound('lose');
            showToast('Better luck next time!', 'error');
        }

        // Show result
        const resultDisplay = document.getElementById('resultDisplay');
        const resultText = document.getElementById('resultText');
        const resultAmount = document.getElementById('resultAmount');

        resultText.textContent = `Total: ${total} - ${isHigh ? 'HIGH' : 'LOW'} - ${won ? 'YOU WIN!' : 'YOU LOSE!'}`;
        resultAmount.textContent = won ? `+${balanceManager.formatCurrency(winAmount)}` : `-${balanceManager.formatCurrency(betAmount)}`;
        resultAmount.style.color = won ? 'var(--success)' : 'var(--error)';
        resultDisplay.style.display = 'block';

        // Update stats
        updateStats(won);

        isPlaying = false;
        document.getElementById('playBtn').disabled = false;
    }

    function updateStats(won) {
        // This would typically fetch from server
        const totalGames = parseInt(document.getElementById('totalGames').textContent) + 1;
        const totalWins = parseInt(document.getElementById('totalWins').textContent) + (won ? 1 : 0);
        const totalLosses = totalGames - totalWins;
        const winRate = ((totalWins / totalGames) * 100).toFixed(1);

        document.getElementById('totalGames').textContent = totalGames;
        document.getElementById('totalWins').textContent = totalWins;
        document.getElementById('totalLosses').textContent = totalLosses;
        document.getElementById('winRate').textContent = winRate + '%';
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        selectPrediction('high');
    });
</script>

<?php include '../includes/footer.php'; ?>
