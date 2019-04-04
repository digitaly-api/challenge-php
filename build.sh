#!/bin/bash
docker-compose up -d
docker exec api_php composer install
docker exec api_php php artisan migrate
echo "Host: http://localhost:8086"
echo "Documentation Api: https://documenter.getpostman.com/view/3247263/S1EH42Nx"
