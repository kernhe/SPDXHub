#!/bin/bash

echo "INSTALL DEPENDENCIES [y/n]: "
read result

if [ "$result" = "y" ] || [ "$result" = "Y" ]; then
  #Install dependencies, may remove later
  sudo apt-get install apache2
  sudo apt-get install mysql-server
  sudo apt-get install php5 libapache2-mod-php5
  sudo apt-get install php5-mysql
  sudo apt-get install git
fi

#Clone Repos
echo "Moving to /var/www/ ..."
cd /var/www/
git clone https://github.com/socs-dev-env/DoSOCS
git clone https://github.com/joverkamp/SPDXHub

#Setup User Name and Password for MySql
echo -n "Enter [desired] username for mySQL: "
read u
echo -n "Enter [desired] password for mySQL: "
read p

#Install Database
echo "Install SPDXHub Database..."
mysql --user=$u --password=$p < /var/www/SPDXHub/database/SPDX2.sql
mysql --user=$u --password=$p < /var/www/SPDXHub/database/testdata.sql
#Exit mySql

#Move source to base directorie
echo "Changing permissions ..."
sudo chmod 777 /var/www/DoSOCS/src -R
sudo chmod 777 /var/www/SPDXHub/src -R

echo "Install Complete"
echo "Don't forget to update the setting files ('DoSOCS/settings.py' AND 'SPDXHub/function/Data_Source.php') with the database"
echo "connection information, and with the paths to Ninka and FOSSology." 
echo -n "Be sure to configure Apache with the DocumentRoot /var/www/SPDXHub/src."
echo "An example .conf for Apache can be found at /var/www/SPDXHub/doc/SPDXHUB.conf"



