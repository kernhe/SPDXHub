#!/bin/bash

#Setup User Name and Password for MySql
u="root"
echo -n "Enter desired password for mySQL root user: "
read p

#Install dependencies, may remove later
sudo apt-get install apache2
sudo apt-get install mysql-server
sudo apt-get install php5 libapache2-mod-php5
sudo apt-get install php5-mysql
sudo apt-get install git

#Clone Repos
echo "Moving to /var/www/ ..."
cd /var/www/
git clone https://github.com/socs-dev-env/DoSOCS
git clone https://github.com/joverkamp/SPDXHub

#Config apache
sudo cp /var/www/SPDXHub/doc/SPDXHub.conf /etc/apache2/sites-available/SPDXHub.conf
cd /etc/apache2/sites-available/
sudo a2ensite SPDXHub.conf

#Install Database
echo "Install SOCS Database..."
mysql --user=$u --password=$p < /var/www/SPDXHub/database/SPDX2.sql
mysql --user=$u --password=$p < /var/www/SPDXHub/database/testdata.sql
#Exit mySql

#Move source to base directorie
sudo chmod 777 /var/www/DoSOCS/src -R
sudo chmod 777 /var/www/SPDXHub/src -R

sudo service apache2 restart

echo "Install Complete"
echo "Don't forget to update the setting files ('DoSOCS/settings.py' AND 'SPDXHub/function/Data_Source.php') with the database"
echo "connection information, and with the paths to Ninka and FOSSology. File located in /var/www/"



