Skyline-client

How to install:

- git clone git@bitbucket.org:serhii-v/skyline-client.git
- cd skyline-client
- If you would like to use Docker (installing may take some while, first time installing 30-60 min depends on your perfomance):
    - git clone https://github.com/Laradock/laradock.git laradock-skyline-client
    - cd laradock-skyline-client
    - cp .env.example .env
    - Change prefix in .env
    - docker-compose up -d nginx php-fpm workspace redis mailhog memcached mariadb phpmyadmin
    - docker-compose exec workspace bash
- composer install
- cp .env.example .env
- php artisan install
