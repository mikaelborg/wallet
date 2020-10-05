## Technologies used
- Docker
- Laravel
- VueJS
- Vue Router
- VueX

## Setting up the project
1. Download the code from git using the command: **git clone git://github.com/mikaelborg/wallet.git**
2. Build the docker containers using: **docker-compose build app && docker-compose up -d**
3. Install packages using: **docker-compose exec app composer install && npm install**
4. Build the database and run sample seeders (users and wallets): **docker-compose exec app php artisan migrate:fresh --seed**

## Info about the project
1. A **test@gmail.com** default user and a **super@gmail.com** super user are provided by the seeders. Both their passwords are **password**.
2. Every user can access the **wallets** page, and create, edit or delete wallets.
3. The super user has special access to the **users**, where he can see all info about users, and edit their wallets.

## Room for improvement
1. Better error handling and validation
2. Animations on buttons while fetching data
3. Refactoring of code