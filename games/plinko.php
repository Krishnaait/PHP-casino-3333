<?php
$page_title = "Plinko - Casino Ventures";
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

    .plinko-board {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1));
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-lg);
        padding: var(--spacing-xl);
        margin: var(--spacing-lg) 0;
        position: relative;
        height: 400px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .plinko-pegs {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-md);
        align-items: center;
        flex: 1;
    }

    .peg-row {
        display: flex;
        gap: var(--spacing-lg);
        justify-content: center;
    }

    .peg {
        width: 20px;
        height: 20px;
        background: var(--accent-gold);
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
    }

    .plinko-slots {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: var(--spacing-sm);
        margin-top: var(--spacing-lg);
    }

    .slot {
        background: rgba(255, 215, 0, 0.1);
        border: 2px solid var(--accent-gold);
        border-radius: var(--radius-md);
        padding: var(--spacing-md);
        text-align: center;
        color: var(--accent-gold);
        font-weight: 700;
        font-size: 0.9rem;
        min-height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slot.active {
        background: linear-gradient(135deg, var(--accent-gold), #ffed4e);
        color: var(--primary-dark);
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
    }

    .ball {
        width: 15px;
        height: 15px;
        background: radial-gradient(circle at 30% 30%, #ffff00, #ff6600);
        border-radius: 50%;
        position: absolute;
        box-shadow: 0 0 10px rgba(255, 102, 0, 0.8);
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
        grid-template-columns: 1fr;
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
    }

    .start-btn:hover:not(:disabled) {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(255, 215, 0, 0.4);
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

        .plinko-board {
            height: 300px;
        }

        .plinko-slots {
            grid-template-columns: repeat(5, 1fr);
        }
    }
</style>

<div class="game-wrapper">
    <div class="game-area">
        <h1 class="game-title"><i class="fas fa-circle"></i> Plinko</h1>

        <div class="game-stats">
            <div class="stat-card">
                <div class="stat-label">Last Multiplier</div>
                <div class="stat-value" id="lastMultiplier">0x</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Balls</div>
                <div class="stat-value" id="totalBalls">0</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Win</div>
                <div class="stat-value" id="totalWinAmount">₹0</div>
            </div>
        </div>

        <div class="plinko-board" id="plinkoBoard">
            <div class="plinko-pegs">
                <div class="peg-row">
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                </div>
                <div class="peg-row">
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                </div>
                <div class="peg-row">
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                </div>
                <div class="peg-row">
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                    <div class="peg"></div>
                </div>
            </div>

            <div class="plinko-slots">
                <div class="slot" data-multiplier="1">1x</div>
                <div class="slot" data-multiplier="2">2x</div>
                <div class="slot" data-multiplier="3">3x</div>
                <div class="slot" data-multiplier="5">5x</div>
                <div class="slot" data-multiplier="3">3x</div>
                <div class="slot" data-multiplier="2">2x</div>
                <div class="slot" data-multiplier="1">1x</div>
                <div class="slot" data-multiplier="0.5">0.5x</div>
            </div>
        </div>

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

            <div class="action-buttons">
                <button class="action-btn start-btn" onclick="dropBall()" id="dropButton">🎱 DROP BALL</button>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="stats-card">
            <div class="stats-title"><i class="fas fa-chart-bar"></i> Game Stats</div>
            <div class="stat-row">
                <span>Total Drops</span>
                <span class="stat-row-value" id="totalDrops">0</span>
            </div>
            <div class="stat-row">
                <span>Average Multiplier</span>
                <span class="stat-row-value" id="avgMultiplier">0x</span>
            </div>
            <div class="stat-row">
                <span>Best Multiplier</span>
                <span class="stat-row-value" id="bestMultiplier">0x</span>
            </div>
            <div class="stat-row">
                <span>Worst Multiplier</span>
                <span class="stat-row-value" id="worstMultiplier">0x</span>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-title"><i class="fas fa-info-circle"></i> How to Play</div>
            <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.6; margin: 0;">
                🎱 Drop balls down the board<br>
                ⚪ Balls bounce off pegs<br>
                🎯 Land in slots for multipliers<br>
                💰 Higher multiplier = bigger win<br>
                📊 Drop multiple balls for more wins
            </p>
        </div>
    </div>
</div>

<script>
    let isDropping = false;
    let totalDrops = 0;
    let multipliers = [];
    let totalWinAmount = 0;

    function setBet(amount) {
        if (isDropping) return;
        playSound('click');
        
        let betValue = amount;
        if (amount === 'max') {
            const balance = balanceManager.getBalance();
            betValue = Math.min(balance, 5500);
        }
        
        document.getElementById('betAmount').value = betValue;
    }

    async function dropBall() {
        if (isDropping) return;
        
        const betAmount = parseInt(document.getElementById('betAmount').value) || 0;
        const validation = balanceManager.validateBet(betAmount);

        if (!validation.valid) {
            showToast(validation.error, 'error');
            return;
        }

        isDropping = true;
        document.getElementById('dropButton').disabled = true;

        // Deduct bet
        await balanceManager.updateAfterGame(-betAmount);

        playSound('click');

        // Simulate ball drop
        const slots = document.querySelectorAll('.slot');
        const randomSlot = slots[Math.floor(Math.random() * slots.length)];
        const multiplier = parseFloat(randomSlot.dataset.multiplier);

        // Animate slot
        randomSlot.classList.add('active');
        setTimeout(() => {
            randomSlot.classList.remove('active');
        }, 1000);

        // Calculate winnings
        const winAmount = Math.floor(betAmount * multiplier);
        if (multiplier > 0) {
            await balanceManager.updateAfterGame(winAmount);
        }

        // Update stats
        multipliers.push(multiplier);
        totalDrops++;
        totalWinAmount += winAmount;

        const avgMult = (multipliers.reduce((a, b) => a + b, 0) / multipliers.length).toFixed(2);
        const bestMult = Math.max(...multipliers).toFixed(2);
        const worstMult = Math.min(...multipliers).toFixed(2);

        document.getElementById('lastMultiplier').textContent = multiplier + 'x';
        document.getElementById('totalBalls').textContent = totalDrops;
        document.getElementById('totalWinAmount').textContent = balanceManager.formatCurrency(totalWinAmount);
        document.getElementById('totalDrops').textContent = totalDrops;
        document.getElementById('avgMultiplier').textContent = avgMult + 'x';
        document.getElementById('bestMultiplier').textContent = bestMult + 'x';
        document.getElementById('worstMultiplier').textContent = worstMult + 'x';

        // Show result
        if (multiplier > 0) {
            playSound('win');
            showToast(`🎯 Hit ${multiplier}x slot! +${balanceManager.formatCurrency(winAmount)}`, 'success');
        } else {
            playSound('lose');
            showToast(`💥 Hit 0.5x slot. -${balanceManager.formatCurrency(betAmount - winAmount)}`, 'warning');
        }

        isDropping = false;
        document.getElementById('dropButton').disabled = false;
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize
    });
</script>

<?php include '../includes/footer.php'; ?>
