#!/bin/bash

sudo apt-get update -y
sudo apt-get install -y apache2 git php5 php5-curl mysql-client curl php5-mysql vim

git clone https://github.com/ITMT-430/photoshare.git

sudo mv photoshare/* /var/www/html
