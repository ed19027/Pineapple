## Subscription to Pineapple newsletters
This project is developed by Edvards Dergačevs for educational purpose

#### VERSIONS

WAMP server - 3.2.0  
Apache - 2.4.41  
PHP - 7.4.0  
MySQL - 8.0.18

#### INSTALLATION

To run the project localy on Windows OP system install WAMP server (download at www.wampserver.com).
In installation select MySQL to be installed.
Download this project form GitHub, unzip, rename this folder to 'pineapple' and put it in wamp64/www/ directory.
Start WAMP server click on green icon and go to phpMyAdmin.
When it's opened in browser, log in with username 'root' (no password is needed).
Create NEW database (provide name and select utf8_general_ci unicode).
#### In created database execute this SQL querry:
```sql
CREATE TABLE emails (
    id bigint UNSIGNED AUTO_INCREMENT NOT NULL,
    email varchar(320) NOT NULL,
    domain varchar(252) NOT NULL,
    created_at timestamp NOT NULL,
    primary key (id)
);
```
#### In project directory find db_connection.php file and change:
```php
    private $database="pineapple"; - to your db name
    private $port="3308"; - to your mysql port (default is 3306)
```
#### Now you you can access web pabe localy in your browser with url:
```url
    localhost/pineapple
```
