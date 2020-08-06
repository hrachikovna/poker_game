#Trial

Hi, this is demo version for poker hands.

To build this demo app I used Laravel latest version - 7
Version PHP7@2
Database MySQL
Queue Jobs -  Database

1. git clone git@bitbucket.org:j4maria/trial.git
2. mv .env.example .env 
       edit please the database details 
3. composer install
4. php artisan clear-compiled
5. composer dumpautoload
  5.1 php artisan migrate 
6. php artisan queue:work
7. on the terminal  - php artisan serve 


