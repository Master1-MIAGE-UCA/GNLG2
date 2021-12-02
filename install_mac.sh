#!/bin/zsh
#NOT FINISHED !

db_user = "root"
db_name = "laravel"
db_pass = ""

echo "Installing Brew ..."
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

echo "Installing MySQL ..."
brew install mysql

echo "Installing PHP ..."
brew install php

echo "Installing NodeJS"
brew install node

echo "Installing Composer ..."
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

echo "generating and importing sql files to laravel MySQL database ..."
mysql -u ${db.user} --password=${db.pass} -e "CREATE DATABASE ${db.name}"
mysql -u ${db.user} --password=${db.pass} < db/act_user3.sql
mysql -u ${db.user} --password=${db.pass} < db/act_div3.sql
mysql -u ${db.user} --password=${db.pass} < db/act_log.sql
mysql -u ${db.user} --password=${db.pass} < db/act_mar3-2.sql
mysql -u ${db.user} --password=${db.pass} < db/act_mar3.sql
mysql -u ${db.user} --password=${db.pass} < db/act_metadb.sql
mysql -u ${db.user} --password=${db.pass} < db/act_metalg.sql
mysql -u ${db.user} --password=${db.pass} < db/act_mgrplg.sql
mysql -u ${db.user} --password=${db.pass} < db/act_nai3.sql
mysql -u ${db.user} --password=${db.pass} < db/act_params.sql
mysql -u ${db.user} --password=${db.pass} < db/act_prenom.sql
mysql -u ${db.user} --password=${db.pass} < db/act_sums.sql
mysql -u ${db.user} --password=${db.pass} < db/act_traceip.sql
mysql -u ${db.user} --password=${db.pass} < db/act_user3.sql

echo "Starting build process ..."
cd laravel
cp .env.example .env
composer install
npm install
php artisan key:generate

echo "Starting development server ..."
php artisan serve