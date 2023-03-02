#!/bin/bash

cd /var/www/app
php artisan migrate
php artisan db:seed