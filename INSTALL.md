SPDXHub(Dashboard) is an online interface for the SPDX database.
To Install SPDXHub(Dashboard) on your computer follow the installation  
instructions below:

***

For UNIX:
Ensure your computer matches the minimum requirements set in the README.md file  
located here: https://github.com/joverkamp/SPDXHub/blob/master/README.md

An INSTALL shell script has been provided for your convenience, located here:  
"https://github.com/joverkamp/SPDXHub/blob/master/install.sh". The following  
instructions assume you are using the intall.sh script:

This script will prompt you for your mySQL username and password, it will load  
the database (and populate it with test data) for you using those provided  
credentials.

It will also prompt you [y/n] if you wish to install the dependencies for  
SPDXHUB(Dashboard) on your machine. This is RECOMMENDED if you are unsure if you  
have previously installed any of the essentials packages required for SPDXHUB 
(Dashboard). These dependencies are listed below.

The default installation path for SPDXHub(Dashboard) and DoSOCS via the install  
script is "/var/www/".

Post-script, Apache must be configured for SPDXHub(Dashboard). This process may  
differ from machine to machine, however if this is the first webpage being  
configured for Apache, you may attempt to simply copy the example configuration  
document you have provided here:  
https://github.com/joverkamp/SPDXHub/blob/master/doc/SPDXHub.conf

- sudo cp /var/www/SPDXHub/doc/SPDXHub.conf /etc/apache2/sites- 
available/SPDXHub.conf
- sudo a2ensite SPDXHub.conf

You will then need to restart apache:
- sudo service apache2 restart

NOTE you will be required to configure the Data_Source.php file located at  
"/var/www/SPDXHub/src/function/Data_Source.php" with your mySQL credentials and  
your path to DoSPDX.py


Should you choose not to use the install.sh script:

Install Dependencies for SPDXHub(Dashboard):
- sudo apt-get install apache2
- sudo apt-get install mysql-server
- sudo apt-get install php5 libapache2-mod-php5
- sudo apt-get install php5-mysql
- sudo apt-get install git 

Clone SPDXHub(Dashboard) and DoSOCS to your machine (remember your cloning path  
for apache configuration later):
- sudo git clone https://github.com/joverkamp/SPDXHub.git
- sudo git clone https://github.com/socs-dev-env/DoSOCS.git

Install Database to mySQL:
mysql --user=(mySQL username) --password=(mySQL password) < (Enter install  
path)/SPDXHub/database/SPDX2.sql
mysql --user=(mySQL username) --password=(mySQL password) < (Enter install  
path)/SPDXHub/database/testdata.sql

Apache must then be configured for SPDXHub(Dashboard). This process may differ  
from machine to machine, however if this is the first webpage being configured  
for Apache, you may attempt to simply copy the example configuration document  
you have provided here:  
https://github.com/joverkamp/SPDXHub/blob/master/doc/SPDXHub.conf

- sudo cp (Enter install path)/SPDXHub/doc/SPDXHub.conf /etc/apache2/sites- 
available/SPDXHub.conf
- sudo a2ensite SPDXHub.conf

You will then need to restart apache:
- sudo service apache2 restart

NOTE you will be required to configure the Data_Source.php file located at  
"(Enter install path)/SPDXHub/src/function/Data_Source.php" with your mySQL  
credentials and your path to DoSPDX.py

***
