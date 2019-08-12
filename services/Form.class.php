<?php
	
	Class Form
	{
		// Receives a regular POST
		public function getData()
		{
			$data = file_get_contents("php://input");
			parse_str($data, $array);
			
			return $array;
		}

		// Receives a json POST in the body
		public function getJsonData()
		{
			$data = file_get_contents("php://input");
			
			return json_decode($data);
		}
	}