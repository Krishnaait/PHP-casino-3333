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
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3));
        border: 3px solid var(--accent-gold);
        border-radius: var(--radius-lg);
        padding: var(--spacing-lg);
        margin: var(--spacing-lg) 0;
        position: relative;
    }

    #plinkoCanvas {
        width: 100%;
        height: 500px;
        border-radius: var(--radius-md);
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.6));
    }

    .plinko-slots {
        display: grid;
        grid-template-columns: repeat(9, 1fr);
        gap: var(--spacing-xs);
        margin-top: var(--spacing-md);
    }

    .slot {
        background: rgba(255, 215, 0, 0.1);
        border: 2px solid var(--accent-gold);
        border-radius: var(--radius-sm);
        padding: var(--spacing-sm);
        text-align: center;
        color: var(--accent-gold);
        font-weight: 700;
        font-size: 0.85rem;
        min-height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all var(--transition-fast);
    }

    .slot.active {
        background: linear-gradient(135deg, var(--accent-gold), #ffed4e);
        color: var(--primary-dark);
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.8);
        transform: scale(1.1);
        animation: slotPulse 0.5s ease;
    }

    @keyframes slotPulse {
        0%, 100% { transform: scale(1.1); }
        50% { transform: scale(1.2); }
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

    .control-input {
        width: 100%;
        padding: var(--spacing-md);
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--accent-green);
        border-radius: var(--radius-md);
        color: var(--text-primary);
        font-size: 1rem;
        text-align: center;
    }

    .bet-presets {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: var(--spacing-sm);
        margin-top: var(--spacing-sm);
    }

    .preset-btn {
        padding: var(--spacing-sm);
        background: rgba(255, 215, 0, 0.1);
        border: 1px solid var(--accent-gold);
        color: var(--accent-gold);
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: all var(--transition-fast);
        font-weight: 600;
    }

    .preset-btn:hover {
        background: var(--accent-gold);
        color: var(--primary-dark);
        transform: scale(1.05);
    }

    .action-buttons {
        display: grid;
        gap: var(--spacing-md);
    }

    .action-btn {
        padding: var(--spacing-lg);
        border: none;
        border-radius: var(--radius-md);
        font-weight: 700;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all var(--transition-fast);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .start-btn {
        background: linear-gradient(135deg, var(--accent-green), #00cc00);
        color: var(--primary-dark);
    }

    .start-btn:hover:not(:disabled) {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(0, 255, 0, 0.5);
    }

    .start-btn:disabled {
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
        font-size: 1.1rem;
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

    .stat-row-value {
        color: var(--accent-green);
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .game-wrapper {
            grid-template-columns: 1fr;
        }

        #plinkoCanvas {
            height: 400px;
        }

        .plinko-slots {
            grid-template-columns: repeat(9, 1fr);
            gap: 2px;
        }

        .slot {
            font-size: 0.7rem;
            padding: var(--spacing-xs);
            min-height: 35px;
        }

        .bet-presets {
            grid-template-columns: repeat(3, 1fr);
        }
    }
</style>

<div class="game-wrapper">
    <div class="game-area">
        <h1 class="game-title">🎱 Plinko</h1>

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
                <div class="stat-label">Total Won</div>
                <div class="stat-value" id="totalWinAmount">₹0</div>
            </div>
        </div>

        <div class="plinko-board">
            <canvas id="plinkoCanvas"></canvas>
            
            <div class="plinko-slots">
                <div class="slot" data-multiplier="5">5x</div>
                <div class="slot" data-multiplier="2">2x</div>
                <div class="slot" data-multiplier="1.5">1.5x</div>
                <div class="slot" data-multiplier="1">1x</div>
                <div class="slot" data-multiplier="0.5">0.5x</div>
                <div class="slot" data-multiplier="1">1x</div>
                <div class="slot" data-multiplier="1.5">1.5x</div>
                <div class="slot" data-multiplier="2">2x</div>
                <div class="slot" data-multiplier="5">5x</div>
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
                <span>Avg Multiplier</span>
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
                🎱 Drop the ball from top<br>
                ⚪ Ball bounces off pegs<br>
                🎯 Lands in multiplier slot<br>
                💰 Win based on multiplier<br>
                🌟 Edge slots = Higher multipliers!
            </p>
        </div>
    </div>
</div>

<script>
    let isDropping = false;
    let multipliers = [];
    let totalDrops = 0;
    let totalWinAmount = 0;
    
    // Canvas setup
    const canvas = document.getElementById('plinkoCanvas');
    const ctx = canvas.getContext('2d');
    
    // Set canvas size
    function resizeCanvas() {
        const rect = canvas.getBoundingClientRect();
        canvas.width = rect.width;
        canvas.height = rect.height;
        drawPegs();
    }
    
    // Peg configuration
    const pegRows = 12;
    let pegSpacing = 0;
    const pegs = [];
    
    // Create pegs in triangular pattern
    function createPegs() {
        pegs.length = 0;
        pegSpacing = canvas.width / 10; // Calculate pegSpacing based on current canvas width
        const startY = 50;
        const rowHeight = (canvas.height - 100) / pegRows;
        
        for (let row = 0; row < pegRows; row++) {
            const pegsInRow = row + 3;
            const rowWidth = pegsInRow * pegSpacing;
            const startX = (canvas.width - rowWidth) / 2 + pegSpacing / 2;
            
            for (let col = 0; col < pegsInRow; col++) {
                pegs.push({
                    x: startX + col * pegSpacing,
                    y: startY + row * rowHeight,
                    radius: 6
                });
            }
        }
    }
    
    // Draw pegs
    function drawPegs() {
        createPegs();
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        pegs.forEach(peg => {
            // Peg glow
            const gradient = ctx.createRadialGradient(peg.x, peg.y, 0, peg.x, peg.y, peg.radius * 2);
            gradient.addColorStop(0, 'rgba(255, 215, 0, 0.8)');
            gradient.addColorStop(1, 'rgba(255, 215, 0, 0)');
            ctx.fillStyle = gradient;
            ctx.beginPath();
            ctx.arc(peg.x, peg.y, peg.radius * 2, 0, Math.PI * 2);
            ctx.fill();
            
            // Peg body
            ctx.fillStyle = '#FFD700';
            ctx.beginPath();
            ctx.arc(peg.x, peg.y, peg.radius, 0, Math.PI * 2);
            ctx.fill();
            
            // Peg highlight
            ctx.fillStyle = 'rgba(255, 255, 255, 0.5)';
            ctx.beginPath();
            ctx.arc(peg.x - 2, peg.y - 2, peg.radius / 2, 0, Math.PI * 2);
            ctx.fill();
        });
    }
    
    // Ball class
    class Ball {
        constructor(startX) {
            this.x = startX;
            this.y = 20;
            this.vx = (Math.random() - 0.5) * 0.5; // Very slow initial horizontal velocity
            this.vy = 0;
            this.radius = 12; // Larger ball for better visibility
            this.gravity = 0.2; // Much slower gravity for dramatic fall
            this.bounce = 0.5; // Less bouncy for smoother animation
            this.friction = 0.96; // High friction for controlled movement
        }
        
        update() {
            // Apply gravity
            this.vy += this.gravity;
            
            // Apply velocity
            this.x += this.vx;
            this.y += this.vy;
            
            // Apply friction
            this.vx *= this.friction;
            
            // Check collision with pegs
            pegs.forEach(peg => {
                const dx = this.x - peg.x;
                const dy = this.y - peg.y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < this.radius + peg.radius) {
                    // Collision detected
                    const angle = Math.atan2(dy, dx);
                    const targetX = peg.x + Math.cos(angle) * (peg.radius + this.radius);
                    const targetY = peg.y + Math.sin(angle) * (peg.radius + this.radius);
                    
                    // Bounce
                    const ax = targetX - this.x;
                    const ay = targetY - this.y;
                    
                    this.vx -= ax * 0.3;
                    this.vy -= ay * 0.3;
                    
                    // Add minimal randomness for smooth but varied animation
                    this.vx += (Math.random() - 0.5) * 1.0;
                    
                    // Move ball out of collision
                    this.x = targetX;
                    this.y = targetY;
                }
            });
            
            // Wall collision
            if (this.x < this.radius) {
                this.x = this.radius;
                this.vx *= -this.bounce;
            }
            if (this.x > canvas.width - this.radius) {
                this.x = canvas.width - this.radius;
                this.vx *= -this.bounce;
            }
            
            // Check if reached bottom
            if (this.y > canvas.height - 20) {
                return true; // Ball finished
            }
            
            return false;
        }
        
        draw() {
            // Ball glow
            const gradient = ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.radius * 2);
            gradient.addColorStop(0, 'rgba(255, 102, 0, 0.8)');
            gradient.addColorStop(1, 'rgba(255, 102, 0, 0)');
            ctx.fillStyle = gradient;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius * 2, 0, Math.PI * 2);
            ctx.fill();
            
            // Ball body
            const ballGradient = ctx.createRadialGradient(
                this.x - this.radius / 3,
                this.y - this.radius / 3,
                0,
                this.x,
                this.y,
                this.radius
            );
            ballGradient.addColorStop(0, '#FFFF00');
            ballGradient.addColorStop(1, '#FF6600');
            ctx.fillStyle = ballGradient;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fill();
            
            // Ball highlight
            ctx.fillStyle = 'rgba(255, 255, 255, 0.6)';
            ctx.beginPath();
            ctx.arc(this.x - 3, this.y - 3, this.radius / 3, 0, Math.PI * 2);
            ctx.fill();
        }
    }
    
    function setBet(amount) {
        if (isDropping) return;
        playSound('click');
        document.getElementById('betAmount').value = amount;
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
        
        // Show bet placed message
        showToast(`You bet ${balanceManager.formatCurrency(betAmount)}`, 'info');
        
        // Deduct bet (without showing message)
        await balanceManager.updateAfterGame(-betAmount, false);
        
        playSound('click');
        
        // Create ball at random starting position
        const startX = canvas.width / 2 + (Math.random() - 0.5) * 40;
        const ball = new Ball(startX);
        
        // Animate ball
        let animationFrame;
        const animate = () => {
            // Redraw pegs
            drawPegs();
            
            // Update and draw ball
            const finished = ball.update();
            ball.draw();
            
            if (!finished) {
                animationFrame = requestAnimationFrame(animate);
            } else {
                // Ball reached bottom - determine slot
                const slotWidth = canvas.width / 9;
                const slotIndex = Math.floor(ball.x / slotWidth);
                const clampedIndex = Math.max(0, Math.min(8, slotIndex));
                
                finishDrop(clampedIndex, betAmount);
            }
        };
        
        animate();
    }
    
    async function finishDrop(slotIndex, betAmount) {
        const slots = document.querySelectorAll('.slot');
        const slot = slots[slotIndex];
        const multiplier = parseFloat(slot.dataset.multiplier);
        
        // Animate slot
        slot.classList.add('active');
        setTimeout(() => {
            slot.classList.remove('active');
        }, 1000);
        
        // Calculate winnings
        const winAmount = Math.floor(betAmount * multiplier);
        if (winAmount > betAmount) {
            await balanceManager.updateAfterGame(winAmount, false);
            showToast(`You won ${balanceManager.formatCurrency(winAmount)}! (${multiplier}x)`, 'success');
        } else if (winAmount < betAmount) {
            showToast(`You lost ${balanceManager.formatCurrency(betAmount - winAmount)}! (${multiplier}x)`, 'error');
        } else {
            showToast(`Break even! (${multiplier}x)`, 'info');
        }
        
        // Update stats
        multipliers.push(multiplier);
        totalDrops++;
        totalWinAmount += (winAmount - betAmount);
        
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
        if (multiplier >= 1) {
            playSound('win');
            showToast(`🎯 Hit ${multiplier}x slot! +${balanceManager.formatCurrency(winAmount - betAmount)}`, 'success');
        } else {
            playSound('lose');
            showToast(`💥 Hit ${multiplier}x slot. ${balanceManager.formatCurrency(winAmount - betAmount)}`, 'warning');
        }
        
        isDropping = false;
        document.getElementById('dropButton').disabled = false;
    }
    
    // Initialize the game
    function initGame() {
        resizeCanvas();
        drawPegs();
    }
    
    // Call init when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initGame);
    } else {
        // DOM is already loaded
        initGame();
    }
    
    // Also resize on window resize
    window.addEventListener('resize', resizeCanvas);
</script>

<?php include '../includes/footer.php'; ?>
