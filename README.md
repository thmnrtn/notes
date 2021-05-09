# Notes Application

## Deployment

Written in Laravel 7 to work on a PHP 7.2 server. Uses VueJS with InertiaJS.

### Composer
Install composer dependencies using the following command:

```
composer install
```

### Env
Copy .env.example and rename to .env

```
cp .env.example .env
```

Generate an app key

```
php artisan key:generate
```

This application uses an sqlite database by default so create that with

```
touch database/database.sqlite
```

### Database setup

#### Migrations
```
php artisan migrate
```

#### Seeders
If you want the database to be seeded with some initial notes run the seed command
```
php artisan db:seed
```

### NPM
Dependencies need to be installed by using the following commands:
```
npm install && npm run dev
```

Boot up the server
```
php artisan serve
```

## Testing
There is one basic test included which can be run with
```
vendor/bin/phpunit
```

## Limitations
Due to time constraints (i.e. a 3 hour limit) there are the following which are not as good as they could be:
- The layout of the notes overflows to the right once you have more than a certain number of notes. This could be resolved by adding pagination
- Validation works i.e. it won't let you save but there are no flash messages
