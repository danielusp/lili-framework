<?php
	/*--------------------------------------------
	*
	*	Loads main app properties
	*	and configs
	*
	---------------------------------------------*/
	
	Class Main
	{
		
		protected $services;
		protected $config;
		
		public function __construct( $config , $servicesList = Array() ){
			
			include "services/Services.class.php";
			
			//	Declare database connection automatically if the name of db is different of zero
			if ( DB_NAME != "" ) $servicesList = Array( 'base' => 'Base' ) + $servicesList;

			$services 			= new Services( $servicesList );
			
			$this->services 	= $services;
			$this->config		= $config;
		}
		
	}