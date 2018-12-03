<?php
	
	Class Form
	{
		public function getData()
		{
			$data = file_get_contents("php://input");
			parse_str($data, $array);
			
			return $array;
		}
	}