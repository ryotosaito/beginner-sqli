docker-compose up -d && \
docker-compose exec app php artisan key:generate && \
docker-compose exec app php artisan migrate && \
docker-compose exec app php artisan db:seed --class=ChallengeSeeder
