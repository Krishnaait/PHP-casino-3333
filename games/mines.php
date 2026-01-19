<?php
$page_title = "Mines - Casino Ventures";
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

    .mines-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: var(--spacing-md);
        margin: var(--spacing-xl) auto;
        max-width: 500px;
    }

    .mine-tile {
        aspect-ratio: 1;
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        cursor: pointer;
        transition: all var(--transition-fast);
        position: relative;
        overflow: hidden;
    }

    .mine-tile:hover:not(.revealed):not(.disabled) {
        background: rgba(255, 215, 0, 0.2);
        border-color: var(--accent-gold);
        transform: scale(1.05);
    }

    .mine-tile.revealed {
        cursor: default;
        animation: tileReveal 0.3s ease;
    }

    .mine-tile.revealed.safe {
        background: linear-gradient(135deg, var(--accent-green), #00cc00);
        border-color: var(--accent-green);
        box-shadow: 0 0 20px rgba(0, 255, 0, 0.5);
    }

    .mine-tile.revealed.mine {
        background: linear-gradient(135deg, #ff4444, #cc0000);
        border-color: #ff4444;
        box-shadow: 0 0 20px rgba(255, 68, 68, 0.5);
        animation: explode 0.5s ease;
    }

    .mine-tile.disabled {
        cursor: not-allowed;
        opacity: 0.5;
    }

    @keyframes tileReveal {
        0% { transform: scale(0.8) rotateZ(-10deg); }
        100% { transform: scale(1) rotateZ(0deg); }
    }

    @keyframes explode {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
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

    .control-select option {
        background: var(--primary-darker);
        color: var(--text-primary);
        padding: var(--spacing-md);
    }

    .control-select option:hover {
        background: var(--accent-green);
        color: var(--primary-dark);
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

        .mines-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
</style>

<div class="game-wrapper">
    <div class="game-area">
        <h1 class="game-title"><i class="fas fa-bomb"></i> Mines</h1>

        <div class="game-stats">
            <div class="stat-card">
                <div class="stat-label">Current Multiplier</div>
                <div class="stat-value" id="multiplierDisplay">1.00x</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Safe Tiles</div>
                <div class="stat-value" id="safeTilesFound">0</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Potential Win</div>
                <div class="stat-value" id="potentialWin">₹0</div>
            </div>
        </div>

        <div class="mines-grid" id="minesGrid"></div>

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
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Number of Mines</label>
                <select id="mineCount" class="control-select">
                    <option value="3">3 Mines (Easy)</option>
                    <option value="5" selected>5 Mines (Medium)</option>
                    <option value="8">8 Mines (Hard)</option>
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
                💎 Find safe tiles!<br>
                💣 Avoid mines<br>
                📈 Each safe tile increases multiplier<br>
                💰 Cash out anytime to win<br>
                🎯 More mines = higher multipliers
            </p>
        </div>
    </div>
</div>

<script>
    let gameActive = false;
    let minePositions = [];
    let safeTilesFound = 0;
    let currentBet = 0;
    let currentMultiplier = 1.0;

    function createGrid() {
        const grid = document.getElementById('minesGrid');
        grid.innerHTML = '';
        
        for (let i = 0; i < 25; i++) {
            const tile = document.createElement('div');
            tile.className = 'mine-tile disabled';
            tile.dataset.index = i;
            tile.innerHTML = '?';
            tile.addEventListener('click', () => revealTile(i));
            grid.appendChild(tile);
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

        const mineCount = parseInt(document.getElementById('mineCount').value);
        
        // Initialize game
        gameActive = true;
        safeTilesFound = 0;
        currentBet = betAmount;
        currentMultiplier = 1.0;
        
        // Generate mine positions
        minePositions = [];
        while (minePositions.length < mineCount) {
            const pos = Math.floor(Math.random() * 25);
            if (!minePositions.includes(pos)) {
                minePositions.push(pos);
            }
        }
        
        // Reset grid
        createGrid();
        const tiles = document.querySelectorAll('.mine-tile');
        tiles.forEach(tile => tile.classList.remove('disabled'));
        
        // Update UI
        document.getElementById('startButton').disabled = true;
        document.getElementById('cashoutButton').disabled = false;
        document.getElementById('betAmount').disabled = true;
        document.getElementById('mineCount').disabled = true;
        
        updateStats();
    }

    function revealTile(index) {
        if (!gameActive) return;
        
        const tile = document.querySelector(`[data-index="${index}"]`);
        if (tile.classList.contains('revealed')) return;
        
        tile.classList.add('revealed');
        playSound('click');
        
        if (minePositions.includes(index)) {
            // Hit a mine - game over
            playSound('lose');
            tile.classList.add('mine');
            tile.innerHTML = '💣';
            gameOver(false);
        } else {
            // Found a safe tile
            playSound('win');
            tile.classList.add('safe');
            tile.innerHTML = '💎';
            safeTilesFound++;
            
            // Calculate multiplier (0.1x per safe tile)
            currentMultiplier += 0.15;
            
            updateStats();
        }
    }

    async function cashOut() {
        if (!gameActive) return;
        playSound('cashout');
        await gameOver(true);
    }

    async function gameOver(won) {
        gameActive = false;
        
        // Reveal all mines
        const tiles = document.querySelectorAll('.mine-tile');
        tiles.forEach((tile, index) => {
            tile.classList.add('disabled');
            if (minePositions.includes(index) && !tile.classList.contains('revealed')) {
                tile.classList.add('revealed', 'mine');
                tile.innerHTML = '💣';
            }
        });
        
        // Calculate winnings
        let winAmount = 0;
        if (won && safeTilesFound > 0) {
            winAmount = Math.floor(currentBet * currentMultiplier);
            await balanceManager.updateAfterGame(winAmount);
            showToast(`🎉 YOU WIN! Found ${safeTilesFound} safe tiles! +${balanceManager.formatCurrency(winAmount)}`, 'success');
        } else {
            showToast(`💣 GAME OVER! Hit a mine! Found ${safeTilesFound} safe tiles. -${balanceManager.formatCurrency(currentBet)}`, 'error');
        }
        
        // Update stats
        updateGameStats(won);
        
        // Reset UI
        setTimeout(() => {
            document.getElementById('startButton').disabled = false;
            document.getElementById('cashoutButton').disabled = true;
            document.getElementById('betAmount').disabled = false;
            document.getElementById('mineCount').disabled = false;
            
            document.getElementById('multiplierDisplay').textContent = '1.00x';
            document.getElementById('safeTilesFound').textContent = '0';
            document.getElementById('potentialWin').textContent = '₹0';
        }, 1000);
    }

    function updateStats() {
        document.getElementById('multiplierDisplay').textContent = currentMultiplier.toFixed(2) + 'x';
        document.getElementById('safeTilesFound').textContent = safeTilesFound;
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
