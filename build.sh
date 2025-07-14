// filepath: /home/geekybiswas/Desktop/idCardWeb/build.sh
#!/bin/bash
# Install dependencies
composer install --optimize-autoloader --no-dev
# Generate key
php artisan key:generate
# Cache config and routes
php artisan config:cache
php artisan route:cache
# Run migrations
php artisan migrate --force
# Create dist directory and copy public files
mkdir -p dist
cp -r public/* dist/
# Create an index.php in dist that requires the actual index.php
echo "<?php require __DIR__.'/../public/index.php';" > dist/index.php