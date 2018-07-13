docker-compose up -d && \
until docker-compose exec database mysql -uroot -p$(docker-compose exec database bash -c 'echo $MYSQL_ROOT_PASSWORD') -e";" &>/dev/null; do sleep 1; done && \
docker-compose exec app php artisan key:generate && \
docker-compose exec app php artisan migrate && \
docker-compose exec app php artisan db:seed --class=ChallengeSeeder
