#!/bin/bash

sudo apt-get update -y
sudo apt-get install -y git php5 php5-curl mysql-client curl php5-mysql vim

git clone https://github.com/ITMT-430/photoshare.git

#export DEBIAN_FRONTEND=noninteractive
#sudo -E apt-get -q -y install mysql-server

mysql -u user -p < photoshare/php/127_0_0_1.sql
