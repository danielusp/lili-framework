<?php
	
	Class Base
	{

		public $dbConnect;

		public function __construct()  
		{
			$this->dbConnect = mysqli_connect( DB_HOST , DB_USER , DB_PASS , DB_NAME );
		}

	}