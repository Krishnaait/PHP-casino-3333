/**
 * CASINO VENTURES - Main JavaScript
 * Core functionality and utilities
 */

// ============================================
// UTILITY FUNCTIONS
// ============================================

/**
 * Show toast notification
 */
function showToast(message, type = 'info', duration = 3000) {
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `
        <div style="display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-${getIconForType(type)}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => toast.remove(), 300);
    }, duration);
}

function getIconForType(type) {
    const icons = {
        'success': 'check-circle',
        'error': 'exclamation-circle',
        'warning': 'exclamation-triangle',
        'info': 'info-circle'
    };
    return icons[type] || 'info-circle';
}

/**
 * Format currency
 */
function formatCurrency(amount) {
    return '₹' + amount.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

/**
 * Parse currency string to number
 */
function parseCurrency(str) {
    return parseFloat(str.replace(/[^\d.-]/g, ''));
}

/**
 * Validate bet amount
 */
function validateBet(amount, balance) {
    const MIN_BET = 200;
    const MAX_BET = 5500;
    
    if (isNaN(amount) || amount <= 0) {
        return { valid: false, error: 'Please enter a valid bet amount' };
    }
    if (amount < MIN_BET) {
        return { valid: false, error: `Minimum bet is ${formatCurrency(MIN_BET)}` };
    }
    if (amount > MAX_BET) {
        return { valid: false, error: `Maximum bet is ${formatCurrency(MAX_BET)}` };
    }
    if (amount > balance) {
        return { valid: false, error: 'Insufficient balance' };
    }
    return { valid: true };
}

/**
 * Generate random number between min and max
 */
function randomBetween(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

/**
 * Shuffle array
 */
function shuffleArray(array) {
    const shuffled = [...array];
    for (let i = shuffled.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
    }
    return shuffled;
}

/**
 * Play sound effect
 */
function playSound(soundName) {
    const sounds = {
        'win': 'assets/audio/win.mp3',
        'lose': 'assets/audio/lose.mp3',
        'click': 'assets/audio/click.mp3',
        'spin': 'assets/audio/spin.mp3',
        'jackpot': 'assets/audio/jackpot.mp3'
    };
    
    if (sounds[soundName]) {
        const audio = new Audio(sounds[soundName]);
        audio.volume = 0.5;
        audio.play().catch(err => console.log('Audio play failed:', err));
    }
}

/**
 * Debounce function
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/**
 * Throttle function
 */
function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// ============================================
// BALANCE MANAGEMENT
// ============================================

/**
 * Update balance display
 */
function updateBalanceDisplay(balance) {
    const balanceDisplay = document.getElementById('balance-display');
    if (balanceDisplay) {
        balanceDisplay.textContent = formatCurrency(balance);
    }
}

/**
 * Fetch current balance from server
 */
async function fetchBalance() {
    try {
        const response = await fetch('/api/get-balance.php');
        const data = await response.json();
        if (data.success) {
            updateBalanceDisplay(data.balance);
            return data.balance;
        }
    } catch (error) {
        console.error('Error fetching balance:', error);
    }
}

/**
 * Update balance on server
 */
async function updateServerBalance(amount) {
    try {
        const response = await fetch('api/update-balance.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ amount: amount })
        });
        const data = await response.json();
        if (data.success) {
            updateBalanceDisplay(data.new_balance);
            return data.new_balance;
        } else {
            showToast(data.error || 'Failed to update balance', 'error');
        }
    } catch (error) {
        console.error('Error updating balance:', error);
        showToast('Error updating balance', 'error');
    }
}

/**
 * Reset balance
 */
async function resetBalance() {
    if (confirm('Are you sure you want to reset your balance to ₹10,000?')) {
        try {
            const response = await fetch('/api/reset-balance.php', {
                method: 'POST'
            });
            const data = await response.json();
            if (data.success) {
                updateBalanceDisplay(data.new_balance);
                showToast('Balance reset to ₹10,000', 'success');
            }
        } catch (error) {
            console.error('Error resetting balance:', error);
            showToast('Error resetting balance', 'error');
        }
    }
}

// ============================================
// DOM READY
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    // Initialize balance display
    fetchBalance();

    // Reset balance button
    const resetBtn = document.getElementById('reset-balance-btn');
    if (resetBtn) {
        resetBtn.addEventListener('click', resetBalance);
    }

    // Mobile menu toggle
    const navbarToggle = document.querySelector('.navbar-toggle');
    const navbarMenu = document.querySelector('.navbar-menu');
    
    if (navbarToggle) {
        navbarToggle.addEventListener('click', function() {
            navbarMenu.classList.toggle('active');
        });
    }

    // Dropdown menu toggle on mobile
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const parent = this.closest('.nav-dropdown');
                parent.classList.toggle('active');
            }
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.navbar')) {
            navbarMenu.classList.remove('active');
        }
    });

    // Refresh balance every 30 seconds
    setInterval(fetchBalance, 30000);
});

// ============================================
// WINDOW EVENTS
// ============================================

/**
 * Handle window resize
 */
window.addEventListener('resize', debounce(function() {
    // Close mobile menu on resize to desktop
    if (window.innerWidth > 768) {
        const navbarMenu = document.querySelector('.navbar-menu');
        if (navbarMenu) {
            navbarMenu.classList.remove('active');
        }
    }
}, 250));

/**
 * Handle page visibility
 */
document.addEventListener('visibilitychange', function() {
    if (!document.hidden) {
        // Refresh balance when tab becomes visible
        fetchBalance();
    }
});

// ============================================
// ERROR HANDLING
// ============================================

/**
 * Global error handler
 */
window.addEventListener('error', function(event) {
    console.error('Global error:', event.error);
    showToast('An error occurred. Please refresh the page.', 'error');
});

/**
 * Unhandled promise rejection
 */
window.addEventListener('unhandledrejection', function(event) {
    console.error('Unhandled promise rejection:', event.reason);
    showToast('An unexpected error occurred.', 'error');
});

// ============================================
// PERFORMANCE MONITORING
// ============================================

/**
 * Log performance metrics
 */
window.addEventListener('load', function() {
    if (window.performance && window.performance.timing) {
        const timing = window.performance.timing;
        const loadTime = timing.loadEventEnd - timing.navigationStart;
        console.log(`Page load time: ${loadTime}ms`);
    }
});

// ============================================
// KEYBOARD SHORTCUTS
// ============================================

document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + R to reset balance
    if ((e.ctrlKey || e.metaKey) && e.key === 'r') {
        e.preventDefault();
        resetBalance();
    }
    
    // Escape to close modals
    if (e.key === 'Escape') {
        const modals = document.querySelectorAll('.modal-overlay.active');
        modals.forEach(modal => {
            modal.classList.remove('active');
        });
    }
});
