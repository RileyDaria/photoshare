#!/bin/bash

sudo apt-get update -y
sudo apt-get install -y apache2 git php5 php5-curl mysql-client curl php5-mysql vim

sudo curl -sS https://getcomposer.org/installer | sudo php &> /tmp/getcomposer.txt

sudo php composer.phar require aws/aws-sdk-php &> /tmp/runcomposer.txt

git clone https://github.com/ITMT-430/photoshare.git

sudo mv photoshare/* /var/www/html
#cd /var/www/html/navrozwork
#sudo mv *.html ../
#sudo mv *.css ../
#sudo mv *.jpg ../
