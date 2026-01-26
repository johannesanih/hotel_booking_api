sudo apk update
sudo apk add php php-cli php-mbstring php-xml php-curl php-zip php-pdo php-pdo_mysql php-pdo_pgsql php-openssl php-tokenizer php-phar

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
sudo mv composer.phar /usr/local/bin/composer
composer --version

sudo apk add \
php83-session \
php83-fileinfo \
php83-iconv \
php83-dom

sudo apk add \
php83-xml \
php83-simplexml \
php83-ctype

php -m | grep -E "session|fileinfo|iconv|dom"

sudo apk add php83-xmlwriter
cat /etc/php83/conf.d/00_xmlwriter.ini

composer install
cp .env.example .env
php artisan key:generate
php artisan serve

sudo apk add php83-sqlite3 php83-pdo_sqlite

php -m | grep sqlite