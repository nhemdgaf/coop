1. Clone
2. cd coop
3. composer install
4. create new database coop
4. Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env
5. Open .env file and change the database name to coop
6. php artisan key:generate
7. php artisan migrate
