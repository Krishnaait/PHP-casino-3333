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

    .roulette-container {
        position: relative;
        width: 350px;
        height: 350px;
        margin: var(--spacing-xl) auto;
    }

    .wheel-pointer {
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        border-top: 30px solid var(--accent-green);
        z-index: 10;
        filter: drop-shadow(0 0 10px rgba(0, 255, 0, 0.8));
    }

    #rouletteCanvas {
        display: block;
        margin: 0 auto;
        filter: drop-shadow(0 0 20px rgba(0, 255, 0, 0.3));
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
        margin-bottom: var(--spacing-lg);
    }

    .prediction-btn {
        padding: var(--spacing-md);
        border: 2px solid transparent;
        border-radius: var(--radius-md);
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all var(--transition-fast);
        background: rgba(255, 255, 255, 0.05);
        color: var(--text-primary);
    }

    .prediction-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 255, 0, 0.3);
    }

    .prediction-btn.selected {
        border-color: var(--accent-green);
        background: rgba(0, 255, 0, 0.1);
        box-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
    }

    .spin-btn {
        width: 100%;
        padding: var(--spacing-lg);
        background: linear-gradient(135deg, var(--accent-green), var(--accent-cyan));
        border: none;
        border-radius: var(--radius-md);
        color: var(--primary-dark);
        font-weight: 700;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all var(--transition-fast);
        box-shadow: 0 5px 20px rgba(0, 255, 0, 0.3);
    }

    .spin-btn:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 255, 0, 0.5);
    }

    .spin-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .result-display {
        margin-top: var(--spacing-lg);
        padding: var(--spacing-lg);
        background: rgba(0, 255, 0, 0.05);
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-md);
        text-align: center;
        display: none;
    }

    .result-display.show {
        display: block;
        animation: slideInUp 0.5s ease;
    }

    .result-text {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--accent-green);
        margin-bottom: var(--spacing-sm);
    }

    .result-amount {
        font-size: 1.5rem;
        font-weight: 700;
    }

    .sidebar {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-lg);
    }

    .stats-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-lg);
        padding: var(--spacing-lg);
    }

    .stats-title {
        color: var(--accent-green);
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: var(--spacing-md);
        display: flex;
        align-items: center;
        gap: var(--spacing-sm);
    }

    .stat-row {
        display: flex;
        justify-content: space-between;
        padding: var(--spacing-sm) 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        color: var(--text-secondary);
    }

    .stat-row:last-child {
        border-bottom: none;
    }

    .stat-row-value {
        color: var(--accent-gold);
        font-weight: 700;
    }

    .multipliers-card {
        background: rgba(255, 215, 0, 0.05);
        border: 1px solid rgba(255, 215, 0, 0.2);
    }

    .multiplier-row {
        display: flex;
        justify-content: space-between;
        padding: var(--spacing-sm);
        margin: var(--spacing-xs) 0;
        background: rgba(255, 255, 255, 0.03);
        border-radius: var(--radius-sm);
    }

    .odds-card {
        background: rgba(0, 255, 255, 0.05);
        border: 1px solid rgba(0, 255, 255, 0.2);
    }

    @media (max-width: 768px) {
        .game-wrapper {
            grid-template-columns: 1fr;
        }

        .roulette-container {
            width: 280px;
            height: 280px;
        }

        #rouletteCanvas {
            width: 280px !important;
            height: 280px !important;
        }
    }
</style>

<div class="game-wrapper">
    <div class="game-area">
        <h1 class="game-title">🎰 Roulette</h1>

        <div class="roulette-container">
            <div class="wheel-pointer"></div>
            <canvas id="rouletteCanvas" width="350" height="350"></canvas>
        </div>

        <div class="betting-section">
            <div class="bet-input-group">
                <label class="bet-label">Bet Amount (₹200 - ₹5,500)</label>
                <input type="number" id="betAmount" class="bet-input" min="200" max="5500" value="500" placeholder="Enter bet amount">
            </div>

            <label class="bet-label">Predict the Color</label>
            <div class="prediction-buttons">
                <button class="prediction-btn" onclick="selectPrediction('red')">🔴 Red</button>
                <button class="prediction-btn" onclick="selectPrediction('black')">⚫ Black</button>
                <button class="prediction-btn" onclick="selectPrediction('green')">🟢 Green</button>
            </div>

            <button class="spin-btn" id="spinBtn" onclick="spinWheel()">SPIN WHEEL</button>

            <div class="result-display" id="resultDisplay">
                <div class="result-text" id="resultText"></div>
                <div class="result-amount" id="resultAmount"></div>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="stats-card">
            <div class="stats-title"><i class="fas fa-chart-bar"></i> Game Stats</div>
            <div class="stat-row">
                <span>Total Spins</span>
                <span class="stat-row-value" id="totalSpins">0</span>
            </div>
            <div class="stat-row">
                <span>Wins</span>
                <span class="stat-row-value" id="wins">0</span>
            </div>
            <div class="stat-row">
                <span>Losses</span>
                <span class="stat-row-value" id="losses">0</span>
            </div>
            <div class="stat-row">
                <span>Win Rate</span>
                <span class="stat-row-value" id="winRate">0%</span>
            </div>
        </div>

        <div class="stats-card multipliers-card">
            <div class="stats-title"><i class="fas fa-star"></i> Multipliers</div>
            <div class="multiplier-row">
                <span>Red/Black</span>
                <span class="stat-row-value">2x</span>
            </div>
            <div class="multiplier-row">
                <span>Green</span>
                <span class="stat-row-value">14x</span>
            </div>
        </div>

        <div class="stats-card odds-card">
            <div class="stats-title"><i class="fas fa-dice"></i> Odds</div>
            <div class="stat-row">
                <span>Red</span>
                <span class="stat-row-value">48.6%</span>
            </div>
            <div class="stat-row">
                <span>Black</span>
                <span class="stat-row-value">48.6%</span>
            </div>
            <div class="stat-row">
                <span>Green</span>
                <span class="stat-row-value">2.7%</span>
            </div>
        </div>
    </div>
</div>

<script>
    let isSpinning = false;
    let selectedPrediction = null;
    let totalSpins = 0;
    let wins = 0;
    let losses = 0;

    // Roulette wheel configuration (European style: 0-36)
    const wheelNumbers = [
        { num: 0, color: 'green' },
        { num: 32, color: 'red' }, { num: 15, color: 'black' }, { num: 19, color: 'red' },
        { num: 4, color: 'black' }, { num: 21, color: 'red' }, { num: 2, color: 'black' },
        { num: 25, color: 'red' }, { num: 17, color: 'black' }, { num: 34, color: 'red' },
        { num: 6, color: 'black' }, { num: 27, color: 'red' }, { num: 13, color: 'black' },
        { num: 36, color: 'red' }, { num: 11, color: 'black' }, { num: 30, color: 'red' },
        { num: 8, color: 'black' }, { num: 23, color: 'red' }, { num: 10, color: 'black' },
        { num: 5, color: 'red' }, { num: 24, color: 'black' }, { num: 16, color: 'red' },
        { num: 33, color: 'black' }, { num: 1, color: 'red' }, { num: 20, color: 'black' },
        { num: 14, color: 'red' }, { num: 31, color: 'black' }, { num: 9, color: 'red' },
        { num: 22, color: 'black' }, { num: 18, color: 'red' }, { num: 29, color: 'black' },
        { num: 7, color: 'red' }, { num: 28, color: 'black' }, { num: 12, color: 'red' },
        { num: 35, color: 'black' }, { num: 3, color: 'red' }, { num: 26, color: 'black' }
    ];

    // Canvas setup
    const canvas = document.getElementById('rouletteCanvas');
    const ctx = canvas.getContext('2d');
    let currentRotation = 0;
    let targetRotation = 0;
    let isAnimating = false;

    // Draw the roulette wheel
    function drawWheel(rotation = 0) {
        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;
        const radius = 150;
        const segmentAngle = (2 * Math.PI) / wheelNumbers.length;

        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Draw outer rim
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius + 10, 0, 2 * Math.PI);
        ctx.fillStyle = '#FFD700';
        ctx.fill();
        ctx.strokeStyle = '#00ff00';
        ctx.lineWidth = 3;
        ctx.stroke();

        // Draw segments
        wheelNumbers.forEach((segment, index) => {
            const startAngle = rotation + index * segmentAngle;
            const endAngle = startAngle + segmentAngle;

            // Draw segment
            ctx.beginPath();
            ctx.moveTo(centerX, centerY);
            ctx.arc(centerX, centerY, radius, startAngle, endAngle);
            ctx.closePath();

            // Fill with color
            if (segment.color === 'red') {
                ctx.fillStyle = '#dc143c';
            } else if (segment.color === 'black') {
                ctx.fillStyle = '#1a1a1a';
            } else {
                ctx.fillStyle = '#00ff00';
            }
            ctx.fill();

            // Draw segment border
            ctx.strokeStyle = '#FFD700';
            ctx.lineWidth = 2;
            ctx.stroke();

            // Draw number
            const textAngle = startAngle + segmentAngle / 2;
            const textRadius = radius * 0.75;
            const textX = centerX + Math.cos(textAngle) * textRadius;
            const textY = centerY + Math.sin(textAngle) * textRadius;

            ctx.save();
            ctx.translate(textX, textY);
            ctx.rotate(textAngle + Math.PI / 2);
            ctx.fillStyle = '#ffffff';
            ctx.font = 'bold 14px Arial';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText(segment.num, 0, 0);
            ctx.restore();
        });

        // Draw center circle
        ctx.beginPath();
        ctx.arc(centerX, centerY, 25, 0, 2 * Math.PI);
        ctx.fillStyle = '#FFD700';
        ctx.fill();
        ctx.strokeStyle = '#00ff00';
        ctx.lineWidth = 3;
        ctx.stroke();

        // Draw center text
        ctx.fillStyle = '#000000';
        ctx.font = 'bold 12px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText('SPIN', centerX, centerY);
    }

    // Initial draw
    drawWheel(currentRotation);

    function selectPrediction(color) {
        if (isSpinning) return;
        
        playSound('click');
        selectedPrediction = color;
        
        // Update button states
        document.querySelectorAll('.prediction-btn').forEach(btn => {
            btn.classList.remove('selected');
        });
        event.target.classList.add('selected');
    }

    async function spinWheel() {
        if (isSpinning) return;
        if (!selectedPrediction) {
            showToast('Please select a color', 'warning');
            return;
        }

        const betAmount = parseInt(document.getElementById('betAmount').value) || 0;
        const validation = balanceManager.validateBet(betAmount);

        if (!validation.valid) {
            showToast(validation.error, 'error');
            return;
        }

        isSpinning = true;
        document.getElementById('spinBtn').disabled = true;
        document.getElementById('resultDisplay').classList.remove('show');

        // Show bet placed message
        showToast(`You bet ${balanceManager.formatCurrency(betAmount)}`, 'info');

        // Deduct bet (without showing message)
        await balanceManager.updateAfterGame(-betAmount, false);
        playSound('click');

        // Generate result
        const resultIndex = Math.floor(Math.random() * wheelNumbers.length);
        const result = wheelNumbers[resultIndex];
        
        // Calculate rotation
        const segmentAngle = (2 * Math.PI) / wheelNumbers.length;
        const spins = 5 + Math.random() * 3; // 5-8 full spins
        const targetAngle = -(resultIndex * segmentAngle) + (spins * 2 * Math.PI);
        targetRotation = currentRotation + targetAngle;

        // Animate wheel
        const duration = 3000; // 3 seconds
        const startTime = Date.now();
        const startRotation = currentRotation;

        function animate() {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing function (ease out cubic)
            const easeProgress = 1 - Math.pow(1 - progress, 3);
            
            currentRotation = startRotation + (targetRotation - startRotation) * easeProgress;
            drawWheel(currentRotation);

            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                finishSpin(result, betAmount);
            }
        }

        animate();
    }

    async function finishSpin(result, betAmount) {
        // Check if won
        const won = result.color === selectedPrediction;
        const multiplier = result.color === 'green' ? 14 : 2;
        const winAmount = won ? betAmount * multiplier : 0;

        if (won) {
            await balanceManager.updateAfterGame(winAmount, false);
        }

        // Update stats
        totalSpins++;
        if (won) {
            wins++;
        } else {
            losses++;
        }

        const winRate = ((wins / totalSpins) * 100).toFixed(1);

        document.getElementById('totalSpins').textContent = totalSpins;
        document.getElementById('wins').textContent = wins;
        document.getElementById('losses').textContent = losses;
        document.getElementById('winRate').textContent = winRate + '%';

        // Show result
        const resultDisplay = document.getElementById('resultDisplay');
        const resultText = document.getElementById('resultText');
        const resultAmount = document.getElementById('resultAmount');

        const colorEmoji = { 'red': '🔴', 'black': '⚫', 'green': '🟢' };
        resultText.textContent = `${colorEmoji[result.color]} ${result.color.toUpperCase()} ${result.num} - ${won ? 'YOU WIN!' : 'YOU LOSE!'}`;
        resultAmount.textContent = won ? `+${balanceManager.formatCurrency(winAmount)}` : `-${balanceManager.formatCurrency(betAmount)}`;
        resultAmount.style.color = won ? 'var(--success)' : 'var(--error)';

        resultDisplay.classList.add('show');

        if (won) {
            playSound('win');
            showToast(`🎉 You won ${balanceManager.formatCurrency(winAmount)}! (${multiplier}x)`, 'success');
        } else {
            playSound('lose');
            showToast(`You lost ${balanceManager.formatCurrency(betAmount)}!`, 'error');
        }

        isSpinning = false;
        document.getElementById('spinBtn').disabled = false;
    }
</script>

<?php include '../includes/footer.php'; ?>
