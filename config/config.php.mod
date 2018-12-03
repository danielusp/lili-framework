<?php
	
	$config 			= New stdClass();

	//	Main defs
	$config->base		= "http://www.your_domain.com/api/";
	$config->path		= "/api/";
	$config->name		= "Admin System";
	$config->site 		= "http://www.your_domain.com";
	
	define( "PATH" , $config->path );

	//	DB
	define( "DB_HOST" , "host_name" );
	define( "DB_USER" , "user_name" );
	define( "DB_PASS" , "password" );
	define( "DB_NAME" , "database_name" );

	//	Debug: Show error -> 1, Hide error -> 0
	define( "ERROR_REPORTING" , 0 );
