<?php

	/*--------------------------------------------
	*
	*	Call classes and build a general 'Apis'
	*	with all api classes
	*
	---------------------------------------------*/
	Class Services
	{
		
		public function __construct( $objects )
		{
			foreach  ( $objects as $name => $class )  {
				include "{$class}.class.php";
				$this->$name = new $class($this);
			}
		}
		
	}