# Project Name
* Task_of_big_m

## Installation
### Backend
* 1 - clone repo ->>> https://github.com/mdrijonmia1271/Task_of_big_m.git
* 2 - Go to the folder application using `cd` command on your cmd or terminal
* 3 - Run `composer install` on your cmd or terminal
* 4 - Copy `.env.example` file to `.env` on the root folder. You can type `copy .env.example .env` if using command prompt Windows or
      `cp .env.example .env` if using terminal, Ubuntu
* 5 - Open your `.env` file and change the database name (`DB_DATABASE`) to whatever you have, username (`DB_USERNAME`) and password 
      (`DB_PASSWORD`) field correspond to your configuration.
* 6 - Run `php artisan key:generate`
* 7 - Run `php artisan migrate`
* 8 - Run `php artisan db:seed`
* 9 - Run `php artisan serve`
* 10 - Run `npm install && npm run dev`
* 11 - Go to http://localhost:8000/

