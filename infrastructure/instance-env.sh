#!/bin/bash

sudo apt-get install software-properties-common -y 
sudo apt-get install python-software-properties -y
sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y
sudo apt-get update -y
sudo apt-get purge php5-common -y
sudo apt-get install php7.0 php7.0-fpm php7.0-mysql -y
sudo apt-get --purge autoremove -y
sudo apt-get update -y
sudo apt-get install -y apache2 git php-curl mysql-client curl vim

sudo curl -sS https://getcomposer.org/installer | sudo php &> /tmp/getcomposer.txt

sudo php composer.phar require aws/aws-sdk-php &> /tmp/runcomposer.txt

git clone https://github.com/ITMT-430/photoshare.git

sudo mv photoshare/* /var/www/html
cd /var/www/html/navrozwork
sudo mv signin.html ../
sudo mv signup.html ../
sudo mv style1.css ../
sudo mv style2.css
sudo mv *.jpg ../
