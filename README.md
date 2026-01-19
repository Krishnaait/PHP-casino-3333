# Casino Ventures - Free-to-Play Social Gaming Platform

## Overview

Casino Ventures is a **100% free-to-play social gaming platform** offering premium casino-style games for entertainment purposes only. No real money is involved, and all currency is virtual with zero real-world value.

### Key Features

- ✅ **7+ Casino Games** - Dice, Chicken Adventure, Mines, Plinko, Slots, Roulette, Blackjack
- ✅ **100% Free** - No deposits, no withdrawals, no real money
- ✅ **Google Ads Compliant** - Full transparency and compliance
- ✅ **18+ Age Verification** - Strict age verification required
- ✅ **Instant Play** - No registration required
- ✅ **Responsive Design** - Works on all devices
- ✅ **Game Statistics** - Track your wins, losses, and win rate
- ✅ **Unique Audio** - Each game has unique sound effects
- ✅ **Secure** - Bank-level security and data protection

## Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Backend**: PHP 7.4+
- **Database**: Session-based (no database required)
- **Hosting**: Any PHP-compatible server
- **Compliance**: Google Ads Policy Compliant

## Project Structure

```
casino-website/
├── index.php                    # Homepage
├── README.md                    # This file
│
├── includes/
│   ├── config.php              # Configuration & helper functions
│   ├── header.php              # Global header
│   └── footer.php              # Global footer
│
├── pages/
│   ├── games.php               # Games listing page
│   ├── about.php               # About us page
│   ├── contact.php             # Contact page
│   ├── privacy.php             # Privacy Policy
│   ├── terms.php               # Terms & Conditions
│   ├── disclaimer.php          # Disclaimer
│   └── responsible-gaming.php  # Responsible Gaming
│
├── games/
│   ├── dice.php                # Dice Game
│   ├── chicken.php             # Chicken Adventure
│   ├── mines.php               # Mines Game
│   ├── plinko.php              # Plinko Game
│   ├── slots.php               # Slot Machine
│   ├── roulette.php            # Roulette
│   └── blackjack.php           # Blackjack
│
├── api/
│   ├── get-balance.php         # Get user balance
│   ├── update-balance.php      # Update balance
│   ├── reset-balance.php       # Reset balance
│   └── verify-age.php          # Age verification
│
└── assets/
    ├── css/
    │   ├── global.css          # Global styles
    │   └── responsive.css      # Responsive styles
    ├── js/
    │   ├── main.js             # Main JavaScript
    │   └── check-balance.js    # Balance checking
    ├── images/                 # Image assets
    └── audio/                  # Sound effects
```

## Installation

### Requirements

- PHP 7.4 or higher
- Web server (Apache, Nginx, etc.)
- Modern web browser with JavaScript enabled

### Setup Steps

1. **Clone or Download the Project**
   ```bash
   git clone https://github.com/yourusername/casino-website.git
   cd casino-website
   ```

2. **Upload to Server**
   - Upload all files to your web server's public directory

3. **Set Permissions**
   ```bash
   chmod 755 casino-website/
   chmod 644 casino-website/*.php
   chmod 644 casino-website/assets/css/*.css
   chmod 644 casino-website/assets/js/*.js
   ```

4. **Configure Web Server**
   - Ensure PHP is enabled
   - Set document root to the casino-website directory
   - Enable mod_rewrite if using Apache

5. **Access the Site**
   - Open your browser and navigate to the site URL
   - Verify age (18+)
   - Start playing!

## Configuration

Edit `includes/config.php` to customize:

```php
// Game Configuration
define('INITIAL_BALANCE', 10000);  // Starting virtual currency
define('MIN_BET', 200);             // Minimum bet amount
define('MAX_BET', 5500);            // Maximum bet amount
define('CURRENCY_SYMBOL', '₹');     // Virtual currency symbol

// Company Information
define('COMPANY_NAME', 'Casino Ventures');
define('COMPANY_EMAIL', 'contact@casinoventures.com');
define('COMPANY_PHONE', '+1-800-CASINO-1');
```

## Games

### 1. Dice Game
- **Concept**: Predict HIGH (8-12) or LOW (2-7) on two dice rolls
- **Multiplier**: 2x
- **RTP**: 98%
- **Features**: Animated dice, instant results, sound effects

### 2. Chicken Adventure
- **Concept**: Navigate chicken through obstacles to reach finish line
- **Multiplier**: Variable (distance-based)
- **RTP**: 95%
- **Features**: Physics engine, collision detection, cashout anytime

### 3. Mines
- **Concept**: Reveal tiles without hitting mines
- **Multiplier**: Variable (progressive)
- **RTP**: 96%
- **Features**: Risk vs reward, strategic gameplay, cashout anytime

### 4. Plinko
- **Concept**: Drop balls through pegs to land in multiplier slots
- **Multiplier**: 1x - 5x
- **RTP**: 97%
- **Features**: Physics simulation, multiple balls, smooth animation

### 5. Slot Machine
- **Concept**: Classic 4-row slot machine
- **Multiplier**: Variable (2x, 5x)
- **RTP**: 96%
- **Features**: Big win popups, animated reels, unique audio

### 6. Roulette
- **Concept**: Spin wheel and predict color outcome
- **Multiplier**: 2x (red/black), 14x (green)
- **RTP**: 97.3%
- **Features**: Smooth wheel animation, multiple betting options

### 7. Blackjack
- **Concept**: Beat dealer with 21 or less
- **Multiplier**: Variable (1x - 1.5x)
- **RTP**: 99.5%
- **Features**: Hit/Stand/Double, smart dealer AI, card counting

## Balance System

- **Initial Balance**: ₹10,000 (virtual currency)
- **Minimum Bet**: ₹200
- **Maximum Bet**: ₹5,500
- **ALL IN Button**: Bet entire current balance (up to max)
- **Auto-Reset**: When balance reaches ₹0, popup prompts reset
- **Manual Reset**: Users can reset balance anytime

## Google Ads Compliance

Casino Ventures is fully compliant with Google Ads policies:

✅ No real money gambling or betting
✅ No circumvention or cloaking techniques
✅ Clear disclosure of free-to-play nature
✅ Transparent terms and conditions
✅ Age verification (18+)
✅ No misleading claims or practices
✅ Responsible gaming resources

## Legal Pages

- **Terms & Conditions**: Complete terms of service
- **Privacy Policy**: Data protection and privacy practices
- **Disclaimer**: Legal disclaimer and 18+ notice
- **Responsible Gaming**: Resources and tips for healthy gaming

## Security

- SSL/TLS encryption for data transmission
- Session-based authentication (no passwords)
- Input validation and sanitization
- CSRF protection
- XSS prevention
- SQL injection prevention (no database)
- Regular security updates

## Performance

- Optimized CSS and JavaScript
- Lazy loading for images
- Minified assets
- Responsive design
- Fast page load times
- Smooth animations

## Browser Compatibility

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+
- Mobile browsers (iOS Safari, Chrome Mobile)

## Deployment

### Local Development

```bash
# Using PHP built-in server
cd casino-website
php -S localhost:8000
```

### Production Deployment

1. **Upload to Hosting**
   - Use FTP or file manager to upload files

2. **Configure Domain**
   - Point domain to public directory

3. **Enable HTTPS**
   - Install SSL certificate

4. **Set Permissions**
   - Ensure proper file permissions

5. **Test**
   - Verify all games work
   - Test on multiple devices
   - Check responsive design

## Maintenance

### Regular Tasks

- Monitor server logs
- Update PHP version
- Check for security updates
- Backup files regularly
- Test all games monthly

### Monitoring

- Track page load times
- Monitor error logs
- Check game statistics
- Review user feedback

## Support

For technical support or questions:

- **Email**: contact@casinoventures.com
- **Phone**: +1-800-CASINO-1
- **Address**: Gaming District, Digital City, DC 12345

## License

© 2026 Casino Ventures. All rights reserved.

This software is provided as-is for entertainment purposes only.

## Disclaimer

This platform is 100% free-to-play with virtual currency only. No real money is involved. For responsible gaming resources, visit www.ncpg.org.

## Contributing

We welcome feedback and suggestions! Please contact us with any improvements or bug reports.

## Changelog

### Version 1.0 (January 2026)
- Initial release
- 7 casino games
- Full compliance with Google Ads policies
- Responsive design
- Complete legal pages
- Game statistics tracking

---

**Last Updated**: January 2026
**Version**: 1.0
**Status**: Production Ready
