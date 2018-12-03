<?php
	Class LinhaXml
	{

		public function __construct(){}

		static public function get_properties($tag)
		{
			$propriedades = Array();
			
			foreach($tag->attributes() as $key => $value) $propriedades[$key] = addslashes(utf8_decode($value)).'';
			
			return $propriedades;
		}
	}