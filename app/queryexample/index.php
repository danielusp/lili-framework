<?php
	
	Class QueryExample extends Main
	{
		public function __construct( $config ){
			
			//	Service instance for internal class use
			parent::__construct(
				$config,
				Array(
					'query'	=> 'Query',
					'utils' => 'Utils'
				)
			);
			
		}

		/*
			Receive a POST data

			@return Array
		*/
		public function lists()
		{
			$x = $this->services->query->toArray( 'SELECT * FROM escolas' );
			return Array($x);
		}
	}