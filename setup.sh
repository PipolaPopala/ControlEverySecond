
#!/bin/bash
set -e

echo "Старт сборки проекта..."

# Download dependencies
echo "Скачивание зависимостей..."
composer install
npm install

# Setup .env file
echo "Настройка файла .env..."
cp .env.example .env
php artisan key:generate

# Build the database
echo "Создание базы данных..."
touch database/database.sqlite
php artisan migrate

# Link avatars to public and add default avatar
echo "Ссылка на аватары и добавление стандартного аватара..."
php artisan storage:link
mkdir -p storage/app/public/avatars
cp default.webp storage/app/public/avatars/

echo "Проект успешно собран. Теперь запустите в разных терминалах:"
echo "- php artisan serve"
echo "- npm run dev"
