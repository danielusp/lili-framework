# Lili Framework
  
  A very simple Micro-Framework to develop single page systems in Angular, VUE, React, Vanilla etc
  Data content: Returns always in json format

## Configs

  Rename or copy **config/config.php.mod** file to **config/config.php**
  Edit **config/config.php** file

##### Main defs

  - $config->base		= "http://www.your_domain.com/api/";
  - $config->path		= "/api/";
  - $config->name		= "Admin System";
  - $config->site 	= "http://www.your_domain.com";

##### DB

  - define( "DB_HOST" , "host_name" );
  - define( "DB_USER" , "user_name" );
  - define( "DB_PASS" , "password" );
  - define( "DB_NAME" , "database_name" );

##### Debug

  define( "ERROR_REPORTING" , 0 ); // Hide code errors

## To run into Docker (optional for dev)

  Type into console:

  ```
  $ ./docker-dev.sh
  ```
  
## How to call the API

  http://www.your_domain.com/api/?class=help&method=menu
  
  class= must be the folder name and Class name inside **/app/[folder]/index.php** file, method= is the method inside class.

  You can consider **[folder]/index.php** as a kind of controller. The file **[folder]/index.php** can call all other classes and methods