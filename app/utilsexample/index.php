<?php
	
	Class UtilsExample extends Main
	{
		public function __construct( $config ){
			
			//	Service instance for internal class use
			parent::__construct(
				$config,
				Array(
					'utils' => 'Utils'
				)
			);
		}

		public function helloLili()
		{
			$text = 'This is a test';
			$y = $this->services->utils->helloLili($text);
			return Array('originalText' => $text ,'modifyiedText' => $y);
		}

		public function slug()
		{
			$text = 'this is a url path';
			$url = $this->services->utils->slug($text).'.html';
			return Array( 
				'text' => $text, 
				'url' => $url 
			);
		}
	}