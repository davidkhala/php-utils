#!/usr/bin/env bash
set -e

CURRENT=$(cd $(dirname ${BASH_SOURCE}) && pwd)

fcn=$1
remain_params=""
for ((i = 2; i <= ${#}; i++)); do
    j=${!i}
    remain_params="$remain_params $j"
done
MySQL() {
    local mysqlInstaller="curl --silent --show-error https://raw.githubusercontent.com/davidkhala/ubuntu-utils/master/database/mysql.sh"
    $mysqlInstaller | bash -s install
}
apacheServer() {
    sudo apt install -y apache2 libapache2-mod-fastcgi
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
$fcn $remain_params
