# Laragon Setup Script for Café Aroma
# Run this script in PowerShell as Administrator

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  Café Aroma - Laragon Setup Script" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Step 1: Copy project to Laragon
$source = "c:\Users\Milan\OneDrive\Desktop\cafe-management"
$destination = "C:\laragon\www\cafe-management"

Write-Host "[1/4] Copying project to Laragon..." -ForegroundColor Yellow
if (Test-Path $destination) {
    Remove-Item -Recurse -Force $destination
}
Copy-Item -Path $source -Destination $destination -Recurse -Force
Write-Host "✓ Project copied to $destination" -ForegroundColor Green
Write-Host ""

# Step 2: Create MySQL database
Write-Host "[2/4] Please create a MySQL database:" -ForegroundColor Yellow
Write-Host "  1. Open Laragon and start Apache + MySQL" -ForegroundColor White
Write-Host "  2. Click 'Database' button in Laragon" -ForegroundColor White
Write-Host "  3. Create database: cafe_management" -ForegroundColor White
Write-Host ""
Read-Host "Press Enter when database is created..."
Write-Host ""

# Step 3: Update .env file
Write-Host "[3/4] Configuring database connection..." -ForegroundColor Yellow
$envContent = @"
APP_NAME="Café Aroma"
APP_ENV=local
APP_KEY=base64:$(php -r "echo base64_encode(random_bytes(32));")
APP_DEBUG=true
APP_URL=http://cafe-management.test

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cafe_management
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@cafearoma.com"
MAIL_FROM_NAME="Café Aroma"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="Café Aroma"
VITE_PUSHER_APP_KEY=""
VITE_PUSHER_HOST=""
VITE_PUSHER_PORT=""
VITE_PUSHER_SCHEME=""
VITE_PUSHER_APP_CLUSTER=""
"@
$envContent | Set-Content "$destination\.env"
Write-Host "✓ .env file configured for MySQL" -ForegroundColor Green
Write-Host ""

# Step 4: Run migrations
Write-Host "[4/4] Running migrations and seeding database..." -ForegroundColor Yellow
Set-Location $destination
php artisan key:generate --force
php artisan migrate:fresh --seed --force
Write-Host "✓ Database migrated and seeded" -ForegroundColor Green
Write-Host ""

# Done!
Write-Host "========================================" -ForegroundColor Green
Write-Host "  Setup Complete!" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Green
Write-Host ""
Write-Host "Your café is ready at:" -ForegroundColor Cyan
Write-Host "  http://cafe-management.test" -ForegroundColor White
Write-Host ""
Write-Host "Login credentials:" -ForegroundColor Cyan
Write-Host "  Email: admin@cafearoma.com" -ForegroundColor White
Write-Host "  Password: password123" -ForegroundColor White
Write-Host ""
Write-Host "Enjoy your Café Aroma! ☕" -ForegroundColor Yellow
