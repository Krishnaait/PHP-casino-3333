# Casino Ventures - Deployment Guide

## Quick Start

This guide will help you deploy Casino Ventures to your web server.

## Prerequisites

- PHP 7.4 or higher
- Web server (Apache, Nginx, IIS, etc.)
- FTP or SSH access to your hosting
- Domain name (optional, can use IP address)
- SSL certificate (recommended for production)

## Step 1: Prepare Your Hosting

### For Apache Hosting:

1. **Create a new directory** for the website:
   ```bash
   mkdir /home/username/public_html/casino
   ```

2. **Set permissions**:
   ```bash
   chmod 755 /home/username/public_html/casino
   chmod 644 /home/username/public_html/casino/*.php
   chmod 755 /home/username/public_html/casino/assets
   chmod 755 /home/username/public_html/casino/includes
   chmod 755 /home/username/public_html/casino/games
   chmod 755 /home/username/public_html/casino/pages
   chmod 755 /home/username/public_html/casino/api
   ```

3. **Create .htaccess** (if using Apache):
   ```apache
   <IfModule mod_rewrite.c>
       RewriteEngine On
       RewriteBase /casino/
       
       # Prevent direct access to certain files
       <FilesMatch "\.(php|phtml|php3|php4|php5|phtml|phps)$">
           Deny from all
       </FilesMatch>
   </IfModule>
   ```

### For Nginx:

1. **Create server block**:
   ```nginx
   server {
       listen 80;
       server_name yourdomain.com;
       root /var/www/casino;
       index index.php;
       
       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php-fpm.sock;
           fastcgi_index index.php;
           include fastcgi_params;
           fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
       }
   }
   ```

## Step 2: Upload Files

### Using FTP:

1. Connect to your hosting via FTP
2. Navigate to your web directory
3. Upload all files from the `casino-website` folder
4. Maintain the directory structure:
   ```
   public_html/
   ├── index.php
   ├── includes/
   ├── pages/
   ├── games/
   ├── api/
   └── assets/
   ```

### Using SSH/Git:

```bash
# SSH into your server
ssh username@yourdomain.com

# Navigate to web directory
cd /home/username/public_html

# Clone the repository
git clone https://github.com/yourusername/casino-website.git casino

# Set permissions
chmod -R 755 casino
```

## Step 3: Configure the Website

### Edit `includes/config.php`:

```php
<?php
// Company Information
define('COMPANY_NAME', 'Your Casino Name');
define('COMPANY_EMAIL', 'your-email@yourdomain.com');
define('COMPANY_PHONE', '+1-800-YOUR-PHONE');
define('COMPANY_ADDRESS', 'Your Address');

// Game Settings
define('INITIAL_BALANCE', 10000);  // Starting balance
define('MIN_BET', 200);             // Minimum bet
define('MAX_BET', 5500);            // Maximum bet
define('CURRENCY_SYMBOL', '₹');     // Currency symbol

// Site Settings
define('SITE_URL', 'https://yourdomain.com/casino/');
define('SITE_NAME', 'Casino Ventures');
?>
```

## Step 4: Enable HTTPS

### Using Let's Encrypt (Free):

```bash
# Install Certbot
sudo apt-get install certbot python3-certbot-apache

# Generate certificate
sudo certbot certonly --apache -d yourdomain.com

# Auto-renew
sudo certbot renew --dry-run
```

### Update .htaccess:

```apache
# Force HTTPS
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>
```

## Step 5: Test the Website

1. **Open in browser**:
   ```
   https://yourdomain.com/casino/
   ```

2. **Verify age verification modal** appears
3. **Test all games**:
   - Dice game
   - Chicken Adventure
   - Mines
   - Plinko
   - Slots
   - Roulette
   - Blackjack

4. **Check balance system**:
   - Initial balance: ₹10,000
   - Bets deducted correctly
   - Wins added correctly
   - Reset button works

5. **Verify legal pages**:
   - Terms & Conditions
   - Privacy Policy
   - Disclaimer
   - Responsible Gaming

## Step 6: Optimize Performance

### Enable Caching:

```apache
# .htaccess caching rules
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType text/javascript "access plus 1 month"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
</IfModule>
```

### Enable Gzip Compression:

```apache
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript
</IfModule>
```

### Minify CSS and JavaScript:

Use online tools or build tools to minify:
- `assets/css/global.css`
- `assets/css/responsive.css`
- `assets/js/main.js`
- `assets/js/check-balance.js`

## Step 7: Set Up Monitoring

### Monitor Error Logs:

```bash
# Apache
tail -f /var/log/apache2/error.log

# Nginx
tail -f /var/log/nginx/error.log
```

### Monitor Access Logs:

```bash
# Apache
tail -f /var/log/apache2/access.log

# Nginx
tail -f /var/log/nginx/access.log
```

## Step 8: Google Ads Setup

### Verify Compliance:

1. ✅ No real money transactions
2. ✅ Clear 18+ age verification
3. ✅ Transparent terms and conditions
4. ✅ Privacy policy available
5. ✅ Responsible gaming resources

### Submit to Google Ads:

1. Create Google Ads account
2. Add your website
3. Set up ad units
4. Verify compliance
5. Submit for review

### Common Issues:

- **Circumvention**: Ensure no hidden content or cloaking
- **Unacceptable Business Practices**: Clear disclosure of free-to-play nature
- **Misleading Content**: No false claims about winnings
- **Age Verification**: Enforce 18+ requirement

## Step 9: Maintenance

### Regular Tasks:

- Monitor error logs daily
- Check game functionality weekly
- Update PHP version monthly
- Backup files weekly
- Review analytics monthly

### Security Updates:

```bash
# Update PHP
sudo apt-get update
sudo apt-get upgrade php

# Update server
sudo apt-get update
sudo apt-get upgrade
```

## Troubleshooting

### Games Not Loading:

1. Check PHP version (7.4+)
2. Verify file permissions (755 for directories, 644 for files)
3. Check error logs
4. Clear browser cache

### Balance Not Updating:

1. Check session configuration
2. Verify JavaScript console for errors
3. Test balance API endpoints
4. Clear cookies and try again

### SSL Certificate Issues:

1. Verify certificate is valid
2. Check certificate expiration
3. Renew certificate if needed
4. Update .htaccess rules

### Age Verification Not Working:

1. Check browser console for errors
2. Verify JavaScript is enabled
3. Clear cookies and try again
4. Test in different browser

## Support

For technical support:
- Email: contact@casinoventures.com
- Phone: +1-800-CASINO-1
- Documentation: See README.md

## Checklist

- [ ] Files uploaded to hosting
- [ ] Permissions set correctly
- [ ] config.php configured
- [ ] HTTPS enabled
- [ ] All games tested
- [ ] Legal pages verified
- [ ] Age verification working
- [ ] Balance system working
- [ ] Error logs checked
- [ ] Performance optimized
- [ ] Google Ads setup
- [ ] Monitoring configured

## Post-Launch

1. Monitor analytics
2. Gather user feedback
3. Fix any issues
4. Optimize performance
5. Plan updates and improvements

---

**Last Updated**: January 2026
**Version**: 1.0
**Status**: Production Ready
