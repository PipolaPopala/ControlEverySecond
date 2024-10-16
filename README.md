# Control Every Second
This convenient and user-friendly app is designed to help you effectively track and analyze how you spend your time.

Stack:
- laravel 11
- inertia
- vue 3
- tailwind css
- shadcn-vue

### Download dependencies

```shell
composer install
npm install
```

### Setup .env file

```shell
cp .env.example .env
php artisan key:generate
```

### Build the database

```shell
touch database/database.sqlite
php artisan migrate
```

### Link avatars to public and add default avatar

```shell
php artisan storage:link
mkdir storage/app/public/avatars
cp default.webp storage/app/public/avatars/
```

### Start the app

```shell
php artisan serve
npm run dev
```
