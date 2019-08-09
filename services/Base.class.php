<?php
	
	Class Base
	{

		public $dbConnect;

		public function __construct()  
		{
			$this->dbConnect = mysqli_connect( DB_HOST , DB_USER , DB_PASS , DB_NAME );

			/* check connection */
			if (mysqli_connect_errno() && ERROR_REPORTING === 1) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
		}

	}