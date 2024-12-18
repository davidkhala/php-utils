#!/usr/bin/env bash
set -e

MySQL() {
    local mysqlInstaller="curl --silent --show-error https://raw.githubusercontent.com/davidkhala/ubuntu-utils/master/database/mysql.sh"
    $mysqlInstaller | bash -s setup
}
apacheServer() {
    sudo apt install -y apache2
}
PHP() {
    local phpInstaller="curl --silent --show-error https://raw.githubusercontent.com/davidkhala/ubuntu-utils/master/php.sh"
    $phpInstaller | bash -s install
    $phpInstaller | bash -s installDevPack
    $phpInstaller | bash -s installApacheInterpretor
    $phpInstaller | bash -s installMySQLConnector
}
phpComposer() {
    wget https://raw.githubusercontent.com/composer/getcomposer.org/master/web/installer -O - -q | php -- --quiet
    sudo mv composer.phar /usr/local/bin/composer
}
LAMP() {
    # for ubuntu only
    MySQL
    apacheServer
    PHP
}
$@
