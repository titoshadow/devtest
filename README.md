# Devtest
## SDE III Exercise Proposal

## Execution

We are going to use Laravel's built in Docker environment, Sail.

To do this, we just need to run these instructions:
```sh
cd /devtest
composer install
cp .env.example .env
./vendor/bin/sail up -d 
docker exec -it devtest-laravel.test-1 /bin/bash
yarn install 
npm run prod
php artisan migrate --seed
```
After issuing the last command, the app will retrieve the data and be ready to serve on
http://localhost
