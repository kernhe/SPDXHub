SPDXHub(Dashboard) is an online interface for the SPDX database.
To Install SPDXHub(Dashboard) on your computer follow the installation instructions below:<br/>

***

**For UNIX**:
Ensure your computer matches the minimum requirements set in the README.md file  
located here: https://github.com/joverkamp/SPDXHub/blob/master/README.md<br/>

An INSTALL shell script has been provided for your convenience, located here:  
"https://github.com/joverkamp/SPDXHub/blob/master/install.sh". The following  
instructions assume you are using the intall.sh script:<br/>

This script will prompt you for your mySQL username and password, it will load  
the database (and populate it with test data) for you using those provided  
credentials.<br/>

It will also prompt you [y/n] if you wish to install the dependencies for  
SPDXHUB(Dashboard) on your machine. This is RECOMMENDED if you are unsure if you  
have previously installed any of the essentials packages required for SPDXHUB 
(Dashboard). These dependencies are listed below.<br/>

The default installation path for SPDXHub(Dashboard) and DoSOCS via the install  
script is "/var/www/".<br/>

Post-script, Apache must be configured for SPDXHub(Dashboard). This process may  
differ from machine to machine, however if this is the first webpage being  
configured for Apache, you may attempt to simply copy the example configuration  
document you have provided here:
https://github.com/joverkamp/SPDXHub/blob/master/doc/SPDXHub.conf<br/>

- sudo cp /var/www/SPDXHub/doc/SPDXHub.conf /etc/apache2/sites- 
available/SPDXHub.conf<br/>
- sudo a2ensite SPDXHub.conf<br/>

You will then need to restart apache:<br/>
- sudo service apache2 restart<br/>

NOTE you will be required to configure the Data_Source.php file located at  
"/var/www/SPDXHub/src/function/Data_Source.php" with your mySQL credentials and  
your path to DoSPDX.py<br/><br/>


**Should you choose not to use the install.sh script:**<br/>

Install Dependencies for SPDXHub(Dashboard):<br/>
- sudo apt-get install apache2<br/>
- sudo apt-get install mysql-server<br/>
- sudo apt-get install php5 libapache2-mod-php5<br/>
- sudo apt-get install php5-mysql<br/>
- sudo apt-get install git <br/>

Clone SPDXHub(Dashboard) and DoSOCS to your machine (remember your cloning path  
for apache configuration later):<br/>
- sudo git clone https://github.com/joverkamp/SPDXHub.git<br/>
- sudo git clone https://github.com/socs-dev-env/DoSOCS.git<br/>

Install Database to mySQL:<br/>
mysql --user=(mySQL username) --password=(mySQL password) < (Enter install  
path)/SPDXHub/database/SPDX2.sql<br/>
mysql --user=(mySQL username) --password=(mySQL password) < (Enter install  
path)/SPDXHub/database/testdata.sql<br/>

Apache must then be configured for SPDXHub(Dashboard). This process may differ  
from machine to machine, however if this is the first webpage being configured  
for Apache, you may attempt to simply copy the example configuration document  
you have provided here:  <br/>
 - https://github.com/joverkamp/SPDXHub/blob/master/doc/SPDXHub.conf <br/>

- sudo cp (Enter install path)/SPDXHub/doc/SPDXHub.conf /etc/apache2/sites- 
available/SPDXHub.conf<br/>
- sudo a2ensite SPDXHub.conf<br/>

You will then need to restart apache:<br/>
- sudo service apache2 restart<br/>

NOTE you will be required to configure the Data_Source.php file located at  
"(Enter install path)/SPDXHub/src/function/Data_Source.php" with your mySQL  
credentials and your path to DoSPDX.py<br/>

***
