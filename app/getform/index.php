<?php
	
	Class GetForm extends Main
	{
		public function __construct( $config ){
			
			//	Service instance for internal class use
			parent::__construct(
				$config,
				Array(
					'form'	=> 'Form'
				)
			);
		}

		/*
			Receive a POST data

			@return Array
		*/
		public function post()
		{
			$objData = $this->services->form->getData();
			return $objData;
		}
	}