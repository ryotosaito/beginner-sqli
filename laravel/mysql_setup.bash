#!/bin/bash
# https://cweiske.de/tagebuch/docker-mysql-available.htm

# wait until MySQL is really available
maxcounter=45

counter=1
until mysql -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" -e "show databases;" > /dev/null 2>&1; do
    sleep 1
    ((counter++))
    if [ $counter -gt $maxcounter ]; then
        >&2 echo "We have been waiting for MySQL too long already; failing."
        exit 1
    fi;
done

php artisan migrate --force -n
php artisan db:seed --force -n -q --class=ChallengeSeeder || true
