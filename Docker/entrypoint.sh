#! /bin/bash

# Exit immediately if any command fails
set -e

# Wait for PostgreSQL to be fully ready
# echo "Waiting for PostgreSQL to be ready..."
# until PGPASSWORD=$DB_PASSWORD psql -h "$DB_HOST" -U "$DB_USERNAME" -d "$DB_DATABASE" -c '\q' > /dev/null 2>&1; do
#   >&2 echo "PostgreSQL is unavailable - retrying in 2 seconds..."
#   sleep 2
# done

# echo "PostgreSQL is ready!"

if [ ! -f "vendor/autoload.php" ]; then
    composer install --optimize-autoloader --no-interaction --no-dev
fi
# if [ ! -f ".env" ]; then
echo "Creating env file for $APP_ENV"
cp .env.example .env
# fi
php artisan migrate 
php artisan key:generate 
php artisan cache:clear 
php artisan config:clear 
php artisan route:clear 
php artisan storage:link
php artisan optimize

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"
