<?php
	/*--------------------------------------------
	*	Lili Framework
	*	Daniel Mendonça
	*	danielusp@bol.com.br
	*	(Beta) Version 0.13.26
	*
	* 	A very simple Micro-Framework to develop single page systems in Angular, VUE, React, Vanilla etc
	*	Data content: Returns always in json format
	*
	* 	Data Example: ?class=lists&method=fu
	---------------------------------------------*/
	
	require_once "config/config.php";

	//	Main class. Use this class as an extend to your App class
	include "core/main.php";
	
	//	Error reporting. 
	// 	Advice about Error reporting: set ERROR_REPORTING = 0 in production enviroment
	if ( ERROR_REPORTING == 0 ) {
		error_reporting(0);
	} else {
		error_reporting(E_ALL);
	}

	date_default_timezone_set('America/Sao_Paulo');
	
	//	Call service classes and build them in one single service class
	if ( isset( $_GET['class'] ) && $_GET['class'] != "" && isset( $_GET['method'] ) && $_GET['method'] != "" ) {

		//$include = "app/{$_GET['class']}/{$_GET['class']}.php";
		$include = "app/{$_GET['class']}/index.php";

		if  ( file_exists( $include ) )  {
			
			//	Call Class file
			include $include;
				
			//	Instantiate Object
			$controller = New $_GET['class']( $config );

		}  else {

			errorReport( "Class" );

		}

		if  ( method_exists( $controller , $_GET['method'] ) )  {
			
			//	Saves method reference
			$method = $_GET['method'];
			
			//	Verifies if there are data parameters to send
			unset( $_GET['class'] , $_GET['method'] );
			
			$keys	= array_keys( $_GET );
			$param = ( count($keys) > 0 )? $_GET: "";
			
			//	Call method
			$output = $controller->$method($param);
			
			//	Output
			//	Return nothing. No message, no error warning, just a big empty ( return Array("void" => "void")   )
			if  ($output[key($output)] == 'void')  {

				die();

			//	Return error if there is no information
			}  else  if  ( $output[key($output)] == null )  {
				
				$output = Array( 
					key($output) => Array( 
						"error" => Array( 
							"message" => "no data" 
						)
					)
				);

			} 

			//	Show result in json format
			echo json_encode( objectToArray( $output ) );
			
		}  else  {

			errorReport( "Method" );

		}

	} else {

		//	Show result in json format
		echo json_encode( objectToArray( Array ( 
			"error" => Array( "message" => "no data" ) 
		) ) );

	}
	
	/*--------------------------------------------
	*
	*	Specific functions for this controller
	*
	---------------------------------------------*/
	function objectToArray ($object)
	{
    	
    	switch (gettype($object)) {
    		case 'object':
    			return array_map('objectToArray', (array) $object);
    			break;
    		case 'array':
    			return $object;
    			break;
    		default:
    			return array("default" => $object);
    			break;
    	}
    	
	}

	function errorReport ($msg)
	{
		echo json_encode( array(
				"Error" => "{$msg} doesn't exist"
		) );

		die();
	}