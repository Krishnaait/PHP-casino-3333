<?php
$page_title = "Blackjack - Casino Ventures";
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

    .blackjack-table {
        background: linear-gradient(135deg, rgba(0, 100, 0, 0.3), rgba(0, 50, 0, 0.3));
        border: 2px solid var(--accent-green);
        border-radius: var(--radius-lg);
        padding: var(--spacing-xl);
        margin: var(--spacing-lg) 0;
    }

    .dealer-area {
        margin-bottom: var(--spacing-xl);
        text-align: center;
    }

    .dealer-label {
        color: var(--accent-gold);
        font-weight: 700;
        margin-bottom: var(--spacing-md);
    }

    .cards-display {
        display: flex;
        justify-content: center;
        gap: var(--spacing-lg);
        margin-bottom: var(--spacing-lg);
        min-height: 120px;
    }

    .card {
        width: 80px;
        height: 120px;
        background: white;
        border: 2px solid var(--accent-gold);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-dark);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        animation: cardFlip 0.6s ease;
    }

    @keyframes cardFlip {
        0% { transform: rotateY(90deg); }
        100% { transform: rotateY(0deg); }
    }

    .score-display {
        text-align: center;
        font-size: 1.3rem;
        color: var(--accent-green);
        font-weight: 700;
    }

    .player-area {
        margin-top: var(--spacing-xl);
        padding-top: var(--spacing-xl);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .player-label {
        color: var(--accent-gold);
        font-weight: 700;
        margin-bottom: var(--spacing-md);
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

    .action-buttons {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--spacing-md);
        margin: var(--spacing-lg) 0;
    }

    .action-btn {
        padding: var(--spacing-md);
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        color: var(--text-primary);
        border-radius: var(--radius-md);
        cursor: pointer;
        font-weight: 700;
        transition: all var(--transition-fast);
    }

    .action-btn:hover:not(:disabled) {
        border-color: var(--accent-green);
        background: rgba(0, 255, 0, 0.1);
    }

    .action-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .deal-btn {
        width: 100%;
        padding: var(--spacing-lg);
        background: linear-gradient(135deg, var(--accent-gold) 0%, var(--accent-pink) 100%);
        border: none;
        color: var(--primary-dark);
        font-weight: 700;
        border-radius: var(--radius-md);
        cursor: pointer;
        font-size: 1.1rem;
        transition: all var(--transition-fast);
        text-transform: uppercase;
    }

    .deal-btn:hover:not(:disabled) {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(255, 215, 0, 0.4);
    }

    .deal-btn:disabled {
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

        .action-buttons {
            grid-template-columns: repeat(2, 1fr);
        }

        .card {
            width: 60px;
            height: 90px;
            font-size: 1.5rem;
        }
    }
</style>

<div class="game-wrapper">
    <div class="game-area">
        <h1 class="game-title"><i class="fas fa-cards"></i> Blackjack</h1>

        <div class="blackjack-table">
            <!-- Dealer Area -->
            <div class="dealer-area">
                <div class="dealer-label">Dealer</div>
                <div class="cards-display" id="dealerCards"></div>
                <div class="score-display">Dealer: <span id="dealerScore">0</span></div>
            </div>

            <!-- Player Area -->
            <div class="player-area">
                <div class="player-label">Your Hand</div>
                <div class="cards-display" id="playerCards"></div>
                <div class="score-display">You: <span id="playerScore">0</span></div>
            </div>
        </div>

        <div class="betting-section">
            <div class="bet-input-group">
                <label class="bet-label">Bet Amount (₹200 - ₹5,500)</label>
                <input type="number" id="betAmount" class="bet-input" placeholder="Enter bet amount" min="200" max="5500" value="500">
            </div>

            <button class="deal-btn" onclick="dealGame()" id="dealBtn">DEAL</button>

            <div class="action-buttons" id="actionButtons" style="display: none;">
                <button class="action-btn" onclick="hitCard()">HIT</button>
                <button class="action-btn" onclick="standGame()">STAND</button>
                <button class="action-btn" onclick="doubleDown()">DOUBLE</button>
            </div>
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
                <span>Total Hands</span>
                <span class="stat-value" id="totalHands">0</span>
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
            <div class="stats-title"><i class="fas fa-star"></i> Rules</div>
            <p style="font-size: 0.85rem; color: var(--text-secondary); margin: 0; line-height: 1.5;">
                • Get 21 or less<br>
                • Beat dealer's hand<br>
                • Blackjack = 1.5x<br>
                • Win = 1x bet<br>
                • Bust = Lose bet
            </p>
        </div>

        <div class="stats-card">
            <div class="stats-title"><i class="fas fa-info-circle"></i> Card Values</div>
            <p style="font-size: 0.85rem; color: var(--text-secondary); margin: 0; line-height: 1.5;">
                • 2-10: Face value<br>
                • J, Q, K: 10<br>
                • A: 1 or 11<br>
                • 21: Blackjack!
            </p>
        </div>
    </div>
</div>

<script>
    const suits = ['♠', '♥', '♦', '♣'];
    const ranks = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
    
    let deck = [];
    let dealerHand = [];
    let playerHand = [];
    let betAmount = 0;
    let gameActive = false;

    function createDeck() {
        deck = [];
        for (let suit of suits) {
            for (let rank of ranks) {
                deck.push(rank + suit);
            }
        }
        // Shuffle
        for (let i = deck.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [deck[i], deck[j]] = [deck[j], deck[i]];
        }
    }

    function getCardValue(card) {
        const rank = card.slice(0, -1);
        if (rank === 'A') return 11;
        if (['J', 'Q', 'K'].includes(rank)) return 10;
        return parseInt(rank);
    }

    function calculateScore(hand) {
        let score = 0;
        let aces = 0;
        
        for (let card of hand) {
            const value = getCardValue(card);
            if (card[0] === 'A') aces++;
            score += value;
        }
        
        while (score > 21 && aces > 0) {
            score -= 10;
            aces--;
        }
        
        return score;
    }

    function displayCards(containerId, hand, hideFirst = false) {
        const container = document.getElementById(containerId);
        container.innerHTML = '';
        
        hand.forEach((card, index) => {
            if (hideFirst && index === 0) {
                const cardEl = document.createElement('div');
                cardEl.className = 'card';
                cardEl.textContent = '?';
                cardEl.style.background = 'linear-gradient(135deg, var(--accent-green), var(--accent-cyan))';
                cardEl.style.color = 'white';
                container.appendChild(cardEl);
            } else {
                const cardEl = document.createElement('div');
                cardEl.className = 'card';
                cardEl.textContent = card;
                container.appendChild(cardEl);
            }
        });
    }

    async function dealGame() {
        const bet = parseInt(document.getElementById('betAmount').value);
        const validation = balanceManager.validateBet(bet);

        if (!validation.valid) {
            showToast(validation.error, 'error');
            return;
        }

        betAmount = bet;
        await balanceManager.updateAfterGame(-betAmount);

        createDeck();
        dealerHand = [deck.pop(), deck.pop()];
        playerHand = [deck.pop(), deck.pop()];

        displayCards('dealerCards', dealerHand, true);
        displayCards('playerCards', playerHand);

        document.getElementById('dealerScore').textContent = getCardValue(dealerHand[1]);
        document.getElementById('playerScore').textContent = calculateScore(playerHand);

        document.getElementById('dealBtn').style.display = 'none';
        document.getElementById('actionButtons').style.display = 'grid';
        gameActive = true;

        playSound('click');

        // Check for blackjack
        if (calculateScore(playerHand) === 21) {
            setTimeout(standGame, 1000);
        }
    }

    async function hitCard() {
        if (!gameActive) return;

        playerHand.push(deck.pop());
        displayCards('playerCards', playerHand);
        
        const score = calculateScore(playerHand);
        document.getElementById('playerScore').textContent = score;

        playSound('click');

        if (score > 21) {
            endGame(false);
        }
    }

    async function standGame() {
        if (!gameActive) return;

        gameActive = false;
        document.getElementById('actionButtons').style.display = 'none';

        // Reveal dealer's card
        displayCards('dealerCards', dealerHand);
        
        let dealerScore = calculateScore(dealerHand);
        document.getElementById('dealerScore').textContent = dealerScore;

        // Dealer draws
        while (dealerScore < 17) {
            dealerHand.push(deck.pop());
            dealerScore = calculateScore(dealerHand);
            displayCards('dealerCards', dealerHand);
            document.getElementById('dealerScore').textContent = dealerScore;
            await new Promise(resolve => setTimeout(resolve, 500));
        }

        // Determine winner
        const playerScore = calculateScore(playerHand);
        let won = false;
        let multiplier = 1;

        if (playerScore > 21) {
            // Player bust
        } else if (dealerScore > 21) {
            // Dealer bust
            won = true;
            multiplier = 2;
        } else if (playerScore > dealerScore) {
            won = true;
            multiplier = 2;
        } else if (playerScore === dealerScore) {
            multiplier = 1;
        }

        endGame(won, multiplier);
    }

    async function doubleDown() {
        if (!gameActive || playerHand.length !== 2) return;

        const validation = balanceManager.validateBet(betAmount);
        if (!validation.valid) {
            showToast('Cannot double down', 'error');
            return;
        }

        betAmount *= 2;
        await balanceManager.updateAfterGame(-betAmount / 2);

        playerHand.push(deck.pop());
        displayCards('playerCards', playerHand);

        const score = calculateScore(playerHand);
        document.getElementById('playerScore').textContent = score;

        if (score > 21) {
            endGame(false);
        } else {
            standGame();
        }
    }

    async function endGame(won, multiplier = 1) {
        gameActive = false;
        document.getElementById('actionButtons').style.display = 'none';
        document.getElementById('dealBtn').style.display = 'block';

        let winAmount = 0;
        if (won) {
            winAmount = betAmount * multiplier;
            await balanceManager.updateAfterGame(winAmount);
            playSound('win');
        } else {
            playSound('lose');
        }

        const resultDisplay = document.getElementById('resultDisplay');
        const resultText = document.getElementById('resultText');
        const resultAmount = document.getElementById('resultAmount');

        if (calculateScore(playerHand) > 21) {
            resultText.textContent = 'BUST! You went over 21!';
        } else if (calculateScore(dealerHand) > 21) {
            resultText.textContent = 'Dealer BUST! You WIN!';
        } else if (won) {
            resultText.textContent = 'You WIN!';
        } else if (calculateScore(playerHand) === calculateScore(dealerHand)) {
            resultText.textContent = 'PUSH - Tie!';
        } else {
            resultText.textContent = 'Dealer WINS!';
        }

        resultAmount.textContent = won ? `+${balanceManager.formatCurrency(winAmount)}` : `-${balanceManager.formatCurrency(betAmount)}`;
        resultAmount.style.color = won ? 'var(--success)' : 'var(--error)';
        resultDisplay.style.display = 'block';

        updateStats(won);
    }

    function updateStats(won) {
        const totalHands = parseInt(document.getElementById('totalHands').textContent) + 1;
        const totalWins = parseInt(document.getElementById('totalWins').textContent) + (won ? 1 : 0);
        const totalLosses = totalHands - totalWins;
        const winRate = ((totalWins / totalHands) * 100).toFixed(1);

        document.getElementById('totalHands').textContent = totalHands;
        document.getElementById('totalWins').textContent = totalWins;
        document.getElementById('totalLosses').textContent = totalLosses;
        document.getElementById('winRate').textContent = winRate + '%';
    }
</script>

<?php include '../includes/footer.php'; ?>
