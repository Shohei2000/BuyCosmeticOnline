#!/usr/bin/env bash
rm -rf /var/www
ln -sf /vagrant /var/www
add-apt-repository -y ppa:ondrej/php
apt-get update
apt-get install -y apache2
apt-get install -y php php-json php-mysql libapache2-mod-php
