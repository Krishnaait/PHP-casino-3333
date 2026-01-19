<?php
$page_title = "Roulette - Casino Ventures";
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

    .roulette-wheel {
        width: 300px;
        height: 300px;
        margin: var(--spacing-xl) auto;
        position: relative;
        background: radial-gradient(circle, var(--accent-gold), var(--accent-pink));
        border-radius: 50%;
        border: 5px solid var(--accent-green);
        box-shadow: 0 0 40px rgba(0, 255, 0, 0.3), inset 0 0 20px rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
    }

    .roulette-wheel.spinning {
        animation: wheelSpin 2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    @keyframes wheelSpin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(1800deg); }
    }

    .wheel-pointer {
        position: absolute;
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        border-top: 30px solid var(--accent-green);
        z-index: 10;
        filter: drop-shadow(0 0 5px rgba(0, 255, 0, 0.5));
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
        grid-template-columns: repeat(3, 1fr);
        gap: var(--spacing-md);
        margin: var(--spacing-lg) 0;
    }

    .prediction-btn {
        padding: var(--spacing-md);
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        color: var(--text-primary);
        border-radius: var(--radius-md);
        cursor: pointer;
        font-weight: 700;
        transition: all var(--transition-fast);
        font-size: 0.9rem;
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

    .spin-btn {
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

    .spin-btn:hover:not(:disabled) {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(0, 255, 0, 0.4);
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
        font-size: 0.9rem;
    }

    .stat-value {
        color: var(--accent-green);
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .game-wrapper {
            grid-template-columns: 1fr;
        }

        .roulette-wheel {
            width: 200px;
            height: 200px;
            font-size: 2rem;
        }

        .prediction-buttons {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<div class="game-wrapper">
    <div class="game-area">
        <h1 class="game-title"><i class="fas fa-circle"></i> Roulette</h1>

        <div style="position: relative; display: inline-block; width: 100%; text-align: center;">
            <div class="wheel-pointer"></div>
            <div class="roulette-wheel" id="rouletteWheel">🎡</div>
        </div>

        <div class="betting-section">
            <div class="bet-input-group">
                <label class="bet-label">Bet Amount (₹200 - ₹5,500)</label>
                <input type="number" id="betAmount" class="bet-input" placeholder="Enter bet amount" min="200" max="5500" value="500">
            </div>

            <div class="bet-input-group">
                <label class="bet-label">Predict the Color</label>
                <div class="prediction-buttons">
                    <button class="prediction-btn" onclick="selectPrediction('red')" style="background: rgba(255, 0, 0, 0.1); border-color: #ff0000;">
                        🔴 Red
                    </button>
                    <button class="prediction-btn" onclick="selectPrediction('black')" style="background: rgba(0, 0, 0, 0.3); border-color: #ffffff;">
                        ⚫ Black
                    </button>
                    <button class="prediction-btn" onclick="selectPrediction('green')" style="background: rgba(0, 255, 0, 0.1); border-color: #00ff00;">
                        🟢 Green
                    </button>
                </div>
            </div>

            <button class="spin-btn" onclick="spinWheel()" id="spinBtn">SPIN WHEEL</button>
        </div>

        <div class="result-display" id="resultDisplay">
            <div class="result-text" id="resultText"></div>
            <div class="result-amount" id="resultAmount"></div>
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
            <div class="stats-title"><i class="fas fa-star"></i> Payouts</div>
            <div class="stat-row">
                <span>Red/Black</span>
                <span class="stat-value">2x</span>
            </div>
            <div class="stat-row">
                <span>Green</span>
                <span class="stat-value">14x</span>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-title"><i class="fas fa-info-circle"></i> Odds</div>
            <div class="stat-row">
                <span>Red: 48.6%</span>
            </div>
            <div class="stat-row">
                <span>Black: 48.6%</span>
            </div>
            <div class="stat-row">
                <span>Green: 2.7%</span>
            </div>
        </div>
    </div>
</div>

<script>
    const colors = ['red', 'black', 'red', 'black', 'red', 'black', 'green', 'red', 'black'];
    const multipliers = { 'red': 2, 'black': 2, 'green': 14 };
    let selectedPrediction = null;
    let isSpinning = false;

    function selectPrediction(prediction) {
        selectedPrediction = prediction;
        document.querySelectorAll('.prediction-btn').forEach(btn => {
            btn.classList.remove('selected');
        });
        event.target.closest('.prediction-btn').classList.add('selected');
    }

    async function spinWheel() {
        if (isSpinning) return;
        if (!selectedPrediction) {
            showToast('Please select a color', 'warning');
            return;
        }

        const betAmount = parseInt(document.getElementById('betAmount').value);
        const validation = balanceManager.validateBet(betAmount);

        if (!validation.valid) {
            showToast(validation.error, 'error');
            return;
        }

        isSpinning = true;
        document.getElementById('spinBtn').disabled = true;

        // Deduct bet
        await balanceManager.updateAfterGame(-betAmount);

        // Play sound
        playSound('spin');

        // Spin wheel
        const wheel = document.getElementById('rouletteWheel');
        wheel.classList.add('spinning');

        // Generate result
        const result = colors[Math.floor(Math.random() * colors.length)];

        // Wait for spin
        await new Promise(resolve => setTimeout(resolve, 2000));

        wheel.classList.remove('spinning');

        // Check win
        const won = result === selectedPrediction;
        const multiplier = multipliers[result];
        const winAmount = won ? betAmount * multiplier : 0;

        if (won) {
            await balanceManager.updateAfterGame(winAmount);
            playSound('win');
        } else {
            playSound('lose');
        }

        // Show result
        const resultDisplay = document.getElementById('resultDisplay');
        const resultText = document.getElementById('resultText');
        const resultAmount = document.getElementById('resultAmount');

        const colorEmoji = { 'red': '🔴', 'black': '⚫', 'green': '🟢' };
        resultText.textContent = `${colorEmoji[result]} ${result.toUpperCase()} - ${won ? 'YOU WIN!' : 'YOU LOSE!'}`;
        resultAmount.textContent = won ? `+${balanceManager.formatCurrency(winAmount)}` : `-${balanceManager.formatCurrency(betAmount)}`;
        resultAmount.style.color = won ? 'var(--success)' : 'var(--error)';
        resultDisplay.style.display = 'block';

        // Update stats
        updateStats(won);

        isSpinning = false;
        document.getElementById('spinBtn').disabled = false;
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

    document.addEventListener('DOMContentLoaded', function() {
        selectPrediction('red');
    });
</script>

<?php include '../includes/footer.php'; ?>
