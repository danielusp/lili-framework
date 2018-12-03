<?php
	
	Class Configs extends Main
	{
		public function __construct( $config ){
			
			//	Service instance for internal class use
			parent::__construct(
				$config
			);
		}

		public function info()
		{
			return Array( $this->config );
		}
	}