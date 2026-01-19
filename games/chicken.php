<?php
$page_title = "Chicken Adventure - Casino Ventures";
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

    .chicken-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: var(--spacing-md);
        margin: var(--spacing-xl) 0;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .chicken-box {
        aspect-ratio: 1;
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        cursor: pointer;
        transition: all var(--transition-fast);
        position: relative;
        overflow: hidden;
    }

    .chicken-box:hover:not(.revealed):not(.disabled) {
        background: rgba(255, 215, 0, 0.2);
        border-color: var(--accent-gold);
        transform: scale(1.05);
    }

    .chicken-box.revealed {
        cursor: default;
        animation: boxReveal 0.4s ease;
    }

    .chicken-box.egg {
        background: linear-gradient(135deg, var(--accent-gold), #ffed4e);
        border-color: var(--accent-gold);
        box-shadow: 0 0 25px rgba(255, 215, 0, 0.6);
    }

    .chicken-box.bone {
        background: linear-gradient(135deg, #ff4444, #cc0000);
        border-color: #ff4444;
        box-shadow: 0 0 25px rgba(255, 68, 68, 0.6);
        animation: boneShake 0.5s ease;
    }

    .chicken-box.disabled {
        cursor: not-allowed;
        opacity: 0.5;
    }

    @keyframes boxReveal {
        0% { transform: rotateY(0deg) scale(1); }
        50% { transform: rotateY(180deg) scale(1.1); }
        100% { transform: rotateY(360deg) scale(1); }
    }

    @keyframes boneShake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-10px) rotate(-5deg); }
        75% { transform: translateX(10px) rotate(5deg); }
    }

    .game-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--spacing-md);
        margin-bottom: var(--spacing-lg);
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.05);
        padding: var(--spacing-md);
        border-radius: var(--radius-md);
        border: 1px solid rgba(255, 255, 255, 0.1);
        text-align: center;
    }

    .stat-label {
        color: var(--text-secondary);
        font-size: 0.85rem;
        margin-bottom: var(--spacing-sm);
    }

    .stat-value {
        color: var(--accent-gold);
        font-size: 1.3rem;
        font-weight: 700;
    }

    .control-section {
        background: rgba(255, 255, 255, 0.05);
        padding: var(--spacing-lg);
        border-radius: var(--radius-md);
        margin: var(--spacing-lg) 0;
    }

    .control-group {
        margin-bottom: var(--spacing-lg);
    }

    .control-label {
        display: block;
        color: var(--text-secondary);
        margin-bottom: var(--spacing-sm);
        font-weight: 600;
    }

    .control-input, .control-select {
        width: 100%;
        padding: var(--spacing-md);
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--accent-green);
        border-radius: var(--radius-md);
        color: var(--text-primary);
        font-size: 1rem;
    }

    .control-input:focus, .control-select:focus {
        outline: none;
        border-color: var(--accent-gold);
        box-shadow: 0 0 15px rgba(255, 215, 0, 0.2);
    }

    .bet-presets {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--spacing-sm);
        margin-top: var(--spacing-sm);
    }

    .preset-btn {
        padding: var(--spacing-sm);
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-md);
        color: var(--text-primary);
        font-size: 0.85rem;
        cursor: pointer;
        transition: all var(--transition-fast);
    }

    .preset-btn:hover {
        background: rgba(255, 215, 0, 0.2);
        border-color: var(--accent-gold);
    }

    .action-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--spacing-md);
    }

    .action-btn {
        padding: var(--spacing-lg);
        border: none;
        border-radius: var(--radius-md);
        font-weight: 700;
        cursor: pointer;
        transition: all var(--transition-fast);
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    .start-btn {
        background: linear-gradient(135deg, var(--accent-gold) 0%, #ffed4e 100%);
        color: var(--primary-dark);
        grid-column: 1 / -1;
    }

    .start-btn:hover:not(:disabled) {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(255, 215, 0, 0.4);
    }

    .cashout-btn {
        background: linear-gradient(135deg, var(--accent-green) 0%, #00cc00 100%);
        color: var(--primary-dark);
    }

    .cashout-btn:hover:not(:disabled) {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(0, 255, 0, 0.4);
    }

    .action-btn:disabled {
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
        font-size: 0.9rem;
    }

    .stat-row:last-child {
        border-bottom: none;
    }

    .stat-row-value {
        color: var(--accent-green);
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .game-wrapper {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            grid-template-columns: 1fr;
        }

        .chicken-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
</style>

<div class="game-wrapper">
    <div class="game-area">
        <h1 class="game-title"><i class="fas fa-egg"></i> Chicken Adventure</h1>

        <div class="game-stats">
            <div class="stat-card">
                <div class="stat-label">Current Multiplier</div>
                <div class="stat-value" id="multiplierDisplay">1.00x</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Eggs Found</div>
                <div class="stat-value" id="eggsFound">0</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Potential Win</div>
                <div class="stat-value" id="potentialWin">₹0</div>
            </div>
        </div>

        <div class="chicken-grid" id="chickenGrid"></div>

        <div class="control-section">
            <div class="control-group">
                <label class="control-label">Bet Amount (₹200 - ₹5,500)</label>
                <input type="number" id="betAmount" class="control-input" min="200" max="5500" value="500" placeholder="Enter bet">
                <div class="bet-presets">
                    <button class="preset-btn" onclick="setBet(200)">₹200</button>
                    <button class="preset-btn" onclick="setBet(500)">₹500</button>
                    <button class="preset-btn" onclick="setBet(1000)">₹1K</button>
                    <button class="preset-btn" onclick="setBet(2000)">₹2K</button>
                    <button class="preset-btn" onclick="setBet(5500)">₹5.5K</button>
                    <button class="preset-btn" onclick="setBet('max')">MAX</button>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Difficulty</label>
                <select id="difficulty" class="control-select">
                    <option value="easy">Easy (3 bones)</option>
                    <option value="medium" selected>Medium (5 bones)</option>
                    <option value="hard">Hard (8 bones)</option>
                </select>
            </div>

            <div class="action-buttons">
                <button class="action-btn start-btn" onclick="startGame()" id="startButton">🚀 START GAME</button>
                <button class="action-btn cashout-btn" onclick="cashOut()" id="cashoutButton" disabled>💰 CASH OUT</button>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="stats-card">
            <div class="stats-title"><i class="fas fa-chart-bar"></i> Game Stats</div>
            <div class="stat-row">
                <span>Total Games</span>
                <span class="stat-row-value" id="totalGames">0</span>
            </div>
            <div class="stat-row">
                <span>Wins</span>
                <span class="stat-row-value" id="totalWins">0</span>
            </div>
            <div class="stat-row">
                <span>Losses</span>
                <span class="stat-row-value" id="totalLosses">0</span>
            </div>
            <div class="stat-row">
                <span>Win Rate</span>
                <span class="stat-row-value" id="winRate">0%</span>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-title"><i class="fas fa-info-circle"></i> How to Play</div>
            <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.6; margin: 0;">
                🐔 Find golden eggs!<br>
                🥚 Each egg increases multiplier<br>
                🦴 Avoid bones or lose<br>
                💰 Cash out anytime to win<br>
                📈 Higher difficulty = higher multipliers
            </p>
        </div>
    </div>
</div>

<script>
    let gameActive = false;
    let bonePositions = [];
    let eggsCollected = 0;
    let currentBet = 0;
    let currentMultiplier = 1.0;

    function createGrid() {
        const grid = document.getElementById('chickenGrid');
        grid.innerHTML = '';
        
        for (let i = 0; i < 25; i++) {
            const box = document.createElement('div');
            box.className = 'chicken-box disabled';
            box.dataset.index = i;
            box.innerHTML = '?';
            box.addEventListener('click', () => revealBox(i));
            grid.appendChild(box);
        }
    }

    function setBet(amount) {
        if (gameActive) return;
        playSound('click');
        
        let betValue = amount;
        if (amount === 'max') {
            const balance = balanceManager.getBalance();
            betValue = Math.min(balance, 5500);
        }
        
        document.getElementById('betAmount').value = betValue;
    }

    async function startGame() {
        if (gameActive) return;
        
        const betAmount = parseInt(document.getElementById('betAmount').value) || 0;
        const validation = balanceManager.validateBet(betAmount);

        if (!validation.valid) {
            showToast(validation.error, 'error');
            return;
        }

        playSound('click');
        
        // Deduct bet
        await balanceManager.updateAfterGame(-betAmount);

        const difficulty = document.getElementById('difficulty').value;
        
        // Initialize game
        gameActive = true;
        eggsCollected = 0;
        currentBet = betAmount;
        currentMultiplier = 1.0;
        
        // Generate bone positions
        const boneCount = difficulty === 'easy' ? 3 : difficulty === 'medium' ? 5 : 8;
        bonePositions = [];
        while (bonePositions.length < boneCount) {
            const pos = Math.floor(Math.random() * 25);
            if (!bonePositions.includes(pos)) {
                bonePositions.push(pos);
            }
        }
        
        // Reset grid
        createGrid();
        const boxes = document.querySelectorAll('.chicken-box');
        boxes.forEach(box => box.classList.remove('disabled'));
        
        // Update UI
        document.getElementById('startButton').disabled = true;
        document.getElementById('cashoutButton').disabled = false;
        document.getElementById('betAmount').disabled = true;
        document.getElementById('difficulty').disabled = true;
        
        updateStats();
    }

    function revealBox(index) {
        if (!gameActive) return;
        
        const box = document.querySelector(`[data-index="${index}"]`);
        if (box.classList.contains('revealed')) return;
        
        box.classList.add('revealed');
        playSound('click');
        
        if (bonePositions.includes(index)) {
            // Hit a bone - game over
            playSound('lose');
            box.classList.add('bone');
            box.innerHTML = '🦴';
            gameOver(false);
        } else {
            // Found an egg
            playSound('win');
            box.classList.add('egg');
            box.innerHTML = '🥚';
            eggsCollected++;
            
            // Calculate multiplier
            const difficulty = document.getElementById('difficulty').value;
            const multiplierIncrease = difficulty === 'easy' ? 0.3 : difficulty === 'medium' ? 0.4 : 0.6;
            currentMultiplier += multiplierIncrease;
            
            updateStats();
            
            // Check if won
            const totalBoxes = 25;
            const safeBoxes = totalBoxes - bonePositions.length;
            if (eggsCollected >= safeBoxes) {
                gameOver(true);
            }
        }
    }

    async function cashOut() {
        if (!gameActive) return;
        playSound('cashout');
        await gameOver(true);
    }

    async function gameOver(won) {
        gameActive = false;
        
        // Reveal all bones
        const boxes = document.querySelectorAll('.chicken-box');
        boxes.forEach((box, index) => {
            box.classList.add('disabled');
            if (bonePositions.includes(index) && !box.classList.contains('revealed')) {
                box.classList.add('revealed', 'bone');
                box.innerHTML = '🦴';
            }
        });
        
        // Calculate winnings
        let winAmount = 0;
        if (won && eggsCollected > 0) {
            winAmount = Math.floor(currentBet * currentMultiplier);
            await balanceManager.updateAfterGame(winAmount);
            showToast(`🎉 YOU WIN! Found ${eggsCollected} eggs! +${balanceManager.formatCurrency(winAmount)}`, 'success');
        } else {
            showToast(`🦴 GAME OVER! Found ${eggsCollected} eggs. -${balanceManager.formatCurrency(currentBet)}`, 'error');
        }
        
        // Update stats
        updateGameStats(won);
        
        // Reset UI
        setTimeout(() => {
            document.getElementById('startButton').disabled = false;
            document.getElementById('cashoutButton').disabled = true;
            document.getElementById('betAmount').disabled = false;
            document.getElementById('difficulty').disabled = false;
            
            document.getElementById('multiplierDisplay').textContent = '1.00x';
            document.getElementById('eggsFound').textContent = '0';
            document.getElementById('potentialWin').textContent = '₹0';
        }, 1000);
    }

    function updateStats() {
        document.getElementById('multiplierDisplay').textContent = currentMultiplier.toFixed(2) + 'x';
        document.getElementById('eggsFound').textContent = eggsCollected;
        const potential = Math.floor(currentBet * currentMultiplier);
        document.getElementById('potentialWin').textContent = balanceManager.formatCurrency(potential);
    }

    function updateGameStats(won) {
        const totalGames = parseInt(document.getElementById('totalGames').textContent) + 1;
        const totalWins = parseInt(document.getElementById('totalWins').textContent) + (won ? 1 : 0);
        const totalLosses = totalGames - totalWins;
        const winRate = ((totalWins / totalGames) * 100).toFixed(1);

        document.getElementById('totalGames').textContent = totalGames;
        document.getElementById('totalWins').textContent = totalWins;
        document.getElementById('totalLosses').textContent = totalLosses;
        document.getElementById('winRate').textContent = winRate + '%';
    }

    document.addEventListener('DOMContentLoaded', function() {
        createGrid();
    });
</script>

<?php include '../includes/footer.php'; ?>
