# Beginner-sqli
SQL injection hands-on for CTF beginners: http://beginner-sqli.m1z0r3.ctf.ryotosaito.com/

This repository consists of [Laravel](https://laravel.com/), a php framework.

## Deployment with Docker
### Requirements
- Docker
- docker-compose
- Nginx (for reverse proxy, optional)

### Deployment
## Docker
```bash
cp .env.example .env
# edit .env
docker-compose build
docker-compose run score_server php artisan key:generate
# copy application key (between braces) to APP_KEY in .env
docker-compose up
```

## Deployment without Docker
### Requirements
- [Laravel 5.6 Requirements](https://laravel.com/docs/5.6#server-requirements)
  - PHP >= 7.1.3
  - OpenSSL PHP Extension
  - PDO PHP Extension
  - Mbstring PHP Extension
  - Tokenizer PHP Extension
  - XML PHP Extension
  - Ctype PHP Extension
  - JSON PHP Extension
- PHP Composer
- FPM PHP Extension
- MySQL Server
- Nginx

### Deployment

#### Prepare MySQL instance for tutorial7
Edit my.cnf.

```sh
cat << EOF > /etc/my.cnf
[mysqld@7.sqli]
datadir=/var/lib/mysqld/mysql.7.sqli
socket=/var/lib/mysqld/mysql.7.sqli/mysql.sock
log-error=/var/log/mysqld.7.sqli.log
pid-file=/var/run/mysqld/mysqld.7.sqli.pid
skip-networking
EOF
```

Prepare directory.

```sh
mkdir /var/lib/mysqld/mysql.7.sqli
chown mysql: /var/lib/mysqld/mysql.7.sqli
```

Run tutorial7 DB (ex. CentOS).

```sh
systemctl start mysqld@7.sqli
systemctl enable mysqld@7.sqli
```

If you haven't run MySQL server before, run submission DB (ex. CentOS).
```sh
systemctl start mysqld
systemctl enable mysqld
```

#### Clone repository
```sh
# cd to installation directory
git clone https://github.com/ryotosaito/beginner-sqli.git
cd beginner-sqli
```

#### Edit .env
```sh
cp .env.example .env
```
Edit .env APP_\*, CHALLENGE_URL, CHALLENGE7_\*.
- APP_\*
  - Flag-submission server
- Challenge_URL
  - Problem server
- Challenge7_\*
  - Only challenge 7 uses MySQL that you have installed. So you must specify MySQL connection information.

Sample .env
```dotenv
APP_NAME="Beginners' SQLi"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=http://your.submission.server.url

CHALLENGE_URL=http://your.problem.server.url

CHALLENGE7_DSN="mysql:dbname=m1z0r3;unix_socket=/var/lib/mysqld/mysql.7.sqli/mysql.sock"
CHALLENGE7_USERNAME=root
CHALLENGE7_PASSWORD=your_db_password

# This DB (submission DB) is differ from tutorial7 DB.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=beginner_sqli
DB_USERNAME=root
DB_PASSWORD=your_db_password
```

### Install dependencies
```sh
composer install
```

#### Install submission DB migration and initialize
```sh
php artisan migrate
php artisan db:seed --class=ChallengeSeeder
```

#### Generate Laravel app key
```sh
php artisan key:generate
```

#### Configure Nginx
##### Problem server
Example /etc/nginx/nginx.conf
```nginx
server {
        listen 80;
        server_name your.problem.server.url;
        location / {
                root /path/to/beginner-sqli/challenges;
                index index.php;
        }
        location ~ \.php$ {
                root /path/to/beginner-sqli/challenges;
                fastcgi_pass   127.0.0.1:9000;
                fastcgi_index  index.php;
                fastcgi_param  SCRIPT_FILENAME  /path/to/beginner-sqli/challenges/$fastcgi_script_name;
                include        fastcgi_params;
        }
        location ~ \.sqlite$ {
                deny all;
        }
}
```

##### Submission server
See https://laravel.com/docs/5.6/deployment#server-configuration

#### Run server
```
php-fpm
nginx # or nginx -s reload
```
