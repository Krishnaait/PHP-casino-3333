/**
 * CASINO VENTURES - Balance Checking
 * Real-time balance monitoring and updates
 */

class BalanceManager {
    constructor() {
        this.currentBalance = 0;
        this.minBalance = 0;
        this.maxBalance = 999999999;
        this.updateInterval = null;
        this.init();
    }

    /**
     * Initialize balance manager
     */
    init() {
        this.fetchBalance();
        // Auto-refresh balance every 60 seconds
        this.updateInterval = setInterval(() => this.fetchBalance(), 60000);
    }

    /**
     * Fetch balance from server
     */
    async fetchBalance() {
        try {
            const response = await fetch('api/get-balance.php');
            const data = await response.json();
            
            if (data.success) {
                this.currentBalance = data.balance;
                this.updateDisplay();
                this.checkLowBalance();
            }
        } catch (error) {
            console.error('Error fetching balance:', error);
        }
    }

    /**
     * Update balance display
     */
    updateDisplay() {
        const display = document.getElementById('balance-display');
        if (display) {
            display.textContent = this.formatCurrency(this.currentBalance);
            this.animateUpdate(display);
        }
    }

    /**
     * Animate balance update
     */
    animateUpdate(element) {
        element.style.animation = 'none';
        setTimeout(() => {
            element.style.animation = 'pulse 0.5s ease';
        }, 10);
    }

    /**
     * Format currency
     */
    formatCurrency(amount) {
        return '₹' + amount.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    /**
     * Check if balance is low
     */
    checkLowBalance() {
        const lowBalanceThreshold = 1000;
        if (this.currentBalance < lowBalanceThreshold && this.currentBalance > 0) {
            this.showLowBalanceWarning();
        }
    }

    /**
     * Show low balance warning
     */
    showLowBalanceWarning() {
        // Only show once per session
        if (!sessionStorage.getItem('lowBalanceWarningShown')) {
            showToast('Your balance is running low! Reset your balance to continue playing.', 'warning', 5000);
            sessionStorage.setItem('lowBalanceWarningShown', 'true');
        }
    }

    /**
     * Check if balance is zero
     */
    checkZeroBalance() {
        if (this.currentBalance <= 0) {
            this.showZeroBalanceModal();
        }
    }

    /**
     * Show zero balance modal
     */
    showZeroBalanceModal() {
        const modal = document.createElement('div');
        modal.className = 'modal-overlay active';
        modal.innerHTML = `
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Out of Balance!</h2>
                    <p class="disclaimer-text">Your balance has reached zero</p>
                </div>
                <div class="modal-body">
                    <p>You've run out of virtual currency! Reset your balance to continue playing.</p>
                    <p><strong>Remember:</strong> This is a FREE-TO-PLAY platform. You can reset your balance anytime!</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="resetBalance(); this.closest('.modal-overlay').remove();">
                        Reset Balance
                    </button>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
    }

    /**
     * Update balance after game
     */
    async updateAfterGame(winAmount) {
        try {
            const response = await fetch('api/update-balance.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ amount: winAmount })
            });
            
            const data = await response.json();
            if (data.success) {
                this.currentBalance = data.new_balance;
                this.updateDisplay();
                
                if (winAmount > 0) {
                    showToast(`You won ${this.formatCurrency(winAmount)}!`, 'success');
                } else if (winAmount < 0) {
                    showToast(`You lost ${this.formatCurrency(Math.abs(winAmount))}`, 'error');
                }
                
                this.checkZeroBalance();
                return data.new_balance;
            }
        } catch (error) {
            console.error('Error updating balance:', error);
            showToast('Error updating balance', 'error');
        }
    }

    /**
     * Validate bet
     */
    validateBet(betAmount) {
        const MIN_BET = 200;
        const MAX_BET = 5500;
        
        if (isNaN(betAmount) || betAmount <= 0) {
            return { valid: false, error: 'Please enter a valid bet amount' };
        }
        if (betAmount < MIN_BET) {
            return { valid: false, error: `Minimum bet is ${this.formatCurrency(MIN_BET)}` };
        }
        if (betAmount > MAX_BET) {
            return { valid: false, error: `Maximum bet is ${this.formatCurrency(MAX_BET)}` };
        }
        if (betAmount > this.currentBalance) {
            return { valid: false, error: 'Insufficient balance' };
        }
        return { valid: true };
    }

    /**
     * Get current balance
     */
    getBalance() {
        return this.currentBalance;
    }

    /**
     * Set balance (admin only)
     */
    setBalance(amount) {
        this.currentBalance = amount;
        this.updateDisplay();
    }

    /**
     * Destroy balance manager
     */
    destroy() {
        if (this.updateInterval) {
            clearInterval(this.updateInterval);
        }
    }
}

// Initialize balance manager when DOM is ready
let balanceManager;
document.addEventListener('DOMContentLoaded', function() {
    balanceManager = new BalanceManager();
});

// Cleanup on page unload
window.addEventListener('beforeunload', function() {
    if (balanceManager) {
        balanceManager.destroy();
    }
});
