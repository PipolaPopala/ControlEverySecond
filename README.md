# Control Every Second
This convenient and user-friendly app is designed to help you effectively track and analyze how you spend your time.

## Stack:
- laravel 11
- inertia
- vue 3
- tailwind css
- shadcn-vue

## Setup Instructions
To prepare the project, you can run the following commands:
```shell
chmod +x setup.sh
./setup.sh
```
- chmod +x setup.sh: Make the setup script executable.
- ./setup.sh: Execute the setup script.

Alternatively, you can use the following command:
___
#### Download dependencies
```shell
composer install
npm install
```
- composer install: Install PHP dependencies.
- npm install: Install JavaScript dependencies.

#### Setup .env file
```shell
cp .env.example .env
php artisan key:generate
```
- cp .env.example .env: Create a new .env file from the example.
- php artisan key:generate: Generate an application key.

#### Build the database
```shell
touch database/database.sqlite
php artisan migrate
```
- touch database/database.sqlite: Create the SQLite database file.
- php artisan migrate: Run the database migrations.

#### Link avatars to public and add default avatar
```shell
php artisan storage:link
mkdir -p storage/app/public/avatars
cp default.webp storage/app/public/avatars/
```
- php artisan storage:link: Create a symbolic link to storage.
- mkdir -p storage/app/public/avatars: Create avatars directory.
- cp default.webp storage/app/public/avatars/: Copy default avatar.

#### Start the app
```shell
php artisan serve
npm run dev
```
- php artisan serve: Start the Laravel development server.
- npm run dev: Start the Vite development server.
___
