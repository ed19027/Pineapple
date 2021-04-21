## Subscription to Pineapple newsletters
This project is developed by Edvards Dergačevs for Magebit with love <3

#### VERSIONS

WAMP server - 3.2.0  
Apache - 2.4.41  
PHP - 7.4.0  
MySQL - 8.0.18

### INSTALLATION

To run the project localy on Windows OP system install WAMP server (download at www.wampserver.com).
In installation select MySQL to be installed.
Download this project form GitHub, unzip, and put the 'pineapple' folder in wamp64/www/ directory.

### Auto-loading

The core clases autoloading is done via composer autoloade. So if you don't have composer download and install it at (getcomposer.org). Whene you have composer command globaly available. 
#### Open command prompt cd to the project directory and execute 'composer init':
```bash
C:\WINDOWS\system32> cd C:\wamp64\www\pineapple
C:\wamp64\www\pineapple>composer init
```
After initialization hit the ENTER several times, leaving everything by default.
Now in the project directory it should be file named 'composer.json' generated.
#### Open the file and add this lines of code:
```bash
"autoload": {
    "psr-4": {
        "app\\": "./"
    }
},
```
Which means that the current folder will belong to 'app' namespace.
#### After it in the command prompt execute the 'composer update' command, which will create vendor filder with several autoloading files in it:
```bash
C:\wamp64\www\pineapple>composer update
```
It might take some time.

### Database

Start WAMP server click on green icon and go to phpMyAdmin.
When it's opened in browser, log in with username 'root' (no password is needed).
Create NEW database (provide name and select utf8_general_ci unicode).
#### In project directory find config file and provide your database data:
```php
define('DB_DSN', 'mysql:dbname=pineapple;host=localhost;port=%your_mysql_port%');
define('DB_USER', 'root'); //or your phpMyAdmin user
define('DB_PASSWORD', ''); //or your users password
```

#### Now in command prompt execute:
```bash
C:\wamp64\www\pineapple>php migration.php
```

### Accessing

Open commmand prompt from project directory cd 'public' folder.
And execute the following command:
```url
C:\wamp64\www\pineapple\public> php -S localhost:%port%
```
Because of default localhost (with port 8000) is taken by WAMP server it is necessary to provide a diferent port (for example 8080)

#### Now you you can access web pabe localy in your browser with url:
```url
    localhost:%port%
```
